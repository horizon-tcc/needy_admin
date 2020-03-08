
<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . ".." .DIRECTORY_SEPARATOR."..". DIRECTORY_SEPARATOR ."global.php";

class FatorRhController{


    public function getAll() {

        $fatorRhDao =  new FatorRhDAO();
        return $fatorRhDao->getAll();

    }

    
}

?>