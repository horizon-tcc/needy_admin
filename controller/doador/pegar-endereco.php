<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . ".." .DIRECTORY_SEPARATOR."..". DIRECTORY_SEPARATOR ."global.php";

define("SUCESSO", true);
define("ERRO", false);

try {

    $cep = $_POST['txtCep'];
    $cep = preg_replace("/[^0-9]/","",$cep);

    $url = "http://viacep.com.br/ws/$cep/json/";

    $curl = curl_init($url);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_TIMEOUT, 3);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $vetEndereco = json_decode(curl_exec($curl), true);

    if (count($vetEndereco) >= 9 ) {

        $vetEndereco["sucesso"]  = SUCESSO;
        echo json_encode($vetEndereco);
        
    }
    else {

        $vetEndereco["sucesso"]  = ERRO;
        echo json_encode($vetEndereco);
    }
    
    
} catch (Exception $ex) {

    $resultado = array("sucesso" => ERRO);

    echo json_encode($resultado);
}
