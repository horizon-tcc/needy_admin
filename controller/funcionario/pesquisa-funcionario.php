<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

$funcionario = new FuncionarioDAO();

if (isset($_POST['txtPesquisa']) && !empty($_POST['txtPesquisa'])) {

    if(isset($_POST['hdSearchType']) && !empty($_POST['hdSearchType'])){

        $tipoPesquisa = $_POST['hdSearchType'];

        if($tipoPesquisa == 'filterNomeFuncionario'){

            $listaFuncionario = $funcionario->listarFuncionarioNome(strtolower($_POST['txtPesquisa']));

            if ($listaFuncionario !== false) {

                $resultado = array();

                foreach ($listaFuncionario as $linha) {

                    $tupla = array("idFuncionario" => $linha['idFuncionario']
                                    ,"nomeFuncionario" => $linha['nomeFuncionario']
                                    ,"fotoUsuario" => $linha['fotoUsuario']
                                    ,"cpfFuncionario"=> $linha['cpfFuncionario']
                                    ,"rgFuncionario" => $linha['rgFuncionario']
                                    ,"nomeBancoSangue" => $linha['nomeBancoSangue']
                                    ,"descricaoCargoFuncionario" => $linha['descricaoCargoFuncionario']
                                    ,"emailUsuario" => $linha['emailUsuario']
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

        } else if ($tipoPesquisa == 'filterCpfFuncionario') {
            
            $listaFuncionario = $funcionario->listarFuncionarioCpf($_POST['txtPesquisa']);

            if ($listaFuncionario !== false) {

                $resultado = array();

                foreach ($listaFuncionario as $linha) {

                    $tupla = array("idFuncionario" => $linha['idFuncionario']
                                    ,"nomeFuncionario" => $linha['nomeFuncionario']
                                    ,"fotoUsuario" => $linha['fotoUsuario']
                                    ,"cpfFuncionario"=> $linha['cpfFuncionario']
                                    ,"rgFuncionario" => $linha['rgFuncionario']
                                    ,"nomeBancoSangue" => $linha['nomeBancoSangue']
                                    ,"descricaoCargoFuncionario" => $linha['descricaoCargoFuncionario']
                                    ,"emailUsuario" => $linha['emailUsuario']
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

        } else if ($tipoPesquisa == 'filterEmailFuncionario') {

            $listaFuncionario = $funcionario->listarFuncionarioEmail($_POST['txtPesquisa']);

            if ($listaFuncionario !== false) {

                $resultado = array();

                foreach ($listaFuncionario as $linha) {

                    $tupla = array("idFuncionario" => $linha['idFuncionario']
                                    ,"nomeFuncionario" => $linha['nomeFuncionario']
                                    ,"fotoUsuario" => $linha['fotoUsuario']
                                    ,"cpfFuncionario"=> $linha['cpfFuncionario']
                                    ,"rgFuncionario" => $linha['rgFuncionario']
                                    ,"nomeBancoSangue" => $linha['nomeBancoSangue']
                                    ,"descricaoCargoFuncionario" => $linha['descricaoCargoFuncionario']
                                    ,"emailUsuario" => $linha['emailUsuario']
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

        } else if ($tipoPesquisa == 'filterCargoFuncionario') {

            $listaFuncionario = $funcionario->listarFuncionarioCargo($_POST['txtPesquisa']);

            if ($listaFuncionario !== false) {

                $resultado = array();

                foreach ($listaFuncionario as $linha) {

                    $tupla = array("idFuncionario" => $linha['idFuncionario']
                                    ,"nomeFuncionario" => $linha['nomeFuncionario']
                                    ,"fotoUsuario" => $linha['fotoUsuario']
                                    ,"cpfFuncionario"=> $linha['cpfFuncionario']
                                    ,"rgFuncionario" => $linha['rgFuncionario']
                                    ,"nomeBancoSangue" => $linha['nomeBancoSangue']
                                    ,"descricaoCargoFuncionario" => $linha['descricaoCargoFuncionario']
                                    ,"emailUsuario" => $linha['emailUsuario']
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

        } else if ($tipoPesquisa == 'filterBancoFuncionario') {

            $listaFuncionario = $funcionario->listarFuncionarioBanco($_POST['txtPesquisa']);

            if ($listaFuncionario !== false) {

                $resultado = array();

                foreach ($listaFuncionario as $linha) {

                    $tupla = array("idFuncionario" => $linha['idFuncionario']
                                    ,"nomeFuncionario" => $linha['nomeFuncionario']
                                    ,"fotoUsuario" => $linha['fotoUsuario']
                                    ,"cpfFuncionario"=> $linha['cpfFuncionario']
                                    ,"rgFuncionario" => $linha['rgFuncionario']
                                    ,"nomeBancoSangue" => $linha['nomeBancoSangue']
                                    ,"descricaoCargoFuncionario" => $linha['descricaoCargoFuncionario']
                                    ,"emailUsuario" => $linha['emailUsuario']
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

        }

    } else {

        $resultado = array("status" => false);

        echo json_encode($resultado);
    }

} else {
    
    $listaFuncionario = $funcionario->listarFuncionario();

    $resultado = array();

    foreach ($listaFuncionario as $linha) {

        $tupla = array("idFuncionario" => $linha['idFuncionario']
                        ,"nomeFuncionario" => $linha['nomeFuncionario']
                        ,"fotoUsuario" => $linha['fotoUsuario']
                        ,"cpfFuncionario"=> $linha['cpfFuncionario']
                        ,"rgFuncionario" => $linha['rgFuncionario']
                        ,"nomeBancoSangue" => $linha['nomeBancoSangue']
                        ,"descricaoCargoFuncionario" => $linha['descricaoCargoFuncionario']
                        ,"emailUsuario" => $linha['emailUsuario']
                    );

        array_push($resultado, $tupla);
    }

    $resultado = array(
        "resultado" => $resultado, "status" => true
    );

    echo json_encode($resultado);
}