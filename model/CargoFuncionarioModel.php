<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

class CargoFuncionarioModel
{
    private $idCargoFuncionario;
    private $descricaoCargoFuncionario;

    public function getIdCargoFunc()
    {
        return $this->idCargoFuncionario;
    }

    public function setIdCargoFunc($id)
    {
        $this->idCargoFuncionario = $id;
    }

    public function getDescricaoCargoFunc()
    {
        return $this->descricaoCargoFuncionario;
    }

    public function setDescricaoCargoFunc($descricaoCargo)
    {
        $this->descricaoCargoFuncionario = $descricaoCargo;
    }
}
