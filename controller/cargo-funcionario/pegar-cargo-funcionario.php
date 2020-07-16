<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php";

$cargoFuncionario =  new CargoFuncionarioController;

echo json_encode($cargoFuncionario->getAll());
