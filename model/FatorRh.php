<?php

    class FatorRh 
    {

        public static function listarFatorRh(){
            $conxao = DB::getConn();
            $select = "select idFatorRh, descricaoFatorRh FROM tbFatorRh";
            $rCargo = $conexao->query($select);
            $rCargo->execute();
            $lista = $rCargo->fetchAll();
            return $lista;
        }

    }