<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

if (
    isset($_POST['txtSenha']) && !empty($_POST['txtSenha']) &&
    isset($_POST['txtLogin']) && !empty($_POST['txtLogin'])
) {

    $email = $_POST['txtLogin'];
    $senha = $_POST['txtSenha'];

    if ($email == "admin" && $senha == "123") {

        header("location: ../../view/home.php");
    } else {

        header("location: ../../view/login.php");
    }
} else {

    header("location: ../../view/login.php");
}
