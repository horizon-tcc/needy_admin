<?php

    require_once '../../dao/BancoSangueDAO.php';

    header('Content-type: application/json; charset=utf8');

    $result;

    if (isset($_GET['idBancoSangue']))
        $result = BancoSangueDAO::listar($_GET['idBancoSangue']);
    else
        $result = BancoSangueDAO::listar(); // $result = BancoSangueDAO::listar();

    echo json_encode($result, JSON_UNESCAPED_UNICODE);