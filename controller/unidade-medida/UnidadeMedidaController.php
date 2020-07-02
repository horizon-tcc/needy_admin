<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . ".." .DIRECTORY_SEPARATOR."..". DIRECTORY_SEPARATOR ."global.php";

class UnidadeMedidaController {


    public function getAll() {

        $unidadeMedidaDao = new UnidadeMedidaDAO();
        return $unidadeMedidaDao->getAll();
    }
}
