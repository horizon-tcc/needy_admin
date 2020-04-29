<?php 

    require_once(__DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."global.php");

    try{
        
        $idUsuario = intval($_GET['#']);
        $emailUsuario = $_POST['#txtEmailUsuario'];
        $senhaUsuario = $_POST['psSenhaUsuario'];
        $tipoUsuario = intval($_POST['#scTipoUsuario']);

        $statusEmailUsuario = ValidacaoUsuarioController::validacaoEmailUsuario($emailUsuario);
        $statusSenhaUsuario = ValidacaoUsuarioController::validacaoSenhaUsuario($senhaUsuario);
        $statusTipoUsuario = ValidacaoUsuarioController::validacaoTipoUsuario($tipoUsuario);


        if($statusEmailUsuario && $statusSenhaUsuario && $statusTipoUsuario && !empty($idUsuario())){
            
            $usuario = new UsuarioDao();

            $usuario->setIdUsuario($idUsuario);
            $usuario->setEmailUsuario($emailUsuario);
            $usuario->setSenhaUsuario($senhaUsuario);
            $usuario->setTipoUsuario($tipoUsuario);

            echo $usuario->editarUsuario($usuario);

            echo '<script> window.location.replace("../../view/funcionario.php"); </script>';

        } else {

            echo 'Tentativa de Inserção de dados comprometidos';

        }
        
        
    }
    catch(Exception $e){
        echo '<pre>';
            print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }