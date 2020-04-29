<?php 

    require_once(__DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."global.php");

    try{

        $nomePaciente = $_POST['txtNomePaciente'];
        $sexoPaciente = $_POST['seSexoPaciente'];
        $tipoSanguineoPaciente = $_POST['seTipoSanguineoPaciente'];
        $fatorRhPaciente = $_POST['seFatorRhPaciente'];
        $cpfPaciente = $_POST['txtCpfPaciente'];
        $rgPaciente = $_POST['txtRgPaciente'];

        $statusNomePaciente = ValidacaoController::validarNome($nomePaciente);
        $statusSexoPaciente = ValidacaoController::validarSexo($sexoPaciente);
        $statusTipoSanguineoPaciente = ValidacaoController::validarTipoSanguineo($tipoSanguineoPaciente);
        $statusFatorRhPaciente = ValidacaoController::validarTipoFatorRh($fatorRhPaciente);
        $statusCpfPaciente = ValidacaoController::validarCpf($cpfPaciente);


        if($statusCpfPaciente && $statusNomePaciente && $statusSexoPaciente && $statusFatorRhPaciente 
           && $statusTipoSanguineoPaciente && isset($rgPaciente) && !empty($rgPaciente)) {

            $paciente = new PacienteDAO();

            $paciente->setNomePaciente($nomePaciente);
            $paciente->setSexoPaciente($sexoPaciente);
            $paciente->setTipoSanguineoPaciente($tipoSanguineoPaciente);
            $paciente->setFatorRhPaciente($fatorRhPaciente);
            $paciente->setCpfPaciente($fatorRhPaciente);
            $paciente->setRgPaciente($rgPaciente);
            
            echo $paciente->cadastrarPaciente($paciente);

            echo '<script> window.location.replace("../../view/paciente.php"); </script>';

        } else {

            echo 'Tentativa de Inserção de dados comprometidos';

        }

        
    }
    catch(Exception $e){
        echo '<pre>';
            print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }