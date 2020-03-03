<?php

namespace model;

class BancoSangueModel
{
    private $id;
    private $nome;
    private $endereco;
    private $telefones = [];
    private $pacientes = [];

    # Getters

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    # Setters

    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setTelefone(Array $tel)   
    {
        $this->telefones = $tel;
    }
}
