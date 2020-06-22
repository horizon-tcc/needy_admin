<?php

define("SUCESSO", 1);
define("FALHA", 0);
define("NUMERO_REPETIDO", 2);
define("NUMERO_INVALIDO", 3);

session_start();

try {
    if (isset($_SESSION['telefonesDoador'])) {


        if (isset($_POST['txtTelefoneDoador']) && !empty($_POST['txtTelefoneDoador'])) {


            $telefone = $_POST['txtTelefoneDoador'];

            if (array_search($telefone, $_SESSION['telefonesDoador']) === false) {


                array_push($_SESSION['telefonesDoador'], $telefone);

                $resposta = array("status" => SUCESSO, "novoTelefone" => $telefone, "size" => count($_SESSION['telefonesDoador']));

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

        if (isset($_POST['txtTelefoneDoador']) && !empty($_POST['txtTelefoneDoador'])) {

            $telefone = $_POST['txtTelefoneDoador'];
            $listTelefones = array($telefone);

            $_SESSION['telefonesDoador'] =  $listTelefones;

            echo json_encode( array("status" => SUCESSO, "novoTelefone" => $telefone, "size" => count($_SESSION['telefonesDoador'])) );
        } else {

            $resposta = array("status" => NUMERO_INVALIDO);

            echo json_encode($resposta);
        }
    }
} catch (Exception $ex) {

    $resposta = array("status" => FALHA);
    echo json_encode($resposta);
}
