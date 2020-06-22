<?php

    define("SUCESSO", true);
    define("FALHA", false);

    session_start();

    if (isset($_SESSION["telefonesDoador"]) && !empty($_SESSION["telefonesDoador"])){

        $resposta = array("status" => SUCESSO, "size" => count($_SESSION["telefonesDoador"]) );

        echo json_encode($resposta);
    }
    else {


        $resposta = array("status" => FALHA); 

        echo json_encode($resposta);

    }