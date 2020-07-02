<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php";


class MaterialDoado {


    private $idMaterialDoado;
    private $descricaoMaterialDoado;


    public function getIdMaterialDoado()
    {
        return $this->idMaterialDoado;
    }

    public function setIdMaterialDoado($idMaterialDoado)
    {
        $this->idMaterialDoado = $idMaterialDoado;
    }

 
    public function getDescricaoMaterialDoado()
    {
        return $this->descricaoMaterialDoado;
    }

    public function setDescricaoMaterialDoado($descricaoMaterialDoado)
    {
        $this->descricaoMaterialDoado = $descricaoMaterialDoado;

    }
}