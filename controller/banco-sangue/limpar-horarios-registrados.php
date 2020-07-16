<?php
    require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

    define("SESSÃO_NÃO_INICIALIADA", 0);
    define("SUCESSO_AO_LIMPAR_A_SESSAO", 1);

    if ( BancoSangueController::limparSessaoHorarios() ) {

        
        echo json_encode( array("status" => SUCESSO_AO_LIMPAR_A_SESSAO) );

    }
    else {

        echo json_encode( array("status" => SESSÃO_NÃO_INICIALIADA) );
    }
    

