
<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php";

class DoadorDAO
{

    public function cadastrar($doador)
    {

        $conn = DB::getConn();

        $sql = "INSERT INTO tbdoador
            ( nomeDoador, idResponsavel, idSexo, dataNascimentoDoador, 
              idFatorRh, idTipoSanguineo, cpfDoador, rgDoador, logradouroDoador,
              bairroDoador, cepDoador, numeroEndDoador, complementoEndDoador,
              cidadeDoador, ufDoador, idUsuario )
            VALUES(?, ?, ?, ? , ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $pstm = $conn->prepare($sql);

        $pstm->bindValue(1, $doador->getNome());

        $pstm->bindValue(2, ($doador->getResponsavel() != null)
            ?  $doador->getResponsavel()->getId() : null);

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

        $pstm->bindValue(13, ($doador->getEndereco()->getComplemento() != null) ? $doador->getEndereco()->getComplemento() : null);

        $pstm->bindValue(14, $doador->getEndereco()->getCidade());

        $pstm->bindValue(15, $doador->getEndereco()->getUF());

        $pstm->bindValue(16, $doador->getUsuario()->getIdUsuario());


        return $pstm->execute();
    }

    public function getDoadorByCpf($cpf)
    {

        $conn = DB::getConn();

        $sexo = new Sexo();
        $tipoSanguineo = new TipoSanguineo();
        $fatorRh = new FatorRh();
        $usuario = new UsuarioModel();
        $responsavel = new Responsavel();


        $sql = "SELECT idDoador, nomeDoador, rgDoador, DATE_FORMAT(dataNascimentoDoador, '%d/%m/%Y') as dataNascimentoDoador, 
                cpfDoador, s.idSexo, descricaoSexo, t.idTipoSanguineo, 
                descricaoTipoSanguineo, f.idFatorRh, descricaoFatorRh,
                logradouroDoador, bairroDoador, cepDoador, numeroEndDoador,
                complementoEndDoador, cidadeDoador, ufDoador, u.idUsuario, 
                emailUsuario, fotoUsuario, tipo.idTipoUsuario, descricaoTipoUsuario,
                r.idResponsavel, nomeResponsavel, rgResponsavel, cpfResponsavel,
                DATE_FORMAT(dataNascimentoResponsavel, '%d/%m/%Y') as dataNascimentoResponsavel, statusUsuario  FROM tbdoador

                INNER JOIN tbsexo as s
                on tbdoador.idSexo = s.idSexo
                INNER JOIN tbtiposanguineo as t
                on tbdoador.idTipoSanguineo = t.idTipoSanguineo
                INNER JOIN tbfatorrh as f
                on tbdoador.idFatorRh = f.idFatorRh
                LEFT JOIN tbusuario as u
                on tbdoador.idUsuario = u.idUsuario
                LEFT JOIN tbresponsavel as r
                ON tbdoador.idResponsavel = r.idResponsavel
                left join tbtipousuario as tipo
                on u.idTipoUsuario = tipo.idTipoUsuario
                
                WHERE cpfDoador LIKE ?
                AND statusUsuario != 0";


        $pstm = $conn->prepare($sql);

        $pstm->bindValue(1, $cpf);

        $pstm->execute();

        $result = $pstm->fetchAll();
        $doador = null;

        if (count($result) > 0) {

            $doador = new Doador();

            foreach ($result as $r) {

                $doador->setId($r['idDoador']);
                $doador->setNome($r['nomeDoador']);
                $doador->setRg($r['rgDoador']);

                $sexo->setIdSexo($r['idSexo']);
                $sexo->setDescricaoSexo($r['descricaoSexo']);
                $doador->setSexo($sexo);

                $tipoSanguineo->setIdTipoSanguineo($r['idTipoSanguineo']);
                $tipoSanguineo->setDescricaoTipoSanguineo($r['descricaoTipoSanguineo']);
                $doador->setTipoSanguineo($tipoSanguineo);

                $fatorRh->setIdFatorRh($r['idFatorRh']);
                $fatorRh->setDescricaoFatorRh($r['descricaoFatorRh']);
                $doador->setFatorRh($fatorRh);

                $usuario->setEmailUsuario($r['emailUsuario']);
                $usuario->setFotoUsuario($r['fotoUsuario']);
                $usuario->getTipoUsuario()->setIdTipoUsuario($r['idTipoUsuario']);
                $usuario->getTipoUsuario()->setDescricaoTipoUsuario($r['descricaoTipoUsuario']);
                $doador->setUsuario($usuario);

                $doador->setCpf($r['cpfDoador']);
                $doador->getEndereco()->setCEP($r['cepDoador']);
                $doador->getEndereco()->setLogradouro($r['logradouroDoador']);
                $doador->getEndereco()->setBairro($r['bairroDoador']);
                $doador->getEndereco()->setNumero($r['numeroEndDoador']);
                $doador->getEndereco()->setComplemento($r['complementoEndDoador']);
                $doador->getEndereco()->setCidade($r['cidadeDoador']);
                $doador->getEndereco()->setUF($r['ufDoador']);

                $responsavel->setId($r['idResponsavel']);
                $responsavel->setNome($r['nomeResponsavel']);
                $responsavel->setCpf($r['cpfResponsavel']);
                $responsavel->setDataNasc($r['dataNascimentoResponsavel']);
                $responsavel->setRg($r['rgResponsavel']);
                $doador->setResponsavel($responsavel);
            }

            return $doador;
        } else {

            return null;
        }
    }

    public function getDonnorsByCpf($cpf)
    {
        $conn = DB::getConn();

        $sql = "SELECT idDoador, nomeDoador, rgDoador, DATE_FORMAT(dataNascimentoDoador, '%d/%m/%Y') as dataNascimentoDoador, 
                cpfDoador, s.idSexo, descricaoSexo, t.idTipoSanguineo, 
                descricaoTipoSanguineo, f.idFatorRh, descricaoFatorRh,
                logradouroDoador, bairroDoador, cepDoador, numeroEndDoador,
                complementoEndDoador, cidadeDoador, ufDoador, u.idUsuario, 
                emailUsuario, fotoUsuario, tipo.idTipoUsuario, descricaoTipoUsuario,
                r.idResponsavel, nomeResponsavel, rgResponsavel, cpfResponsavel,
                DATE_FORMAT(dataNascimentoResponsavel, '%d/%m/%Y') as dataNascimentoResponsavel, statusUsuario  FROM tbdoador

                INNER JOIN tbsexo as s
                on tbdoador.idSexo = s.idSexo
                INNER JOIN tbtiposanguineo as t
                on tbdoador.idTipoSanguineo = t.idTipoSanguineo
                INNER JOIN tbfatorrh as f
                on tbdoador.idFatorRh = f.idFatorRh
                LEFT JOIN tbusuario as u
                on tbdoador.idUsuario = u.idUsuario
                LEFT JOIN tbresponsavel as r
                ON tbdoador.idResponsavel = r.idResponsavel
                left join tbtipousuario as tipo
                on u.idTipoUsuario = tipo.idTipoUsuario
                
                WHERE cpfDoador LIKE ?
                AND statusUsuario != 0";


        $pstm = $conn->prepare($sql);

        $pstm->bindValue(1, $cpf . "%");

        $pstm->execute();

        $result = $pstm->fetchAll();

        if (count($result) > 0) {

            return $result;
        } else {

            return null;
        }
    }


    public function getDonnorsByRg($rg)
    {
        $conn = DB::getConn();

        $sql = "SELECT idDoador, nomeDoador, rgDoador, DATE_FORMAT(dataNascimentoDoador, '%d/%m/%Y') as dataNascimentoDoador, 
                cpfDoador, s.idSexo, descricaoSexo, t.idTipoSanguineo, 
                descricaoTipoSanguineo, f.idFatorRh, descricaoFatorRh,
                logradouroDoador, bairroDoador, cepDoador, numeroEndDoador,
                complementoEndDoador, cidadeDoador, ufDoador, u.idUsuario, 
                emailUsuario, fotoUsuario, tipo.idTipoUsuario, descricaoTipoUsuario,
                r.idResponsavel, nomeResponsavel, rgResponsavel, cpfResponsavel,
                DATE_FORMAT(dataNascimentoResponsavel, '%d/%m/%Y') as dataNascimentoResponsavel, statusUsuario  FROM tbdoador

                INNER JOIN tbsexo as s
                on tbdoador.idSexo = s.idSexo
                INNER JOIN tbtiposanguineo as t
                on tbdoador.idTipoSanguineo = t.idTipoSanguineo
                INNER JOIN tbfatorrh as f
                on tbdoador.idFatorRh = f.idFatorRh
                LEFT JOIN tbusuario as u
                on tbdoador.idUsuario = u.idUsuario
                LEFT JOIN tbresponsavel as r
                ON tbdoador.idResponsavel = r.idResponsavel
                left join tbtipousuario as tipo
                on u.idTipoUsuario = tipo.idTipoUsuario
                
                WHERE rgDoador LIKE ?
                AND statusUsuario != 0";


        $pstm = $conn->prepare($sql);

        $pstm->bindValue(1, $rg . "%");

        $pstm->execute();

        $result = $pstm->fetchAll();

        if (count($result) > 0) {

            return $result;
        } else {

            return null;
        }
    }

    public function getDoadorById($id)
    {

        $conn = DB::getConn();

        $sexo = new Sexo();
        $tipoSanguineo = new TipoSanguineo();
        $fatorRh = new FatorRh();
        $usuario = new UsuarioModel();
        $responsavel = new Responsavel();


        $sql = "SELECT tbdoador.idDoador, nomeDoador, rgDoador, DATE_FORMAT(dataNascimentoDoador, '%d/%m/%Y') as dataNascimentoDoador, 
        cpfDoador, s.idSexo, descricaoSexo, t.idTipoSanguineo, 
        descricaoTipoSanguineo, f.idFatorRh, descricaoFatorRh,
        logradouroDoador, bairroDoador, cepDoador, numeroEndDoador,
        complementoEndDoador, cidadeDoador, ufDoador, u.idUsuario, 
        emailUsuario, fotoUsuario, tipo.idTipoUsuario, descricaoTipoUsuario,
        r.idResponsavel, nomeResponsavel, rgResponsavel, cpfResponsavel,
        DATE_FORMAT(dataNascimentoResponsavel, '%d/%m/%Y') as dataNascimentoResponsavel, statusUsuario  FROM tbdoador

        INNER JOIN tbsexo as s
        on tbdoador.idSexo = s.idSexo
        INNER JOIN tbtiposanguineo as t
        on tbdoador.idTipoSanguineo = t.idTipoSanguineo
        INNER JOIN tbfatorrh as f
        on tbdoador.idFatorRh = f.idFatorRh
        INNER JOIN tbusuario as u
        on tbdoador.idUsuario = u.idUsuario
        LEFT JOIN tbresponsavel as r
        ON tbdoador.idResponsavel = r.idResponsavel
        INNER join tbtipousuario as tipo
        on u.idTipoUsuario = tipo.idTipoUsuario


        WHERE tbdoador.idDoador = ?
        AND statusUsuario != 0
        ";


        $pstm = $conn->prepare($sql);

        $pstm->bindValue(1, $id);

        $pstm->execute();

        $result = $pstm->fetchAll();

        $doador = null;

        if (count($result) > 0) {

            $doador = new Doador();

            foreach ($result as $r) {

                $doador->setId($r['idDoador']);
                $doador->setNome($r['nomeDoador']);
                $doador->setRg($r['rgDoador']);
                $doador->setDataNasc($r['dataNascimentoDoador']);

                $sexo->setIdSexo($r['idSexo']);
                $sexo->setDescricaoSexo($r['descricaoSexo']);
                $doador->setSexo($sexo);

                $tipoSanguineo->setIdTipoSanguineo($r['idTipoSanguineo']);
                $tipoSanguineo->setDescricaoTipoSanguineo($r['descricaoTipoSanguineo']);
                $doador->setTipoSanguineo($tipoSanguineo);

                $fatorRh->setIdFatorRh($r['idFatorRh']);
                $fatorRh->setDescricaoFatorRh($r['descricaoFatorRh']);
                $doador->setFatorRh($fatorRh);

                $usuario->setIdUsuario($r['idUsuario']);
                $usuario->setEmailUsuario($r['emailUsuario']);
                $usuario->setFotoUsuario($r['fotoUsuario']);
                $usuario->getTipoUsuario()->setIdTipoUsuario($r['idTipoUsuario']);
                $usuario->getTipoUsuario()->setDescricaoTipoUsuario($r['descricaoTipoUsuario']);
                $usuario->setStatusUsuario($r['statusUsuario']);
                $doador->setUsuario($usuario);

                $doador->setCpf($r['cpfDoador']);
                $doador->getEndereco()->setCEP($r['cepDoador']);
                $doador->getEndereco()->setLogradouro($r['logradouroDoador']);
                $doador->getEndereco()->setBairro($r['bairroDoador']);
                $doador->getEndereco()->setNumero($r['numeroEndDoador']);
                $doador->getEndereco()->setComplemento($r['complementoEndDoador']);
                $doador->getEndereco()->setCidade($r['cidadeDoador']);
                $doador->getEndereco()->setUF($r['ufDoador']);

                $responsavel->setId($r['idResponsavel']);
                $responsavel->setNome($r['nomeResponsavel']);
                $responsavel->setCpf($r['cpfResponsavel']);
                $responsavel->setDataNasc($r['dataNascimentoResponsavel']);
                $responsavel->setRg($r['rgResponsavel']);
                $doador->setResponsavel($responsavel);
            }

            $doador->setTelefones($this->getDonorPhonesById($id));
            $doador->getResponsavel()->setTelefones((new ResponsavelDAO())->getResponsiblePhonesById($doador->getResponsavel()->getId()));

            return $doador;
        } else {

            return null;
        }
    }

    public function getDonnorsByBirthDate($initialDate, $finalDate)
    {

        $conn = DB::getConn();

        $sql = "SELECT idDoador, nomeDoador, rgDoador, DATE_FORMAT(dataNascimentoDoador, '%d/%m/%Y') as dataNascimentoDoador, 
                cpfDoador, s.idSexo, descricaoSexo, t.idTipoSanguineo, 
                descricaoTipoSanguineo, f.idFatorRh, descricaoFatorRh,
                logradouroDoador, bairroDoador, cepDoador, numeroEndDoador,
                complementoEndDoador, cidadeDoador, ufDoador, u.idUsuario, 
                emailUsuario, fotoUsuario, tipo.idTipoUsuario, descricaoTipoUsuario,
                r.idResponsavel, nomeResponsavel, rgResponsavel, cpfResponsavel,
                DATE_FORMAT(dataNascimentoResponsavel, '%d/%m/%Y') as dataNascimentoResponsavel, statusUsuario  FROM tbdoador

                INNER JOIN tbsexo as s
                on tbdoador.idSexo = s.idSexo
                INNER JOIN tbtiposanguineo as t
                on tbdoador.idTipoSanguineo = t.idTipoSanguineo
                INNER JOIN tbfatorrh as f
                on tbdoador.idFatorRh = f.idFatorRh
                LEFT JOIN tbusuario as u
                on tbdoador.idUsuario = u.idUsuario
                LEFT JOIN tbresponsavel as r
                ON tbdoador.idResponsavel = r.idResponsavel
                left join tbtipousuario as tipo
                on u.idTipoUsuario = tipo.idTipoUsuario
                
                WHERE (dataNascimentoDoador BETWEEN ? AND ?)
                AND (statusUsuario != 0) ";


        $pstm = $conn->prepare($sql);

        $pstm->bindValue(1, $initialDate);
        $pstm->bindValue(2, $finalDate);

        $pstm->execute();

        $result = $pstm->fetchAll();

        if (count($result) > 0) {

            return $result;
        } else {

            return null;
        }
    }

    public function getDonnorsByEmail($email)
    {

        $conn = DB::getConn();

        $sql = "SELECT idDoador, nomeDoador, rgDoador, DATE_FORMAT(dataNascimentoDoador, '%d/%m/%Y') as dataNascimentoDoador, 
                cpfDoador, s.idSexo, descricaoSexo, t.idTipoSanguineo, 
                descricaoTipoSanguineo, f.idFatorRh, descricaoFatorRh,
                logradouroDoador, bairroDoador, cepDoador, numeroEndDoador,
                complementoEndDoador, cidadeDoador, ufDoador, u.idUsuario, 
                emailUsuario, fotoUsuario, tipo.idTipoUsuario, descricaoTipoUsuario,
                r.idResponsavel, nomeResponsavel, rgResponsavel, cpfResponsavel,
                DATE_FORMAT(dataNascimentoResponsavel, '%d/%m/%Y') as dataNascimentoResponsavel, statusUsuario  FROM tbdoador

                INNER JOIN tbsexo as s
                on tbdoador.idSexo = s.idSexo
                INNER JOIN tbtiposanguineo as t
                on tbdoador.idTipoSanguineo = t.idTipoSanguineo
                INNER JOIN tbfatorrh as f
                on tbdoador.idFatorRh = f.idFatorRh
                INNER JOIN tbusuario as u
                on tbdoador.idUsuario = u.idUsuario
                LEFT JOIN tbresponsavel as r
                ON tbdoador.idResponsavel = r.idResponsavel
                left join tbtipousuario as tipo
                on u.idTipoUsuario = tipo.idTipoUsuario
                
                WHERE emailUsuario LIKE ?
                AND statusUsuario != 0";


        $pstm = $conn->prepare($sql);

        $pstm->bindValue(1, $email . "%");

        $pstm->execute();

        $result = $pstm->fetchAll();

        if (count($result) > 0) {

            return $result;
        } else {

            return null;
        }
    }

    public function getDoadorByName($name)
    {

        $conn = DB::getConn();

        $sql = "SELECT idDoador, nomeDoador, rgDoador, DATE_FORMAT(dataNascimentoDoador, '%d/%m/%Y') as dataNascimentoDoador, 
                cpfDoador, s.idSexo, descricaoSexo, t.idTipoSanguineo, 
                descricaoTipoSanguineo, f.idFatorRh, descricaoFatorRh,
                logradouroDoador, bairroDoador, cepDoador, numeroEndDoador,
                complementoEndDoador, cidadeDoador, ufDoador, u.idUsuario, 
                emailUsuario, fotoUsuario, tipo.idTipoUsuario, descricaoTipoUsuario,
                r.idResponsavel, nomeResponsavel, rgResponsavel, cpfResponsavel,
                DATE_FORMAT(dataNascimentoResponsavel, '%d/%m/%Y') as dataNascimentoResponsavel, statusUsuario FROM tbdoador

                INNER JOIN tbsexo as s
                on tbdoador.idSexo = s.idSexo
                INNER JOIN tbtiposanguineo as t
                on tbdoador.idTipoSanguineo = t.idTipoSanguineo
                INNER JOIN tbfatorrh as f
                on tbdoador.idFatorRh = f.idFatorRh
                LEFT JOIN tbusuario as u
                on tbdoador.idUsuario = u.idUsuario
                LEFT JOIN tbresponsavel as r
                ON tbdoador.idResponsavel = r.idResponsavel
                left join tbtipousuario as tipo
                on u.idTipoUsuario = tipo.idTipoUsuario
                
                WHERE nomeDoador LIKE _utf8 ? COLLATE utf8_unicode_ci
                AND statusUsuario != 0";


        $pstm = $conn->prepare($sql);

        $pstm->bindValue(1, $name . "%");

        $pstm->execute();

        $result = $pstm->fetchAll();


        if (count($result) > 0) {

            return $result;
        } else {

            return null;
        }
    }

    public function getAll()
    {

        $conn = DB::getConn();


        $sql = "SELECT idDoador, nomeDoador, rgDoador, DATE_FORMAT(dataNascimentoDoador, '%d/%m/%Y') as dataNascimentoDoador, 
                cpfDoador, s.idSexo, descricaoSexo, t.idTipoSanguineo, 
                descricaoTipoSanguineo, f.idFatorRh, descricaoFatorRh,
                logradouroDoador, bairroDoador, cepDoador, numeroEndDoador,
                complementoEndDoador, cidadeDoador, ufDoador, u.idUsuario, 
                emailUsuario, fotoUsuario, tipo.idTipoUsuario, descricaoTipoUsuario,
                r.idResponsavel, nomeResponsavel, rgResponsavel, cpfResponsavel,
                DATE_FORMAT(dataNascimentoResponsavel, '%d/%m/%Y') as dataNascimentoResponsavel, statusUsuario  FROM tbdoador

                INNER JOIN tbsexo as s
                on tbdoador.idSexo = s.idSexo
                INNER JOIN tbtiposanguineo as t
                on tbdoador.idTipoSanguineo = t.idTipoSanguineo
                INNER JOIN tbfatorrh as f
                on tbdoador.idFatorRh = f.idFatorRh
                LEFT JOIN tbusuario as u
                on tbdoador.idUsuario = u.idUsuario
                LEFT JOIN tbresponsavel as r
                ON tbdoador.idResponsavel = r.idResponsavel
                left join tbtipousuario as tipo
                on u.idTipoUsuario = tipo.idTipoUsuario
                WHERE statusUsuario != 0";


        $pstm = $conn->prepare($sql);

        $pstm->execute();

        $result = $pstm->fetchAll();


        if (count($result) > 0) {

            return $result;
        } else {

            return null;
        }
    }


    public function verificarExistenciaCpfDoador($cpf)
    {

        $conn = DB::getConn();

        $sql = "SELECT cpfDoador, statusUsuario FROM tbdoador 
                INNER JOIN tbusuario
                ON tbdoador.idUsuario = tbusuario.idUsuario
                WHERE cpfDoador LIKE ? AND statusUsuario != 0";

        $pstm = $conn->prepare($sql);

        $pstm->bindValue(1, $cpf);

        $pstm->execute();

        return (count($pstm->fetchAll()) > 0) ? true : false;
    }

    public function verificarExistenciaCpfDoadorParaEdicao( $doador ){

        $conn = DB::getConn();
        $sql = "SELECT * FROM tbdoador 
                INNER JOIN tbusuario
                ON tbdoador.idUsuario = tbusuario.idUsuario 
                WHERE cpfDoador = ? AND statusUsuario != 0";

        $pstm = $conn->prepare( $sql );
        $pstm->bindValue(1, $doador->getCpf());

        $pstm->execute();

        $result = $pstm->fetchAll();
        
        
        if ( count($result) === 0) {

            return false;

        } else {

            $idDoadorRetornado = 0;
            
            foreach($result as $r) {
                
                $idDoadorRetornado = (int) $r['idDoador'];
            }

            if ( $idDoadorRetornado == $doador->getId() ) {

                return false;
            }
            else {

                return true;
            }
        }

    }


    public function remover($idUsuario)
    {

        $conn = DB::getConn();

        $sql = "UPDATE tbusuario set statusUsuario = ? WHERE idUsuario = ?";

        $pstm = $conn->prepare($sql);

        $pstm->bindValue(1, 0);
        $pstm->bindValue(2, $idUsuario);

        return  $pstm->execute();
    }

    public function getDonorPhonesById($id)
    {

        $conn = db::getConn();
        $sql = "SELECT * FROM tbtelefonedoador WHERE idDoador = ?";

        $pstm = $conn->prepare($sql);

        $pstm->bindValue(1, $id);

        $pstm->execute();

        return $pstm->fetchAll();
    }


    public function getDonnorsByBloodType($idBloodType)
    {

        $conn = DB::getConn();

        $sql = "SELECT idDoador, nomeDoador, rgDoador, DATE_FORMAT(dataNascimentoDoador, '%d/%m/%Y') as dataNascimentoDoador, 
                cpfDoador, s.idSexo, descricaoSexo, t.idTipoSanguineo, 
                descricaoTipoSanguineo, f.idFatorRh, descricaoFatorRh,
                logradouroDoador, bairroDoador, cepDoador, numeroEndDoador,
                complementoEndDoador, cidadeDoador, ufDoador, u.idUsuario, 
                emailUsuario, fotoUsuario, tipo.idTipoUsuario, descricaoTipoUsuario,
                r.idResponsavel, nomeResponsavel, rgResponsavel, cpfResponsavel,
                DATE_FORMAT(dataNascimentoResponsavel, '%d/%m/%Y') as dataNascimentoResponsavel, statusUsuario  FROM tbdoador

                INNER JOIN tbsexo as s
                on tbdoador.idSexo = s.idSexo
                INNER JOIN tbtiposanguineo as t
                on tbdoador.idTipoSanguineo = t.idTipoSanguineo
                INNER JOIN tbfatorrh as f
                on tbdoador.idFatorRh = f.idFatorRh
                INNER JOIN tbusuario as u
                on tbdoador.idUsuario = u.idUsuario
                LEFT JOIN tbresponsavel as r
                ON tbdoador.idResponsavel = r.idResponsavel
                left join tbtipousuario as tipo
                on u.idTipoUsuario = tipo.idTipoUsuario
                
                WHERE t.idTipoSanguineo = ?
                AND statusUsuario != 0";


        $pstm = $conn->prepare($sql);

        $pstm->bindValue(1, $idBloodType);

        $pstm->execute();

        $result = $pstm->fetchAll();

        if (count($result) > 0) {

            return $result;
        } else {

            return null;
        }
    }


    public function getDonnorsByRhFactor($idRhFactor)
    {

        $conn = DB::getConn();

        $sql = "SELECT idDoador, nomeDoador, rgDoador, DATE_FORMAT(dataNascimentoDoador, '%d/%m/%Y') as dataNascimentoDoador, 
                cpfDoador, s.idSexo, descricaoSexo, t.idTipoSanguineo, 
                descricaoTipoSanguineo, f.idFatorRh, descricaoFatorRh,
                logradouroDoador, bairroDoador, cepDoador, numeroEndDoador,
                complementoEndDoador, cidadeDoador, ufDoador, u.idUsuario, 
                emailUsuario, fotoUsuario, tipo.idTipoUsuario, descricaoTipoUsuario,
                r.idResponsavel, nomeResponsavel, rgResponsavel, cpfResponsavel,
                DATE_FORMAT(dataNascimentoResponsavel, '%d/%m/%Y') as dataNascimentoResponsavel, statusUsuario  FROM tbdoador

                INNER JOIN tbsexo as s
                on tbdoador.idSexo = s.idSexo
                INNER JOIN tbtiposanguineo as t
                on tbdoador.idTipoSanguineo = t.idTipoSanguineo
                INNER JOIN tbfatorrh as f
                on tbdoador.idFatorRh = f.idFatorRh
                INNER JOIN tbusuario as u
                on tbdoador.idUsuario = u.idUsuario
                LEFT JOIN tbresponsavel as r
                ON tbdoador.idResponsavel = r.idResponsavel
                left join tbtipousuario as tipo
                on u.idTipoUsuario = tipo.idTipoUsuario
                
                WHERE f.idFatorRh = ?
                AND statusUsuario != 0";


        $pstm = $conn->prepare($sql);

        $pstm->bindValue(1, $idRhFactor);

        $pstm->execute();

        $result = $pstm->fetchAll();

        if (count($result) > 0) {

            return $result;
        } else {

            return null;
        }
    }

    public function editar($doador)
    {
        
        $conn = DB::getConn();

        $sql = "UPDATE tbdoador SET nomeDoador = ?, idResponsavel = ?, idSexo = ?, dataNascimentoDoador = ?, 
                idFatorRh = ?, idTipoSanguineo = ?, cpfDoador = ?, rgDoador = ?, logradouroDoador = ?, 
                bairroDoador = ?, cepDoador = ?, numeroEndDoador = ?, complementoEndDoador = ?, cidadeDoador = ?, 
                ufDoador = ? WHERE idDoador = ?";

        $pstm = $conn->prepare($sql);

        $pstm->bindValue( 1, $doador->getNome() );
        $pstm->bindValue( 2, ($doador->getResponsavel() != null) ? $doador->getResponsavel()->getId() : null );
        $pstm->bindValue( 3, $doador->getSexo()->getIdSexo() );
        $pstm->bindValue( 4, $doador->getDataNasc());
        $pstm->bindValue( 5, $doador->getFatorRh()->getIdFatorRh());
        $pstm->bindValue( 6, $doador->getTipoSanguineo()->getIdTipoSanguineo());
        $pstm->bindValue( 7, $doador->getCpf());
        $pstm->bindValue( 8, $doador->getRg());
        $pstm->bindValue( 9, $doador->getEndereco()->getLogradouro());
        $pstm->bindValue( 10, $doador->getEndereco()->getBairro());
        $pstm->bindValue( 11, $doador->getEndereco()->getCEP());
        $pstm->bindValue( 12, $doador->getEndereco()->getNumero());
        $pstm->bindValue( 13, $doador->getEndereco()->getComplemento());
        $pstm->bindValue( 14, $doador->getEndereco()->getCidade());
        $pstm->bindValue( 15, $doador->getEndereco()->getUF());
        $pstm->bindValue( 16, $doador->getId());


        return $pstm->execute();
        
    }


}

// $doadorDao = new DoadorDAO();
// $doador = new Doador();

// $doador->setId(6);
// $doador->setCpf("325.905.410-31");

// echo (int) $doadorDao->verificarExistenciaCpfDoadorParaEdicao($doador);