<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php";

class TelefoneBancoSangueDAO
{


    public function cadastrar($banco)
    {

        $conn = DB::getConn();
        $sql = "INSERT INTO tbTelefoneBancoSangue
                ( numeroTelefoneBanco, idBancoSangue)
                VALUES (?, ?)";

        $pstm = $conn->prepare($sql);

        for ($i = 0; $i < count($banco->getTelefones()); $i++) {

            $pstm->bindValue(1, $banco->getTelefones()[$i]);
            $pstm->bindValue(2, $banco->getId());
            $pstm->execute();
        }

        return true;
    }

    public static function deletar($id)
    {
        $conn = DB::getConn();

        $sql = "DELETE FROM tbTelefoneBancoSangue WHERE idBancoSangue = ?";
        $pstm = $conn->prepare($sql);
        $pstm->bindValue(1, $id);

        return $pstm->execute();
    }
}
