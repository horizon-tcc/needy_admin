<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php";

class TipoUsuarioController
{

    public function getAll()
    {
        $tipoUsuarioDao = new TipoUsuarioDAO();
        return $tipoUsuarioDao->listarTipoUsuario();
    }
}