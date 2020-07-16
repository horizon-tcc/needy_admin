<?php

define("SUCESSO", 1);
define("FALHA", 0);

session_start();

if (
    isset($_SESSION['telefonesBancoSangue']) && !empty($_SESSION['telefonesBancoSangue'])

    && isset($_POST['telefoneRemovido']) && !empty($_POST['telefoneRemovido'])
) {

    $telefoneRemovido = $_POST['telefoneRemovido'];
    $listTelefone = $_SESSION['telefonesBancoSangue'];

    $indice = array_search($telefoneRemovido, $listTelefone);

    if ($indice !== false) {

        unset($listTelefone[$indice]);

        $_SESSION['telefonesBancoSangue'] = $listTelefone;

        $response = array("status" => SUCESSO, "size" => count($_SESSION["telefonesBancoSangue"]));

        echo json_encode($response);
    }
    else {

        $response = array("status" =>  FALHA);

        echo json_encode($response);
    }
} else {

    
    $response = array("status" =>  FALHA);

    echo json_encode($response);

}
