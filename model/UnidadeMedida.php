<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR ."global.php";  


class UnidadeMedida {


    private $idUnidadeMedida;
    private $descricaoUnidadeMedida;


    public function getIdUnidadeMedida()
    {
        return $this->idUnidadeMedida;
    }

    public function setIdUnidadeMedida($idUnidadeMedida)
    {
        $this->idUnidadeMedida = $idUnidadeMedida;

    }

    public function getDescricaoUnidadeMedida()
    {
        return $this->descricaoUnidadeMedida;
    }

    public function setDescricaoUnidadeMedida($descricaoUnidadeMedida)
    {
        $this->descricaoUnidadeMedida = $descricaoUnidadeMedida;
    }
}