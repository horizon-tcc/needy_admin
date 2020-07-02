<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php";


 class MaterialDoadoController {

    public function getAll(){

        $materialDoadoDao = new MaterialDoadoDAO();
        return $materialDoadoDao->getAll();
    } 
}