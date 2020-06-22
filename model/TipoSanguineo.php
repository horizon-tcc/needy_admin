<?php

class TipoSanguineo
{

    private $idTipoSanguineo;
    private $descricaoTipoSanguineo;



    public function getIdTipoSanguineo()
    {
        return $this->idTipoSanguineo;
    }


    public function setIdTipoSanguineo($idTipoSanguineo)
    {
        $this->idTipoSanguineo = $idTipoSanguineo;
    }


    public function getDescricaoTipoSanguineo()
    {
        return $this->descricaoTipoSanguineo;
    }


    public function setDescricaoTipoSanguineo($descricaoTipoSanguineo)
    {
        $this->descricaoTipoSanguineo = $descricaoTipoSanguineo;
    }
}
