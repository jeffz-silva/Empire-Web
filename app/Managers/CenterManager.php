<?php

namespace App\Managers;

use Exception;
use SoapClient;

class CenterManager
{
    private $SoapServer;
    private $ServerInfo;

    function __construct(object $ServerInfo)
    {
        $this->ServerInfo = $ServerInfo[0];
        $this->initSoapServer();
    }

    /**
     * Inicia uma conexão com a aplicação SOAP
     * 
     * @param int soap_version => Versão do soap
     * @param bool exceptions => Liga/Desliga exceções
     * @param int trace => Rastros
     * @param int/bool cache_wsdl => Liga/Desliga cache
     */
    private function initSoapServer()
    {
        try {
            $soapOptions = [
                'soap_version' => SOAP_1_1,
                'exceptions' => false,
                'trace' => 1,
                'cache_wsdl' => 0
            ];
            $this->SoapServer = new SoapClient($this->ServerInfo->soap, $soapOptions);
        } catch (Exception $ex) {
            FileManager::CreateLogFile($ex);
        }
    }

    /**
     * Envia a aplicação SOAP detalhes da recarga
     * 
     * @param int $UserID => Identificação do usuário
     * @param int $Money => Valor em cupons da recarga
     */
    public function sendRechargeMoney(int $UserID, int $Money)
    {
        if($this->SoapServer){       
            $dataInfo = [
                'UserID' => $UserID,
                'ZoneID' => $this->ServerInfo->zoneid,
                'RechargeCount' => $Money
            ];

            $callback = $this->SoapServer->RechargeMoney($dataInfo);
            if($callback->RechargeMoneyResult == 1)
                return true;
            else
                return false;
        }
        return false;
    }
}
