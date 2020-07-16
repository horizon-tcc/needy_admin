<?php 


    class TelefoneDoadorController {

        
        public static function limparSessaoDoadorTelefone() {

            if (session_status() == PHP_SESSION_DISABLED ) {

                session_start();
            }

            
            if ( isset($_SESSION['telefonesDoador']) && !empty( $_SESSION['telefonesDoador'] ) ) {


                unset( $_SESSION['telefonesDoador'] );

                return true;
            }
            else {

                return false;

            }
        }


    }
