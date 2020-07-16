<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

class BancoSangueModel
{
    private $id;
    private $nome;
    private $endereco;
    private $telefones;
    private $foto;
    private $horarios;

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

    public function getTelefones()
    {
        return $this->telefones;
    }

    public function getPacientes()
    {
        return $this->pacientes;
    }

    # Setters

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    public function setTelefones($telefones)
    {
        $this->telefones = $telefones;
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    
    public function getHorarios()
    {
        return $this->horarios;
    }

  
    public function setHorarios($horarios)
    {
        $this->horarios = $horarios;

    }
}
