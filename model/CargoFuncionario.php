<?php
    class CargoFuncionario
    {
        private $idCargoFuncionario;
        private $descricaoCargoFuncionario;

        public function getIdCargoFunc()
        {
            return $this->idCargoFuncionario;
        }

        public function setIdCargoFunc($id)
        {
            $this->idCargoFuncionario = $id;
        }

        public function getDescricaoCargoFunc()
        {
            return $this->$descricaoCargoFuncionario;
        }

        public function setDescricaoCargoFunc($descricaoCargo)
        {
            $this->$descricaoCargoFuncionario = $descricaoCargo;
        }

        public function cadastrarCargoFunc($cargoFunc)
        {
            $conexao = DB::getConn();
            $insert = "insert into tbCargoFuncionario(descricaoCargoFuncionario)
                       values('".$cargoFunc->getDescricaoCargoFunc()."')";
            $conexao->exec($insert);
            return 'Cadastro Realizado com sucesso';
        }

        public static function listarCargoFunc()
        {
            $conxao = DB::getConn();
            $select = "select idCargoFuncionario, descricaoCargoFuncionario FROM tbCargoFuncionario";
            $rCargo = $conexao->query($select);
            $rCargo->execute();
            $lista = $rCargo->fetchAll();
            return $lista;
        }

        public static function selecEditarCargoFunc($id)
        {
            $conexao = DB::getConn();
            $select = "select idCargoFuncionario, descricaoCargoFuncionario FROM tbCargoFuncionario
                       where =".((int)$id);
            $rCargo = $conexao->query($select);
            $selec= $rCargo->fetch();
            return $selec;
        }

        public function editarCargoFuncionario($cargoFunc)
        {
            $conxao = DB::getConn();
            $update = "update tbCargoFuncionario
                        set descricaoCargoFuncionario ='".$cargoFunc->getDescricaoCargoFunc()."'
                        where idCargoFuncionario =".$cargoFunc->getIdCargoFunc();
            $conexao->exec($update);
            return 'Update realizado com sucesso';
        }

        public function excluirCargoFuncionario($cargoFunc)
        {
            $conexao = DB::getConn();
            $delete = "delete from tbCargoFuncionario
                       where idCargoFuncionario = ".$cargoFunc->getIdCargoFunc();
            $conexao->exec($delete);
            return 'Exclusão bem sucedida';
        }
    }