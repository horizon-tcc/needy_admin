<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR."global.php";

class TipoDoacaoDAO {


    public function getAll(){

        $conn = DB::getConn();
        $sql ="SELECT * FROM tbtipodoacao";

        $pstm = $conn->prepare($sql);

        $pstm->execute();
        
        return $pstm->fetchAll();

    }

}