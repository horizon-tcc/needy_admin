<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

define("ERRO_AO_CADASTRAR_O_DOADOR", 0);
define("DOADOR_CADASTRADO_COM_SUCESSO", 1);
define("CPF_DOADOR_INVALIDO", 2);
define("CPF_RESPONSAVEL_INVALIDO", 3);
define("CEP_DOADOR_INVALIDO", 4);
define("NOME_DOADOR_INVALIDO", 5);
define("NOME_RESPONSAVEL_INVALIDO", 6);
define("DATA_NASCIMENTO_DOADOR_INVALIDA", 7);
define("DATA_NASCIMENTO_RESPONSAVEL_INVALIDA", 8);
define("TELEFONE_DOADOR_INVALIDO", 9);
define("TELEFONE_RESPONSAVEL_INVALIDO", 10);
define("IMAGEM_INVALIDA", 11);
define("SEXO_DOADOR_INVALIDO", 12);
define("TIPO_SANGUINEO_DOADOR_INVALIDO", 13);
define("FATOR_RH_DOADOR_INVALIDO", 14);
define("RG_DOADOR_INVALIDO", 15);
define("RG_RESPONSAVEL_INVALIDO", 16);
define("LOGRADOURO_DOADOR_INVALIDO", 17);
define("BAIRRO_DOADOR_INVALIDO", 18);
define("CIDADE_DOADOR_INVALIDO", 19);
define("UF_DOADOR_INVALIDO", 20);
define("NUMERO_DOADOR_INVALIDO", 21);
define("EMAIL_DOADOR_INVALIDO", 22);
define("CPF_DOADOR_IGUAL_CPF_RESPONSAVEL", 23);

session_start();

$vetErros = [];

