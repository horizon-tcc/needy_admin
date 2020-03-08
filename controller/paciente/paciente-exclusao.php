<?php
    require_once(__DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."global.php");

    try{
        $paciente = new PacienteDAO();
        echo $paciente->excluirPaciente($_GET['id']);
        echo '<script> window.location.replace("../../view/paciente.php"); </script>';
    }
    catch(Exception $e){
        echo '<pre>';
            print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }