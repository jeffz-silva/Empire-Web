<?php

namespace App\Http\Controllers;

use App\Managers\FileManager;
use Exception;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\ExceptionMessage;

class ConfigController extends Controller
{
    //
    public static function CreateZoneConfig(Request $request)
    {
        session_start();

        $GameHash = $request->get('GameHash');

        if (empty($GameHash)) {
            $GameHash = $_GET['gamehash'];
            if (empty($GameHash))
                throw new ExceptionMessage("Não foi encontrada uma chave de jogo.");
        }

        $GameHash = explode('?', $GameHash)[0];
        $GameHash = self::base64_url_decode($GameHash);

        $GameInfo = json_decode($GameHash);

        if(isset($GameInfo->ID))
            FileManager::MakeConfigFile("config-". $GameInfo->ID .".txt", $GameInfo->Quest, $GameInfo->Resource, $GameInfo->Flash, $GameInfo->Language);
        else{
            $GamePathInfos = FileManager::GetFileContent("config-".$_SESSION['LastServer'].".txt");
            $GamePathInfo = explode('|', $GamePathInfos);

            $GameInfo = [
                'Quest' => $GamePathInfo[0],
                'Resource' => $GamePathInfo[1],
                'Flash' => $GamePathInfo[2],
                'Language' => $GamePathInfo[3]
            ];
        }

        $GameInfo = json_decode(json_encode($GameInfo));

        return view('config.game_auth')->with(compact('GameInfo'));
    }

    private static function base64_url_decode($val)
    {
        return base64_decode(strtr($val, '[', '='));
    }
}
