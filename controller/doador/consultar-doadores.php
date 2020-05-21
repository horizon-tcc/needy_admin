<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

define("ERRO_AO_CONSULTAR", 0);
define("SUCESSO_AO_CONSULTAR_OS_DOADORES", 1);
define("NENHUM_DOADOR_ENCONTRADO", 2);
define("PESQUISA_VAZIA", 3);



if (isset($_POST['txtPesquisa']) || !empty($_POST['txtPesquisa'])) {


    $doadorDao = new DoadorDAO();
    $doadores = $doadorDao->getDoadorByName($_POST['txtPesquisa']);

    if ($doadores !== null) {

        $result = array();

        foreach ($doadores as $d) {
            
            $tupla = array(
                "nomeDoador" => $d['nomeDoador']
                ,"cpfDoador" => $d['cpfDoador']
                ,"descricaoTipoSanguineo" => $d['descricaoTipoSanguineo']
                ,"idDoador" => $d['idDoador']
                ,"fotoUsuario" => $d['fotoUsuario']
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
