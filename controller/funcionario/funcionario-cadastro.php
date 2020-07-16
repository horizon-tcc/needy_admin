<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

try {

    $cadastroUser = new UsuarioDao();

    $statusEtapa1 = false;
    $emailUsuario = $_POST['txtEmailFuncionario'];
    $tipoUsuario = $_POST['seTipoUsuarioFuncionario'];
    $senhaUsuario = UsuarioUtil::gerarSenhaUsuario(true, true, true, true, true);


    $statusEmailUsuario = ValidacaoController::validarEmail($emailUsuario);
    $statusTipoUsuario = TipoUsuarioDAO::verificarExistenciaTipoUsuario($tipoUsuario);
    $statusExistenciaEmail = $cadastroUser->verificaExistenciaEmailUsuario($emailUsuario);


    if (
        $statusEmailUsuario && $statusTipoUsuario
        && !$statusExistenciaEmail && isset($_FILES['imgFuncionario']) 
        && !empty($_FILES['imgFuncionario'])
    ) {

        $array = explode(".", $_FILES['imgFuncionario']['name']);

        $extensão = "";

        for ($i = 0; $i < count($array); $i++) {

            if ($i == count($array) - 1) {
                $extensão = $extensão . strtolower($array[$i]);
            }
        }

        $novoNome = md5($_POST['txtCpfFuncionario'] . time()).".".$extensão;

        move_uploaded_file($_FILES['imgFuncionario']['tmp_name'], __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".."
            . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "img_funcionario" . DIRECTORY_SEPARATOR . $novoNome);


        $usuario = new UsuarioModel();

        $usuario->setEmailUsuario($emailUsuario);
        $usuario->setSenhaUsuario($senhaUsuario);
        $usuario->setTipoUsuario($tipoUsuario);
        $usuario->setFotoUsuario($novoNome);

        $cadastroUser->cadastrarUsuario($usuario);

        $statusEtapa1 = true;
    }


    if ($statusEtapa1) {

        $cadastroFunc = new FuncionarioDAO();

        $nomeFuncionario = $_POST['txtNomeFuncionario'];
        $bancoSangueFuncionario = $_POST['seBancoSangueFuncionario'];
        $cargoFuncionario = $_POST['seCargoFuncionario'];
        $cpfFuncionario = $_POST['txtCpfFuncionario'];
        $rgFuncionario = $_POST['txtRgFuncionario'];
        $emailFuncionario = $_POST['txtEmailFuncionario'];


        $statusNomeFuncionario = ValidacaoController::validarNome($nomeFuncionario);
        $statusBancoSangue = BancoSangueDAO::verificarExistenciaBanco($bancoSangueFuncionario);
        $statusCargo = CargoFuncionarioDAO::verificarExistenciaCargo($cargoFuncionario);
        $statusCpfFuncionario = ValidacaoController::validarCpf($cpfFuncionario);
        $statusExistenciaCPf = $cadastroFunc->verificarExistenciaCpfFuncionario($cpfFuncionario);
        $usuarioId = $cadastroUser->getUsuarioByEmail($emailFuncionario);


        if (
            $statusNomeFuncionario && $statusCargo && $statusBancoSangue
            && $statusCpfFuncionario && $statusExistenciaCPf && isset($rgFuncionario)
            && !empty($rgFuncionario)
        ) {

            $funcionario = new FuncionarioModel();

            $funcionario->setNomeFuncionario($nomeFuncionario);
            $funcionario->setCpfFuncionario($cpfFuncionario);
            $funcionario->setRgFuncionario($rgFuncionario);
            $funcionario->setBancoSangue($bancoSangueFuncionario);
            $funcionario->setUsuarioFuncionario($usuarioId->getIdUsuario());
            $funcionario->setCargoFuncionario($cargoFuncionario);

            echo $cadastroFunc->cadastrarFuncionario($funcionario);

            echo json_encode(true);
        } else {
            $cadastroUser->excluirUsuario($usuarioId->getIdUsuario());

            echo json_encode(false);
        }
    } else {

        echo json_encode(false);
    }
} catch (Exception $e) {
    echo '<pre>';
    print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}
