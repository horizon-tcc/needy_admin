
<?php

class TipoUsuarioDAO
{

    public function listarTipoUsuario()
    {
        $conexao = DB::getConn();

        $select = "SELECT * FROM tbTipoUsuario";

        $pstm = $conexao->prepare($select);

        $pstm->execute();

        $lista = $pstm->fetchAll();

        return $lista;
    }

    public static function verificarExistenciaTipoUsuario($id)
    {
        $conexao = DB::getConn();

        $select = "SELECT idTipoUsuario FROM tbTipoUsuario
                    WHERE idTipoUsuario = ?";

        $pstm = $conexao->prepare($select);

        $pstm->bindValue(1, $id);

        $pstm->execute();

        $resultado = $pstm->fetch();

        if (count($resultado) > 0) {

            return true;
        } else {
            return false;
        }
    }
}