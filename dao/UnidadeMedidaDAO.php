<?php

class UnidadeMedidaDAO {


    public function getAll(){

        $conn = DB::getConn();
        $sql ="SELECT * FROM tbunidademedida";

        $pstm = $conn->prepare($sql);
        $pstm->execute();

        return $pstm->fetchAll();
    }
}
