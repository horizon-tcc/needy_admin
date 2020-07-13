<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

try {
    $funcionario = new FuncionarioDAO;

    $funcionarioUpdate = $funcionario->selecEditarFuncionario(intval($_POST['idFuncionario']));

    if ($funcionarioUpdate != false) {
        $resposta = array("nomeFuncionario" => $funcionarioUpdate['nomeFuncionario']
                        ,"fotoFuncionario" => $funcionarioUpdate['fotoUsuario']
                        ,"cpfFuncionario"=> $funcionarioUpdate['cpfFuncionario']
                        ,"rgFuncionario" => $funcionarioUpdate['rgFuncionario']
                        ,"idBancoSangue" => $funcionarioUpdate['idBancoSangue']
                        ,"nomeBancoSangue" => $funcionarioUpdate['nomeBancoSangue']
                        ,"idCargoFuncionario" => $funcionarioUpdate['idCargoFuncionario']
                        ,"descricaoCargoFuncionario" => $funcionarioUpdate['descricaoCargoFuncionario']
                        ,"idUsuario" => $funcionarioUpdate['idUsuario']
                        ,"emailUsuario" => $funcionarioUpdate['emailUsuario']
                        ,"idTipoUsuario" => $funcionarioUpdate['idTipoUsuario']
                        ,"statusFuncionario" => true
                    );

        echo json_encode($resposta);
    } else {
        $resposta = array("statusFuncionario" => false);

        echo json_encode($_POST['idFuncionario']);
    }
} catch (Exception $e) {
    echo '<pre>';
    print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}
