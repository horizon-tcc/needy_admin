<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

// status para retornar 
define("CPF_DOADOR_INVALIDO", 0);
define("CPF_DOADOR_VALIDO", 1);

// Constantes para identificar o tipo de validação a ser feita 
define("VERIFICAR_CPF_PARA_CADASTRO", 0);
define("VERIFICAR_CPF_PARA_EDICAO", 1);

if ( isset($_POST['txtCpfDoador']) && !empty($_POST['txtCpfDoador']) && isset($_POST['hdFormType']) && $_POST['hdFormType'] == VERIFICAR_CPF_PARA_EDICAO )  {

    $doadorDao = new DoadorDAO();
    $doador = new Doador();
    $doador->setCpf($_POST['txtCpfDoador']);
    $doador->setId($_POST['hdIdDonnor']);

    if (!$doadorDao->verificarExistenciaCpfDoadorParaEdicao($doador)) {

        $resposta = array("status" => CPF_DOADOR_VALIDO);
        echo json_encode($resposta);
    } else {
        $resposta = array("status" => CPF_DOADOR_INVALIDO);
        echo json_encode($resposta);
    }
}
else if (isset($_POST['txtCpfDoador']) && !empty($_POST['txtCpfDoador'])) {
    
    $doadorDao = new DoadorDAO();

    if (!$doadorDao->verificarExistenciaCpfDoador($_POST['txtCpfDoador'])) {

        $resposta = array("status" => CPF_DOADOR_VALIDO);
        echo json_encode($resposta);
    } else {
        $resposta = array("status" => CPF_DOADOR_INVALIDO);
        echo json_encode($resposta);
    }

} else {

    $resposta = array("status" => CPF_DOADOR_INVALIDO);
    echo json_encode($resposta);


}
