<?php

    require_once (__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR ."global.php");


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

            return '<script> alert("Registro realizado com sucesso"); </script>';
        }

        public static function listarFuncionario()
        {
            
            $conexao = DB::getConn();

            $select = "SELECT idFuncionario, nomeFuncionario, cpfFuncionario, rgFuncionario, 
                        nomeBancoSangue, emailUsuario, descricaoCargoFuncionario FROM tbFuncionario
                        INNER JOIN tbBancoSangue
                            ON tbFuncionario.idBancoSangue = tbBancoSangue.idBancoSangue
                                INNER JOIN tbUsuario
                                    ON tbFuncionario.idUsuario = tbUsuario.idUsuario
                                        INNER JOIN tbCargoFuncionario
                                            ON tbFuncionario.idCargoFuncionario = tbCargoFuncionario.idCargoFuncionario";

            $putm = $conexao->prepare($select);

            $putm->execute();

            $lista = $putm->fetchAll();

            return $lista;
        }

        public static function selecEditarFuncionario(int $id)
        {
            $conexao = DB::getConn();

            $select = "SELECT * FROM tbFuncionario
                       WHERE =".(int)$id;

            $putm = $conexao->prepare($select);

            $selec= $putm->fetch();

            return $selec;
        }

        public function editarFuncionario($funcionario)
        {
            $conexao = DB::getConn();
            $update = "UPDATE tbFuncionario
                        SET nomeFuncionario = '?',
                            cpfFuncionario = '?',
                            rgFuncionario = '?', 
                            idBancoSangue = ?,
                            idUsuario = ?,
                            idCargoFuncionario = ?
                        WHERE idPaciente = ?";

            $pstm= $conexao->prepare($update);

            $pstm->bindValue(1, $funcionario->getNomeFuncionario());
            $pstm->bindValue(2, $funcionario->getCpfFuncionario());
            $pstm->bindValue(3, $funcionario->getRgFuncionario());
            $pstm->bindValue(4, $funcionario->getIdBancoSangue());
            $pstm->bindValue(5, $funcionario->getIdUsuario());
            $pstm->bindValue(6, $funcionario->getIdCargoFuncionario());
            $pstm->bindValue(7, $funcionario->getIdFuncionario());

            $pstm->execute();
            return '<script>
                        alert(Update realizado com sucesso);
                        window.location.replace("../../view/funcionario.php");
                    </script>';
        }

        public function excluirFuncionario(int $id)
        {
            $conexao = DB::getConn();

            $delete = "delete from tbFuncionario
                       where idFuncionario = ".(int)$id;

            $conexao->exec($delete);

            return '<script> alert("Exclusão realizado com sucesso");</script>';
        }
    }