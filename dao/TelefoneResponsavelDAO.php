<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR ."global.php";  

class TelefoneResponsavelDAO{


    public function cadastrar($responsavel){

        $conn = DB::getConn();
        $sql = "INSERT INTO tbtelefoneresponsavel
                ( numeroTelefoneResponsavel, idResponsavel)
                VALUES (?, ?)";

        $pstm = $conn->prepare($sql);

        
        for ($i = 0 ; $i < count($responsavel->getTelefones()); $i++){

            $pstm->bindValue(1, $responsavel->getTelefones()[$i]);
            $pstm->bindValue(2, $responsavel->getId());
            $pstm->execute();

        }

        return true;
        
 
    }

}
