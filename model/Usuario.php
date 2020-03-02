<?php
    class Usuario
    {
        private $idUsuario;
        private $emailUsuario;
        private $senhaUsuario;
        private $idTipoUsuario;

        public function getIdUsuario()
        {
            return $this->idUsuario;
        }

        public function setIdUsuario($id)
        {
            $this->idUsuario = $id;
        }

        public function getEmailUsuario()
        {
            return $this->$emailUsuario;
        }

        public function setEmailUsuario($email)
        {
            $this->$emailUsuario = $email;
        }

        public function getSenhaUsuario()
        {
            return $this->senhaUsuario;
        }

        public function setSenhaUsuario($senha)
        {
            $this->senhaUsuario = $senha;
        }

        public function getIdTipoUsuario()
        {
            return $this->$idTipoUsuario;
        }

        public function setIdTipoUsuario($id)
        {
            $this->$idTipoUsuario = $id;
        }

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
            $conxao = DB::getConn();
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
            $conxao = DB::getConn();
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