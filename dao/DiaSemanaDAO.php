<?php

    class DiaSemanaDAO {


        public function getAll() {

            $conn = DB::getConn();

            $sql = "SELECT * FROM tbdiasemana";

            $pstm = $conn->prepare($sql);

            $pstm->execute();
            return $pstm->fetchAll();


        }
    }