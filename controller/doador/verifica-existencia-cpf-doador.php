<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

define("CPF_DOADOR_INVALIDO", 0);
define("CPF_DOADOR_VALIDO", 1);


if (isset($_POST['txtCpfDoador']) && !empty($_POST['txtCpfDoador'])) {

    $doadorDao = new DoadorDAO();

    if (!$doadorDao->verificarExistenciaCpfDoador($_POST['txtCpfDoador'])) {

        $resposta = array("status" => CPF_DOADOR_VALIDO);
        echo json_encode($resposta);
    } else {
        $resposta = array("status" => CPF_DOADOR_INVALIDO);
        echo json_encode($resposta);
    }
} else {

    $resposta = array("status" => CPF_DOADOR_INVALIDO);
    echo json_encode($resposta);


}
