<?php

    define("SUCESSO",true);
    define("FALHA",false);
    
    session_start();

    if(isset($_SESSION['telefonesDoador']) && !empty($_SESSION['telefonesDoador'])){

        unset($_SESSION['telefonesDoador']);


    }
    else {

    }
