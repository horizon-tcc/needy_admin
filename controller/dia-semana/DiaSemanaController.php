<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php";

class DiaSemanaController
{


    public function getAll()
    {

        $diaSemanaDao = new DiaSemanaDAO();

        return $diaSemanaDao->getAll();
    }
}
