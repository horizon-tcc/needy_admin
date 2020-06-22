<?php

class Sexo
{

    private $idSexo;
    private $descricaoSexo;



    public function getDescricaoSexo()
    {
        return $this->descricaoSexo;
    }


    public function setDescricaoSexo($descricaoSexo)
    {
        $this->descricaoSexo = $descricaoSexo;

    }

    public function getIdSexo()
    {
        return $this->idSexo;
    }

    
    public function setIdSexo($idSexo)
    {
        $this->idSexo = $idSexo;
    }
}
