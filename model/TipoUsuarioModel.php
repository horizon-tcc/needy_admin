<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

define("MASTER", 1);
define("DOADOR", 2);
define("GERENTE", 3);
define("FUNCIONARIO", 4);

class TipoUsuarioModel
{
    private $idTipoUsuario;
    private $descricaoTipoUsuario;
    

    public function getIdTipoUsuario()
    {
        return $this->idTipoUsuario;
    }

    public function setIdTipoUsuario($idTipoUsuario)
    {
        $this->idTipoUsuario = $idTipoUsuario;

    }

   
    public function getDescricaoTipoUsuario()
    {
        return $this->descricaoTipoUsuario;
    }

    public function setDescricaoTipoUsuario($descricaoTipoUsuario)
    {
        $this->descricaoTipoUsuario = $descricaoTipoUsuario;

    }
}
