<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

try {
    $funcionario = new FuncionarioDAO();
    $funcionario->setNomeFuncionario($_POST['#']);
    $funcionario->setCpfFuncionario($_POST['#']);
    $funcionario->setRgFuncionario($_POST['#']);
    $funcionario->setBancoSangue($_POST['#']);
    $funcionario->setUsuarioFuncionario($_POST['#']);
    $funcionario->setCargoFuncionario($_POST['#']);
    echo $paciente->cadastrarFuncionario($funcionario);
    echo '<script> window.location.replace("../../view/funcionario.php"); </script>';
} catch (Exception $e) {
    echo '<pre>';
    print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}
