<?php


define("SESSAO_NAO_INICIALIADA", 0);
define("SUCESSO_AO_REMOVER_HORARIO_ESPECIFICO", 1);
define("PARAMETROS_PARA_REMOCAO_NAO_ESPECIFICADOS", 2);

session_start();

if (isset($_SESSION['horariosSemana']) && !empty($_SESSION['horariosSemana'])) {

    if (isset($_POST['idDia']) && !empty($_POST['idDia'])) {

        $listHorario = $_SESSION['horariosSemana'];

        foreach ($listHorario as $key => $horario) {

            if ($horario['idDia'] == $_POST['idDia']) {

               $listHorario[$key] = null; 
                break;
            }
        }

        $_SESSION['horariosSemana'] = $listHorario;

        $resposta = [
            "status" => SUCESSO_AO_REMOVER_HORARIO_ESPECIFICO,
            "horariosRegistrados" => $_SESSION['horariosSemana']
        ];

        echo json_encode($resposta);
    } else {

        echo json_encode(array("status" => PARAMETROS_PARA_REMOCAO_NAO_ESPECIFICADOS));
    }
} else {


    echo json_encode(array("status" => SESSAO_NAO_INICIALIADA));
}
