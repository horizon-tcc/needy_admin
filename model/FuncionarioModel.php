<?php

    require_once(__DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."global.php");
    
    class  FuncionarioModel
    {
        private $idFuncionario;
        private $nomeFuncionario;
        private $cpfFuncionario;
        private $rgFuncionario;
        private $bancoSangue;
        private $usuarioFuncionario;
        private $cargoFuncionario;

        public function getIdFuncionario()
        {
            return $this->idFuncionario;
        }

        public function setIdFuncionario($id)
        {
            $this->idFuncionario = $id;
        }

        public function getNomeFuncionario()
        {
            return $this->nomeFuncionario;
        }

        public function setNomeFuncionario($nome)
        {
            $this->nomeFuncionario = $nome;
        }

        public function getCpfFuncionario()
        {
            return $this->cpfFuncionario;
        }

        public function setCpfFuncionario($cpf)
        {
            $this->cpfFuncionario = $cpf;
        }

        public function getRgFuncionario()
        {
            return $this->rgFuncionario;
        }

        public function setRgFuncionario($rg)
        {
            $this->rgFuncionario = $rg;
        }

        public function getBancoSangue()
        {
            return $this->bancoSangue;
        }

        public function setBancoSangue($id)
        {
            $this->bancoSangue = $id;
        }

        public function getUsuarioFuncionario()
        {
            return $this->usuarioFuncionario;
        }

        public function setUsuarioFuncionario($user)
        {
            $this->usuarioFuncionario = $user;
        }

        public function getCargoFuncionario()
        {
            return $this->cargoFuncionario;
        }

        public function setCargoFuncionario($cargo)
        {
            $this->cargoFuncionario = $cargo;
        }

    }