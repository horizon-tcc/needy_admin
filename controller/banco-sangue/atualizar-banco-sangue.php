<?php

require_once '../../model/BancoSangueModel.php';
require_once '../../dao/BancoSangueDAO.php';
require_once '../../model/EnderecoModel.php';

$enderecoBancoSangue = new EnderecoModel();

$enderecoBancoSangue->setLogradouro($_GET['logradouroBancoSangue']);
$enderecoBancoSangue->setBairro($_GET['bairroBancoSangue']);
$enderecoBancoSangue->setNumero($_GET['numeroBancoSangue']);
$enderecoBancoSangue->setComplemento($_GET['complementoBancoSangue']);
$enderecoBancoSangue->setCEP($_GET['cepBancoSangue']);
$enderecoBancoSangue->setUF($_GET['ufBancoSangue']);
$enderecoBancoSangue->setCidade($_GET['cidadeBancoSangue']);

$bancoSangue = new BancoSangueModel();

$bancoSangue->setId($_GET['idBancoSangue']);
$bancoSangue->setNome($_GET['nomeBancoSangue']);
$bancoSangue->setEndereco($enderecoBancoSangue);
$bancoSangue->setTelefones($_GET['telefones']);
$bancoSangue->setPacientes($_GET['pacientes']);

BancoSangueDAO::atualizar($bancoSangue);
