
<?php 

define("CPF_RESPONSAVEL_INVALIDO", 0);
define("CPF_RESPONSAVEL_VALIDO", 1);


if ( isset($_POST['txtCpfResponsavel']) && !empty($_POST['txtCpfResponsavel']) ){

    $responsavelDao = new ResponsavelDAO();

   if ( !$responsavelDao->verificarExistenciaCpfResponsavel($_POST['txtCpfResponsavel'])){

        $resposta = array("status" => CPF_RESPONSAVEL_VALIDO );
        echo json_encode($resposta);
   }
   else {
        $resposta = array("status" => CPF_RESPONSAVEL_INVALIDO );
        echo json_encode($resposta);
   }    

}
else {

    $resposta = array("status" => CPF_RESPONSAVEL_INVALIDO );
        echo json_encode($resposta);
    
}

