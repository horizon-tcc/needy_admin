<?php

namespace model;

class Endereco
{
    private $logradouro;
    private $bairro;
    private $numero;
    private $complemento;
    private $CEP;
    private $UF;
    private $cidade;


    public function getLogradouro()
    {
        return $this->logradouro;
    }


    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;
    }


    public function getBairro()
    {
        return $this->bairro;
    }


    public function setBairro($bairro)
    {
        $this->bairro = $bairro;

        return $this;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    public function getComplemento()
    {
        return $this->complemento;
    }

    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;
    }

    public function getCEP()
    {
        return $this->CEP;
    }

    public function setCEP($CEP)
    {
    }

    public function getUF()
    {
        return $this->UF;
    }

    public function setUF($UF)
    {
        $this->UF = $UF;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }
}
