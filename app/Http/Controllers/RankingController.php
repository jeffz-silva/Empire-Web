<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    //
    public static function Index(Request $request)
    {
        $type = $request->get('type');
        $server = $request->get('server-id');

        $ServerInfo = ServerController::getServerById($server);
        if (empty($ServerInfo) || $ServerInfo->count() == 0)
            return;

        switch ($type) {
            case "player": {
                    $TopPlayers = json_decode(self::getTopPlayersByServer($ServerInfo));

                    $ElementStruct = "";
                    $rank = 1;

                    for ($i = 0; $i < count($TopPlayers); $i++) {
                        switch ($rank) {
                            case 1:
                                $tag = "gold";
                                break;
                            case 2:
                                $tag = "plate";
                                break;
                            case 3:
                                $tag = "bronze";
                                break;
                            default:
                                $tag = "grey";
                                break;
                        }
                        $ElementStruct .= '<li>
                                            <span class="tag ' . $tag . '">' . $rank . '</span>
                                            ' . $TopPlayers[$i]->NickName . '<span class="right">' . $TopPlayers[$i]->FightPower . '</span>
                                        </li>';
                        $rank++;
                    }

                    return $ElementStruct;
                    break;
                }
            case "society": {
                    $TopConsortias = json_decode(self::getTopConsortiaByServer($ServerInfo));

                    $ElementStruct = "";
                    $rank = 1;

                    for ($i = 0; $i < count($TopConsortias); $i++) {
                        switch ($rank) {
                            case 1:
                                $tag = "gold";
                                break;
                            case 2:
                                $tag = "plate";
                                break;
                            case 3:
                                $tag = "bronze";
                                break;
                            default:
                                $tag = "grey";
                                break;
                        }

                        $ElementStruct .= '<li>
                            <span class="tag ' . $tag . '">' . $rank . '</span>
                            ' . $TopConsortias[$i]->ConsortiaName . '<span class="right">' . $TopConsortias[$i]->FightPower . '</span>
                        </li>';
                        
                        $rank++;
                    }

                    return $ElementStruct;
                    break;
                }
        }
    }

    public static function getTopPlayersByServer(object $ServerInfo)
    {
        $client = new Client(['verify' => false]);
        $request = $client->request('GET', $ServerInfo[0]->application . "api/server/ranking/players");

        return $request->getBody()->getContents();
    }

    public static function getTopConsortiaByServer(object $ServerInfo)
    {
        $client = new Client(['verify' => false]);
        $request = $client->request('GET', $ServerInfo[0]->application . "api/server/ranking/consortias");

        return $request->getBody()->getContents();
    }
}
