<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php";

$bancoSangue =  new BancoSangueDAO;

echo json_encode($bancoSangue->listar());