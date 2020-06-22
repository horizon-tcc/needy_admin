<?php

    require_once(__DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."global.php");

    class CargoFuncionarioDAO
    {
        public function cadastrarCargoFunc($cargoFunc)
        {
            $conexao = DB::getConn();
            $insert = "INSERT INTO tbCargoFuncionario(descricaoCargoFuncionario)
                       VALUES('".$cargoFunc->getDescricaoCargoFunc()."')";
            $conexao->exec($insert);
            return 'Cadastro Realizado com sucesso';
        }

        public function getAll()
        {
            $conexao = DB::getConn();
            $select = "SELECT idCargoFuncionario, descricaoCargoFuncionario FROM tbCargoFuncionario";

            $putm = $conexao->prepare($select);

            $putm->execute();

            $lista = $putm->fetchAll();

            return $lista;

        }

        public function selecEditarCargoFunc($id)
        {
            $conexao = DB::getConn();
            $select = "SELECT idCargoFuncionario, descricaoCargoFuncionario FROM tbCargoFuncionario
                       WHERE =".((int)$id);
                       
            $rCargo = $conexao->query($select);

            $selec= $rCargo->fetch();

            return $selec;
        }

        public function editarCargoFuncionario($cargoFunc)
        {
            $conexao = DB::getConn();
            $update = "UPDATE tbCargoFuncionario
                        SET descricaoCargoFuncionario ='".$cargoFunc->getDescricaoCargoFunc()."'
                        WHERE idCargoFuncionario =".$cargoFunc->getIdCargoFunc();
                        
            $conexao->exec($update);
            return 'Update realizado com sucesso';
        }

        public function excluirCargoFuncionario($cargoFunc)
        {
            $conexao = DB::getConn();
            $delete = "DELETE from tbCargoFuncionario
                       WHERE idCargoFuncionario = ".$cargoFunc->getIdCargoFunc();
            $conexao->exec($delete);
            return 'Exclusão bem sucedida';
        }

    }