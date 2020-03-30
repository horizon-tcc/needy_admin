
<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php";

class FatorRhDAO
{


    public function getAll()
    {
        $conn = DB::getConn();
        $sql = "SELECT * FROM tbfatorrh";

        $pstm = $conn->prepare($sql);

        $pstm->execute();

        return $pstm->fetchAll();
    }
}



?>