try {


    $doador = new Doador();

    $doadorDao = new DoadorDAO();

    $usuarioDao = new UsuarioDAO();

    if (isset($_SESSION['telefonesDoador']) && !empty($_SESSION['telefonesDoador'])) {

        $doador->setTelefones($_SESSION['telefonesDoador']);
    } else {

        $erro = array(
            "status" => TELEFONE_DOADOR_INVALIDO,
            "msg" => "Lista de telefones do doador inválida, por favor passe pelo menos um telefone válido"
        );

        array_push($vetErros, $erro);
    }


    if (
        isset($_POST['txtNomeDoador']) && !empty($_POST['txtNomeDoador'])
        && ValidacaoController::validarNome($_POST['txtNomeDoador'])
    ) {

        $doador->setNome($_POST['txtNomeDoador']);
    } else {

        $erro = array(
            "status" => NOME_DOADOR_INVALIDO,
            "msg" => "Nome inválido, por favor passe um nome válido"
        );

        array_push($vetErros, $erro);
    }

    if (
        isset($_POST['seSexo']) && !empty($_POST['seSexo'])
        && ValidacaoController::validarSexo($_POST['seSexo'])
    ) {

        $doador->getSexo()->setIdSexo($_POST['seSexo']);
    } else {

        $erro = array(
            "status" => SEXO_DOADOR_INVALIDO,
            "msg" => "Sexo inválido, por favor passe um sexo válido"
        );

        array_push($vetErros, $erro);
    }


    if (
        isset($_POST['txtDataNascimento']) && !empty($_POST['txtDataNascimento'])
        && ValidacaoDoadorController::validarDataDoador($_POST['txtDataNascimento'])
    ) {

        $doador->setDataNasc($_POST['txtDataNascimento']);
    } else {

        $erro = array(
            "status" => DATA_NASCIMENTO_DOADOR_INVALIDA,
            "msg" => "A data de nascimento do doador está inválida, por favor passe uma data válida (entre 16 e 69 anos)"
        );

        array_push($vetErros, $erro);
    }


    if (
        isset($_POST['seTipoSanguineo']) && !empty($_POST['seTipoSanguineo'])
        && ValidacaoController::validarTipoSanguineo($_POST['seTipoSanguineo'])
    ) {


        $doador->getTipoSanguineo()->setIdTipoSanguineo($_POST['seTipoSanguineo']);
    } else {

        $erro = array(
            "status" => TIPO_SANGUINEO_DOADOR_INVALIDO,
            "msg" => "O tipo sanguíneo do doador está inválido, por favor passe um tipo sanguíneo válido"
        );

        array_push($vetErros, $erro);
    }

    if (
        isset($_POST['seFatorRh']) && !empty($_POST['seFatorRh'])
        && ValidacaoController::validarTipoFatorRh($_POST['seFatorRh'])
    ) {

        $doador->getFatorRh()->setIdFatorRh($_POST['seFatorRh']);
    } else {

        $erro = array(
            "status" => FATOR_RH_DOADOR_INVALIDO,
            "msg" => "O fator RH do doador está inválido, por favor passe um fator RH válido"
        );

        array_push($vetErros, $erro);
    }


    if (
        isset($_POST['txtCpfDoador']) && !empty($_POST['txtCpfDoador'])
        && ValidacaoController::validarCpf($_POST['txtCpfDoador']) &&
        !$doadorDao->verificarExistenciaCpfDoador($_POST['txtCpfDoador'])
    ) {

        $doador->setCpf($_POST['txtCpfDoador']);
    } else {

        $erro = array(
            "status" => CPF_DOADOR_INVALIDO,
            "msg" => "O CPF do doador está inválido, por favor passe um CPF válido"
        );

        array_push($vetErros, $erro);
    }

    if (
        isset($_POST['txtRgDoador']) && !empty($_POST['txtRgDoador'])
    ) {
        $doador->setRg($_POST['txtRgDoador']);
    } else {

        $erro = array(
            "status" => RG_DOADOR_INVALIDO,
            "msg" => "O RG do doador está inválido, por favor passe um RG válido"
        );

        array_push($vetErros, $erro);
    }


    if (isset($_POST['txtCep']) && !empty($_POST['txtCep'])) {

        $vetResult = ValidacaoController::validarCep($_POST['txtCep']);

        if ($vetResult["sucesso"]) {

            $doador->getEndereco()->setCEP($_POST['txtCep']);
        } else {

            $erro = array(
                "status" => CEP_DOADOR_INVALIDO,
                "msg" => "O CEP está inválido, por favor passe um CEP válido"
            );

            array_push($vetErros, $erro);
        }
    } else {

        $erro = array(
            "status" => CEP_DOADOR_INVALIDO,
            "msg" => "O CEP está inválido, por favor passe um CEP válido"
        );

        array_push($vetErros, $erro);
    }

    if (isset($_POST['txtLogradouro']) && !empty($_POST['txtLogradouro'])) {

        $doador->getEndereco()->setLogradouro($_POST['txtLogradouro']);
    } else {

        $erro = array(
            "status" => LOGRADOURO_DOADOR_INVALIDO,
            "msg" => "O logradouro está inválido, por favor passe um logradouro válido"
        );

        array_push($vetErros, $erro);
    }


    if (isset($_POST['txtBairro']) && !empty($_POST['txtBairro'])) {

        $doador->getEndereco()->setBairro($_POST['txtBairro']);
    } else {

        $erro = array(
            "status" => BAIRRO_DOADOR_INVALIDO,
            "msg" => "O Bairro está inválido, por favor passe um Bairro válido"
        );

        array_push($vetErros, $erro);
    }


    if (isset($_POST['txtCidade']) && !empty($_POST['txtCidade'])) {

        $doador->getEndereco()->setCidade($_POST['txtCidade']);
    } else {

        $erro = array(
            "status" => CIDADE_DOADOR_INVALIDO,
            "msg" => "A cidade está inválida, por favor passe uma cidade válida"
        );

        array_push($vetErros, $erro);
    }

    if (isset($_POST['txtUf']) && !empty($_POST['txtUf'])) {

        $doador->getEndereco()->setUf($_POST['txtUf']);
    } else {

        $erro = array(
            "status" => UF_DOADOR_INVALIDO,
            "msg" => "O UF está inválido, por favor passe um UF válido"
        );

        array_push($vetErros, $erro);
    }

    if (isset($_POST['txtNumero']) && !empty($_POST['txtNumero'])) {

        $doador->getEndereco()->setNumero($_POST['txtNumero']);
    } else {

        $erro = array(
            "status" => NUMERO_DOADOR_INVALIDO,
            "msg" => "O número do endereço está inválido, por favor passe um número válido"
        );

        array_push($vetErros, $erro);
    }

    $doador->getEndereco()->setComplemento($_POST['txtComplemento']);

    if (
        isset($_POST['txtEmail']) && !empty($_POST['txtEmail'])
        && ValidacaoController::validarEmail($_POST['txtEmail']) &&
        !$usuarioDao->verificaExistenciaEmailUsuario($_POST['txtEmail'])
    ) {

        $doador->getUsuario()->setEmailUsuario($_POST['txtEmail']);
    } else {

        $erro = array(
            "status" => EMAIL_DOADOR_INVALIDO,
            "msg" => "O email está inválido, por favor passe um email válido"
        );

        array_push($vetErros, $erro);
    }

    try {

        if (isset($_FILES['imgDoador']) && !empty($_FILES['imgDoador'])) {

            $array = explode(".", $_FILES['imgDoador']['name']);

            $nome = "";
            $extensao = "";

            for ($i = 0; $i < count($array); $i++) {

                if ($i == count($array) - 1) {
                    $extensao = strtolower($array[$i]);
                }

                $nome = $nome . $array[$i];
            }

            $nomeCompleto = $nome . $extensao;

            $novoNome = md5(($doador->getCpf() . $doador->getRg()) . time()) . "." . $extensao;

            move_uploaded_file($_FILES['imgDoador']['tmp_name'], __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".."
                . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "img_doadores" . DIRECTORY_SEPARATOR . $novoNome);

            $doador->getUsuario()->setFotoUsuario($novoNome);
        } else {

            $erro = array(
                "status" => IMAGEM_INVALIDA,
                "msg" => "A imagem do doador está inválida, por favor passe uma imagem válida"
            );

            array_push($vetErros, $erro);
        }
    } catch (Exception $ex) {

        $erro = array(
            "status" => IMAGEM_INVALIDA,
            "msg" => "A imagem do doador está inválida, por favor passe uma imagem válida"
        );

        array_push($vetErros, $erro);
    }


    $doador->getUsuario()->setSenhaUsuario(UsuarioUtil::gerarSenhaUsuario(7, true, true, true, true));
    $doador->getUsuario()->getTipoUsuario()->setIdTipoUsuario(DOADOR);


    $dataAtual = new DateTime();
    $dataNascimento = new DateTime($doador->getDataNasc());
    $idadeDoador = $dataAtual->diff($dataNascimento);


    if ((int) $idadeDoador->format("%y") < 18) {

        $responsavel = new Responsavel();
        $responsavelDao = new ResponsavelDAO();

        if (
            isset($_POST['hdIdSelectedResponsible']) && !empty($_POST['hdIdSelectedResponsible'])
            && (int) $_POST['hdIdSelectedResponsible'] > 0
        ) {


            if (count($vetErros) == 0) {

                $doador->setResponsavel($responsavelDao->getResponsavelById($_POST['hdIdSelectedResponsible']));

                $usuarioDao->cadastrarUsuario($doador->getUsuario());

                $doador->setUsuario($usuarioDao->getUsuarioByEmail($doador->getUsuario()->getEmailUsuario()));
                $doadorDao->cadastrar($doador);

                $doador = $doadorDao->getDoadorByCpf($doador->getCpf());

                $doador->setTelefones($_SESSION['telefonesDoador']);

                $telefoneDoadorDao = new TelefoneDoadorDAO();
                $telefoneDoadorDao->cadastrar($doador);


                $resposta = array("status" => DOADOR_CADASTRADO_COM_SUCESSO);

                echo json_encode($resposta);
            } else {

                $resposta = array("status" => ERRO_AO_CADASTRAR_O_DOADOR);
                array_push($vetErros, $resposta);
                echo json_encode($vetErros);
            }
        } else {



            if (
                isset($_POST['txtNomeResponsavel'])
                && !empty($_POST['txtNomeResponsavel'])
                && ValidacaoController::validarNome($_POST['txtNomeResponsavel'])

            ) {

                $responsavel->setNome($_POST['txtNomeResponsavel']);
            } else {

                $erro = array(
                    "status" => NOME_RESPONSAVEL_INVALIDO,
                    "msg" => "O nome do responsável está inválido, por favor passe um nome válido"
                );

                array_push($vetErros, $erro);
            }

            if (
                isset($_POST['txtDataNascimentoResponsavel']) &&
                !empty($_POST['txtDataNascimentoResponsavel']) &&
                ValidacaoResponsavelController::validarDataResponsavel($_POST['txtDataNascimentoResponsavel'])
            ) {

                $responsavel->setDataNasc($_POST['txtDataNascimentoResponsavel']);
            } else {

                $erro = array(
                    "status" => DATA_NASCIMENTO_RESPONSAVEL_INVALIDA,
                    "msg" => "A data de nascimento do responsável está inválida, por favor passe uma data válida"
                );

                array_push($vetErros, $erro);
            }

            if (
                isset($_POST['txtCpfResponsavel'])
                && !empty($_POST['txtCpfResponsavel'])
                && ValidacaoController::validarCpf($_POST['txtCpfResponsavel']) &&
                !$responsavelDao->verificarExistenciaCpfResponsavel($_POST['txtCpfResponsavel'])
            ) {

                $responsavel->setCpf($_POST['txtCpfResponsavel']);
            } else {

                $erro = array(
                    "status" => CPF_RESPONSAVEL_INVALIDO,
                    "msg" => "O CPF do responsável está inválido, por favor passe um CPF válido"
                );

                array_push($vetErros, $erro);
            }


            if (isset($_POST['txtRgResponsavel']) && !empty($_POST['txtRgResponsavel'])) {

                $responsavel->setRg($_POST['txtRgResponsavel']);
            } else {


                $erro = array(
                    "status" => RG_RESPONSAVEL_INVALIDO,
                    "msg" => "O RG do responsável está inválido, por favor passe um RG válido"
                );

                array_push($vetErros, $erro);
            }

            if (isset($_SESSION['telefonesResponsavel']) && !empty($_SESSION['telefonesResponsavel'])) {

                $responsavel->setTelefones($_SESSION['telefonesResponsavel']);
            } else {

                $erro = array(
                    "status" => TELEFONE_RESPONSAVEL_INVALIDO,
                    "msg" => "A lista de telefones do responsável está inválida, por favor passe pelo menos um telefone válido válido"
                );

                array_push($vetErros, $erro);
            }

            $doador->setResponsavel($responsavel);

            if ($doador->getCpf() == $doador->getResponsavel()->getCpf()) {

                $erro = array(
                    "status" => CPF_DOADOR_IGUAL_CPF_RESPONSAVEL,
                    "msg" => "O CPF do doador não pode ser igual ao CPF do responsável"
                );

                array_push($vetErros, $erro);
            }

            if (count($vetErros) == 0) {

                $responsavelDao->cadastrar($doador->getResponsavel());
                $doador->setResponsavel($responsavelDao->getResponsavelByCpf($doador->getResponsavel()->getCpf()));

                $usuarioDao->cadastrarUsuario($doador->getUsuario());

                $doador->setUsuario($usuarioDao->getUsuarioByEmail($doador->getUsuario()->getEmailUsuario()));
                $doadorDao->cadastrar($doador);

                $doador = $doadorDao->getDoadorByCpf($doador->getCpf());

                $doador->getResponsavel()->setTelefones($_SESSION['telefonesResponsavel']);
                $doador->setTelefones($_SESSION['telefonesDoador']);

                $telefoneDoadorDao = new TelefoneDoadorDAO();
                $telefoneResponsavelDao = new TelefoneResponsavelDAO();

                $telefoneDoadorDao->cadastrar($doador);
                $telefoneResponsavelDao->cadastrar($doador->getResponsavel());


                $resposta = array("status" => DOADOR_CADASTRADO_COM_SUCESSO);

                echo json_encode($resposta);
            } else {

                $resposta = array("status" => ERRO_AO_CADASTRAR_O_DOADOR);
                array_push($vetErros, $resposta);
                echo json_encode($vetErros);
            }
        }
    } else {

        if (count($vetErros) == 0) {


            $telefoneDoadorDao = new TelefoneDoadorDAO();

            $usuarioDao->cadastrarUsuario($doador->getUsuario());

            $doador->setUsuario(
                $usuarioDao->getUsuarioByEmail(
                    $doador->getUsuario()->getEmailUsuario()
                )
            );

            $doadorDao->cadastrar($doador);

            $doador = $doadorDao->getDoadorByCpf($doador->getCpf());
            $doador->setTelefones($_SESSION['telefonesDoador']);

            $telefoneDoadorDao->cadastrar($doador);


            $resposta = array("status" => DOADOR_CADASTRADO_COM_SUCESSO);

            echo json_encode($resposta);
        } else {
            $resposta = array("status" => ERRO_AO_CADASTRAR_O_DOADOR);
            array_push($vetErros, $resposta);
            echo json_encode($vetErros);
        }
    }
} catch (Exception $ex) {


    $resposta = array("status" => ERRO_AO_CADASTRAR_O_DOADOR);
    echo json_encode($resposta);
}
