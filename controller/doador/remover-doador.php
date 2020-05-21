<?php
require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");



if ( isset( $_GET['idDoador'] ) && !empty( $_GET['idDoador'] ) ){

    $dDao =  new DoadorDAO();
    $doador = $dDao->getDoadorById( $_GET['idDoador'] ); 

   
    $dDao->remover( $doador->getUsuario()->getIdUsuario() ); 

    header("location: ../../view/consultar-doadores.php");


}

