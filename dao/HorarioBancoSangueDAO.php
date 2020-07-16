<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

class HorarioBancoSangueDAO
{

    public function cadastrar($bancoSangue){

        $conn = DB::getConn();
        $sql = "INSERT INTO tbhorariofuncionamentobancosangue
                ( idBancoSangue, idDiaSemana, horarioAbertura, horarioFechamento)
                VALUES (?, ?, ?, ?)";

        $pstm = $conn->prepare($sql);

        for ($i = 0 ; $i < count($bancoSangue->getHorarios()); $i++){

            $pstm->bindValue(1, $bancoSangue->getId());
            $pstm->bindValue(2, $bancoSangue->getHorarios()[$i]['idDia']);
            $pstm->bindValue(3, $bancoSangue->getHorarios()[$i]['horarioAbertura']);
            $pstm->bindValue(4, $bancoSangue->getHorarios()[$i]['horarioFechamento']);
            $pstm->execute();
        }

        return true;
        
    }


}
