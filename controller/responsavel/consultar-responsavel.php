<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

define("ERRO_AO_CONSULTAR_POR_RESPONSAVEIS", 0);
define("SUCESSO_AO_CONSULTAR_POR_RESPONSAVEIS", 1);
define("NENHUM_RESPONSAVEL_ENCONTRADO", 2);
define("PARAMETRO_DE_PESQUISA_VAZIO", 3);


$responsavelDao = new ResponsavelDAO();

if (isset($_POST['txtConsultarCpfResponsavel']) && !empty("txtConsultarCpfResponsavel")) {

    $result =  $responsavelDao->getResponsiblesByCpf($_POST['txtConsultarCpfResponsavel']);

    if ($result != null) {

        $response = array("status" => SUCESSO_AO_CONSULTAR_POR_RESPONSAVEIS, "result" => $result);

        echo json_encode($response);


    } else {
        $response = array("status" => NENHUM_RESPONSAVEL_ENCONTRADO);

        echo json_encode($response);
    }
} else {

    $response = array("status" => PARAMETRO_DE_PESQUISA_VAZIO);

    echo json_encode($response);
}
