<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

session_start();

try {

    $cadastro = new PacienteDAO();

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
    $statusExistenciaCPf = $cadastro->verificarExistenciaCpfPaciente($cpfPaciente);


    if ($statusCpfPaciente && $statusNomePaciente && $statusSexoPaciente && $statusFatorRhPaciente
        && $statusTipoSanguineoPaciente && isset($rgPaciente) && !empty($rgPaciente)) {

        $paciente = new PacienteModel();

        $paciente->setNomePaciente($nomePaciente);
        $paciente->setSexoPaciente($sexoPaciente);
        $paciente->setTipoSanguineoPaciente($tipoSanguineoPaciente);
        $paciente->setFatorRhPaciente($fatorRhPaciente);
        $paciente->setCpfPaciente($cpfPaciente);
        $paciente->setRgPaciente($rgPaciente);

        $cadastro->cadastrarPaciente($paciente);

        echo json_encode(true);
    } else {
        echo json_encode(false);
    }
} catch (Exception $e) {
    echo '<pre>';
    print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}
