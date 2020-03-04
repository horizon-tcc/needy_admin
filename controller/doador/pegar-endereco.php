<?php
define("SUCESSO", 1);
define("ERRO", 0);
try {

    $cep = $_POST['txtCep'];
    $cep = preg_replace("/[^0-9]/","",$cep);

    $url = "http://viacep.com.br/ws/$cep/xml/";

    $endereco = simplexml_load_file($url);
    
    echo json_encode($endereco);
    
} catch (Exception $ex) {

    $resultado = array("status" => ERRO);
    echo (json_encode($resultado));
}