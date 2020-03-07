<?php
require_once __DIR__.DIRECTORY_SEPARATOR."..". DIRECTORY_SEPARATOR. "global.php";

class BancoSangueModel
{
    private $id;
    private $nome;
    private $endereco;
    private $telefones = [];
    private $pacientes = [];

    # Getters


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of endereco
     */ 
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Set the value of endereco
     *
     * @return  self
     */ 
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    /**
     * Get the value of telefones
     */ 
    public function getTelefones()
    {
        return $this->telefones;
    }

    /**
     * Set the value of telefones
     *
     * @return  self
     */ 
    public function setTelefones($telefones)
    {
        $this->telefones = $telefones;
    }

    /**
     * Get the value of pacientes
     */ 
    public function getPacientes()
    {
        return $this->pacientes;
    }

    /**
     * Set the value of pacientes
     *
     * @return  self
     */ 
    public function setPacientes($pacientes)
    {
        $this->pacientes = $pacientes;

    }
}
