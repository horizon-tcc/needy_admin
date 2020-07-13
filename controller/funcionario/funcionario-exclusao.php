<?php
require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

try {

    $idFuncionario = intval($_GET['idFuncionario']);

    if (isset($idFuncionario) && !empty($idFuncionario)) {
        $funcionario = new FuncionarioDAO();

        $funcionario->excluirFuncionario($idFuncionario);

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
