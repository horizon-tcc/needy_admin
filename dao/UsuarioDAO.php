<?php
require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

class UsuarioDAO
{
    public function cadastrarUsuario($usuario)
    {
        $conexao = DB::getConn();

        $insert = "INSERT INTO tbUsuario(emailUsuario, senhaUsuario, idTipoUsuario, fotoUsuario)
                    VALUES(?, ?, ?, ?)";

        $pstm = $conexao->prepare($insert);

        $pstm->bindValue(1, $usuario->getEmailUsuario());
        $pstm->bindValue(2, $usuario->getSenhaUsuario());
        $pstm->bindValue(3, $usuario->getTipoUsuario()->getIdTipoUsuario());
        $pstm->bindValue(4, $usuario->getFotoUsuario());

        return $pstm->execute();
    }

    public static function listarUsuario()
    {
        $conexao = DB::getConn();

        $select = "SELECT * FROM tbUsuario WHERE statusUsuario != 0";

        $pstm = $conexao->prepare($select);

        $pstm->execute();

        return $pstm->fetchAll();
    }


    public function selecEditarUsuario($sessao)
    {
        $conexao = DB::getConn();

    $select = "SELECT COUNT(idUsuario) as 'resultado', idTipoUsuario FROM tbUsuario
                WHERE = ? AND ? ";

        $pstm = $conexao->prepare($select);
        $pstm->bindValue(1, $usuario->getEmailUsuario());
        $pstm->bindValue(2, $usuario->getSenhaUsuario());

        return $pstm->fetch();
    }

    public function editarUsuario($usuario)
    {
        $conexao = DB::getConn();
        $update = "UPDATE tbUsuario
                        SET emailUsuario =?, 
                            senhaUsuario =?, 
                            idTipoUsuario = ?
                        WHERE idUsuario = ?";

        $pstm = $conexao->prepare($update);

        $pstm->bindValue(1, $usuario->getEmailUsuario());
        $pstm->bindValue(2, $usuario->getSenhaUsuario());
        $pstm->bindValue(3, $usuario->getIdTipoUsuario());
        $pstm->bindValue(4, $usuario->getIdUsuario());

        return $pstm->execute();

        // return '<script> alert("Update realizado com sucesso"); </script>';
    }

    public function excluirUsuario(int $id)
    {
        $conexao = DB::getConn();

        $delete = "DELETE from tbUsuario
                    WHERE idUsuario = " . (int) $id;

        $pstm = $conexao->prepare($delete);

        $pstm->execute();

        return '<script> alert("Exclusão realizada com sucesso"); </script>';
    }

    public function getUsuarioByEmail($email)
    {

        $conn = DB::getConn();

        $sql = "SELECT idUsuario, emailUsuario, senhaUsuario, fotoUsuario, 
                    tipo.idTipoUsuario, descricaoTipoUsuario
                    FROM tbusuario INNER JOIN tbTipoUsuario as tipo
                    ON tbusuario.idTipoUsuario = tipo.idTipoUsuario 
                    WHERE emailUsuario LIKE ? AND statusUsuario != 0";

        $pstm = $conn->prepare($sql);

        $pstm->bindValue(1, $email);

        $pstm->execute();

        $result = $pstm->fetchAll();



        if (count($result) > 0) {

            $usuario = new UsuarioModel();

            foreach ($result as $r) {

                $usuario->setIdUsuario($r['idUsuario']);
                $usuario->setEmailUsuario($r['emailUsuario']);
                $usuario->setSenhaUsuario($r['senhaUsuario']);
                $usuario->getTipoUsuario()->setIdTipoUsuario($r['idTipoUsuario']);
                $usuario->getTipoUsuario()->setDescricaoTipoUsuario($r['descricaoTipoUsuario']);
                $usuario->setFotoUsuario($r['fotoUsuario']);
            }

            return $usuario;
        } else {

            return null;
        }
    }



    public function verificaExistenciaEmailUsuario($email)
    {

        $conn = DB::getConn();

        $sql = "SELECT emailUsuario FROM tbusuario WHERE emailUsuario LIKE ? AND statusUsuario != 0";

        $pstm = $conn->prepare($sql);

        $pstm->bindValue(1, $email);

        $pstm->execute();

        $result = $pstm->fetchAll();

        return (count($result) > 0) ? true : false;
    }

