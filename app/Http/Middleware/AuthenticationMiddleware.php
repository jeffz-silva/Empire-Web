<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, int $Type)
    {
        session_start();

        switch($Type){
            case 0:{ //Offline
                break;
            }
            case 1:{ //Online
                if(!isset($_SESSION['IsOnline'])){
                    return Redirect()->route('web.app.home');
                }  
                break;
            }
            case 2:{
                break;
            }
        }
        
        return $next($request);
    }
}
