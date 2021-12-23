<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class AccountsController extends Controller
{
    /**
     * @param string text => nome de usuário ou e-mail
     * @return object AccountInfo
     */
    public static function getAccount(string $text){
        $Account = self::getAccountByUsername($text);
        if($Account->count() == 0)
            $Account = self::getAccountByEmail($text);
        return $Account;
    }

    /**
     * @param string username => nome de usuário
     * @return object AccountInfo
     */
    public static function getAccountByUsername(string $Username)
    {
        return Account::Where('username', '=', $Username)->get();
    }

    /**
     * @param string email => endereço de e-mail
     * @return object AccountInfo
     */
    public static function getAccountByEmail(string $Email)
    {
        return Account::Where('email', '=', $Email)->get();
    }
}
