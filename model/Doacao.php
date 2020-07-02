<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php";

class Doacao {


    private $idDoacao;
    private $dataDoacao;
    private $doador;
    private $tipoDoacao;
    private $bancoSangue;
    private $materialDoado;
    private $resultadoDoacao;
    private $statusDoacao;
    private $pesoDoadorDoacao;
    private $totalDoacao;
    private $unidadeMedida;


    public function __construct() {
        
        $this->tipoDoacao = new TipoDoacao();
        $this->bancoSangue = new BancoSangueModel();
        $this->materialDoado = new MaterialDoado();
        $this->resultadoDoacao = new ResultadoDoacao();
        $this->unidadeMedida = new UnidadeMedida();
    }

    

    public function getIdDoacao()
    {
        return $this->idDoacao;
    }
 
    public function setIdDoacao($idDoacao)
    {
        $this->idDoacao = $idDoacao;

    }


    public function getDataDoacao()
    {
        return $this->dataDoacao;
    }

  
    public function setDataDoacao($dataDoacao)
    {
        $this->dataDoacao = $dataDoacao;
    }

  
    public function getDoador()
    {
        return $this->doador;
    }

  
    public function setDoador($doador)
    {
        $this->doador = $doador;

    }

   
    public function getTipoDoacao()
    {
        return $this->tipoDoacao;
    }


    public function setTipoDoacao($tipoDoacao)
    {
        $this->tipoDoacao = $tipoDoacao;

    }

    
    public function getBancoSangue()
    {
        return $this->bancoSangue;
    }

    
    public function setBancoSangue($bancoSangue)
    {
        $this->bancoSangue = $bancoSangue;
    }

 
    public function getMaterialDoado()
    {
        return $this->materialDoado;
    }

    public function setMaterialDoado($materialDoado)
    {
        $this->materialDoado = $materialDoado;
    }

    public function getResultadoDoacao()
    {
        return $this->resultadoDoacao;
    }

    public function setResultadoDoacao($resultadoDoacao)
    {
        $this->resultadoDoacao = $resultadoDoacao;
    }
 
    public function getStatusDoacao()
    {
        return $this->statusDoacao;
    }

    public function setStatusDoacao($statusDoacao)
    {
        $this->statusDoacao = $statusDoacao;
    }

    public function getPesoDoadorDoacao()
    {
        return $this->pesoDoadorDoacao;
    }


    public function setPesoDoadorDoacao($pesoDoadorDoacao)
    {
        $this->pesoDoadorDoacao = $pesoDoadorDoacao;
    }
 
    public function getTotalDoacao()
    {
        return $this->totalDoacao;
    }

    public function setTotalDoacao($totalDoacao)
    {
        $this->totalDoacao = $totalDoacao;
    }
 
    public function getUnidadeMedida()
    {
        return $this->unidadeMedida;
    }

  
    public function setUnidadeMedida($unidadeMedida)
    {
        $this->unidadeMedida = $unidadeMedida;

    }
}
