<?php

namespace App\Http\Controllers;

use App\Managers\FileManager;
use App\Managers\ItemManager;
use App\Models\RechargeDataInfo;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Mockery\CountValidator\Exact;
use MP;

class PaymentController extends Controller
{
    /**
     * Controlador de retorno - Aplicação Mercado Pago
     * Aplicação do MercadoPago sempre tem uma maneira diferente de apresentar problemas.
     * 
     * @param int $collection_id = Referência Externa apresentada pelo Mercado Pago
     * @param int $data_id = Referência Externa alternativa
     * @param int $id = Identificação da transação
     * 
     * @param int $OperationCode = Referência Externa
     * @return object
     */
    public static function BackMercadoPago(Request $request)
    {
        try {
            $OperationCode = $request->get('collection_id');
            if (empty($OperationCode))
                $OperationCode = $request->get('id');
            if (empty($OperationCode))
                $OperationCode = $request->get('data_id');

            if(empty($OperationCode))
                throw new Exception("Fatura não recebida");

            $InvoiceDataInfo = self::getInvoiceMercadoPago($OperationCode);
            
            if (empty($InvoiceDataInfo) or empty($InvoiceDataInfo->external_reference))
                throw new Exception("Fatura não encontrada pelo MercadoPago!");

            $ExternalReference = $InvoiceDataInfo->external_reference;

            $RechargeDataInfo = RechargeController::getRechargeDataInfo($ExternalReference);
            if (empty($RechargeDataInfo) or $RechargeDataInfo->count() == 0)
                throw new Exception("Fatura não existente no servidor.");

            $PaymentType = $InvoiceDataInfo->payment_type_id;
            $PaymentStatus = $InvoiceDataInfo->status;

            switch ($PaymentType) {
                case "ticket":
                    $RechargeDataInfo[0]->method = "Boleto";
                    break;
                case "account_money":
                    $RechargeDataInfo[0]->method = "Saldo em conta";
                    break;
                case "credit_card":
                    $RechargeDataInfo[0]->method = "Cartão de Crédito";
                    break;
            }

            switch ($PaymentStatus) {
                case "approved":
                    $RechargeDataInfo[0]->status = "Aprovada";
                    break;
                case "pending":
                    $RechargeDataInfo[0]->status = "Pendente MP";
                    break;
                case "in_proccess":
                    $RechargeDataInfo[0]->status = "Em processo";
                    break;
                case "rejected":
                    $RechargeDataInfo[0]->status = "Rejeitada";
                    break;
                case "refunded":
                    $RechargeDataInfo[0]->status = "Estornada";
                    break;
                case "cancelled":
                    $RechargeDataInfo[0]->status = "Cancelada";
                    break;
                case "in_mediation":
                    $RechargeDataInfo[0]->status = "Em disputa";
                    break;
            }

            RechargeDataInfo::where('reference', '=', $RechargeDataInfo[0]->reference)->update([
                'method' => $RechargeDataInfo[0]->method,
                'status' => $RechargeDataInfo[0]->status
            ]);

            return json_encode(['message' => "Payment has been updated by Splush"]);
        } catch (Exception $ex) {
            FileManager::CreateLogFile($ex);
        }
    }

