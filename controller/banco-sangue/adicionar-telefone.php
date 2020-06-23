<?php

define("SUCESSO", 1);
define("FALHA", 0);
define("NUMERO_REPETIDO", 2);
define("NUMERO_INVALIDO", 3);

session_start();

try {
    if (isset($_SESSION['telefonesBancoSangue'])) {


        if (isset($_POST['txtTelefoneBancoSangue']) && !empty($_POST['txtTelefoneBancoSangue'])) {


            $telefone = $_POST['txtTelefoneBancoSangue'];

            if (array_search($telefone, $_SESSION['telefonesBancoSangue']) === false) {


                array_push($_SESSION['telefonesBancoSangue'], $telefone);

                $resposta = array("status" => SUCESSO, "novoTelefone" => $telefone, "size" => count($_SESSION['telefonesBancoSangue']));

                echo json_encode($resposta);
            }

            else {

                $resposta = array("status" => NUMERO_REPETIDO);

                echo json_encode($resposta);

            }
        } else {

            $resposta = array("status" => NUMERO_INVALIDO);

            echo json_encode($resposta);
        }
    } else {

        $listTelefones = array();

        if (isset($_POST['txtTelefoneBancoSangue']) && !empty($_POST['txtTelefoneBancoSangue'])) {

            $telefone = $_POST['txtTelefoneBancoSangue'];
            $listTelefones = array($telefone);

            $_SESSION['telefonesBancoSangue'] =  $listTelefones;

            echo json_encode( array("status" => SUCESSO, "novoTelefone" => $telefone, "size" => count($_SESSION['telefonesBancoSangue'])) );
        } else {

            $resposta = array("status" => NUMERO_INVALIDO);

            echo json_encode($resposta);
        }
    }
} catch (Exception $ex) {

    $resposta = array("status" => FALHA);
    echo json_encode($resposta);
}
