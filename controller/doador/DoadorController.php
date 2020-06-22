<?php 

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");


    class DoadorController {


        public function getAll(){

            $dDao = new DoadorDAO();

            return $dDao->getAll();
        }

        public function getDoadorById($id) {

            $dDao = new DoadorDAO();

            return $dDao->getDoadorById($id);
            
        }


    }