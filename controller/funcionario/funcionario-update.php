<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

try {

    $cadastroUser = new UsuarioDAO();

    $idUsuario = $_POST['hdIdUsuarioFunc'];
    $emailUsuario = $_POST['txtEmailFuncionario'];
    $tipoUsuario = $_POST['seTipoUsuarioFuncionario'];

    $statusEmailUsuario = ValidacaoController::validarEmail($emailUsuario);
    $statusTipoUsuario = TipoUsuarioDAO::verificarExistenciaTipoUsuario($tipoUsuario);
    $statusFoto = false;
    $statusEtapa1 = false;

    if ($statusEmailUsuario && $statusTipoUsuario) {

        $usuario = new UsuarioModel();

        $usuario->setIdUsuario($idUsuario);
        $usuario->setEmailUsuario($emailUsuario);
        $usuario->setTipoUsuario($tipoUsuario);

        if ($_POST['hdImgStatus'] == 1) {

            $array = explode(".", $_FILES['imgFuncionario']['name']);

            $extensão = "";

            for ($i = 0; $i < count($array); $i++) {

                if ($i == count($array) - 1) {
                    $extensão = $extensão . strtolower($array[$i]);
                }
            }

            $novoNome = md5($_POST['txtCpfFuncionario'] . time()) . "." . $extensão;

            move_uploaded_file($_FILES['imgFuncionario']['tmp_name'], __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".."
                . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "img_funcionario" . DIRECTORY_SEPARATOR . $novoNome);

            $usuario->setFotoUsuario($novoNome);

            $statusFoto = true;
        }

        $statusExistenciaEmail = $cadastroUser->verificaExistenciaEmailUsuarioParaEdicao($usuario);

        if (!$statusExistenciaEmail && $statusFoto) {

            $cadastroUser->editarUsuario($usuario);

            $statusEtapa1 = true;
        } else if (!$statusExistenciaEmail) {

            $cadastroUser->editarUsuarioSemFoto($usuario);

            $statusEtapa1 = true;
        }
    }


    if ($statusEtapa1) {

        $cadastroFunc = new FuncionarioDAO();

        $idFuncionario = $_POST['hdIdFuncionario'];
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
        $statusExistenciaCPf = $cadastroFunc->verificarExistenciaCpfFuncionarioUpdate($cpfFuncionario, $idFuncionario);
        $usuarioId = $cadastroUser->getUsuarioByEmail($emailFuncionario);


        if (
            $statusNomeFuncionario && $statusCargo && $statusBancoSangue
            && $statusCpfFuncionario && $statusExistenciaCPf && isset($rgFuncionario)
            && !empty($rgFuncionario)
        ) {

            $funcionario = new FuncionarioModel();

            $funcionario->setIdFuncionario($idFuncionario);
            $funcionario->setNomeFuncionario($nomeFuncionario);
            $funcionario->setCpfFuncionario($cpfFuncionario);
            $funcionario->setRgFuncionario($rgFuncionario);
            $funcionario->setBancoSangue($bancoSangueFuncionario);
            $funcionario->setUsuarioFuncionario($usuarioId->getIdUsuario());
            $funcionario->setCargoFuncionario($cargoFuncionario);

            $cadastroFunc->editarFuncionario($funcionario);

            echo json_encode(true);
        } else {

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
