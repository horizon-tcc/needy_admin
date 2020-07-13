<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

class FuncionarioController
{
    public function getFuncionario()
    {
        $funcionarios = new FuncionarioDAO();

        return $funcionarios->listarFuncionario();
    }

    public function getFuncionarioId($id)
    {
        $funcionarios = new FuncionarioDAO();

        return $funcionarios->selecEditarFuncionario($id);
    }
}
