<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . ".." .DIRECTORY_SEPARATOR."..". DIRECTORY_SEPARATOR ."global.php";

define("ERRO_AO_VALIDAR_O_CEP", 0);

try {

    $cep = $_POST['txtCep'];
    
    echo json_encode( ValidacaoController::validarCep($cep) );
    
} catch (Exception $ex) {

    $resultado = array("sucesso" => ERRO_AO_VALIDAR_O_CEP);

    echo json_encode($resultado);
}