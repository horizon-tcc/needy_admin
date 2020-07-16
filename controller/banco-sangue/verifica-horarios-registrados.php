<?php


define("SESSAO_NAO_INICIALIZADA", 0);
define("HORARIOS_VALIDOS", 1);
define("HORARIOS_INVALIDOS", 2);

session_start();

$resposta = [];

if (isset($_SESSION['horariosSemana'])) {

    $horarioValido = false;
    $listHorarios = $_SESSION['horariosSemana'];

    foreach ($listHorarios as $horario) {

        if ($horario != null) {

            $horarioValido = true;
        }
    }

    if ( $horarioValido ) {

        $resposta['status'] = HORARIOS_VALIDOS;

    } else {

        $resposta['status'] = HORARIOS_INVALIDOS;
    }

    echo json_encode($resposta);
} else {
    $resposta['status'] = SESSAO_NAO_INICIALIZADA;
    echo json_encode($resposta);
}
