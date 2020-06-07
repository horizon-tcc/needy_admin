<?php

    require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php";

    $tipoSanguineoController =  new TipoSanguineoController();
    
    echo json_encode( $tipoSanguineoController->getAll() );