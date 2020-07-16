<?php

    define("SUCESSO",true);
    define("FALHA",false);
    
    session_start();

    if ( isset($_SESSION['telefonesBancoSangue']) && !empty($_SESSION['telefonesBancoSangue'])){

        unset($_SESSION['telefonesBancoSangue']);

        $resposta = array("status" => SUCESSO);

        echo json_encode($resposta);

    }
    else {

        $resposta = array("status" => FALHA);

        echo json_encode($resposta);
    }
