<?php
    namespace model;

    class PacienteModel
    {
        private $idPaciente;
        private $nomePaciente;
        private $sexoPaciente;
        private $tipoSanguineoPaciente;
        private $fatorRhPaciente;
        private $cpfPaciente;
        private $rgPaciente;

        public function getIdPaciente()
        {
            return $this->idPaciente;
        }

        public function setIdPaciente($id)
        {
            $this->idPaciente = $id;
        }

        public function getNomePaciente()
        {
            return $this->nomePaciente;
        }

        public function setNomePaciente($nome)
        {
            $this->nomePaciente = $nome;
        }

        public function getSexoPaciente()
        {
            return $this->senhaUsuario;
        }

        public function setSexoPaciente($id)
        {
            $this->senhaUsuario = $id;
        }

        public function getTipoSanguineoPaciente()
        {
            return $this->tipoSanguineoPaciente;
        }

        public function setTipoSanguineoPaciente($id)
        {
            $this->tipoSanguineoPaciente = $id;
        }

        public function getFatorRhPaciente()
        {
            return $this->fatorRhPaciente;
        }

        public function setFatorRhPaciente($id)
        {
            $this->fatorRhPaciente = $id;
        }

        public function getCpfPaciente()
        {
            return $this->cpfPaciente;
        }

        public function setCpfPaciente($cpf)
        {
            $this->cpfPaciente = $cpf;
        }

        public function getRgPaciente()
        {
            return $this->rgPaciente;
        }

        public function setRgPaciente($rg)
        {
            $this->rgPaciente = $rg;
        }

    }