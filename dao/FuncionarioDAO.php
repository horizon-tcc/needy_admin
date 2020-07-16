<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

class FuncionarioDAO
{

    public function cadastrarFuncionario($funcionario)
    {
        $conexao = DB::getConn();

        $insert = "INSERT INTO tbFuncionario(nomeFuncionario, cpfFuncionario, rgFuncionario, 
                        idBancoSangue, idUsuario, idCargoFuncionario)
                    VALUES(?,?,?,?,?,?)";

        $pstm = $conexao->prepare($insert);

        $pstm->bindValue(1, $funcionario->getNomeFuncionario());
        $pstm->bindValue(2, $funcionario->getCpfFuncionario());
        $pstm->bindValue(3, $funcionario->getRgFuncionario());
        $pstm->bindValue(4, $funcionario->getBancoSangue());
        $pstm->bindValue(5, $funcionario->getUsuarioFuncionario());
        $pstm->bindValue(6, $funcionario->getCargoFuncionario());

        $pstm->execute();
    }


    public function listarFuncionario()
    {

        $conexao = DB::getConn();

        $select = "SELECT idFuncionario, nomeFuncionario, cpfFuncionario, rgFuncionario, 
                        tbFuncionario.idBancoSangue, nomeBancoSangue, tbFuncionario.idUsuario, emailUsuario, 
                        fotoUsuario, tbFuncionario.idCargoFuncionario, descricaoCargoFuncionario FROM tbFuncionario
                        INNER JOIN tbBancoSangue
                            ON tbFuncionario.idBancoSangue = tbBancoSangue.idBancoSangue
                                INNER JOIN tbUsuario
                                    ON tbFuncionario.idUsuario = tbUsuario.idUsuario
                                        INNER JOIN tbCargoFuncionario
                                            ON tbFuncionario.idCargoFuncionario = tbCargoFuncionario.idCargoFuncionario";

        $pstm = $conexao->prepare($select);

        $pstm->execute();

        $lista = $pstm->fetchAll();

        return $lista;
    }


    public function selecEditarFuncionario(int $id)
    {
        $conexao = DB::getConn();

        $select = "SELECT idFuncionario, nomeFuncionario, cpfFuncionario, rgFuncionario, 
                        tbFuncionario.idBancoSangue, nomeBancoSangue, tbFuncionario.idUsuario, emailUsuario, 
                        fotoUsuario, tbFuncionario.idCargoFuncionario, idTipoUsuario,descricaoCargoFuncionario FROM tbFuncionario
                        INNER JOIN tbBancoSangue
                            ON tbFuncionario.idBancoSangue = tbBancoSangue.idBancoSangue
                                INNER JOIN tbUsuario
                                    ON tbFuncionario.idUsuario = tbUsuario.idUsuario
                                        INNER JOIN tbCargoFuncionario
                                            ON tbFuncionario.idCargoFuncionario = tbCargoFuncionario.idCargoFuncionario
                    WHERE idFuncionario = ?";

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


    public function editarFuncionario($funcionario)
    {
        $conexao = DB::getConn();

        $update = "UPDATE tbFuncionario
                    SET nomeFuncionario = ?,
                        cpfFuncionario = ?,
                        rgFuncionario = ?, 
                        idBancoSangue = ?,
                        idUsuario = ?,
                        idCargoFuncionario = ?
                    WHERE idFuncionario = ?";

        $pstm = $conexao->prepare($update);

        $pstm->bindValue(1, $funcionario->getNomeFuncionario());
        $pstm->bindValue(2, $funcionario->getCpfFuncionario());
        $pstm->bindValue(3, $funcionario->getRgFuncionario());
        $pstm->bindValue(4, $funcionario->getBancoSangue());
        $pstm->bindValue(5, $funcionario->getUsuarioFuncionario());
        $pstm->bindValue(6, $funcionario->getCargoFuncionario());
        $pstm->bindValue(7, $funcionario->getIdFuncionario());

        $pstm->execute();
    }


    public function excluirFuncionario($id)
    {
        $conexao = DB::getConn();

        $delete = "DELETE FROM tbFuncionario
                   WHERE idFuncionario = ?";

        $pstm = $conexao->prepare($delete);

        $pstm->bindValue(1, $id);

        $pstm->execute();
    }


    public function verificarExistenciaCpfFuncionario($cpf)
    {
        $conexao = DB::getConn();

        $select = "SELECT idFuncionario FROM tbFuncionario
                   WHERE cpfFuncionario = ?";

        $pstm = $conexao->prepare($select);

        $pstm->bindValue(1, $cpf);

        $pstm->execute();

        $resultado = $pstm->fetchAll();

        if (count($resultado) > 0) {
            return false;
        } else {
            return true;
        }
    }


    public function verificarExistenciaCpfFuncionarioUpdate($cpf, $id)
    {
        $conexao = DB::getConn();

        $select = "SELECT idFuncionario FROM tbFuncionario
                   WHERE cpfFuncionario = ?";

        $pstm = $conexao->prepare($select);

        $pstm->bindValue(1, $cpf);

        $pstm->execute();

        $resultado = $pstm->fetch();

        if (count($resultado) > 0) {
            if ($resultado['idFuncionario'] == $id) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }


    public function verificarFuncionarioId($id)
    {
        $conexao = DB::getConn();

        $statusFuncionario = "SELECT COUNT(idFuncionario) AS Resultado FROM tbFuncionario
                      WHERE idFuncionario LIKE ? ";

        $pstm = $conexao->prepare($statusFuncionario);

        $pstm->bindValue(1, $id);

        $pstm->execute();

        $resultado = $pstm->fetch();


        if ($resultado['Resultado'] < 1) {

            return false;
        } else {

            return true;
        }
    }


    public function listarFuncionarioNome($nome)
    {
        $conexao = DB::getConn();

        $select = "SELECT idFuncionario, nomeFuncionario, cpfFuncionario, rgFuncionario, 
                        nomeBancoSangue, emailUsuario, fotoUsuario, descricaoCargoFuncionario 
                        FROM tbFuncionario
                        INNER JOIN tbBancoSangue
                            ON tbFuncionario.idBancoSangue = tbBancoSangue.idBancoSangue
                                INNER JOIN tbUsuario
                                    ON tbFuncionario.idUsuario = tbUsuario.idUsuario
                                        INNER JOIN tbCargoFuncionario
                                            ON tbFuncionario.idCargoFuncionario = tbCargoFuncionario.idCargoFuncionario
                    WHERE LOWER(nomeFuncionario) LIKE ?";

        $pstm = $conexao->prepare($select);

        $pstm->bindValue(1, '%' . $nome . '%');

        $pstm->execute();

        $resposta = $pstm->fetchAll();

        if (count($resposta) > 0) {

            return $resposta;
        } else {

            return false;
        }
    }


    public function listarFuncionarioCargo($id)
    {
        $conexao = DB::getConn();

        $select = "SELECT idFuncionario, nomeFuncionario, cpfFuncionario, rgFuncionario, 
                        nomeBancoSangue, emailUsuario, fotoUsuario, descricaoCargoFuncionario 
                        FROM tbFuncionario
                        INNER JOIN tbBancoSangue
                            ON tbFuncionario.idBancoSangue = tbBancoSangue.idBancoSangue
                                INNER JOIN tbUsuario
                                    ON tbFuncionario.idUsuario = tbUsuario.idUsuario
                                        INNER JOIN tbCargoFuncionario
                                            ON tbFuncionario.idCargoFuncionario = tbCargoFuncionario.idCargoFuncionario
                    WHERE tbCargoFuncionario.idCargoFuncionario = ?";

        $pstm = $conexao->prepare($select);

        $pstm->bindValue(1, $id);

        $pstm->execute();

        $resposta = $pstm->fetchAll();

        if (count($resposta) > 0) {

            return $resposta;
        } else {

            return false;
        }
    }


    public function listarFuncionarioBanco($id)
    {
        $conexao = DB::getConn();

        $select = "SELECT idFuncionario, nomeFuncionario, cpfFuncionario, rgFuncionario, 
                        nomeBancoSangue, emailUsuario, fotoUsuario, descricaoCargoFuncionario 
                        FROM tbFuncionario
                        INNER JOIN tbBancoSangue
                            ON tbFuncionario.idBancoSangue = tbBancoSangue.idBancoSangue
                                INNER JOIN tbUsuario
                                    ON tbFuncionario.idUsuario = tbUsuario.idUsuario
                                        INNER JOIN tbCargoFuncionario
                                            ON tbFuncionario.idCargoFuncionario = tbCargoFuncionario.idCargoFuncionario
                    WHERE tbFuncionario.idBancoSangue = ?";

        $pstm = $conexao->prepare($select);

        $pstm->bindValue(1, $id);

        $pstm->execute();

        $resposta = $pstm->fetchAll();

        if (count($resposta) > 0) {

            return $resposta;
        } else {

            return false;
        }
    }

    public function listarFuncionarioCpf($cpf)
    {
        $conexao = DB::getConn();

        $select = "SELECT idFuncionario, nomeFuncionario, cpfFuncionario, rgFuncionario, 
                        nomeBancoSangue, emailUsuario, fotoUsuario, descricaoCargoFuncionario 
                        FROM tbFuncionario
                        INNER JOIN tbBancoSangue
                            ON tbFuncionario.idBancoSangue = tbBancoSangue.idBancoSangue
                                INNER JOIN tbUsuario
                                    ON tbFuncionario.idUsuario = tbUsuario.idUsuario
                                        INNER JOIN tbCargoFuncionario
                                            ON tbFuncionario.idCargoFuncionario = tbCargoFuncionario.idCargoFuncionario
                    WHERE cpfFuncionario LIKE ?";

        $pstm = $conexao->prepare($select);

        $pstm->bindValue(1, $cpf . '%');

        $pstm->execute();

        $resposta = $pstm->fetchAll();

        if (count($resposta) > 0) {

            return $resposta;
        } else {

            return false;
        }
    }


    public function listarFuncionarioRg($rg)
    {
        $conexao = DB::getConn();

        $select = "SELECT idFuncionario, nomeFuncionario, cpfFuncionario, rgFuncionario, 
                        nomeBancoSangue, emailUsuario, fotoUsuario, descricaoCargoFuncionario 
                        FROM tbFuncionario
                        INNER JOIN tbBancoSangue
                            ON tbFuncionario.idBancoSangue = tbBancoSangue.idBancoSangue
                                INNER JOIN tbUsuario
                                    ON tbFuncionario.idUsuario = tbUsuario.idUsuario
                                        INNER JOIN tbCargoFuncionario
                                            ON tbFuncionario.idCargoFuncionario = tbCargoFuncionario.idCargoFuncionario
                    WHERE rgFuncionario LIKE ?";

        $pstm = $conexao->prepare($select);

        $pstm->bindValue(1, $rg . '%');

        $pstm->execute();

        $resposta = $pstm->fetchAll();

        if (count($resposta) > 0) {

            return $resposta;
        } else {

            return false;
        }
    }


    public function listarFuncionarioEmail($email)
    {
        $conexao = DB::getConn();

        $select = "SELECT idFuncionario, nomeFuncionario, cpfFuncionario, rgFuncionario, 
                        nomeBancoSangue, emailUsuario, fotoUsuario, descricaoCargoFuncionario 
                        FROM tbFuncionario
                        INNER JOIN tbBancoSangue
                            ON tbFuncionario.idBancoSangue = tbBancoSangue.idBancoSangue
                                INNER JOIN tbUsuario
                                    ON tbFuncionario.idUsuario = tbUsuario.idUsuario
                                        INNER JOIN tbCargoFuncionario
                                            ON tbFuncionario.idCargoFuncionario = tbCargoFuncionario.idCargoFuncionario
                    WHERE emailUsuario LIKE ?";

        $pstm = $conexao->prepare($select);

        $pstm->bindValue(1, '%' . $email . '%');

        $pstm->execute();

        $resposta = $pstm->fetchAll();

        if (count($resposta) > 0) {

            return $resposta;
        } else {

            return false;
        }
    }
}
