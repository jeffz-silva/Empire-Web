<?php

namespace App\Http\Controllers;

use App\Models\RechargeDataInfo;
use App\Models\RechargeInfo;
use Illuminate\Http\Request;

class RechargeController extends Controller
{
    //
    public static function getRechargeInfos(){
        return RechargeInfo::all();
    }

    public static function getPendentRechargeDataInfos(string $Type){
        return RechargeDataInfo::where('method', '=', $Type)->get();
    }

    public static function getRechargeInfoByPrice(int $Price){
        return RechargeInfo::where('Price', '=', $Price)->get();
    }

    public static function createInvoice(Request $request){
        session_start();

        $ServerID = $request->post('server');
        $Character = $request->post('character');
        $Method = $request->post('method');
        $Value = $request->post('value');

        if(empty($ServerID) || empty($Character) || empty($Method) || empty($Value))
            return;

        if(!is_numeric($Value))
            return json_encode(['message' => 'você não selecionou um valor!']);
        
        $PaymentUrl = "";
        $Code = self::createReferenceCode();

        switch($Method){
            case "picpay":{
                $InvoicePicpay = PaymentController::InvoicePicPay($Code, $Value);
                $Code = $InvoicePicpay->referenceId;
                $PaymentUrl = $InvoicePicpay->paymentUrl;
                break;
            }
            case "freemerchant":{
                $PaymentUrl = PaymentController::InvoiceMercadoPago($Code, $Value);
                break;
            }
        }

        if(empty($PaymentUrl))
            return json_encode(['message' => "não foi possivel finalizar seu pagamento."]);

        if(!self::addRechargeDataInfo($_SESSION['UserOrMail'], $Method, $Value, $Code, $Character, $ServerID))
            return json_encode(['message' => "não foi possivel finalizar seu pagamento."]);

        return json_encode(['isFinish' => true, 'paymentUrl' => $PaymentUrl]);
    }

    public static function getRechargeDataInfo(int $Reference){
        return RechargeDataInfo::where('reference', '=', $Reference)->get();
    }

    private static function createReferenceCode(){
        $Code = rand(1111111, 9999999);

        if(empty(self::getRechargeDataInfo($Code)) OR self::getRechargeDataInfo($Code)->count() == 0)
            return $Code;

        return self::createReferenceCode();
    }

    public static function addRechargeDataInfo(string $username, string $method, int $price, int $reference, int $userid, int $zoneid){
        $RechargeDataInfo = new \App\Models\RechargeDataInfo;
        $RechargeDataInfo->username = $username;
        $RechargeDataInfo->method = $method;
        $RechargeDataInfo->price = $price;
        $RechargeDataInfo->reference = $reference;
        $RechargeDataInfo->userid = $userid;
        $RechargeDataInfo->zoneid = $zoneid;
        $RechargeDataInfo->sended = false;
        $RechargeDataInfo->save();

        return true;
    }

    public static function Index(){
        $AccountInfo = AccountsController::getAccount($_SESSION['UserOrMail']);
        $ServerList = ServerController::getServerList();
        $RechargeInfos = self::getRechargeInfos();

        return view('recharge.game_recharge', [
            'AccountInfo' => $AccountInfo->get(0), 
            'ServerList' => $ServerList,
            'RechargeInfos' => $RechargeInfos
        ]);
    }

    public static function getPlayerCharacters(Request $request){
        session_start();

        $ServerID = $request->get('id');

        $ServerInfo = ServerController::getServerById($ServerID);
        if(empty($ServerInfo) || $ServerInfo->count() == 0)
            return;

        $Characters = PlayerController::getPlayersByUsername($_SESSION['UserOrMail'], $ServerInfo[0]->application);

        return $Characters;
    }
}
