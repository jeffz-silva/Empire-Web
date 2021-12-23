<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserConfigController extends Controller
{
    //
    public static function Config(){
        $AccountInfo = AccountsController::getAccount($_SESSION['UserOrMail']);
        if(empty($AccountInfo) OR $AccountInfo->count() == 0)
            AuthenticationController::Destroy();
        return view('authenticate.center.user_config', ['AccountInfo' => $AccountInfo]);
    }

    public static function SaveChanges(Request $request){
        $Email = $request->post('Email');
        $NewPassword = $request->post('NewPassword');
        $ConfirmPassword = $request->post('ConfirmPassword');
        $OldPassword = $request->post('OldPassword');

        $IsChangePassword = (!empty($NewPassword) && !empty($ConfirmPassword));

        $AccountInfo = AccountsController::getAccount($_SESSION['UserOrMail']);
        if(empty($AccountInfo))
            AuthenticationController::Destroy();

        $IsChangeEmail = ($Email != $AccountInfo[0]->email);

        if(!password_verify($OldPassword, $AccountInfo[0]->password))
            return json_encode(['message' => "senha incorreta!"]);

        if($IsChangePassword){
            if($NewPassword != $ConfirmPassword)
                return json_encode(['message' => "sua nova senha não condiz com a confirmada."]);
            if(strlen($NewPassword) < 4 || strlen($NewPassword) > 20)
                return json_encode(['message' => "sua senha deve ter entre 4 a 20 caracteres."]);
            
            $AccountInfo[0]->password = password_hash($NewPassword, PASSWORD_DEFAULT);
        }

        if($IsChangeEmail){
            $EmailExist = (AccountsController::getAccount($Email)->count() != 0);
            if($EmailExist)
                return json_encode(['message' => "já existe uma conta utilizando esse endereço de e-mail!"]);

            $AccountInfo[0]->email = $Email;
        }

        $AccountInfo[0]->save();
        if(AuthenticationController::Destroy(1))
            return json_encode(['message' => "alterações efetuadas com sucesso, você será desconectado!", 'finish' => true]);

        return false;
    }
}
