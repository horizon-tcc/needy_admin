<?php
    class Paciente
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
            return $this->$nomePaciente;
        }

        public function setNomePaciente($nome)
        {
            $this->$nomePaciente = $nome;
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
            return $this->$tipoSanguineoPaciente;
        }

        public function setTipoSanguineoPaciente($id)
        {
            $this->$tipoSanguineoPaciente = $id;
        }

        public function getFatorRhPaciente()
        {
            return $this->$fatorRhPaciente;
        }

        public function setFatorRhPaciente($id)
        {
            $this->$fatorRhPaciente = $id;
        }

        public function getCpfPaciente()
        {
            return $this->$cpfPaciente;
        }

        public function setCpfPaciente($cpf)
        {
            $this->$cpfPaciente = $cpf;
        }

        public function getRgPaciente()
        {
            return $this->$rgPaciente;
        }

        public function setRgPaciente($rg)
        {
            $this->$rgPaciente = $rg;
        }

        public function cadastrarPaciente($paciente)
        {
            $conexao = DB::getConn();
            $insert = "insert into tbPaciente(nomePaciente, idSexo, idTipoSanguineo, 
                        idFatorRh, cpfPaciente, rgPaciente)
                       values('".$paciente->getNomePaciente()."', ".$paciente->getSexoPaciente().", 
                       ".$paciente->getTipoSanguineoPaciente().", ".$paciente->getFatorRhPaciente().", 
                       '".$paciente->getCpfPaciente()."', '".$paciente->getRgPaciente()."')";
            $conexao->exec($insert);
            return 'Cadastro Realizado com sucesso';
        }

        public static function listarPaciente()
        {
            $conxao = DB::getConn();
            $select = "select nomePaciente, descricaoSexo, descricaoTipoSanguineo, 
                        descricaoFatorRh, cpfPaciente, rgPaciente FROM tbPaciente
                        inner join tbSexo
                            on tbPaciente.idSexo = tbSexo.idSexo
                                inner join tbTipoSanguineo
                                    on tbPaciente.idTipoSanguineo = tbTipoSanguineo.idTipoSanguineo
                                        inner join tbFatorRh
                                            on tbPaciente.idFatorRh = tbFatorRh.idFatorRh";
            $rCargo = $conexao->query($select);
            $rCargo->execute();
            $lista = $rCargo->fetchAll();
            return $lista;
        }

        public static function selecEditarPaciente($id)
        {
            $conexao = DB::getConn();
            $select = "select * FROM tbPaciente
                       where =".((int)$id);
            $rCargo = $conexao->query($select);
            $selec= $rCargo->fetch();
            return $selec;
        }

        public function editarPaciente($paciente)
        {
            $conxao = DB::getConn();
            $update = "update tbPaciente
                        set nomePaciente ='".$paciente->getNomePaciente()."', 
                            idSexo ='".$paciente->getSexoPaciente()."',
                            idTipoSanguineo ='".$paciente->getTipoSanguineoPaciente()."',
                            idFatorRh ='".$paciente->getFatorRhPaciente()."',
                            cpfPaciente ='".$paciente->getCpfPaciente()."',
                            rgPaciente ='".$paciente->getRgPaciente()."'
                        where idPaciente =".$paciente->getIdPaciente();
            $conexao->exec($update);
            return 'Update realizado com sucesso';
        }

        public function excluirPaciente($paciente)
        {
            $conexao = DB::getConn();
            $delete = "delete from tbUsuario
                       where idUsuario = ".$usuario->getIdUsuario();
            $conexao->exec($delete);
            return 'Exclusão bem sucedida';
        }
    }