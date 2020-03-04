<?php
    require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR ."global.php";

    class UsuarioDAO extends UsuarioModel
    {
        public function cadastrarUsuario($usuario)
        {
            $conexao = DB::getConn();
            $insert = "insert into tbUsuario(emailUsuario, senhaUsuario, idTipoUsuario)
                    values('".$usuario->getEmailUsuario()."', '".$usuario->getSenhaUsuario()."', 
                    ".$usuario->getIdTipoUsuario.")";
            $conexao->exec($insert);
            return 'Cadastro Realizado com sucesso';
        }

        public static function listarUsuario()
        {
            $conexao = DB::getConn();
            $select = "select idUsuario, emailUsuario, senhaUsuario, idTipoUsuario FROM tbUsuario";
            $rCargo = $conexao->query($select);
            $rCargo->execute();
            $lista = $rCargo->fetchAll();
            return $lista;
        }

        public static function selecEditarUsuario($id)
        {
            $conexao = DB::getConn();
            $select = "select idUsuario, emailUsuario, senhaUsuario, idTipoUsuario FROM tbUsuario
                    where =".((int)$id);
            $rCargo = $conexao->query($select);
            $selec= $rCargo->fetch();
            return $selec;
        }

        public function editarUsuario($usuario)
        {
            $conexao = DB::getConn();
            $update = "update tbUsuario
                        set emailUsuario ='".$usuario->getEmailUsuario()."', 
                            senhaUsuario ='".$usuario->getSenhaUsuario()."', 
                            idTipoUsuario ='".$usuario->getIdTipoUsuario()."'
                        where idUsuario =".$usuario->getIdUsuario();
            $conexao->exec($update);
            return 'Update realizado com sucesso';
        }

        public function excluirUsuario($usuario)
        {
            $conexao = DB::getConn();
            $delete = "delete from tbUsuario
                    where idUsuario = ".$usuario->getIdUsuario();
            $conexao->exec($delete);
            return 'Exclusão bem sucedida';
        }
    }