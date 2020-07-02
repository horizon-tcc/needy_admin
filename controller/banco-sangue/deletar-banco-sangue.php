<?php

require_once '../../dao/BancoSangueDAO.php';
require_once '../../dao/TelefoneBancoSangueDAO.php';

if(!isset($_GET['idBancoSangue'])) {
    echo 'Erro: ID não informado.';
    die;
}

TelefoneBancoSangueDAO::deletar($_GET['idBancoSangue']);

BancoSangueDAO::deletar($_GET['idBancoSangue']);