    public function verificaExistenciaEmailUsuarioParaEdicao($usuario){

        $conn = DB::getConn();
        $sql = "SELECT * FROM tbusuario WHERE emailUsuario = ? AND statusUsuario != 0";

        $pstm = $conn->prepare( $sql );
        $pstm->bindValue(1, $usuario->getEmailUsuario());

        $pstm->execute();

        $result = $pstm->fetchAll();

        if ( count($result) === 0) {

            return false;

        } else {

            $idUsuarioRetornado = 0;

            foreach($result as $r) {

                $idUsuarioRetornado = (int) $r['idUsuario'];
            }

            if ( $idUsuarioRetornado == $usuario->getIdUsuario() ) {

                return false;
            }
            else {

                return true;
            }
        }


        

    }


    public function logar($usuario)
    {

        $conn = DB::getConn();

        $sql = 'SELECT * FROM tbusuario WHERE emailUsuario = ? AND senhaUsuario =  ? AND statusUsuario != 0';

        $prepare = $conn->prepare($sql);

        $prepare->bindValue(1, $usuario->getEmailUsuario());
        $prepare->bindValue(2, $usuario->getSenhaUsuario());

        $prepare->execute();

        $result = $prepare->fetchAll();

        if (count($result) > 0) {
        } else {
        }
    }

    public function editEmailOnly($usuario)
    {

        $conexao = DB::getConn();
        $update = "UPDATE tbusuario SET emailUsuario = ?
                   WHERE idUsuario = ? AND statusUsuario != 0";

        $pstm = $conexao->prepare($update);

        $pstm->bindValue(1, $usuario->getEmailUsuario());
        $pstm->bindValue(2, $usuario->getIdUsuario());

        return $pstm->execute();
    }

    public function getUserByIdDonnor($idDonnor){

        $conn = DB::getConn();
        $sql = "SELECT idDoador, tbdoador.idUsuario as idUser FROM tbdoador 
                INNER JOIN tbusuario
                ON tbdoador.idUsuario = tbusuario.idUsuario
                WHERE idDoador = ? AND statusUsuario != 0";

        $pstm = $conn->prepare($sql);
        
        $pstm->bindValue(1, $idDonnor);
        
        $pstm->execute();

        $result = $pstm->fetchAll();

        if (count($result) > 0){

            foreach ( $result as $r ) {

                $idRetornado = $r['idUser']; 
            }

            $usuario = $this->getUserById($idRetornado);

            return $usuario;
        }

        return null;
        
        
    }

    public function getUserById($idUser) {

        $conn = DB::getConn();
        $sql = "SELECT * FROM tbusuario 
                INNER JOIN tbtipousuario
                ON tbusuario.idTipoUsuario = tbtipousuario.idTipoUsuario
                WHERE idUsuario = ? AND statusUsuario != 0";

        $pstm = $conn->prepare($sql);
        
        $pstm->bindValue(1, $idUser);
        
        $pstm->execute();

        $result = $pstm->fetchAll();
        
        if ( count($result) > 0) {

            $usuario = new UsuarioModel();

            foreach ($result as $r) {

                $usuario->setIdUsuario($r['idUsuario']);
                $usuario->setEmailUsuario($r['emailUsuario']);
                $usuario->setSenhaUsuario($r['senhaUsuario']);
                $usuario->getTipoUsuario()->setIdTipoUsuario($r['idTipoUsuario']);
                $usuario->getTipoUsuario()->setDescricaoTipoUsuario($r['descricaoTipoUsuario']);
                $usuario->setFotoUsuario($r['fotoUsuario']);
            }

            return $usuario;

        } else {

            return null;
        }

    }



}

// $usuarioDao = new UsuarioDao();
// $user = new UsuarioModel();
// $user->setIdUsuario(3);
// $user->setEmailUsuario("nunesgustavo668@gmail.com");

// var_dump( $usuarioDao->verificaExistenciaEmailUsuarioParaEdicao($user));

// $usuarioDao = new UsuarioDAO();
// var_dump($usuarioDao->getUserByIdDonnor(2));