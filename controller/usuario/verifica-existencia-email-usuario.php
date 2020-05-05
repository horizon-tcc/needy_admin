<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

define("EMAIL_USUARIO_INVALIDO", 0);
define("EMAIL_USUARIO_VALIDO", 1);


if (isset($_POST['txtEmail']) && !empty($_POST['txtEmail'])) {

    $usuarioDao = new UsuarioDAO();

    if (!$usuarioDao->verificaExistenciaEmailUsuario($_POST['txtEmail'])) {

        $resposta = array("status" => EMAIL_USUARIO_VALIDO);
        echo json_encode($resposta);
    } else {
        $resposta = array("status" => EMAIL_USUARIO_INVALIDO);
        echo json_encode($resposta);
    }
} else {

    $resposta = array("status" => EMAIL_USUARIO_INVALIDO);
    echo json_encode($resposta);
}
