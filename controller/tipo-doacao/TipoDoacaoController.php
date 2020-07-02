<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . ".." .DIRECTORY_SEPARATOR."..". DIRECTORY_SEPARATOR ."global.php";

class TipoDoacaoController {


    public function getAll(){

        $tipoDoacaoDao = new TipoDoacaoDAO();

        return $tipoDoacaoDao->getAll();

    }

}