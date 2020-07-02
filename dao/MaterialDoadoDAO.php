<?php

    class MaterialDoadoDAO{

        public function getAll(){

            $conn = DB::getConn();
            $sql ="SELECT * FROM tbmaterialdoado";
    
            $pstm = $conn->prepare($sql);
    
            $pstm->execute();
            
            return $pstm->fetchAll();
        }
    }