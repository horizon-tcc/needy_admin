<?php

require_once(__DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."global.php");

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

    public function getPaciente()
    {
        return $this->pacientes;
    }

    # Setters



    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setTelefone($tels)
    {
        $this->telefones = $tels;
    }

    public function setPaciente($pacientes)
    {
        $this->pacientes = $pacientes;
    }
}
