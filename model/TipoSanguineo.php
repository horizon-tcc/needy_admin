<?php

    class TipoSanguineo 
    {

        public static function listarTipoSanguineo(){
            $conxao = DB::getConn();
            $select = "select idTipoSanguineo, descricaoTipoSanguineo FROM tbTipoSanguineo";
            $rCargo = $conexao->query($select);
            $rCargo->execute();
            $lista = $rCargo->fetchAll();
            return $lista;
        }

    }