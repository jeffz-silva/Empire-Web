<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Account;

class AuthenticationController extends Controller
{
    public function Index(){
        return view('app.home');
    }

    public function Logout(){
        session_destroy();
        return Redirect()->route('web.app.home');
    }

    public static function Destroy(int $Type = 0){
        switch($Type){
            case 0:{
                $AuthenticationController = new self();
                return $AuthenticationController->Logout();
                break;
            }
            case 1:{
                session_destroy();
                return true;
                break;
            }
        }
    }

    public function Login(Request $request){
        $UserOrMail = strtolower($request->post('UsernameOrEmail'));
        $Password = $request->post('Password');

        if(empty($UserOrMail) || empty($Password))
            return ['alert' => "você não preencheu todos os campos"];

        $Account = AccountsController::getAccount($UserOrMail);

        if($Account->count() == 0)
            return ['alert' => "conta não encontrada no sistema"];

        if(!password_verify($Password, $Account[0]->password))
            return ['alert' => "senha incorreta"];

        $_SESSION['IsOnline'] = true;
        $_SESSION['UserOrMail'] = strtolower($Account[0]->username);
        $_SESSION['Password'] = $Password;

        return ['message' => "login efetuado com sucesso"];
    }

    public function Register(Request $request){

        $Account = new Account();
        $Account->Username = strtolower($request->post('Username'));
        $Account->Password = $request->post('Password');
        $Account->Email = strtolower($request->post('Email'));

        if(empty($Account->Username) || empty($Account->Password) || empty($Account->Email)){
            return ['alert' => "você não preencheu todos os campos"];
        }

        if(!filter_var($Account->Email, FILTER_VALIDATE_EMAIL))
            return ['alert' => 'você não digitou um endereço de e-mail válido!'];
        
        if(strlen($Account->Username) < 4 || strlen($Account->Username) > 12)
            return ['alert' => "você deve ter entre 4 a 12 caracteres no nome de usuário"];

        if(strlen($Account->Password) < 4 || strlen($Account->Password) > 20)
            return ['alert' => "você deve ter entre 4 a 20 caracteres em sua senha"];

        if(AccountsController::getAccountByEmail($Account->Email)->count() != 0)
            return ['alert' => "esse endereço de e-mail já está sendo utilizado"];

        if(AccountsController::getAccountByUsername($Account->Username)->count() != 0)
            return ['alert' => "esse nome de usuário já está sendo utilizado"];

        $Account->Password = password_hash($Account->Password, PASSWORD_DEFAULT);

        if(!$Account->save())
            return ['alert' => "não conseguimos processar a ação!"];

        return ['message' => 'Cadastro efetuado com sucesso!'];
    }
}
