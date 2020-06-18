<?php

    require_once (__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR ."global.php");


    class PacienteDAO
    {
        
        public function cadastrarPaciente($paciente)
        {
           $conexao = DB::getConn();
           
           $insert = "INSERT INTO tbPaciente(nomePaciente, idSexo, idTipoSanguineo, 
                    idFatorRh, cpfPaciente, rgPaciente)
           Values(?,?,?,?,?,?)";

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
            $select = "SELECT idPaciente, nomePaciente, descricaoSexo, descricaoTipoSanguineo, 
                        descricaoFatorRh, cpfPaciente, rgPaciente FROM tbPaciente
                        INNER JOIN tbSexo
                            ON tbPaciente.idSexo = tbSexo.idSexo
                                INNER JOIN tbTipoSanguineo
                                    ON tbPaciente.idTipoSanguineo = tbTipoSanguineo.idTipoSanguineo
                                        INNER JOIN tbFatorRh
                                            ON tbPaciente.idFatorRh = tbFatorRh.idFatorRh";

            $pstm = $conexao->prepare($select);

            $pstm->execute();

            return $pstm->fetchAll();
        }

        public static function selecEditarPaciente(int $id)
        {
            $conexao = DB::getConn();

            $select = "SELECT * FROM tbPaciente
                       WHERE =".(int)$id;

            $pstm = $conexao->prepare($select);
            
            $pstm->execute();

            return $rCargo->fetch();
        }

        public function editarPaciente($paciente)
        {
            $conexao = DB::getConn();

            $update = "UPDATE tbPaciente
                        SET nomePaciente = ?, 
                            idSexo = ?,
                            idTipoSanguineo = ?,
                            idFatorRh = ?,
                            cpfPaciente = ?,
                            rgPaciente = ?
                        WHERE idPaciente = ?";
                        
            $pstm = $conexao->prepare();

            $pstm->bindValue(1, $paciente->getNomePaciente());
            $pstm->bindValue(2, $paciente->getSexoPaciente());
            $pstm->bindValue(3, $paciente->getTipoSanguineoPaciente());
            $pstm->bindValue(4, $paciente->getFatorRhPaciente());
            $pstm->bindValue(5, $paciente->getCpfPaciente());
            $pstm->bindValue(6, $paciente->getRgPaciente());
            $pstm->bindValue(7, $paciente->getIdPaciente());

            $conexao->execute($update);

            return '<script>
                        alert("Update realizado com sucesso");
                    </script>';
        }

        public function excluirPaciente(int $id)
        {
            $conexao = DB::getConn();

            $delete = "DELETE FROM tbPaciente
                       WHERE idPaciente = ".(int)$id;

            $pstm = $conexao->prepare($delete);

            $pstm->execute();

            return '<script> 
                        alert("Exclusão realizado com sucesso");
                    </script>';
        }
    }