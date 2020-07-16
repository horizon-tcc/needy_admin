<?php


    class TelefoneBancoSangueController{
        
        public static function limparSessaoBancoSangueTelefone() {

            if (session_status() == PHP_SESSION_DISABLED ) {

                session_start();
            }

            
            if ( isset($_SESSION['telefonesBancoSangue']) && !empty( $_SESSION['telefonesBancoSangue'] ) ) {


                unset( $_SESSION['telefonesBancoSangue'] );

                return true;
            }
            else {

                return false;

            }
        }
    }