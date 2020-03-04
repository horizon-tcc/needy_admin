<?php

    require_once(__DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."global.php");

    class UsuarioModel
    {
        private $idUsuario;
        private $emailUsuario;
        private $senhaUsuario;
        private $idTipoUsuario;

        public function getIdUsuario()
        {
            return $this->idUsuario;
        }

        public function setIdUsuario($id)
        {
            $this->idUsuario = $id;
        }

        public function getEmailUsuario()
        {
            return $this->emailUsuario;
        }

        public function setEmailUsuario($email)
        {
            $this->emailUsuario = $email;
        }

        public function getSenhaUsuario()
        {
            return $this->senhaUsuario;
        }

        public function setSenhaUsuario($senha)
        {
            $this->senhaUsuario = $senha;
        }

        public function getIdTipoUsuario()
        {
            return $this->idTipoUsuario;
        }

        public function setIdTipoUsuario($id)
        {
            $this->idTipoUsuario = $id;
        }

    }