<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

try {

    $testeCpfPaciente = new PacienteDAO();

    $idPaciente = $_POST['idPaciente'];

    $cpfPaciente = $_POST['cpfPaciente'];

    if ($idPaciente == 0) {
        $statusExistenciaCpf = $testeCpfPaciente->verificarExistenciaCpfPaciente($cpfPaciente);

        if ($statusExistenciaCpf) {

            echo json_encode(true);
        } else {

            echo json_encode(false);
        }
    } else {
        $statusExistenciaCpfUpdate = $testeCpfPaciente->verificarExistenciaCpfPacienteUpdate($cpfPaciente, $idPaciente);

        if ($statusExistenciaCpfUpdate) {

            echo json_encode(true);
        } else {

            echo json_encode(false);
        }
    }
} catch (Exception $e) {
    print_r($e);
    echo $e->getMessage();
}
