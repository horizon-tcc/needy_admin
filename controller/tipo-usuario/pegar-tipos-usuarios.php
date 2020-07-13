<?php

    require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php";

    $tipoUsuarioController =  new TipoUsuarioController();
    
    echo json_encode( $tipoUsuarioController->getAll() );