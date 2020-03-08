<?php 

    require_once(__DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."global.php");

    try{
        $paciente = new PacienteDAO();
        $paciente->setNomePaciente($_POST['txtNome']);
        $paciente->setSexoPaciente($_POST['seSexo']);
        $paciente->setTipoSanguineoPaciente($_POST['seTipoSanguineo']);
        $paciente->setFatorRhPaciente($_POST['seFatorRh']);
        $paciente->setCpfPaciente($_POST['txtCpfPaciente']);
        $paciente->setRgPaciente($_POST['txtRgPaciente']);
        echo $paciente->cadastrarPaciente($paciente);
        echo '<script> window.location.replace("../../view/paciente.php"); </script>';
    }
    catch(Exception $e){
        echo '<pre>';
            print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }