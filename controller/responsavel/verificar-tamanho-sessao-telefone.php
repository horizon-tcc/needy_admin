<?php

    define("SUCESSO", true);
    define("FALHA", false);

    session_start();

    if (isset($_SESSION["telefonesResponsavel"]) && !empty($_SESSION["telefonesResponsavel"])){

        $resposta = array("status" => SUCESSO, "size" => count($_SESSION["telefonesResponsavel"]) );

        echo json_encode($resposta);
    }
    else {


        $resposta = array("status" => FALHA); 

        echo json_encode($resposta);

    }