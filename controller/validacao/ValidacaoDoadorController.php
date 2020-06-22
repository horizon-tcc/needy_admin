<?php


class ValidacaoDoadorController
{


    public static function validarDataDoador($data)
    {

        try {

            $dataPassada = new DateTime($data);

            $dataAux0 = new DateTime();
            $dataAux1 = new DateTime();

            $dataAux0->modify("-16 year");

            $dataAux1->modify("-69 year");

            if ($dataPassada <= $dataAux0 && $dataPassada >= $dataAux1) {

                return true;
            }

            return false;

        } catch (Exception $ex) {

            return false;
        }
    }
}
