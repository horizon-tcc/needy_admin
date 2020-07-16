<?php

// Constantes para checkboxes
define("CB_DOMINGO", "cb1");
define("CB_SEGUNDA_FEIRA", "cb2");
define("CB_TERCA_FEIRA", "cb3");
define("CB_QUARTA_FEIRA", "cb4");
define("CB_QUINTA_FEIRA", "cb5");
define("CB_SEXTA_FEIRA", "cb6");
define("CB_SABADO", "cb7");


// constantes para status de retorno para a view

define("ERRO_AO_ADICIONAR_UM_NOVO_HORARIO", 0);
define("SUCESSO_AO_ADICIONAR_UM_NOVO_HORARIO", 1);
define("PARAMETROS_PARA_ADICAO_DE_UM_NOVO_HORARIO_VAZIOS", 2);

session_start();

$resposta = array();

try {

    if (!isset($_SESSION['horariosSemana'])) {

        $_SESSION['horariosSemana'] = array();
    }

    if (
        isset($_POST['txtHorarioAbertura']) && !empty($_POST['txtHorarioAbertura'])
        && isset($_POST['txtHorarioFechamento']) && !empty($_POST['txtHorarioFechamento'])
    ) {

        if (isset($_POST[CB_DOMINGO]) && !empty($_POST[CB_DOMINGO])) {

            $horarioRepetido = false;
            $indiceRepetido = -1;

            foreach ($_SESSION['horariosSemana'] as $key => $horario) {

                if ($horario["idDia"] == $_POST[CB_DOMINGO]) {

                    $horarioRepetido = true;
                    $indiceRepetido = $key;
                }
            }

            if ($horarioRepetido) {

                $novoHorario = array(
                    "idDia" => $_POST[CB_DOMINGO],
                    "descricaoDia" => "Domingo",
                    "horarioAbertura" => $_POST['txtHorarioAbertura'],
                    "horarioFechamento" => $_POST['txtHorarioFechamento']
                );

                $_SESSION['horariosSemana'][$indiceRepetido] = $novoHorario;

            } else {

                $novoHorario = array(
                    "idDia" => $_POST[CB_DOMINGO],
                    "descricaoDia" => "Domingo",
                    "horarioAbertura" => $_POST['txtHorarioAbertura'],
                    "horarioFechamento" => $_POST['txtHorarioFechamento']
                );

                array_push($_SESSION['horariosSemana'], $novoHorario);
            }
        }

        if (isset($_POST[CB_SEGUNDA_FEIRA]) && !empty($_POST[CB_SEGUNDA_FEIRA])) {

            $horarioRepetido = false;
            $indiceRepetido = -1;

            foreach ($_SESSION['horariosSemana'] as $key => $horario) {

                if ($horario["idDia"] == $_POST[CB_SEGUNDA_FEIRA]) {

                    $horarioRepetido = true;
                    $indiceRepetido = $key;
                }
            }

            if ($horarioRepetido) {

                $novoHorario = array(
                    "idDia" => $_POST[CB_SEGUNDA_FEIRA],
                    "descricaoDia" => "Segunda-feira",
                    "horarioAbertura" => $_POST['txtHorarioAbertura'],
                    "horarioFechamento" => $_POST['txtHorarioFechamento']
                );

                $_SESSION['horariosSemana'][$indiceRepetido] = $novoHorario;
            } else {

                $novoHorario = array(
                    "idDia" => $_POST[CB_SEGUNDA_FEIRA],
                    "descricaoDia" => "Segunda-feira",
                    "horarioAbertura" => $_POST['txtHorarioAbertura'],
                    "horarioFechamento" => $_POST['txtHorarioFechamento']
                );

                array_push($_SESSION['horariosSemana'], $novoHorario);
            }
        }

        if (isset($_POST[CB_TERCA_FEIRA]) && !empty($_POST[CB_TERCA_FEIRA])) {

            $horarioRepetido = false;
            $indiceRepetido = -1;

            foreach ($_SESSION['horariosSemana'] as $key => $horario) {

                if ($horario["idDia"] == $_POST[CB_TERCA_FEIRA]) {

                    $horarioRepetido = true;
                    $indiceRepetido = $key;
                }
            }

            if ($horarioRepetido) {

                $novoHorario = array(
                    "idDia" => $_POST[CB_TERCA_FEIRA],
                    "descricaoDia" => "Terça-feira",
                    "horarioAbertura" => $_POST['txtHorarioAbertura'],
                    "horarioFechamento" => $_POST['txtHorarioFechamento']
                );

                $_SESSION['horariosSemana'][$indiceRepetido] = $novoHorario;
            } else {

                $novoHorario = array(
                    "idDia" => $_POST[CB_TERCA_FEIRA],
                    "descricaoDia" => "Terça-feira",
                    "horarioAbertura" => $_POST['txtHorarioAbertura'],
                    "horarioFechamento" => $_POST['txtHorarioFechamento']
                );

                array_push($_SESSION['horariosSemana'], $novoHorario);
            }
        }



        if (isset($_POST[CB_QUARTA_FEIRA]) && !empty($_POST[CB_QUARTA_FEIRA])) {

            $horarioRepetido = false;
            $indiceRepetido = -1;

            foreach ($_SESSION['horariosSemana'] as $key => $horario) {

                if ($horario["idDia"] == $_POST[CB_QUARTA_FEIRA]) {

                    $horarioRepetido = true;
                    $indiceRepetido = $key;
                }
            }

            if ($horarioRepetido) {

                $novoHorario = array(
                    "idDia" => $_POST[CB_QUARTA_FEIRA],
                    "descricaoDia" => "Quarta-feira",
                    "horarioAbertura" => $_POST['txtHorarioAbertura'],
                    "horarioFechamento" => $_POST['txtHorarioFechamento']
                );

                $_SESSION['horariosSemana'][$indiceRepetido] = $novoHorario;
            } else {

                $novoHorario = array(
                    "idDia" => $_POST[CB_QUARTA_FEIRA],
                    "descricaoDia" => "Quarta-feira",
                    "horarioAbertura" => $_POST['txtHorarioAbertura'],
                    "horarioFechamento" => $_POST['txtHorarioFechamento']
                );

                array_push($_SESSION['horariosSemana'], $novoHorario);
            }
        }


        if (isset($_POST[CB_QUINTA_FEIRA]) && !empty($_POST[CB_QUINTA_FEIRA])) {

            $horarioRepetido = false;
            $indiceRepetido = -1;

            foreach ($_SESSION['horariosSemana'] as $key => $horario) {

                if ($horario["idDia"] == $_POST[CB_QUINTA_FEIRA]) {

                    $horarioRepetido = true;
                    $indiceRepetido = $key;
                }
            }

            if ($horarioRepetido) {

                $novoHorario = array(
                    "idDia" => $_POST[CB_QUINTA_FEIRA],
                    "descricaoDia" => "Quinta-feira",
                    "horarioAbertura" => $_POST['txtHorarioAbertura'],
                    "horarioFechamento" => $_POST['txtHorarioFechamento']
                );

                $_SESSION['horariosSemana'][$indiceRepetido] = $novoHorario;
            } else {

                $novoHorario = array(
                    "idDia" => $_POST[CB_QUINTA_FEIRA],
                    "descricaoDia" => "Quinta-feira",
                    "horarioAbertura" => $_POST['txtHorarioAbertura'],
                    "horarioFechamento" => $_POST['txtHorarioFechamento']
                );

                array_push($_SESSION['horariosSemana'], $novoHorario);
            }
        }

        if (isset($_POST[CB_SEXTA_FEIRA]) && !empty($_POST[CB_SEXTA_FEIRA])) {

            $horarioRepetido = false;
            $indiceRepetido = -1;

            foreach ($_SESSION['horariosSemana'] as $key => $horario) {

                if ($horario["idDia"] == $_POST[CB_SEXTA_FEIRA]) {

                    $horarioRepetido = true;
                    $indiceRepetido = $key;
                }
            }

            if ($horarioRepetido) {

                $novoHorario = array(
                    "idDia" => $_POST[CB_SEXTA_FEIRA],
                    "descricaoDia" => "Sexta-feira",
                    "horarioAbertura" => $_POST['txtHorarioAbertura'],
                    "horarioFechamento" => $_POST['txtHorarioFechamento']
                );

                $_SESSION['horariosSemana'][$indiceRepetido] = $novoHorario;
            } else {

                $novoHorario = array(
                    "idDia" => $_POST[CB_SEXTA_FEIRA],
                    "descricaoDia" => "Sexta-feira",
                    "horarioAbertura" => $_POST['txtHorarioAbertura'],
                    "horarioFechamento" => $_POST['txtHorarioFechamento']
                );

                array_push($_SESSION['horariosSemana'], $novoHorario);
            }
        }

        if (isset($_POST[CB_SABADO]) && !empty($_POST[CB_SABADO])) {

            $horarioRepetido = false;
            $indiceRepetido = -1;

            foreach ($_SESSION['horariosSemana'] as $key => $horario) {

                if ($horario["idDia"] == $_POST[CB_SABADO]) {

                    $horarioRepetido = true;
                    $indiceRepetido = $key;
                }
            }

            if ($horarioRepetido) {

                $novoHorario = array(
                    "idDia" => $_POST[CB_SABADO],
                    "descricaoDia" => "Sábado",
                    "horarioAbertura" => $_POST['txtHorarioAbertura'],
                    "horarioFechamento" => $_POST['txtHorarioFechamento']
                );

                $_SESSION['horariosSemana'][$indiceRepetido] = $novoHorario;
            } else {

                $novoHorario = array(
                    "idDia" => $_POST[CB_SABADO],
                    "descricaoDia" => "Sábado",
                    "horarioAbertura" => $_POST['txtHorarioAbertura'],
                    "horarioFechamento" => $_POST['txtHorarioFechamento']
                );

                array_push($_SESSION['horariosSemana'], $novoHorario);
            }
        }

        if ( count($_SESSION['horariosSemana']) > 0) {

            $resposta['status'] = SUCESSO_AO_ADICIONAR_UM_NOVO_HORARIO;
            $resposta['horariosRegistrados'] = $_SESSION['horariosSemana']; 
        
        } else {    
            $resposta['status'] = PARAMETROS_PARA_ADICAO_DE_UM_NOVO_HORARIO_VAZIOS;
        }
    } else {

        $resposta['status'] = PARAMETROS_PARA_ADICAO_DE_UM_NOVO_HORARIO_VAZIOS;
    }


    echo json_encode($resposta);

} catch (Exception $ex) {
    $resposta['status'] = ERRO_AO_ADICIONAR_UM_NOVO_HORARIO;
    echo json_encode($resposta);
}
