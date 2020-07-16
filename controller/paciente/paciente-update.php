<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

try {

    $update = new PacienteDAO();

    $idPaciente = $_POST['hdIdPaciente'];
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
    $statusExistenciaCPf = $update->verificarExistenciaCpfPacienteUpdate($cpfPaciente, $idPaciente);
    $statusExistenciaPaciente = $update->verificarPacienteId($idPaciente);


    if (
        $statusCpfPaciente && $statusNomePaciente && $statusSexoPaciente && $statusFatorRhPaciente
        && $statusTipoSanguineoPaciente && $statusExistenciaPaciente && isset($rgPaciente)
        && !empty($rgPaciente)
    ) {

        $paciente = new PacienteModel();

        $paciente->setIdPaciente($idPaciente);
        $paciente->setNomePaciente($nomePaciente);
        $paciente->setSexoPaciente($sexoPaciente);
        $paciente->setTipoSanguineoPaciente($tipoSanguineoPaciente);
        $paciente->setFatorRhPaciente($fatorRhPaciente);
        $paciente->setCpfPaciente($cpfPaciente);
        $paciente->setRgPaciente($rgPaciente);

        echo $update->editarPaciente($paciente);

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
