<?php
namespace App\Managers;

use Exception;

class FileManager{
    /**
     * Formula um arquivo "Cache" da config.xml
     * 
     * @param string $Name => Nome do arquivo
     * @param string $Request => URL da request
     * @param string $Resource => URL da resource
     * @param string $Flash => URL da flash
     * @param string @Language => Linguagem da UI(Flash)
     * 
     * @return void
     */
    public static function MakeConfigFile(string $Name, string $Quest, string $Resource, string $Flash, string $Language){

        $FileExist = self::CheckFileExist($Name);

        if($FileExist){
            $File = fopen(public_path()."/".$Name, 'w+');
            
            $Contents = fgets($File);
            $Content = explode('|', $Contents);
            
            if($Content[0] != $Quest || $Content[1] != $Resource || $Content[2] != $Flash || $Content[3] != $Language){
                fwrite($File, $Quest."|".$Resource."|".$Flash."|".$Language);
            }

            fclose($File);
            return;
        }

        $File = self::CreateFile($Name);
        fwrite($File, $Quest."|".$Resource."|".$Flash."|".$Language);
        fclose($File);
        return;
    }

    public static function CreateLogFile(Exception $ex){
        $CreateFile = (public_path()."/".time().".txt");

        if(!file_exists($CreateFile)){
            $FileStream = fopen($CreateFile, 'w+');
            fwrite($FileStream, $ex->getMessage());
            fclose($FileStream);
        }

    }

    public static function GetFileContent(string $Name){
        $File = file_get_contents(public_path()."/".$Name);
        if(!$File OR empty($File))
            throw new Exception("Arquivo não encontrado.");
        return $File;
    }

    public static function OpenFile(string $Name){
        $File = fopen(public_path()."/".$Name, 'r+');
        if(!$File)
            throw new Exception("Não foi possivel abrir o arquivo");
        return $File;
    }


    public static function CreateFile(string $Name){
        $File = fopen(public_path()."/".$Name, 'w');
        if(!$File)
            throw new Exception("Não foi possivel criar o arquivo!");
        return $File;
    }

    public static function CheckFileExist(string $FileName){
        if(file_exists(public_path().'/'.$FileName))
            return true;
        return false;
    }
}
?>