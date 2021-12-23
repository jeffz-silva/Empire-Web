<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Coleta lista de personagens pelo nome de usuário
     * 
     * @param string $Username => Nome de usuário
     * @param string $ApplicationUrl => URL da aplicação
     */
    public static function getPlayersByUsername(string $Username, string $ApplicationUrl){
        $client = new Client(['verify' => false]);
        $request = $client->request('GET', $ApplicationUrl."api/player/characters", [
            "query" => ['Username' => $Username]
        ]);

        return $request->getBody()->getContents();
    }

    /**
     * Coleta personagem pela identificação
     * 
     * @param int $UserID => Identificação do usuário
     * @param string $ApplicationUrl => URL da aplicação
     */
    public static function getPlayerByUserID(int $UserID, string $ApplicationUrl){
        $client = new Client(['verify' => false]);
        $request = $client->request('GET', $ApplicationUrl."api/player/character", [
            "query" => ['UserID' => $UserID]
        ]);

        return $request->getBody()->getContents();
    }
}
