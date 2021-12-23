<?php
namespace App\Managers;

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\RechargeController;
use App\Http\Controllers\ServerController;
use Exception;

class ItemManager{
    public static function SendRecharge(int $UserID, int $Price, int $ServerID){
        try{
            $RechargeInfo = RechargeController::getRechargeInfoByPrice($Price);
            if(empty($RechargeInfo) OR $RechargeInfo->count() == 0)
                throw new Exception("Recarga não encontrada.");

            $Money = $RechargeInfo[0]->Money;

            $ServerInfo = ServerController::getServerById($ServerID);
            if(empty($ServerInfo))
                throw new Exception("Servidor não encontrado");

            $PlayerCharacter = json_decode(PlayerController::getPlayerByUserID($UserID, $ServerInfo[0]->application));
            if(empty($PlayerCharacter))
                throw new Exception("Personagem não encontrado");

            $CenterManager = new CenterManager($ServerInfo);
            if(!$CenterManager->sendRechargeMoney($UserID, $Money))
                throw new Exception("Não foi possivel enviar a recarga para o jogador ". $UserID);

            return true;
        }catch(Exception $ex){
            FileManager::CreateLogFile($ex);
        }
    }
}
?>