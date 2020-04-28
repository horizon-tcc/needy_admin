<?php

abstract class Pessoa
{

    private $id;
    private $nome;
    private $cpf;
    private $rg;
    private $dataNasc;




   
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    
    public function getNome()
    {
        return $this->nome;
    }

    
    public function setNome($nome)
    {
        $this->nome = $nome;

    }

   
    public function getCpf()
    {
        return $this->cpf;
    }

   
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    
    public function getRg()
    {
        return $this->rg;
    }

   
    public function setRg($rg)
    {
        $this->rg = $rg;
    }

   
    public function getDataNasc()
    {
        return $this->dataNasc;
    }

    
    public function setDataNasc($dataNasc)
    {
        $this->dataNasc = $dataNasc;
    }
    
}
