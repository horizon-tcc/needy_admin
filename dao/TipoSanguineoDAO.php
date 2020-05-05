
<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php";

class TipoSanguineoDAO
{

    public function getAll()
    {

        $conn = DB::getConn();

        $sql = "SELECT * FROM tbtiposanguineo";

        $pstm = $conn->prepare($sql);

        $pstm->execute();
        return $pstm->fetchAll();
    }

    public function verificarExistenciaPeloId($id)
    {

        $conn = DB::getConn();

        $sql = "SELECT * FROM tbtiposanguineo WHERE idTipoSanguineo = ?";

        $pstm = $conn->prepare($sql);
        $pstm->bindValue(1, $id);

        $pstm->execute();

        return (count($pstm->fetchAll()) > 0) ? true : false;
    }

    public function getTipoSanguineoById($id)
    {

        $conn = DB::getConn();

        $sql = "SELECT idTipoSanguineo, descricaoTipoSanguineo FROM tbTipoSanguineo WHERE idTipoSanguineo = ?";

        $pstm = $conn->prepare($sql);

        $pstm->bindValue(1, $id);

        $pstm->execute();

        $result = $pstm->fetchAll();

        if (count($result) > 0) {
            
            $tipoSanguineo = new TipoSanguineo();
            
            foreach($result as $r){

                $tipoSanguineo->setIdTipoSanguineo($r['idTipoSanguineo']);
                $tipoSanguineo->setDescricaoTipoSanguineo($r['descricaoTipoSanguineo']);

            }
            return $tipoSanguineo;
        } else {    
            
            return null;
        }
    }
}
