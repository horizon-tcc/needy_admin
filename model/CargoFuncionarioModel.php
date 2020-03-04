<?php
    namespace model;
    
    class CargoFuncionarioModel
    {
        private $idCargoFuncionario;
        private $descricaoCargoFuncionario;

        public function getIdCargoFunc()
        {
            return $this->idCargoFuncionario;
        }

        public function setIdCargoFunc($id)
        {
            $this->idCargoFuncionario = $id;
        }

        public function getDescricaoCargoFunc()
        {
            return $this->descricaoCargoFuncionario;
        }

        public function setDescricaoCargoFunc($descricaoCargo)
        {
            $this->descricaoCargoFuncionario = $descricaoCargo;
        }

    }