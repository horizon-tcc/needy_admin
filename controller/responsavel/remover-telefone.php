<?php

define("FALHA", 0);
define("SUCESSO", 1);


session_start();

if (
    isset($_SESSION['telefonesResponsavel']) && !empty($_SESSION['telefonesResponsavel'])

    && isset($_POST['telefoneRemovidoResponsavel']) && !empty($_POST['telefoneRemovidoResponsavel'])
) {

    $telefoneRemovido = $_POST['telefoneRemovidoResponsavel'];
    $listTelefone = $_SESSION['telefonesResponsavel'];

    $indice = array_search($telefoneRemovido, $listTelefone);

    if ($indice !== false) {

        unset($listTelefone[$indice]);

        $_SESSION['telefonesResponsavel'] = $listTelefone;

        $response = array("status" => SUCESSO, "size" => count($_SESSION["telefonesResponsavel"]));

        echo json_encode($response);
        
    }
    else {

        $response = array("status" =>  FALHA ,"indice" => $indice);

        echo json_encode($response);

    
    }
} else {

   
    $response = array("status" =>  FALHA, "msg" => "Algo não está setado");

    $teste = isset($_POST['telefoneRemovidoResponsavel']);

    echo json_encode($response);

}
