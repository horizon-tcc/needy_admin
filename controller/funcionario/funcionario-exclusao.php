<?php
    require_once(__DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."global.php");

    try{
        $funcionario = new FuncionarioDAO();
        echo $funcionario->excluirFuncionario($_GET['id']);
        echo '<script> window.location.replace("../../view/funcionario.php"); </script>';
    }
    catch(Exception $e){
        echo '<pre>';
            print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }