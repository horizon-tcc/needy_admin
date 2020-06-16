<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php";

class ResponsavelDAO
{


    public function cadastrar($responsavel)
    {

        $conn = DB::getConn();
        $sql = "INSERT INTO tbresponsavel
        (nomeResponsavel, cpfResponsavel, rgResponsavel, dataNascimentoResponsavel)
        VALUES(?, ?, ?, ?)";

        $pstm  = $conn->prepare($sql);

        $pstm->bindValue(1, $responsavel->getNome());
        $pstm->bindValue(2, $responsavel->getCpf());
        $pstm->bindValue(3, $responsavel->getRg());
        $pstm->bindValue(4, $responsavel->getDataNasc());

        return $pstm->execute();
    }

    public function verificarExistenciaCpfResponsavel($cpf)
    {

        $conn = DB::getConn();

        $sql = "SELECT cpfResponsavel FROM tbresponsavel WHERE cpfResponsavel LIKE ?";

        $pstm = $conn->prepare($sql);

        $pstm->bindValue(1, $cpf);

        $pstm->execute();

        return (count($pstm->fetchAll()) > 0) ? true : false;
    }

    public function getResponsavelById($id)
    {

        if ($id != null) {


            $conn = DB::getConn();

            $sql = "SELECT * FROM tbresponsavel WHERE idResponsavel = ?";

            $pstm = $conn->prepare($sql);

            $pstm->bindValue(1, $id);

            $pstm->execute();

            $result = $pstm->fetchAll();

            if (count($result) > 0) {

                $responsavel = new Responsavel();

                foreach ($result as $r) {

                    $responsavel->setId($id);
                    $responsavel->setNome($r['nomeResponsavel']);
                    $responsavel->setCpf($r['cpfResponsavel']);
                    $responsavel->setRg($r['rgResponsavel']);
                    $responsavel->setDataNasc($r['dataNascimentoResponsavel']);
                }

                return $responsavel;
            } else {

                return null;
            }
        } else {
            return null;
        }
    }

    public function getResponsavelByCpf($cpf)
    {

        if ($cpf != null) {


            $conn = DB::getConn();

            $sql = "SELECT * FROM tbresponsavel WHERE cpfResponsavel LIKE ?";

            $pstm = $conn->prepare($sql);

            $pstm->bindValue(1, $cpf);

            $pstm->execute();

            $result = $pstm->fetchAll();

            if (count($result) > 0) {

                $responsavel = new Responsavel();

                foreach ($result as $r) {

                    $responsavel->setId($r['idResponsavel']);
                    $responsavel->setNome($r['nomeResponsavel']);
                    $responsavel->setCpf($cpf);
                    $responsavel->setRg($r['rgResponsavel']);
                    $responsavel->setDataNasc($r['dataNascimentoResponsavel']);
                }

                return $responsavel;
            } else {

                return null;
            }
        } else {
            return null;
        }
    }


    public function getResponsiblesByCpf($cpf)
    {


        if ($cpf != null) {


            $conn = DB::getConn();

            $sql = "SELECT idResponsavel, nomeResponsavel, cpfResponsavel, rgResponsavel, 
                    DATE_FORMAT(dataNascimentoResponsavel, '%d/%m/%Y') as dataNascimentoResponsavel 
                    FROM tbresponsavel WHERE cpfResponsavel LIKE ?";

            $pstm = $conn->prepare($sql);

            $pstm->bindValue(1, $cpf . "%");

            $pstm->execute();

            $result = $pstm->fetchAll();

            if ($pstm->rowCount() > 0) {

                return $result;

            } else {

                return null;
            }
        } else {
            return null;
        }
    }


    public function getResponsiblePhonesById($id)
    {

        $conn = db::getConn();
        $sql = "SELECT * FROM tbtelefoneresponsavel WHERE idResponsavel = ?";

        $pstm = $conn->prepare($sql);

        $pstm->bindValue(1, $id);

        $pstm->execute();

        return $pstm->fetchAll();
    }
}
