<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

define("ERRO", 0);
define("SUCESSO", 1);
define("CPF_DOADOR_INVALIDO", 2);
define("CPF_RESPONSAVEL_INVALIDO", 3);
define("CEP_INVALIDO", 4);
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

session_start();

$vetErros = [];

$doador = new Doador();

if (isset($_SESSION['telefonesDoador']) && !empty($_SESSION['telefonesDoador'])) {

    $doador->setTelefones($_SESSION['telefonesDoador']);
} else {

    $erro = array(
        "status" => TELEFONE_DOADOR_INVALIDO,
        "msg" => "Lista de telefones do doador inválida, por favor passe pelo menos um telefone"
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


    $doador->getTipoSanguineo()->setDescricaoTipoSanguineo($_POST['seTipoSanguineo']);
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

    $doador->getFatorRh()->setDescricaoFatorRh($_POST['seFatorRh']);
} else {

    $erro = array(
        "status" => FATOR_RH_DOADOR_INVALIDO,
        "msg" => "O fator RH do doador está inválido, por favor passe um fator RH válido"
    );

    array_push($vetErros, $erro);
}


if (
    isset($_POST['txtCpfDoador']) && !empty($_POST['txtCpfDoador'])
    && ValidacaoController::validarCpf($_POST['txtCpfDoador'])
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

    $vetResult = json_decode(ValidacaoController::validarCep($_POST['txtCep']), true);

    if ($vetResult["sucesso"]) {

        $doador->getEndereco()->setCEP($_POST['txtCep']);
    } else {

        $erro = array(
            "status" => CEP_INVALIDO,
            "msg" => "O CEP está inválido, por favor passe um CEP válido"
        );

        array_push($vetErros, $erro);
    }
} else {

    $erro = array(
        "status" => CEP_INVALIDO,
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

if (
    isset($_POST['txtEmail']) && !empty($_POST['txtEmail'])
    && ValidacaoController::validarEmail($_POST['txtEmail'])
) {

    $doador->setEmail($_POST['txtEmail']);
} else {

    $erro = array(
        "status" => EMAIL_DOADOR_INVALIDO,
        "msg" => "O número do endereço está inválido, por favor passe um número válido"
    );

    array_push($vetErros, $erro);
}

try {

    if (isset($_FILES['imgDoador']) && !empty($_POST['imgDoador'])) {

        $array = explode(".", $_FILES['imgDoador']['name']);

        $nome = "";
        $extensao = "";

        for ($i = 0; $i < count($array); $i++) {

            if ($i == count($array) - 1) {
                $extensao = strtolower($array[$i]);
            }

            $nome += $array[$i];
        }

        $nomeCompleto = $nome . $extensao;

        $novoNome = md5(($doador->getCpf() + $doador->getRg()) + time()) . "." . $extensao;

        move_uploaded_file($_FILES['imgDoador']['tmp_name'], __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".."
            . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "img_doadores" . DIRECTORY_SEPARATOR . $novoNome);

        $doador->setImgDoador($novoNome);
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


$dataAtual = new DateTime();
$dataNascimento = new DateTime($doador->getDataNasc());
$idadeDoador = $dataAtual->diff($dataNascimento);

if ($idadeDoador < 18) {

    $responsavel = new Responsavel();

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
        ResponsavelValidacaoController::validarDataResponsavel($_POST['txtDataNascimentoResponsavel'])
    ) {

        $doador->setDataNasc($_POST['txtDataNascimentoResponsavel']);
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
        && ValidacaoController::validarCpf($_POST['txtCpfResponsavel'])
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


    $doador->setResponsavel($responsavel);


    if (count($vetErros) == 0) {

        $doadorDao = new DoadorDAO();
        $responsavelDao = new ResponsavelDAO();

        $doadorDao->cadastrar($doador);
        $responsavelDao->cadastrar($responsavel);
    } else {
    }
} else {
}
