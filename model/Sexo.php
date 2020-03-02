<?php

    class Sexo 
    {
        public static function listarSexo(){
            $conxao = DB::getConn();
            $select = "select idSexo, descricaoSexo FROM tbSexo";
            $rCargo = $conexao->query($select);
            $rCargo->execute();
            $lista = $rCargo->fetchAll();
            return $lista;
        }
    }