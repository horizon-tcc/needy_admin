<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

class BancoSangueController
{


    public static function limparSessaoHorarios()
    {   
        if(!isset($_SESSION)){

            session_start();
        }
        

        if (isset($_SESSION['horariosSemana'])) {

            unset($_SESSION['horariosSemana']);
            return true;
        } else {

            return false;
        }
    }
}
