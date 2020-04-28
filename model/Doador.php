<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR ."global.php";  

class Doador extends Pessoa
{
    private $email;
    private $endereco;
    private $tipoSanguineo;
    private $responsavel;
    private $telefones;
    private $usuario;
    private $sexo;
    private $fatorRh;
    private $imgDoador;

    public function __construct()
    {
        $this->endereco = new EnderecoModel();
        $this->tipoSanguineo = new TipoSanguineo();
        $this->resposavel = new Responsavel();
        $this->telefones = array();
        $this->usuario = new UsuarioModel();
        $this->sexo = new Sexo();
        $this->fatorRh = new FatorRh();
    }


    public function getEndereco()
    {
        return $this->endereco;
    }


    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;
    }


    public function getTipoSanguineo()
    {
        return $this->tipoSanguineo;
    }


    public function setTipoSanguineo($tipoSanguineo)
    {
        $this->tipoSanguineo = $tipoSanguineo;
    }


    public function getResponsavel()
    {
        return $this->responsavel;
    }


    public function setResponsavel($responsavel)
    {
        $this->responsavel = $responsavel;
    }


    public function getTelefones()
    {
        return $this->telefones;
    }


    public function setTelefones($telefones)
    {
        $this->telefones = $telefones;
    }


    public function getUsuario()
    {
        return $this->usuario;
    }


    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }


    public function getSexo()
    {
        return $this->sexo;
    }


    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }


    public function getFatorRh()
    {
        return $this->fatorRh;
    }


    public function setFatorRh($fatorRh)
    {
        $this->fatorRh = $fatorRh;
    }

  
    public function getImgDoador()
    {
        return $this->imgDoador;
    }

   
   
    public function setImgDoador($imgDoador)
    {
        $this->imgDoador = $imgDoador;
    }
}
