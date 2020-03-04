<?php

require_once (__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR ."global.php");

    

    class PacienteDAO extends PacienteModel
    {
        
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
            $conexao = DB::getConn();
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
            $conexao = DB::getConn();
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
            $delete = "delete from tbPaciente
                       where idPaciente = ".$paciente->getIdPaciente();
            $conexao->exec($delete);
            return 'Exclusão bem sucedida';
        }
    }