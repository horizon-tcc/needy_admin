<?php

define("SUCESSO", 1);
define("FALHA", 0);
define("NUMERO_REPETIDO", 2);
define("NUMERO_INVALIDO", 3);

session_start();

try {
    if (isset($_SESSION['telefonesResponsavel'])) {


        if (isset($_POST['txtTelefoneResponsavel']) && !empty($_POST['txtTelefoneResponsavel'])) {


            $telefone = $_POST['txtTelefoneResponsavel'];

            if (array_search($telefone, $_SESSION["telefonesResponsavel"]) === false) {


                array_push($_SESSION["telefonesResponsavel"], $telefone);

                $resposta = array("status" => SUCESSO, "novoTelefone" => $telefone, "size" => count($_SESSION["telefonesResponsavel"]));

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

        if (isset($_POST['txtTelefoneResponsavel']) && !empty($_POST['txtTelefoneResponsavel'])) {

            $telefone = $_POST['txtTelefoneResponsavel'];
            $listTelefones = array($telefone);

            $_SESSION["telefonesResponsavel"] =  $listTelefones;

            echo json_encode( array("status" => SUCESSO, "novoTelefone" => $telefone, "size" => count($_SESSION["telefonesResponsavel"])) );
        } else {

            $resposta = array("status" => NUMERO_INVALIDO);

            echo json_encode($resposta);
        }
    }
} catch (Exception $ex) {

    echo $ex->getMessage();
}


