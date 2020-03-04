<?php

    require_once __DIR__.DIRECTORY_SEPARATOR."..". DIRECTORY_SEPARATOR. "global.php";

    class TipoUsuarioModel
    {
        
        public static function listarTipoUsuario(){
            $conexao = DB::getConn();
            $select = "select idTipoUsuario, descricaoTipoUsuario FROM tbTipoUsuario";
            $rCargo = $conexao->query($select);
            $rCargo->execute();
            $lista = $rCargo->fetchAll();
            return $lista;
        }

    }