<?php

    
class ResultadoDoacao {


    private $idResultadoDoacao;
    private $descricaoResultadoDoacao;

    public function getIdResultadoDoacao()
    {
        return $this->idResultadoDoacao;
    }

    public function setIdResultadoDoacao($idResultadoDoacao)
    {
        $this->idResultadoDoacao = $idResultadoDoacao;
    }

  
    public function getDescricaoResultadoDoacao()
    {
        return $this->descricaoResultadoDoacao;
    }

    public function setDescricaoResultadoDoacao($descricaoResultadoDoacao)
    {
        $this->descricaoResultadoDoacao = $descricaoResultadoDoacao;
    }
}