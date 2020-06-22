<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

define("ERRO_AO_CONSULTAR", 0);
define("SUCESSO_AO_CONSULTAR_OS_DOADORES", 1);
define("NENHUM_DOADOR_ENCONTRADO", 2);
define("PESQUISA_VAZIA", 3);

define("PESQUISAR_POR_NOME", 1);
define("PESQUISAR_POR_CPF", 2);
define("PESQUISAR_POR_RG", 3);
define("PESQUISAR_POR_DATA_NASCIMENTO", 4);
define("PESQUISAR_POR_EMAIL", 5);
define("PESQUISAR_POR_TIPO_SANGUINEO", 6);
define("PESQUISAR_POR_FATOR_RH", 7);


if (isset($_POST['hdSearchType']) && !empty($_POST['hdSearchType'])) {

    $tipoConsulta = $_POST['hdSearchType'];

    if ($tipoConsulta == PESQUISAR_POR_NOME) {

        if (isset($_POST['txtPesquisa']) && !empty($_POST['txtPesquisa'])) {


            $doadorDao = new DoadorDAO();
            $doadores = $doadorDao->getDoadorByName($_POST['txtPesquisa']);

            if ($doadores !== null) {

                $result = array();

                foreach ($doadores as $d) {

                    $tupla = array(

                        "idDoador" => $d['idDoador'],
                        "nomeDoador" => $d['nomeDoador'],
                        "cpfDoador" => $d['cpfDoador'],
                        "descricaoTipoSanguineo" => $d['descricaoTipoSanguineo'],
                        "idDoador" => $d['idDoador'],
                        "fotoUsuario" => $d['fotoUsuario']
                    );

                    array_push($result, $tupla);
                }



                $resposta = array(
                    "result" => $result, "status" => SUCESSO_AO_CONSULTAR_OS_DOADORES
                );

                echo json_encode($resposta);
            } else {


                $resposta = array("status" => NENHUM_DOADOR_ENCONTRADO);

                echo json_encode($resposta);
            }
        } else {

            $resposta = array("status" => PESQUISA_VAZIA);

            echo json_encode($resposta);
        }
    } else if ($tipoConsulta == PESQUISAR_POR_CPF) {

        if (isset($_POST['txtPesquisa']) && !empty($_POST['txtPesquisa'])) {

            $doadorDao = new DoadorDAO();
            $doadores = $doadorDao->getDonnorsByCpf($_POST['txtPesquisa']);

            if ($doadores !== null) {

                $result = array();

                foreach ($doadores as $d) {

                    $tupla = array(

                        "idDoador" => $d['idDoador'],
                        "nomeDoador" => $d['nomeDoador'],
                        "cpfDoador" => $d['cpfDoador'],
                        "descricaoTipoSanguineo" => $d['descricaoTipoSanguineo'],
                        "idDoador" => $d['idDoador'],
                        "fotoUsuario" => $d['fotoUsuario']
                    );

                    array_push($result, $tupla);
                }



                $resposta = array(
                    "result" => $result, "status" => SUCESSO_AO_CONSULTAR_OS_DOADORES
                );

                echo json_encode($resposta);
            } else {


                $resposta = array("status" => NENHUM_DOADOR_ENCONTRADO);

                echo json_encode($resposta);
            }
        } else {

            $resposta = array("status" => PESQUISA_VAZIA);

            echo json_encode($resposta);
        }
    } else if ($tipoConsulta == PESQUISAR_POR_RG) {

        if (isset($_POST['txtPesquisa']) && !empty($_POST['txtPesquisa'])) {

            $doadorDao = new DoadorDAO();
            $doadores = $doadorDao->getDonnorsByRg($_POST['txtPesquisa']);

            if ($doadores !== null) {

                $result = array();

                foreach ($doadores as $d) {

                    $tupla = array(

                        "idDoador" => $d['idDoador'],
                        "nomeDoador" => $d['nomeDoador'],
                        "cpfDoador" => $d['cpfDoador'],
                        "descricaoTipoSanguineo" => $d['descricaoTipoSanguineo'],
                        "idDoador" => $d['idDoador'],
                        "fotoUsuario" => $d['fotoUsuario']
                    );

                    array_push($result, $tupla);
                }

                $resposta = array(
                    "result" => $result, "status" => SUCESSO_AO_CONSULTAR_OS_DOADORES
                );

                echo json_encode($resposta);
            } else {


                $resposta = array("status" => NENHUM_DOADOR_ENCONTRADO);

                echo json_encode($resposta);
            }
        } else {

            $resposta = array("status" => PESQUISA_VAZIA);

            echo json_encode($resposta);
        }
    } else if ($tipoConsulta == PESQUISAR_POR_EMAIL) {


        if (isset($_POST['txtPesquisa']) && !empty($_POST['txtPesquisa'])) {

            $userDao = new DoadorDAO();
            $doadores = $userDao->getDonnorsByEmail($_POST['txtPesquisa']);

            if ($doadores !== null) {

                $result = array();

                foreach ($doadores as $d) {

                    $tupla = array(

                        "idDoador" => $d['idDoador'],
                        "nomeDoador" => $d['nomeDoador'],
                        "cpfDoador" => $d['cpfDoador'],
                        "descricaoTipoSanguineo" => $d['descricaoTipoSanguineo'],
                        "idDoador" => $d['idDoador'],
                        "fotoUsuario" => $d['fotoUsuario']
                    );

                    array_push($result, $tupla);
                }

                $resposta = array(
                    "result" => $result, "status" => SUCESSO_AO_CONSULTAR_OS_DOADORES
                );

                echo json_encode($resposta);
            } else {


                $resposta = array("status" => NENHUM_DOADOR_ENCONTRADO);

                echo json_encode($resposta);
            }
        } else {

            $resposta = array("status" => PESQUISA_VAZIA);

            echo json_encode($resposta);
        }
    } else if ($tipoConsulta == PESQUISAR_POR_DATA_NASCIMENTO) {

        if (
            isset($_POST['txtDataInicial']) && !empty($_POST['txtDataInicial']) &&
            isset($_POST['txtDataFinal']) && !empty($_POST['txtDataFinal'])
        ) {


            $doadorDao = new DoadorDAO();
            $doadores = $doadorDao->getDonnorsByBirthDate($_POST['txtDataInicial'], $_POST['txtDataFinal']);

            if ($doadores !== null) {

                $result = array();

                foreach ($doadores as $d) {

                    $tupla = array(

                        "idDoador" => $d['idDoador'],
                        "nomeDoador" => $d['nomeDoador'],
                        "cpfDoador" => $d['cpfDoador'],
                        "descricaoTipoSanguineo" => $d['descricaoTipoSanguineo'],
                        "idDoador" => $d['idDoador'],
                        "fotoUsuario" => $d['fotoUsuario']
                    );

                    array_push($result, $tupla);
                }

                $resposta = array(
                    "result" => $result, "status" => SUCESSO_AO_CONSULTAR_OS_DOADORES
                );

                echo json_encode($resposta);
            } else {


                $resposta = array("status" => NENHUM_DOADOR_ENCONTRADO);

                echo json_encode($resposta);
            }
        } else {

            $resposta = array("status" => PESQUISA_VAZIA);

            echo json_encode($resposta);
        }
    } else if ($tipoConsulta == PESQUISAR_POR_TIPO_SANGUINEO) {

        if (isset($_POST['txtPesquisa']) && !empty($_POST['txtPesquisa'])) {

            $userDao = new DoadorDAO();
            $doadores = $userDao->getDonnorsByBloodType($_POST['txtPesquisa']);

            if ($doadores !== null) {

                $result = array();

                foreach ($doadores as $d) {

                    $tupla = array(

                        "idDoador" => $d['idDoador'],
                        "nomeDoador" => $d['nomeDoador'],
                        "cpfDoador" => $d['cpfDoador'],
                        "descricaoTipoSanguineo" => $d['descricaoTipoSanguineo'],
                        "idDoador" => $d['idDoador'],
                        "fotoUsuario" => $d['fotoUsuario']
                    );

                    array_push($result, $tupla);
                }

                $resposta = array(
                    "result" => $result, "status" => SUCESSO_AO_CONSULTAR_OS_DOADORES
                );

                echo json_encode($resposta);
            } else {


                $resposta = array("status" => NENHUM_DOADOR_ENCONTRADO);

                echo json_encode($resposta);
            }
        } else {

            $resposta = array("status" => PESQUISA_VAZIA);

            echo json_encode($resposta);
        }
    } else if ($tipoConsulta == PESQUISAR_POR_FATOR_RH) {

        if (isset($_POST['txtPesquisa']) && !empty($_POST['txtPesquisa'])) {

            $userDao = new DoadorDAO();
            $doadores = $userDao->getDonnorsByRhFactor($_POST['txtPesquisa']);

            if ($doadores !== null) {

                $result = array();

                foreach ($doadores as $d) {

                    $tupla = array(

                        "idDoador" => $d['idDoador'],
                        "nomeDoador" => $d['nomeDoador'],
                        "cpfDoador" => $d['cpfDoador'],
                        "descricaoTipoSanguineo" => $d['descricaoTipoSanguineo'],
                        "idDoador" => $d['idDoador'],
                        "fotoUsuario" => $d['fotoUsuario']
                    );

                    array_push($result, $tupla);
                }

                $resposta = array(
                    "result" => $result, "status" => SUCESSO_AO_CONSULTAR_OS_DOADORES
                );

                echo json_encode($resposta);
            } else {


                $resposta = array("status" => NENHUM_DOADOR_ENCONTRADO);

                echo json_encode($resposta);
            }
        } else {

            $resposta = array("status" => PESQUISA_VAZIA);

            echo json_encode($resposta);
        }
    }
} else {

    $resposta = array("status" => ERRO_AO_CONSULTAR);

    echo json_encode($resposta);
}
