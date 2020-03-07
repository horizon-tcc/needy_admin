<?php 

    require_once(__DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."global.php");

    try{
        header("Location: ../view/paciente.php");
        $paciente = new PacienteDAO();
        $paciente->setNomePaciente($_POST['txtNome']);
        $paciente->setSexoPaciente($_POST['txtSexo']);
        $paciente->setSexoPaciente($_POST['txtSexo']);
        $paciente->setTipoSanguineo($_POST['tipoSanguineo']);
        $paciente->setFatorRhPaciente($_POST['fatorRh']);
        $paciente->setCpfPaciente($_POST['txtCpf']);
        $paciente->setRgPaciente($_POST['txtRg']);
        echo $paciente->cadastrarPaciente($paciente);
    }
    catch(Exception $e){
        echo '<pre>';
            print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }
 ?>