<?php
    class TipoUsuario 
    {
        
        public static function listarTipoUsuario(){
            $conxao = DB::getConn();
            $select = "select idTipoUsuario, descricaoTipoUsuario FROM tbTipoUsuario";
            $rCargo = $conexao->query($select);
            $rCargo->execute();
            $lista = $rCargo->fetchAll();
            return $lista;
        }

    }