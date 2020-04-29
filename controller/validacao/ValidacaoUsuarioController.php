<?php

class ValidacaoUsuarioController
{
    
    public static function validacaoTipoUsuario($tipoUsuario)
    {
        
        session_start();

        if($tipoUsuario == 1 || $tipoUsuario >= 5 || empty($tipoUsuario) || !isset($tipoUsuario)) {

            return false;

        } else if($_SESSION["idTipoUsuario"] != 1 && $tipoUsuario == 2) {

            return false;

        } else if($_SESSION["idTipoUsuario"] < 2 && $tipoUsuario == 3) {

            return false;

        } else if($_SESSION["idTipoUsuario"] < 2 && $tipoUsuario >= 2) {

            return false;
            
        } else {

            return true;

        }

    }

    public static function validacaoEmailUsuario($email) 
    {

        if(preg_match('/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i', $email) != 0 && isset($email) && empty($tipoUsuario)) {

            return true;

        } else {

            return false;

        }

    }

    public static function validacaoSenhaUsuario($senha) 
    {

        if(preg_match('/["´`ÁÀÓÒ*&^¨.:;,Â!Ã?ÔÕ]/', $senha) != 0 || empty($senha) == true || !isset($senha)) {

            return false;

        } else if(preg_match('/[0123456789]/', $senha) == 0 || preg_match('/[-_<>@&%$#]/', $senha) == 0) {
            
            return false;

        } else {

            return true;

        }

    }

}

?>