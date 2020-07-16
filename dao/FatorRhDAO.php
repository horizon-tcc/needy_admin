
<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php";

class FatorRhDAO
{

    public function getAll()
    {
        $conn = DB::getConn();
        $sql = "SELECT * FROM tbFatorRh";

        $pstm = $conn->prepare($sql);

        $pstm->execute();

        return $pstm->fetchAll();
    }

    public function verificarExistenciaPeloId($id)
    {

        $conn = DB::getConn();

        $sql = "SELECT * FROM tbFatorRh WHERE idFatorRh = ?";

        $pstm = $conn->prepare($sql);

        $pstm->bindValue(1, $id);

        $pstm->execute();

        return (count($pstm->fetchAll()) > 0) ? true : false;
    }

    public function getFatorRhById($id)
    {

        $conn = DB::getConn();

        $sql = "SELECT idFatorRh, descricaoFatorRh FROM tbFatorh WHERE idFatorRh = ?";

        $pstm = $conn->prepare($sql);

        $pstm->bindValue(1, $id);

        $pstm->execute();

        $result = $pstm->fetchAll();

        if (count($result) > 0) {

            $fatorRh = new FatorRh();

            foreach ($result as $r) {

                $fatorRh->setIdFatorRh($r['idFatorRh']);
                $fatorRh->setDescricaoFatorRh($r['descricaoFatorRh']);
            }

            return $fatorRh;
        } else {

            return null;
        }
    }
}
