<?php

    define("SUCESSO", true);
    define("FALHA", false);

    session_start();

    if (isset($_SESSION["telefonesBancoSangue"]) && !empty($_SESSION["telefonesBancoSangue"])){

        $resposta = array("status" => SUCESSO, "size" => count($_SESSION["telefonesBancoSangue"]) );

        echo json_encode($resposta);
    }
    else {


        $resposta = array("status" => FALHA); 

        echo json_encode($resposta);

    }