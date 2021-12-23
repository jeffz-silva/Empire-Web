<?php

namespace App\Http\Controllers;

use App\Managers\FileManager;
use Exception;
use GuzzleHttp\Client;

use Illuminate\Http\Request;

class PlayGameController extends Controller
{
    /**
     * Captura a página de conexão
     * 
     * @param int ZoneID => Identificação do servidor por Zona
     */
    public static function Index(int $ZoneID = 0)
    {
        $ZoneInfo = ServerController::getServerById($ZoneID);
        if (empty($ZoneInfo) or $ZoneInfo->count() == 0)
            return Redirect()->route('web.app.home');

        $OnlineServer = ServerController::getServerStatus($ZoneInfo[0]->application);
        if (empty($OnlineServer))
            throw new Exception("Não conseguimos localizar o status do servidor!");

        $QuestCallback = json_decode(self::QuestServer($ZoneInfo));

        if ($OnlineServer->Value == "False"){
            if(!$QuestCallback->PlayerCharacters[0]->IsStaff)
                return view('game.maintenance', ['name' => $ZoneInfo[0]->name]);
        }

        if (!isset($QuestCallback->Status))
            return view('game.maintenance', ['name' => $ZoneInfo[0]->name]);

        $_SESSION['LastServer'] = $ZoneID;

        if (count($QuestCallback->PlayerCharacters) == 0)
            return view('game.create_character', ['ServerName' => $ZoneInfo[0]->name, 'ZoneID' => $ZoneInfo[0]->id]);

        return view('game.play', ['Username' => $_SESSION['UserOrMail'], 'AuthInfo' => $QuestCallback, 'ServerName' => $ZoneInfo[0]->name]);
    }

    public static function CreateCharacter(Request $request)
    {
        session_start();

        $CharacterInfo = [
            'UserName' => $_SESSION['UserOrMail'],
            'NickName' => $request->post('NickName'),
            'Sex' => $request->post('Gener'),
            'ZoneID' => $request->post('ZoneID'),
            'Password' => md5($_SESSION['Password'])
        ];

        $IsNotValidate = (
            (empty($CharacterInfo['NickName']) || empty($CharacterInfo['ZoneID'])) ||
            (strlen($CharacterInfo['NickName']) < 3 || strlen($CharacterInfo['NickName']) > 12)
        );
        if ($IsNotValidate)
            return;

        $ServerInfo = ServerController::getServerById($CharacterInfo['ZoneID']);
        if ($ServerInfo->count() == 0)
            return json_encode(['message' => "Servidor inexistente!"]);

        $client = new Client(['verify' => false]);
        $request = $client->request('GET', $ServerInfo[0]->application . "api/server/game/createcharacter", [
            'query' => $CharacterInfo
        ]);

        $callback = json_decode($request->getBody()->getContents());
        if (!$callback->IsCreated) {
            return json_encode(['message' => $callback->Message]);
        }

        return json_encode(['message' => 'personagem criado com sucesso!']);
    }


    /**
     * Requere uma autenticação no servidor para o jogador
     * 
     * @param object ZoneInfo => Identificação da zona
     */
    public static function QuestServer(object $ZoneInfo)
    {
        $client = new Client(['verify' => false]);
        $request = $client->request('GET', $ZoneInfo[0]->application . "api/server/auth", [
            'query' => ['id' => $ZoneInfo[0]->id, 'username' => $_SESSION['UserOrMail'], 'key' => $ZoneInfo[0]->key]
        ]);

        return $request->getBody()->getContents();
    }
}
