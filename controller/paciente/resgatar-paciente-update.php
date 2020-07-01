<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

$paciente = new PacienteDAO;

$pacienteUpdate = $paciente->selecEditarPaciente($_POST['idPaciente']);


if($pacienteUpdate !=false){
    $resposta = array("nomePaciente" => $pacienteUpdate['nomePaciente']
                    ,"cpfPaciente"=> $pacienteUpdate['cpfPaciente']
                    ,"rgPaciente" => $pacienteUpdate['rgPaciente']
                    ,"idSexoPaciente" => $pacienteUpdate['idSexo']
                    ,"descricaoSexoPaciente" => $pacienteUpdate['descricaoSexo']
                    ,"idTipoSanguineoPaciente" => $pacienteUpdate['idTipoSanguineo']
                    ,"descricaoTipoSanguineoPaciente" => $pacienteUpdate['descricaoTipoSanguineo']
                    ,"descricaoFatorRhPaciente" => $pacienteUpdate['descricaoFatorRh']
                    ,"idFatorRhPaciente" => $pacienteUpdate['idFatorRh']
                    ,"statusPaciente" => true
                );

    echo json_encode($resposta);
} else {
    $resposta = array("statusPaciente" => false);

    echo json_encode($resposta);
}