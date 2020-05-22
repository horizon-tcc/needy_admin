<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

define("SUCESSO_AO_REMOVER_DOADOR" , 1);
define("ERRO_AO_REMOVER_DOADOR", 0);

if ( isset( $_GET['idDoador'] ) && !empty( $_GET['idDoador'] ) ){

    $dDao =  new DoadorDAO();
    $doador = $dDao->getDoadorById( $_GET['idDoador'] ); 

   
    if ( $dDao->remover ( $doador->getUsuario()->getIdUsuario() ) ) {

        $resposta = array( "status" => SUCESSO_AO_REMOVER_DOADOR );

        echo json_encode( $resposta );
    } 

    else {

        $resposta = array( "status" => ERRO_AO_REMOVER_DOADOR );
        echo json_encode( $resposta );

    }

 



}
else {


    $resposta = array( "status" => ERRO_AO_REMOVER_DOADOR );
    echo json_encode( $resposta );

}

