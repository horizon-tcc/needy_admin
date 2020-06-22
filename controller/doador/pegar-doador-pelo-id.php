<?php

    require_once __DIR__ . DIRECTORY_SEPARATOR . ".." .DIRECTORY_SEPARATOR."..". DIRECTORY_SEPARATOR ."global.php";


    $dDao = new DoadorDAO();

    $doador = $dDao->getDoadorById($_POST['idDoador']);

    $resposta = array("nomeDoador" => $doador->getNome()
                     ,"dataNascimentoDoador" => $doador->getDataNasc()
                    ,"cpfDoador"=> $doador->getCpf()
                    ,"rgDoador" => $doador->getRg()
                    ,"descricaoSexoDoador"=> $doador->getSexo()->getDescricaoSexo()
                    ,"idSexoDoador" => $doador->getSexo()->getIdSexo()
                    , "logradouroDoador" => $doador->getEndereco()->getLogradouro()
                    , "bairroDoador" => $doador->getEndereco()->getBairro()
                    , "numeroEnderecoDoador"=> $doador->getEndereco()->getNumero()
                    , "cidadeDoador" => $doador->getEndereco()->getCidade()
                    , "estadoDoador" => $doador->getEndereco()->getUF()
                    , "cepDoador" => $doador->getEndereco()->getCEP()
                    , "complementoEnderecoDoador" => $doador->getEndereco()->getComplemento()
                    , "descricaoTipoSanguineoDoador" => $doador->getTipoSanguineo()->getDescricaoTipoSanguineo()
                    , "idTipoSanguineoDoador" => $doador->getTipoSanguineo()->getIdTipoSanguineo()
                    , "descricaoFatorRhDoador"=> $doador->getFatorRh()->getDescricaoFatorRh()
                    , "idFatorRhDoador" => $doador->getFatorRh()->getIdFatorRh()
                    , "emailDoador" => $doador->getUsuario()->getEmailUsuario()
                    , "imgDoador" => $doador->getUsuario()->getFotoUsuario()
                    , "statusUsuarioDoador" => $doador->getUsuario()->getStatusUsuario()
                    , "idResponsavelDoador" => $doador->getResponsavel()->getId()
                    , "nomeResponsavelDoador" => $doador->getResponsavel()->getNome()
                    , "cpfResponsavelDoador" => $doador->getResponsavel()->getCpf()
                    , "rgResponsavelDoador" => $doador->getResponsavel()->getRg()
                    , "dataNascimentoResponsavelDoador" => $doador->getResponsavel()->getDataNasc()                
                    , "telefonesDoador" => $doador->getTelefones()
                    , "telefonesResponsavel" => $doador->getResponsavel()->getTelefones()
                    
                );
                    
   echo json_encode($resposta);


   