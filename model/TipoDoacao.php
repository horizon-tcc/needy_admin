<?php 

require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR ."global.php";  

class TipoDoacao {

    private $idTipoDoacao;
    private $descricaoTipoDoacao;

    public function getDescricaoTipoDoacao()
    {
        return $this->descricaoTipoDoacao;
    }

    public function setDescricaoTipoDoacao($descricaoTipoDoacao)
    {
        $this->descricaoTipoDoacao = $descricaoTipoDoacao;

    }

    public function getIdTipoDoacao()
    {
        return $this->idTipoDoacao;
    }

    public function setIdTipoDoacao($idTipoDoacao)
    {
        $this->idTipoDoacao = $idTipoDoacao;

    }

    
}

