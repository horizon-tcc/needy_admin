<?php
    require_once __DIR__ . DIRECTORY_SEPARATOR . ".." .DIRECTORY_SEPARATOR."..". DIRECTORY_SEPARATOR ."global.php";

    class TipoSanguineoController{

        public function getAll(){
            $tipoSanguineoDao = new TipoSanguineoDAO();
            return $tipoSanguineoDao->getAll();
        }

    }

?>