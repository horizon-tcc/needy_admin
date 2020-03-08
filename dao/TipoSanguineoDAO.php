
<?php 
     require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR."global.php";

    class TipoSanguineoDAO{

        public function getAll(){

           $conn = DB::getConn();
           
           $sql = "SELECT * FROM tbtiposanguineo";
           
           $pstm = $conn->prepare($sql);
           
           $pstm->execute();
           return $pstm->fetchAll();

        }
    }


?>