    public static function getInvoiceMercadoPago($ID)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.mercadopago.com/v1/payments/'.$ID,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.env('MERCADOPAGO_TOKEN')
            ),
        ));

        $Exec = curl_exec($curl);
        $MerchantInfo = json_encode($Exec, true);

        $MerchantData = json_encode(json_decode($Exec), JSON_PRETTY_PRINT);
        $MerchantData = json_decode($MerchantData);

        return $MerchantData;
    }

    public static function BackPicPay()
    {
        $RechargeInfos = RechargeController::getPendentRechargeDataInfos("picpay");
        foreach ($RechargeInfos as $RechargeInfo) {
            $ReferenceId = $RechargeInfo->reference;

            if (!empty($ReferenceId)) {
                $RechargeDataInfo = RechargeController::getRechargeDataInfo($ReferenceId);
                if (!empty($RechargeDataInfo[0]->reference)) {

                    $InvoicePicPayInfo = json_decode(self::getInvoicePicPayInfo($ReferenceId));
                    if (empty($InvoicePicPayInfo))
                        return;

                    switch ($InvoicePicPayInfo->status) {
                        case "paid":
                            $RechargeDataInfo->status = "Pago";
                            if($RechargeDataInfo[0]->sended == 0){
                                ItemManager::SendRecharge($RechargeDataInfo[0]->userid, $RechargeDataInfo[0]->price, $RechargeDataInfo[0]->zoneid);
                                $RechargeDataInfo[0]->sended = 1;
                            }
                            break;
                        case "created":
                            $RechargeDataInfo->status = "Criada";
                            break;
                        case "expired":
                            $RechargeDataInfo->status = "Expirada";
                            break;
                        case "analysis":
                            $RechargeDataInfo->status = "Analise";
                            break;
                        case "completed":
                            $RechargeDataInfo->status = "Completada";
                            if($RechargeDataInfo[0]->sended == 0){
                                ItemManager::SendRecharge($RechargeDataInfo[0]->userid, $RechargeDataInfo[0]->price, $RechargeDataInfo[0]->zoneid);
                                $RechargeDataInfo[0]->sended = 1;
                            }
                            break;
                        case "refunded":
                            $RechargeDataInfo->status = "Reembolsada";
                            break;
                        case "chargeback":
                            $RechargeDataInfo->status = "Estornada";
                            break;
                    }

                    RechargeDataInfo::where('reference', '=', $ReferenceId)->update([
                        'status' => $RechargeDataInfo->status,
                        'sended' => $RechargeDataInfo[0]->sended
                    ]);
                }
            }
        }

        return json_encode($RechargeInfos);
    }

    public static function getInvoicePicPayInfo(int $Reference)
    {
        $client = new Client([
            "headers" => [
                "Content-Type" => "application/json",
                "x-picpay-token" => env('PICPAY_TOKEN_X')
            ],
            "verify" => false
        ]);

        $request = $client->request("GET", 'https://appws.picpay.com/ecommerce/public/payments/' . $Reference . '/status');
        return $request->getBody()->getContents();
    }

    public static function InvoiceMercadoPago($Reference, $Price)
    {
        require_once __DIR__ . "\mercadopago\lib\mercadopago.php";

        $FreeMerchant = new MP(env('MERCADOPAGO_CLIENTID'), env('MERCADOPAGO_CLIENTSECRET'));

        $InvoiceDataInfo = array(
            "Items" => array(
                array(
                    "id" => 1,
                    "title" => 'Recarga DDtank Empire',
                    "description" => 'Você está recarregando no DDtank Empire Brasil !',
                    "currency_id" => 'BRL',
                    "picture_url" => 'picture.jpg',
                    "unit_price" => floatval($Price),
                    'quantity' => 1
                )
            ),
            "back_urls" => array(
                "success" => "https://web-service.ddtankempire.com.br/api/callback/mercadopago/",
                "failure" => "https://web-service.ddtankempire.com.br/api/callback/mercadopago/",
                "pending" => "https://web-service.ddtankempire.com.br/api/callback/mercadopago/"
            ),
            "notification_url" => "https://web-service.ddtankempire.com.br/api/callback/mercadopago/",
            "external_reference" => $Reference
        );

        $PreferenceInfo = $FreeMerchant->create_preference($InvoiceDataInfo);
        if (empty($PreferenceInfo))
            return;

        return $PreferenceInfo["response"]["init_point"];
    }

    public static function InvoicePicPay(int $Reference, int $Price)
    {
        $InvoiceDataInfo = [
            'referenceId' => $Reference,
            'callbackUrl' => "https://web-service.ddtankempire.com.br/api/callback/picpay/",
            "returnUrl" => Route('api.authentication.login'),
            "value" => $Price,
            "buyer" => [
                "firstName" => "Private Information",
                "lastName" => "Private Information",
                "document" => "126.456.789-10",
                "email" => "admin@ddtankempire.com.br",
                "phone" => "+55 31 99155-4947"
            ]
        ];

        $client = new Client([
            "headers" => [
                "Content-Type" => "application/json",
                "x-picpay-token" => env('PICPAY_TOKEN_X')
            ],
            "verify" => false
        ]);

        $request = $client->request('POST', "https://appws.picpay.com/ecommerce/public/payments", ['body' => json_encode($InvoiceDataInfo)]);

        return json_decode($request->getBody()->getContents());
    }
}
