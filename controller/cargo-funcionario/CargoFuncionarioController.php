<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php";

class CargoFuncionarioController
{

    public function getAll()
    {

        $cargoFuncionario =  new CargoFuncionarioDAO();
        return $cargoFuncionario->getAll();
    }
}
