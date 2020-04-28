<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR ."global.php";  

class Responsavel extends Pessoa
{

    private $telefones;

    public function __construct()
    {
        $this->telefones = array();
    }


    public function getTelefones()
    {
        return $this->telefones;
    }


    public function setTelefones($telefones)
    {
        $this->telefones = $telefones;
    }
}
