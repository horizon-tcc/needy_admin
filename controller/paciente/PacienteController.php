<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

class PacienteController
{
    public function getPaciente()
    {
        $pacientes = new PacienteDAO();

        return $pacientes->listarPaciente();
    }

    public function getPacienteId(int $id)
    {
        $pacientes = new PacienteDAO();

        return $pacientes->selecEditarPaciente($id);
    }
}
