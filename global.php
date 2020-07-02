<?php


spl_autoload_register("carregarPagina");

define("PATH_CONTROLLER", __DIR__ . DIRECTORY_SEPARATOR . "controller" . DIRECTORY_SEPARATOR);
define("PATH_MODEL", __DIR__ . DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR);
define("PATH_DAO", __DIR__ . DIRECTORY_SEPARATOR . "dao" . DIRECTORY_SEPARATOR);


function carregarPagina($nomeClasse)
{

    $paths = [

        PATH_MODEL, 
        PATH_CONTROLLER . "doador" . DIRECTORY_SEPARATOR,
        PATH_CONTROLLER . "sexo" . DIRECTORY_SEPARATOR, 
        PATH_CONTROLLER . "tipo-sanguineo" . DIRECTORY_SEPARATOR,
        PATH_CONTROLLER . "fator-rh" . DIRECTORY_SEPARATOR,
        PATH_CONTROLLER . "responsavel" . DIRECTORY_SEPARATOR, 
        PATH_CONTROLLER . "validacao" . DIRECTORY_SEPARATOR,
        PATH_CONTROLLER . "utilidades" . DIRECTORY_SEPARATOR,
        PATH_CONTROLLER . "telefone" . DIRECTORY_SEPARATOR,
        PATH_CONTROLLER . "tipo-doacao" . DIRECTORY_SEPARATOR,
        PATH_CONTROLLER . "unidade-medida" . DIRECTORY_SEPARATOR,
        PATH_CONTROLLER. "material-doado". DIRECTORY_SEPARATOR,
        PATH_DAO,
         __DIR__ . DIRECTORY_SEPARATOR
    ];

    foreach ($paths as $p) {

        if (file_exists($p . $nomeClasse . ".php")) {

            require_once($p . $nomeClasse . ".php");
           // echo("<b> Encontrei aqui -> </b> ". $p . $nomeClasse . ".php"."<br/>");
            break;
        }

        //echo ($p . $nomeClasse . ".php" . "<br/>");
    }
}
