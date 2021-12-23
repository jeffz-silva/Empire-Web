<?php

namespace App\Http\Controllers;

use App\Models\Server;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    public function getServers(){
        return Server::orderBy('created_at', 'desc')->get();
    }

    public static function getServerList(){
        $ServerController = new self;
        return $ServerController->getServers();
    }

    public static function getNewServer(){
        return Server::orderBy('created_at', 'desc')->get()[0];
    }

    public static function getServerById(int $ID){
        return Server::where('id', '=', $ID)->get();
    }

    public static function getServerStatus($ApplicationUrl){
        $client = new Client(['verify' => false]);
        $request = $client->request('GET', $ApplicationUrl."api/server/game/serverstatus");

        return json_decode($request->getBody()->getContents());
    }
}
