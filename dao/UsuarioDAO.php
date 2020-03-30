<?php
    require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR ."global.php";

    class UsuarioDAO extends UsuarioModel
    {
        public function cadastrarUsuario($usuario)
        {
            $conexao = DB::getConn();

            $insert = "INSERT INTO tbUsuario(emailUsuario, senhaUsuario, idTipoUsuario)
                    VALUES(?, ?, ?)";

            $pstm = $conexao->prepare($insert);

            $pstm->bindValue(1, $usuario->getEmailUsuario());
            $pstm->bindValue(2, $usuario->getSenhaUsuario());
            $pstm->bindValue(3, $usuario->getIdTipoUsuario());

            $pstm->execute();
            
            return '<script> alert("Registro realizado com sucesso"); </script>';
        }

        public static function listarUsuario()
        {
            $conexao = DB::getConn();

            $select = "SELECT * FROM tbUsuario";

            $pstm = $conexao->prepare($selec);

            $pstm->execute();

            return $pstm->fetchAll();
        }

        public static function selecEditarUsuario(int $id)
        {
            $conexao = DB::getConn();

            $select = "SELECT idUsuario, emailUsuario, senhaUsuario, idTipoUsuario FROM tbUsuario
                    WHERE =".((int)$id);

            $rCargo = $conexao->query($select);

            return $rCargo->fetch();
        }

        public function editarUsuario($usuario)
        {
            $conexao = DB::getConn();
            $update = "UPDATE tbUsuario
                        SET emailUsuario =?, 
                            senhaUsuario =?, 
                            idTipoUsuario = ?
                        WHERE idUsuario = ?";

            $pstm = $conexao->prepare($update);

            $pstm->bindValue(1, $usuario->getEmailUsuario());
            $pstm->bindValue(2, $usuario->getSenhaUsuario());
            $pstm->bindValue(3, $usuario->getIdTipoUsuario());
            $pstm->bindValue(4, $usuario->getIdUsuario());

            $pstm->execute();

            return '<script> alert("Update realizado com sucesso"); </script>';
        }

        public function excluirUsuario(int $id)
        {
            $conexao = DB::getConn();
            
            $delete = "DELETE from tbUsuario
                    WHERE idUsuario = ".(int) $id;

            $pstm = $conexao->prepare($delete);

            $pstm->execute();

            return '<script> alert("Exclusão realizada com sucesso"); </script>';
        }
    }