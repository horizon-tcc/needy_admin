<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

try {

    $testeCpfFuncionario = new FuncionarioDAO();

    $idFuncionario = $_POST['idFuncionario'];

    $cpfFuncionario = $_POST['cpfFuncionario'];

    if ($idFuncionario == 0) {

        $statusExistenciaCpf = $testeCpfFuncionario->verificarExistenciaCpfFuncionario($cpfFuncionario);

        if ($statusExistenciaCpf) {

            echo json_encode(true);
        } else {

            echo json_encode(false);
        }
    } else {
        $statusExistenciaCpfUpdate = $testeCpfFuncionario->verificarExistenciaCpfFuncionarioUpdate($cpfFuncionario, $idFuncionario);

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
