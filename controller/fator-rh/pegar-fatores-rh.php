<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php";

$fatorRhController =  new FatorRhController();

echo json_encode($fatorRhController->getAll());
