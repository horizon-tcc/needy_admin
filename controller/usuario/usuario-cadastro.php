<?php 

    require_once(__DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."global.php");

    try{
        session_start();

        $emailUsuario = $_POST['#txtEmailUsuario'];
        $senhaUsuario = $_POST['#psSenhaUsuario'];
        $tipoUsuario = intval($_POST['#scTipoUsuario']);
        $emailStatus;
        $senhaStatus;
        $tipoUsuarioStatus;

        $usuario = new FuncionarioDAO();
        $usuario->setEmailUsuario($emailUsuario);
        $usuario->setSenhaUsuario($senhaUsuario);
        $usuario->setTipoUsuario($tipoUsuario);

        if($tipoUsuario == 1 || $tipoUsuario < 4 || empty($tipoUsuario) = true ) {

            $tipoUsuarioStatus = false;

        } else if($_SESSION["idTipoUsuario"] != 1 && $tipoUsuario == 2) {

            $tipoUsuarioStatus = false;

        } else if($_SESSION["idTipoUsuario"] < 2 && $tipoUsuario == 2) {

            $tipoUsuarioStatus = false;

        } else if($_SESSION["idTipoUsuario"] < 2 && $tipoUsuario == 2) {

            $tipoUsuarioStatus = false;
            
        }

        echo $paciente->cadastrarUsuario($usuario);
        echo '<script> window.location.replace("../../view/funcionario.php"); </script>';
    }
    catch(Exception $e){
        echo '<pre>';
            print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }