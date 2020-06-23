<?php

require_once '../../dao/BancoSangueDAO.php';

if(!isset($_GET['idBancoSangue'])) {
    echo 'Erro: ID não informado.';
    die;
}


BancoSangueDAO::deletar($_GET['idBancoSangue']);