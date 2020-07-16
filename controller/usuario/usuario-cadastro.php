<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

try {

    $cadastro = new UsuarioDao();

    $emailUsuario = $_POST['txtEmailUsuario'];
    $tipoUsuario = intval($_POST['seTipoUsuario']);
    $senhaUsuario = UsuarioUtil::gerarSenhaUsuario(true, true, true, true, true);

    $statusEmailUsuario = ValidacaoUsuarioController::validacaoEmailUsuario($emailUsuario);
    $statusSenhaUsuario = ValidacaoUsuarioController::validacaoSenhaUsuario($senhaUsuario);
    $statusTipoUsuario = TipoUsuarioDAO::verificarExistenciaTipoUsuario($tipoUsuario);
    $statusExistenciaEmail = $cadastro->verificaExistenciaEmailUsuario($emailUsuario);

    if ($statusEmailUsuario && $statusSenhaUsuario && $statusTipoUsuario
        && !$statusExistenciaEmail && isset($_FILES['imgUsuario']) && !empty($_FILES['imgUsuario'])) {

        $usuario = new UsuarioModel();

        $usuario->setEmailUsuario($emailUsuario);
        $usuario->setSenhaUsuario($senhaUsuario);
        $usuario->setTipoUsuario($tipoUsuario);
        $usuario->setFotoUsuario($imgUsuario);

        echo $cadastro->cadastrarUsuario($usuario);

        echo json_encode(true);
    } else {

        echo json_encode(false);
    }
} catch (Exception $e) {
    echo '<pre>';
    print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}
