<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

// status para retornar ao usuário 
define("EMAIL_USUARIO_INVALIDO", 0);
define("EMAIL_USUARIO_VALIDO", 1);

// Constantes para identificar o tipo de validação a ser feita 
define("VERIFICAR_EMAIL_PARA_CADASTRO", 0);
define("VERIFICAR_EMAIL_PARA_EDICAO", 1);

$usuarioDao = new UsuarioDAO();

if (isset($_POST['txtEmail']) && !empty($_POST['txtEmail']) && isset($_POST['hdFormType']) && $_POST['hdFormType'] == VERIFICAR_EMAIL_PARA_EDICAO ) {

   
    $user = $usuarioDao->getUserByIdDonnor($_POST['hdIdDonnor']);
    $user->setEmailUsuario($_POST['txtEmail']);

    if (!$usuarioDao->verificaExistenciaEmailUsuarioParaEdicao($user)) {

        $resposta = array("status" => EMAIL_USUARIO_VALIDO);
        echo json_encode($resposta);
    } else {
        $resposta = array("status" => EMAIL_USUARIO_INVALIDO);
        echo json_encode($resposta);
    }
} else if ( isset($_POST['txtEmail']) && !empty($_POST['txtEmail']) ) {


    if (!$usuarioDao->verificaExistenciaEmailUsuario($_POST['txtEmail'])) {

        $resposta = array("status" => EMAIL_USUARIO_VALIDO);
        echo json_encode($resposta);
    } else {
        $resposta = array("status" => EMAIL_USUARIO_INVALIDO);
        echo json_encode($resposta);
    }

}
else {
  
    $resposta = array("status" => EMAIL_USUARIO_INVALIDO);
    echo json_encode($resposta);
}
