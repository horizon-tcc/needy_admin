
<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR ."global.php";  

    class DoadorDAO{

        public function cadastrar($doador) {
    
            $conn = DB::getConn();

            $sql = "INSERT INTO tbdoador
            ( nomeDoador, idResponsavel, idSexo, dataNascimentoDoador, 
              idFatorRh, idTipoSanguineo, cpfDoador, rgDoador, logradouroDoador,
              bairroDoador, cepDoador, numeroEndDoador, complementoEndDoador,
              cidadeDoador, ufDoador, idUsuario )
            VALUES(?, ?, ?, ? , ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)" ;

            $pstm = $conn->prepare($sql);

            $pstm->bindValue(1, $doador->getNome());

            $pstm->bindValue(2, ($doador->getResponsavel() != null) 
            ?  $doador->getResponsavel()->getIdResponsavel() : 0);

            $pstm->bindValue(3, $doador->getSexo()->getIdSexo());

            $pstm->bindValue(4, $doador->getDataNasc());

            $pstm->bindValue(5, $doador->getFatorRh()->getIdFatorRh());

            $pstm->bindValue(6, $doador->getTipoSanguineo()->getIdTipoSanguineo());

            $pstm->bindValue(7, $doador->getCpf());

            $pstm->bindValue(8, $doador->getRg());

            $pstm->bindValue(9, $doador->getEndereco()->getLogradouro());

            $pstm->bindValue(10, $doador->getEndereco()->getBairro());

            $pstm->bindValue(11, $doador->getEndereco()->getCEP());

            $pstm->bindValue(12, $doador->getEndereco()->getNumero());

            $pstm->bindValue(13, $doador->getEndereco()->getComplemento());

            $pstm->bindValue(14, $doador->getEndereco()->getCidade());

            $pstm->bindValue(15, $doador->getEndereco()->getUF());

            $pstm->bindValue(16, $doador->getUsuario()->getIdUsuario());


            return $pstm->execute();


        }


        public function verificarExistenciaCpfDoador($cpf){

            $conn = DB::getConn();

            $sql = "SELECT cpfDoador FROM tbdoador WHERE cpfDoador LIKE ?";

            $pstm = $conn->prepare($sql);

            $pstm->bindValue(1, $cpf);

            $pstm->execute();

            return ( count( $pstm->fetchAll() ) > 0) ? true : false; 

        }

        

    }
