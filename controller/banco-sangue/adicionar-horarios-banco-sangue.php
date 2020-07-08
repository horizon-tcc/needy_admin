<?php

define("CB_DOMINGO","cbDomingo");
define("CB_SEGUNDA_FEIRA", "cbSegunda-feira");
define("CB_TERCA_FEIRA", "cbTerça-feira");
define("CB_QUARTA_FEIRA", "cbQuarta-feira");
define("CB_QUINTA_FEIRA", "cbQuinta-feira");
define("CB_SEXTA_FEIRA", "cb")
session_start();

if ( !isset($_SESSION['horariosSemana'])  ){

    $_SESSION['horariosSemana'] = array();

}

if ( isset( $_POST['cbDomingo'] ) && !empty( $_POST['cbDomingo'] )) {

    $novoHorario = array( "idDia" => $_POST['cbDomingo'], 
                          "descricaoDia" => "Domingo", 
                          "horarioAbertura" => $_POST['txtHorarioAbertura'],
                          "horarioFechamento" => $_POST['txtHorarioFechamento'] );

    array_push($_SESSION['horariosSemana'], $novoHorario);
}


if ( isset( $_POST['cbSegunda-feira'] ) && !empty( $_POST['cbSegunda-feira'] )) {

    $novoHorario = array( "idDia" => $_POST['cbDomingo'], 
                          "descricaoDia" => "Domingo", 
                          "horarioAbertura" => $_POST['txtHorarioAbertura'],
                          "horarioFechamento" => $_POST['txtHorarioFechamento'] );

    array_push($_SESSION['horariosSemana'], $novoHorario);
}

echo ($_POST['cbDomingo']);
echo ($_POST['cbSegunda-feira']);
echo ($_POST['cbTerça-feira']);
echo ($_POST['cbQuarta-feira']);
echo ($_POST['cbQuinta-feira']);
echo ($_POST['cbSexta-feira']);
echo ($_POST['cbSábado']);
