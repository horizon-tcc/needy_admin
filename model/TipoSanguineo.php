<?php

use dao\DB;

    class TipoSanguineo 
    {

        public static function listarTipoSanguineo(){
            $conexao = DB::getConn();
            $select = "select idTipoSanguineo, descricaoTipoSanguineo FROM tbTipoSanguineo";
            $rCargo = $conexao->query($select);
            $rCargo->execute();
            $lista = $rCargo->fetchAll();
            return $lista;
        }

    }