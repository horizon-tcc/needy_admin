<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

define("USUARIO_REMOVIDO", 0);
define("USUARIO_ATIVO", 1);
define("USUARIO_INATIVO", 2);

class UsuarioModel
{
    private $idUsuario;
    private $emailUsuario;
    private $senhaUsuario;
    private $tipoUsuario;
    private $fotoUsuario;
    private $statusUsuario;

    public function __construct()
    {
        $this->tipoUsuario = new TipoUsuarioModel();
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setIdUsuario($id)
    {
        $this->idUsuario = $id;
    }

    public function getEmailUsuario()
    {
        return $this->emailUsuario;
    }

    public function setEmailUsuario($email)
    {
        $this->emailUsuario = $email;
    }

    public function getSenhaUsuario()
    {
        return $this->senhaUsuario;
    }

    public function setSenhaUsuario($senha)
    {
        $this->senhaUsuario = $senha;
    }

    public function getIdTipoUsuario()
    {
        return $this->idTipoUsuario;
    }

    public function setIdTipoUsuario($id)
    {
        $this->idTipoUsuario = $id;
    }



    public function getFotoUsuario()
    {
        return $this->fotoUsuario;
    }


    public function setFotoUsuario($fotoUsuario)
    {
        $this->fotoUsuario = $fotoUsuario;
    }

    public function getTipoUsuario()
    {
        return $this->tipoUsuario;
    }

   
    public function setTipoUsuario($tipoUsuario)
    {
        $this->tipoUsuario = $tipoUsuario;
    }

    
    public function getStatusUsuario()
    {
        return $this->statusUsuario;
    }

   
    public function setStatusUsuario($statusUsuario)
    {
        $this->statusUsuario = $statusUsuario;

    }
}
