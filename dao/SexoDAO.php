<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php";

class SexoDAO
{

    public function getAll()
    {

        $conn = DB::getConn();

        $sql = "SELECT * FROM tbSexo";

        $pstm = $conn->prepare($sql);

        $pstm->execute();
        return $pstm->fetchAll();
    }

    public function verificaExistenciaPeloId($id)
    {

        $conn = DB::getConn();
        $sql = "SELECT * FROM tbSexo WHERE idSexo = ?";

        $pstm = $conn->prepare($sql);

        $pstm->bindValue(1, $id);

        $pstm->execute();

        return (count($pstm->fetchAll()) > 0) ? true : false;
    }


    public function getSexoById($id)
    {

        $conn = DB::getConn();

        $sql = "SELECT idSexo, descricaoSexo FROM tbSexo WHERE idSexo = ?";

        $pstm = $conn->prepare($sql);

        $pstm->bindValue(1, $id);

        $pstm->execute();

        $result = $pstm->fetchAll();

        if (count($result) > 0) {

            $sexo = new Sexo();

            foreach ($result as $r) {

                $sexo->setIdSexo($r["idSexo"]);
                $sexo->setDescricaoSexo($r["descricaoSexo"]);
            }

            return $sexo;
        } else {

            return null;
        }
    }
}
