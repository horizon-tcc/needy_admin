<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

$paciente = new PacienteDAO();

if (isset($_POST['txtPesquisa']) && !empty($_POST['txtPesquisa'])) {

    if (isset($_POST['hdSearchType']) && !empty($_POST['hdSearchType'])) {

        $tipoPesquisa = $_POST['hdSearchType'];

        if ($tipoPesquisa == 'filterNomePaciente') {

            $listaPaciente = $paciente->listarPacientePorNome(strtolower($_POST['txtPesquisa']));

            if ($listaPaciente != false) {

                $resultado = array();

                foreach ($listaPaciente as $linha) {

                    $tupla = array(
                        "idPaciente" => $linha['idPaciente'],
                        "nomePaciente" => $linha['nomePaciente'],
                        "cpfPaciente" => $linha['cpfPaciente'],
                        "rgPaciente" => $linha['rgPaciente'],
                        "descricaoSexoPaciente" => $linha['descricaoSexo'],
                        "descricaoTipoSanguineo" => $linha['descricaoTipoSanguineo'],
                        "descricaoFatorRh" => $linha['descricaoFatorRh']
                    );

                    array_push($resultado, $tupla);
                }

                $resultado = array(
                    "resultado" => $resultado, "status" => true
                );

                echo json_encode($resultado);
            } else {

                $resultado = array("status" => false);

                echo json_encode($resultado);
            }
        } else if ($tipoPesquisa == 'filterRgPaciente') {

            $listaPaciente = $paciente->listarPacientePorRg($_POST['txtPesquisa']);

            if ($listaPaciente != false) {

                $resultado = array();

                foreach ($listaPaciente as $linha) {

                    $tupla = array(
                        "idPaciente" => $linha['idPaciente'],
                        "nomePaciente" => $linha['nomePaciente'],
                        "cpfPaciente" => $linha['cpfPaciente'],
                        "rgPaciente" => $linha['rgPaciente'],
                        "descricaoSexoPaciente" => $linha['descricaoSexo'],
                        "descricaoTipoSanguineo" => $linha['descricaoTipoSanguineo'],
                        "descricaoFatorRh" => $linha['descricaoFatorRh']
                    );

                    array_push($resultado, $tupla);
                }

                $resultado = array(
                    "resultado" => $resultado, "status" => true
                );

                echo json_encode($resultado);
            } else {

                $resultado = array("status" => false);

                echo json_encode($resultado);
            }
        } else if ($tipoPesquisa == 'filterCpfPaciente') {

            $listaPaciente = $paciente->listarPacientePorCpf($_POST['txtPesquisa']);

            if ($listaPaciente != false) {

                $resultado = array();

                foreach ($listaPaciente as $linha) {

                    $tupla = array(
                        "idPaciente" => $linha['idPaciente'],
                        "nomePaciente" => $linha['nomePaciente'],
                        "cpfPaciente" => $linha['cpfPaciente'],
                        "rgPaciente" => $linha['rgPaciente'],
                        "descricaoSexoPaciente" => $linha['descricaoSexo'],
                        "descricaoTipoSanguineo" => $linha['descricaoTipoSanguineo'],
                        "descricaoFatorRh" => $linha['descricaoFatorRh']
                    );

                    array_push($resultado, $tupla);
                }

                $resultado = array(
                    "resultado" => $resultado, "status" => true
                );

                echo json_encode($resultado);
            } else {

                $resultado = array("status" => false);

                echo json_encode($resultado);
            }
        } else if ($tipoPesquisa == 'filterTipoSanguineoPaciente') {

            $listaPaciente = $paciente->listarPacienteTipoSanguineo($_POST['txtPesquisa']);

            if ($listaPaciente != false) {

                $resultado = array();

                foreach ($listaPaciente as $linha) {

                    $tupla = array(
                        "idPaciente" => $linha['idPaciente'],
                        "nomePaciente" => $linha['nomePaciente'],
                        "cpfPaciente" => $linha['cpfPaciente'],
                        "rgPaciente" => $linha['rgPaciente'],
                        "descricaoSexoPaciente" => $linha['descricaoSexo'],
                        "descricaoTipoSanguineo" => $linha['descricaoTipoSanguineo'],
                        "descricaoFatorRh" => $linha['descricaoFatorRh']
                    );

                    array_push($resultado, $tupla);
                }

                $resultado = array(
                    "resultado" => $resultado, "status" => true
                );

                echo json_encode($resultado);
            } else {


                $resultado = array("status" => false);

                echo json_encode($resultado);
            }
        } else if ($tipoPesquisa == 'filterFatorRhPaciente') {

            $listaPaciente = $paciente->listarPacientePorFatorRh($_POST['txtPesquisa']);

            if ($listaPaciente != false) {

                $resultado = array();

                foreach ($listaPaciente as $linha) {

                    $tupla = array(
                        "idPaciente" => $linha['idPaciente'],
                        "nomePaciente" => $linha['nomePaciente'],
                        "cpfPaciente" => $linha['cpfPaciente'],
                        "rgPaciente" => $linha['rgPaciente'],
                        "descricaoSexoPaciente" => $linha['descricaoSexo'],
                        "descricaoTipoSanguineo" => $linha['descricaoTipoSanguineo'],
                        "descricaoFatorRh" => $linha['descricaoFatorRh']
                    );

                    array_push($resultado, $tupla);
                }

                $resultado = array(
                    "resultado" => $resultado, "status" => true
                );

                echo json_encode($resultado);
            } else {


                $resultado = array("status" => false);

                echo json_encode($resultado);
            }
        } else {
            $resultado = array("status" => false);

            echo json_encode($resultado);
        }
    } else {

        $resultado = array("status" => false);

        echo json_encode($resultado);
    }
} else {

    $listaPaciente = $paciente->listarPaciente();

    $resultado = array();

    foreach ($listaPaciente as $linha) {

        $tupla = array(
            "idPaciente" => $linha['idPaciente'],
            "nomePaciente" => $linha['nomePaciente'],
            "cpfPaciente" => $linha['cpfPaciente'],
            "rgPaciente" => $linha['rgPaciente'],
            "descricaoSexoPaciente" => $linha['descricaoSexo'],
            "descricaoTipoSanguineo" => $linha['descricaoTipoSanguineo'],
            "descricaoFatorRh" => $linha['descricaoFatorRh']
        );

        array_push($resultado, $tupla);
    }

    $resultado = array(
        "resultado" => $resultado, "status" => true
    );

    echo json_encode($resultado);
}
