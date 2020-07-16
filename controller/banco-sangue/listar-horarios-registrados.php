<?php

define("SESSAO_NAO_INICIALIZADA", 0);
define("SESSAO_RETORNADA_COM_SUCESSO", 1);

session_start();

$resposta = [];

if (isset($_SESSION['horariosSemana'])) {

    $resposta['status'] = SESSAO_RETORNADA_COM_SUCESSO;
    $resposta['horariosRegistrados'] =  $_SESSION['horariosSemana'];

    echo json_encode($resposta);
} else {
    $resposta['status'] = SESSAO_NAO_INICIALIZADA;
    echo json_encode($resposta);
}
