<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR ."global.php";  

class TelefoneDoadorDAO{


    public function cadastrar($doador){

        $conn = DB::getConn();
        $sql = "INSERT INTO tbtelefonedoador
                ( numeroTelefoneDoador, idDoador)
                VALUES (?, ?)";

        $pstm = $conn->prepare($sql);

        for ($i = 0 ; $i < count($doador->getTelefones()); $i++){

            $pstm->bindValue(1, $doador->getTelefones()[$i]);
            $pstm->bindValue(2, $doador->getId());
            $pstm->execute();
        }

        return true;
        
                
    }
}