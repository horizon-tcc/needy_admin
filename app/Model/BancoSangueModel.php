<?php

namespace App\Model;

class BancoSangueModel
{
    private $id;
    private $nome;

    # Endereço
    private $enderecoLogradouro;
    private $enderecoBairro;
    private $enderecoNumero;
    private $enderecoComplemento;
    private $enderecoCEP;
    private $enderecoUF;
    private $enderecoCidade;

    private $telefones;
    private $pacientes;

    
    # Getters

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getEnderecoLogradouro()
    {
        return $this->enderecoLogradouro;
    }

    public function getEnderecoBairro()
    {
        return $this->enderecoBairro;
    }

    public function getEnderecoNumero()
    {
        return $this->enderecoNumero;
    }

    public function getEnderecoComplemento()
    {
        return $this->enderecoComplemento;
    }

    public function getEnderecoCEP()
    {
        return $this->enderecoCEP;
    }

    public function getEnderecoUF()
    {
        return $this->enderecoUF;
    }

    public function getEnderecoCidade()
    {
        return $this->enderecoCidade;
    }

    
    # Setters

    public function setId($id)
    {
        $this->id = $id;
    }
    
}
