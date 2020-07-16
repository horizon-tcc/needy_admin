<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

define("ERRO_AO_CADADASTRAR_O_BANCO_DE_SANGUE", 0);
define("SUCESSO_AO_CADASTRAR_O_BANCO_DE_SANGUE", 1);
define("ERRO_NO_UPLOAD_DE_IMAGENS", 2);

$vetErros = array();

if (session_status() != PHP_SESSION_ACTIVE) {

    session_start();
}

$enderecoBancoSangue = new EnderecoModel();
$enderecoBancoSangue->setLogradouro($_POST['txtLogradouro']);
$enderecoBancoSangue->setBairro($_POST['txtBairro']);
$enderecoBancoSangue->setNumero($_POST['txtNumero']);
$enderecoBancoSangue->setComplemento($_POST['txtComplemento']);
$enderecoBancoSangue->setCEP($_POST['txtCep']);
$enderecoBancoSangue->setUF($_POST['txtUf']);
$enderecoBancoSangue->setCidade($_POST['txtCidade']);

$bancoSangue = new BancoSangueModel();
$bancoSangue->setNome($_POST['txtNomeBancoSangue']);
$bancoSangue->setEndereco($enderecoBancoSangue);
$bancoSangue->setTelefones($_SESSION['telefonesBancoSangue']);
$bancoSangue->setHorarios($_SESSION['horariosSemana']);


try {

    if (isset($_FILES['imgBancoSangue']) && !empty($_FILES['imgBancoSangue'])) {

        $array = explode(".", $_FILES['imgBancoSangue']['name']);

        $nome = "";
        $extensao = "";

        for ($i = 0; $i < count($array); $i++) {

            if ($i == count($array) - 1) {
                $extensao = strtolower($array[$i]);
            }

            $nome = $nome . $array[$i];
        }

        $nomeCompleto = $nome . $extensao;

        $novoNome = md5($bancoSangue->getNome() . time()) . "." . $extensao;

        move_uploaded_file($_FILES['imgBancoSangue']['tmp_name'], __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".."
            . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "img_banco_sangue" . DIRECTORY_SEPARATOR . $novoNome);

        $bancoSangue->setFoto($novoNome);
    } else {

        $erro = array(
            "status" => ERRO_NO_UPLOAD_DE_IMAGENS,
            "msg" => "A imagem do doador está inválida, por favor passe uma imagem válida"
        );

        array_push($vetErros, $erro);
    }
} catch (Exception $ex) {

    $erro = array(
        "status" => ERRO_NO_UPLOAD_DE_IMAGENS,
        "msg" => "A imagem do doador está inválida, por favor passe uma imagem válida"
    );

    array_push($vetErros, $erro);
}


if (count($vetErros) == 0) {

    BancoSangueDAO::inserir($bancoSangue);

    $bancoSangue->setId(BancoSangueDAO::pegarUltimoIdBancoSangue());

    $horarioDAO = new HorarioBancoSangueDAO();
    $horarioDAO->cadastrar($bancoSangue);

    $telefoneBancoSangueDAO = new TelefoneBancoSangueDAO();
    $telefoneBancoSangueDAO->cadastrar($bancoSangue);

    $resposta = array("status" => SUCESSO_AO_CADASTRAR_O_BANCO_DE_SANGUE);

    echo json_encode($resposta);
}
else {

    
    $resposta = array("status" => ERRO_AO_CADADASTRAR_O_BANCO_DE_SANGUE);

    echo json_encode($resposta);

}
