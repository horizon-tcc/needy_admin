<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");


class BancoSangueDAO
{

    static public function listar($id = null)
    {
        $Conn = DB::getConn();
        $query = '';

        if (!empty($id)) {
            $query = "SELECT * FROM tbBancoSangue
                        WHERE idBancoSangue = $id";
        } else {
            $query = "SELECT * FROM tbBancoSangue";
        }

        $result = $Conn->query($query);
        $result = $result->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public static function atualizar($bancoSangue)
    {
        $Conn = DB::getConn();

        $query = "UPDATE tbBancoSangue
                        
                        SET nomeBancoSangue = :nome,
                            logradouroBancoSangue = :logradouro,
                            bairroBancoSangue = :bairro,
                            numeroEndBancoSangue = :numero,
                            complementoEndBancoSangue = :complemento,
                            cepBancoSangue = :cep,
                            ufBancoSangue = :uf,
                            cidadeBancoSangue = :cidade
                            
                            WHERE idBancoSangue = :id ";

        $query = $Conn->prepare($query);

        $query->bindValue(':nome', $bancoSangue->getNome());
        $query->bindValue(':logradouro', $bancoSangue->getEndereco()->getLogradouro());
        $query->bindValue(':bairro', $bancoSangue->getEndereco()->getBairro());
        $query->bindValue(':numero', $bancoSangue->getEndereco()->getNumero());
        $query->bindValue(':complemento', $bancoSangue->getEndereco()->getComplemento());
        $query->bindValue(':cep', $bancoSangue->getEndereco()->getCEP());
        $query->bindValue(':uf', $bancoSangue->getEndereco()->getUF());
        $query->bindValue(':cidade', $bancoSangue->getEndereco()->getCidade());
        $query->bindValue(':id', $bancoSangue->getId());

        if ($query->execute())
            return true;
        else
            return false;
    }

    public static function inserir($bancoSangue)
    {
        $Conn = DB::getConn();

        $query = "INSERT INTO tbBancoSangue(nomeBancoSangue,
                                                logradouroBancoSangue,
                                                bairroBancoSangue,
                                                numeroEndBancoSangue,
                                                complementoEndBancoSangue,
                                                cepBancoSangue,
                                                ufBancoSangue,
                                                cidadeBancoSangue)
                    VALUES (:nome,
                            :logradouro,
                            :bairro,
                            :numero,
                            :complemento,
                            :cep,
                            :uf,
                            :cidade)";

        $query = $Conn->prepare($query);

        $query->bindValue(':nome', $bancoSangue->getNome());
        $query->bindValue(':logradouro', $bancoSangue->getEndereco()->getLogradouro());
        $query->bindValue(':bairro', $bancoSangue->getEndereco()->getBairro());
        $query->bindValue(':numero', $bancoSangue->getEndereco()->getNumero());
        $query->bindValue(':complemento', $bancoSangue->getEndereco()->getComplemento());
        $query->bindValue(':cep', $bancoSangue->getEndereco()->getCEP());
        $query->bindValue(':uf', $bancoSangue->getEndereco()->getUF());
        $query->bindValue(':cidade', $bancoSangue->getEndereco()->getCidade());

        if ($query->execute())
            return true;
        else
            return false;
    }

    public static function deletar($id)
    {
        $Conn = DB::getConn();

        $query = "DELETE FROM tbBancoSangue
                        WHERE idBancoSangue = $id";

        if ($Conn->exec($query))
            return true;
        else
            return false;
    }


    public static function pegarUltimoIdBancoSangue()
    {

        $conn = DB::getConn();

        $sql = "SELECT MAX(idBancoSangue) AS 'ultimoId'  FROM tbbancosangue";

        $prepare = $conn->prepare($sql);

        $prepare->execute();

        $result = $prepare->fetchAll();

        $retorno = null;

        foreach( $result as $r ){

           $retorno = $r['ultimoId'];
        }

        return $retorno;
    }
}
