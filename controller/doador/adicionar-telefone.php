<?php

define("SUCESSO", true);
define("FALHA", false);

session_start();

try {
    if (isset($_SESSION['telefonesDoador'])) {


        if (isset($_POST['txtTelefoneDoador']) && !empty($_POST['txtTelefoneDoador'])) {

            $telefone = $_POST['txtTelefoneDoador'];

            array_push($_SESSION['telefonesDoador'], $telefone);

            $resposta = array("status" => SUCESSO, "novoTelefone" => $telefone);

            echo $resposta;
        } else {

            $resposta = array("status" => FALHA);

            echo json_encode($resposta);
        }
    } else {

        $listTelefones = array();

        if (isset($_POST['txtTelefoneDoador']) && !empty($_POST['txtTelefoneDoador'])) {

            $telefone = $_POST['txtTelefoneDoador'];
            $listTelefones = array($telefone);

            $_SESSION['telefonesDoador'] =  $listTelefones;

            echo json_encode(array("status" => SUCESSO, "novoTelefone" => $telefone));
        } else {

            $resposta = array("status" => FALHA);

            echo json_encode($resposta);
        }
    }
} catch (Exception $ex) {

    echo $ex->getMessage();
}
