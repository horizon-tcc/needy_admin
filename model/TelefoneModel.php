<?php

require_once __DIR__.DIRECTORY_SEPARATOR."..". DIRECTORY_SEPARATOR. "global.php";

class TelefoneModel
{
    private $idTelefone;
    private $numeroTelefone;


  
    public function getIdTelefone()
    {
        return $this->idTelefone;
    }

    public function setIdTelefone($idTelefone)
    {
        $this->idTelefone = $idTelefone;

        return $this;
    }
 
    public function getNumeroTelefone()
    {
        return $this->numeroTelefone;
    }

    public function setNumeroTelefone($numeroTelefone)
    {
        $this->numeroTelefone = $numeroTelefone;

        return $this;
    }

}
