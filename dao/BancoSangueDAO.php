<?php

require_once(__DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."global.php");

class BancoSangueDAO
{
    public static function listar($id = null)
    {
        $Conn = DB::getConn();
        $query = '';

        if ($id)
            $query = "SELECT * FROM tbBancoSangue
                    WHERE idBancoSangue = $id";
        else
            $query = "SELECT * FROM tbBancoSangue";

        $result = $Conn->query($query);
        $result = $result->fetchAll();

        return $result;
    }

    public static function atualizar($bancoSangue)
    {
        $Conn = DB::getConn();

        $query = "UPDATE tbBancoSangue
                    
                    SET nomeBancoSangue = \'$bancoSangue->nome\'
                        logradouroBancoSangue = \'$bancoSangue->endereco->logradouro\'
                        bairroBancoSangue = \'$bancoSangue->endereco->bairro\'
                        numeroEndBancoSangue = \'$bancoSangue->endereco->numero\'
                        complementoEndBancoSangue = \'$bancoSangue->endereco->complemento\'
                        cepBancoSangue = \'$bancoSangue->endereco->CEP\'
                        ufBancoSangue = \'$bancoSangue->endereco->UF\'
                        cidadeBancoSangue = \'$bancoSangue->endereco->cidade\'
                        
                        WHERE idBancoSangue = \'$bancoSangue->id\'
                 ";

        if ($Conn->exec($query))
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
                              VALUES (\'$bancoSangue->getNome()\',
                                      \'$bancoSangue->getEndereco()->getLogradouro()\',
                                      \'$bancoSangue->getEndereco()->getBairro()\',
                                      \'$bancoSangue->getEndereco()->getNumero()\',
                                      \'$bancoSangue->getEndereco()->getComplemento()\',
                                      \'$bancoSangue->getEndereco()->getCEP()\',
                                      \'$bancoSangue->getEndereco()->getUF()\',
                                      \'$bancoSangue->getEndereco()->getCidade()\')";

        if ($Conn->exec($query))
            return true;
        else
            return false;
    }

    public static function deletar($id)
    {
        $Conn = DB::getConn();

        $query = "DELETE * FROM tbBancoSangue
                    WHERE idBancoSangue = $id";

        if ($Conn->exec($query))
            return true;
        else
            return false;
    }
}