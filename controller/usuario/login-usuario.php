<?php

    require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

    if ( isset ( $_POST['txtSenha'] ) && !empty( $_POST['txtSenha'] ) &&
       isset ( $_POST['txtEmail'] ) && !empty( $_POST['txtEmail']) ) {

        $email = $_POST['txtEmail'];
        $senha = $_POST['txtSenha'];

        if ( $email == "admin" && $senha == "123")  {

            header("location: ../../view/home.php");
        }
        else {

            header("location: ../../view/login.php");

        }

    }
    else {

        header("location: ../../view/home.php");
    }