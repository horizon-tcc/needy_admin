<?php

    class ResponsavelValidacaoController{

        public static function validarDataResponsavel($data){

            try {

                $dataPassada = new DateTime($data);
    
                $dataAux0 = new DateTime();
                $dataAux1 = new DateTime();
    
                $dataAux0->modify("-18 year");
    
                $dataAux1->modify("-90 year");
    
                if ($dataPassada <= $dataAux0 && $dataPassada >= $dataAux1) {
    
                    return true;
                }
    
                return false;
    
            } catch (Exception $ex) {
    
                return false;
            }
    

        }


    }