<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

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
    }

    public function listarPaciente()
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


    public function selecEditarPaciente($id)
    {
        $conexao = DB::getConn();

        $select = "SELECT idPaciente, nomePaciente, descricaoSexo, tbPaciente.idSexo, descricaoTipoSanguineo, 
                    tbPaciente.idTipoSanguineo, descricaoFatorRh, tbPaciente.idFatorRh, cpfPaciente, rgPaciente FROM tbPaciente
                        INNER JOIN tbSexo
                            ON tbPaciente.idSexo = tbSexo.idSexo
                                INNER JOIN tbTipoSanguineo
                                    ON tbPaciente.idTipoSanguineo = tbTipoSanguineo.idTipoSanguineo
                                        INNER JOIN tbFatorRh
                                            ON tbPaciente.idFatorRh = tbFatorRh.idFatorRh;
                   WHERE =?";

        $pstm = $conexao->prepare($select);

        $pstm->bindValue(1, $id);

        $pstm->execute();

        $resposta = $pstm->fetch();

        if (count($resposta) > 0) {

            return $resposta;
        } else {

            return false;
        }
    }

    public function verificarPacienteId($id)
    {
        $conexao = DB::getConn();

        $statusPaciente = "SELECT COUNT(idPaciente) AS Resultado FROM tbPaciente
                      WHERE idPaciente LIKE ? ";

        $pstm = $conexao->prepare($statusPaciente);

        $pstm->bindValue(1, $id);

        $pstm->execute();

        $resultado = $pstm->fetch();
        

        if($resultado['Resultado'] < 1) {
    
            return false;
        
        } else {
        
            return true;
        
        }
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

        $pstm = $conexao->prepare($update);

        $pstm->bindValue(1, $paciente->getNomePaciente());
        $pstm->bindValue(2, $paciente->getSexoPaciente());
        $pstm->bindValue(3, $paciente->getTipoSanguineoPaciente());
        $pstm->bindValue(4, $paciente->getFatorRhPaciente());
        $pstm->bindValue(5, $paciente->getCpfPaciente());
        $pstm->bindValue(6, $paciente->getRgPaciente());
        $pstm->bindValue(7, $paciente->getIdPaciente());

        $pstm->execute();
    }

    public function excluirPaciente(int $id)
    {
        $conexao = DB::getConn();

        $delete = "DELETE FROM tbPaciente
                       WHERE idPaciente = ?";

        $pstm = $conexao->prepare($delete);

        $pstm->bindValue(1, $id);

        $pstm->execute();
    }

    public function verificarExistenciaCpfPaciente($cpf)
    {

        $conexao = DB::getConn();

        $statusCpf = "SELECT COUNT(idPaciente) AS Resultado FROM tbPaciente
                      WHERE cpfPaciente LIKE ? ";

        $pstm = $conexao->prepare($statusCpf);

        $pstm->bindValue(1, $cpf);

        $pstm->execute();

        $resultado = $pstm->fetch();


        if ($resultado['Resultado'] >= 1) {

            return false;
        } else {

            return true;
        }
    }

    public function verificarExistenciaCpfPacienteUpdate($cpf, $id)
    {

        $conexao = DB::getConn();

        $statusCpf = "SELECT idPaciente FROM tbPaciente
                      WHERE cpfPaciente LIKE ? ";

        $pstm = $conexao->prepare($statusCpf);

        $pstm->bindValue(1, $cpf);

        $pstm->execute();

        $resultado = $pstm->fetch();


        if (count($resultado) > 0) {
            if ($id != $resultado['idPaciente']) {

                return false;
            } else {

                return true;
            }
        } else {

            return true;
        }
    }
}
