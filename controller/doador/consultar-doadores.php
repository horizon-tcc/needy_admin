<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

define("ERRO_AO_CONSULTAR", 0);
define("SUCESSO_AO_CONSULTAR_OS_DOADORES", 1);
define("NENHUM_DOADOR_ENCONTRADO", 2);
define("PESQUISA_VAZIA", 3);

if (isset($_POST['txtPesquisa']) || !empty($_POST['txtPesquisa'])) {


    $doadorDao = new DoadorDAO();
    $doadores = $doadorDao->getDoadorByName($_POST['txtPesquisa']);

    if ($doadores != null) {

        $card = "";
        $listCards = array();

        foreach ($doadores as $d) {

            $card = "<div class='card-consulta'>

            <img src='../img/img_doadores/" . $d->getUsuario()->getFotoUsuario() . "' class='' />

            <h6 class='text-center mt-4'>" . $d->getNome() . "</h6>
            <h6 class='text-center mt-2'>" . $d->getCpf() . "</h6>
            <h6 class='text-center mt-2'>" . $d->getTipoSanguineo()->getDescricaoTipoSanguineo() . "</h6>

            <a href='doadores.php?id=" . $d->getId() . "'> <button> <i class='fas fa-pen'></i> </button> </a>
            <a href='doadores.php?id=" . $d->getId() . "'> <button> <i class='far fa-trash-alt'></i> </button> </a>

            </div>";

            array_push($listCards, $card);
        }


        $resposta = array(
            "result" => $listCards, "status" => SUCESSO_AO_CONSULTAR_OS_DOADORES
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
