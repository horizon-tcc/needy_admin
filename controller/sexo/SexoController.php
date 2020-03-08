<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . ".." .DIRECTORY_SEPARATOR."..". DIRECTORY_SEPARATOR ."global.php";

    class SexoController {

        public function getAll(){

           $sexoDao = new SexoDAO();
           return $sexoDao->getAll();
            

        }
        


    }


?>