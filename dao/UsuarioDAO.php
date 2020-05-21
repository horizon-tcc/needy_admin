<?php
    require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR ."global.php");

    class UsuarioDAO extends UsuarioModel
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

            $select = "SELECT * FROM tbUsuario";

            $pstm = $conexao->prepare($select);

            $pstm->execute();

            return $pstm->fetchAll();
        }

        
        // public static function selecEditarUsuario(int $id)
        // {
        //     $conexao = DB::getConn();

        //     $select = "SELECT idUsuario, emailUsuario, senhaUsuario, idTipoUsuario FROM tbUsuario
        //             WHERE =".((int)$id);

        //     $rCargo = $conexao->query($select);

        //     return $rCargo->fetch();
        // }

        // public function selecEditarUsuario($sessao)
        // {
        //     $conexao = DB::getConn();

        //     $select = "SELECT COUNT(idUsuario) as 'resultado', idTipoUsuario FROM tbUsuario
        //             WHERE = ? AND ? ";
            
        //     $pstm = $conexao->prepare($select);
        //     $pstm->bindValue(1, $usuario->getEmailUsuario());
        //     $pstm->bindValue(2, $usuario->getSenhaUsuario());
            
        //     return $pstm->fetch();
        // }

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

            $pstm->execute();

            return '<script> alert("Update realizado com sucesso"); </script>';
        }

        public function excluirUsuario(int $id)
        {
            $conexao = DB::getConn();
            
            $delete = "DELETE from tbUsuario
                    WHERE idUsuario = ".(int) $id;

            $pstm = $conexao->prepare($delete);

            $pstm->execute();

            return '<script> alert("Exclusão realizada com sucesso"); </script>';
        }

        public function getUsuarioByEmail($email) {

            $conn = DB::getConn();

            $sql = "SELECT idUsuario, emailUsuario, senhaUsuario, fotoUsuario, 
                    tipo.idTipoUsuario, descricaoTipoUsuario
                    FROM tbusuario INNER JOIN tbTipoUsuario as tipo
                    ON tbusuario.idTipoUsuario = tipo.idTipoUsuario 
                    WHERE emailUsuario LIKE ?";

            $pstm = $conn->prepare($sql);

            $pstm->bindValue(1, $email);

            $pstm->execute();

            $result = $pstm->fetchAll();

            $usuario = new UsuarioModel();

            if ( count($result) > 0){

                foreach($result as $r){

                    $usuario->setIdUsuario($r['idUsuario']);
                    $usuario->setEmailUsuario($email);
                    $usuario->setSenhaUsuario($r['senhaUsuario']);
                    $usuario->getTipoUsuario()->setIdTipoUsuario($r['idTipoUsuario']);
                    $usuario->getTipoUsuario()->setDescricaoTipoUsuario($r['descricaoTipoUsuario']);
                    $usuario->setFotoUsuario($r['fotoUsuario']);

                }

                return $usuario;
            }
            else {

                return null;
            }


        }

        
    public function verificaExistenciaEmailUsuario($email){

        $conn = DB::getConn();

        $sql = "SELECT emailUsuario FROM tbusuario WHERE emailUsuario LIKE ?";

        $pstm = $conn->prepare( $sql );

        $pstm->bindValue(1, $email);

        $pstm->execute();

        $result = $pstm->fetchAll();

        return ( count($result) > 0 ) ? true : false;

    }


        public function logar($usuario) {

            $conn = DB::getConn();

            $sql ='SELECT * FROM tbusuario WHERE emailUsuario = ? AND senhaUsuario =  ? AND statusUsuario != 0';

            $prepare = $conn->prepare($sql);

            $prepare->execute();

            $result = $prepare->fetchAll();

            if (count($result) >0 ){

            } else {


            }
            

        }

        
    }