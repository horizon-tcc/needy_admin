<?php

    require_once (__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR ."global.php");


    class PacienteDAO extends PacienteModel
    {
        
        public function cadastrarPaciente($paciente)
        {
           $conexao = DB::getConn();
           $insert = "insert into tbPaciente(nomePaciente, idSexo, idTipoSanguineo, 
                    idFatorRh, cpfPaciente, rgPaciente)
           values(?,?,?,?,?,?)";

           $pstm = $conexao->prepare($insert);

           $pstm->bindValue(1, $paciente->getNomePaciente());
           $pstm->bindValue(2, $paciente->getSexoPaciente());
           $pstm->bindValue(3, $paciente->getTipoSanguineoPaciente());
           $pstm->bindValue(4, $paciente->getFatorRhPaciente());
           $pstm->bindValue(5, $paciente->getCpfPaciente());
           $pstm->bindValue(6, $paciente->getRgPaciente());
           
           $pstm->execute();
            return '<script> alert("Registro realizado com sucesso"); </script>';
        }

        public static function listarPaciente()
        {
            $conexao = DB::getConn();
            $select = "select idPaciente, nomePaciente, descricaoSexo, descricaoTipoSanguineo, 
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
                        set nomePaciente = '?', 
                            idSexo = ?,
                            idTipoSanguineo = ?,
                            idFatorRh = ?,
                            cpfPaciente = '?',
                            rgPaciente = '?'
                        where idPaciente = ?";

            $putm = $conexao->prepare($update);

            $putm->bindValue(1, $paciente->getNomePaciente());
            $putm->bindValue(2, $paciente->getSexoPaciente());
            $putm->bindValue(3, $paciente->getTipoSanguineoPaciente());
            $putm->bindValue(4, $paciente->getFatorRhPaciente());
            $putm->bindValue(5, $paciente->getCpfPaciente());
            $putm->bindValue(6, $paciente->getRgPaciente());
            $putm->bindValue(7, $paciente->getIdPaciente());

            $conexao->execute($update);
            return '<script>
                        alert(Update realizado com sucesso);
                        window.location.replace("../../view/paciente.php");
                    </script>';
        }

        public function excluirPaciente($id)
        {
            $conexao = DB::getConn();
            $delete = "delete from tbPaciente
                       where idPaciente = ".$id;
            $conexao->exec($delete);
            return '<script> alert("Exclusão realizado com sucesso");</script>';
        }
    }