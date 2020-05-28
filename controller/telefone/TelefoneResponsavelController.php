<?php 

    

class TelefoneResponsavelController {

        
    public static function limparSessaoResponsavelTelefone() {

        if (session_status() == PHP_SESSION_DISABLED ) {

            session_start();
        }

        if ( isset($_SESSION['telefonesResponsavel']) && !empty( $_SESSION['telefonesResponsavel'] ) ) {


            unset( $_SESSION['telefonesResponsavel'] );

            return true;
        }
        else {

            return false;

        }
    }


}
