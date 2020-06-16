<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

define("ERRO_AO_PESQUISAR_PELO_RESPONSAVEL", 0);
define("RESPONSAVEL_ENCONTRADO_COM_SUCESSO", 1);
define("PARAMETRO_PARA_PESQUISAR_RESPONSAVEL_VAZIO", 2);
define("NENHUM_RESPONSAVEL_ENCONTRADO", 3);

if (isset($_POST['idResponsavel']) && !empty($_POST['idResponsavel'])) {

    $responsavelDao = new ResponsavelDAO();

    $responsavelPesquisado = $responsavelDao->getResponsavelById($_POST['idResponsavel']);

    if ( $responsavelPesquisado != null) {

        $response = array( "idResponsavel" => $responsavelPesquisado->getId()
                          ,"nomeResponsavel" => $responsavelPesquisado->getNome()
                          ,"cpfResponsavel" => $responsavelPesquisado->getCpf() 
                          ,"rgResponsavel" => $responsavelPesquisado->getRg() 
                          , "dataNascimentoResponsavel" => $responsavelPesquisado->getDataNasc() 
                          , "status" => RESPONSAVEL_ENCONTRADO_COM_SUCESSO );

        echo json_encode($response);

    } else {

        $response = array("status" => NENHUM_RESPONSAVEL_ENCONTRADO);

        echo json_encode($response);
    }
} else {

    $response = array("status" => PARAMETRO_DE_PESQUISA_VAZIO);

    echo json_encode($response);
}
