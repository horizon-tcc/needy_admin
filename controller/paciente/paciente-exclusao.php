<?php
require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

try {
    
    $idPaciente = intval($_GET['idPaciente']);

    if (isset($idPaciente) && !empty($idPaciente)) {
        $paciente = new PacienteDAO();

        echo $paciente->excluirPaciente($idPaciente);

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
