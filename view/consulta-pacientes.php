<title> Consultar Pacientes </title>

<?php

include_once('imports/header.php');
require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

?>

<main>

    <div class="container-fluid mt-2 py-2">
        <form action="../controller/paciente/consultar-paciente.php" method="post" class="w-100">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center"> <i class="fas fa-search"></i> </h2>
                    <h2 class="text-center"> Consultar Pacientes </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-right">
                    <a href="paciente.php?idPaciente=0"> <button type="button" class="btn btn-danger"> Novo Paciente <i class="fas fa-plus"></i> </button> </a>
                </div>
            </div>
            <hr />
            <div class="form-row d-flex justify-content-center align-items-center mt-5">
                <div class="form-group col-md-6 d-flex align-items-center justify-content-center color-gray">
                    <input type="hidden" value="filterNomePaciente" id="hdSearchTypePaciente" name="hdSearchTypePaciente" />
                    <div class="container-search w-75"> <input type="text" name="txtPesquisaPaciente" id="txtPesquisaPaciente" class="input-for-search w-100" placeholder="Digite o nome do paciente" /> </div>
                    <div class="ml-3">
                        <i class="fas fa-search ml-2"></i>
                        <i class="fas fa-filter ml-3 selection" data-toggle="modal" data-target="#modal-filter-paciente"></i>
                    </div>
                </div>
            </div>
        </form>

        <div class="container-cards d-flex justify-content-center flex-wrap">
            <?php

            $pacientes = new PacienteController();

            $listaPacientes = $pacientes->getPaciente();

            if ($listaPacientes != null) {

                foreach ($listaPacientes as $linha) {

                    echo "<div class='card-consulta' id ='" . $linha['idPaciente'] . "'>"
                        . "<h6 class='text-center mt-5'>" . $linha['nomePaciente'] . "</h6>"
                        . "<h6 class='text-center mt-2'>" . $linha['descricaoSexo'] . "</h6>"
                        . "<h6 class='text-center mt-2'>" . $linha['rgPaciente'] . "</h6>"
                        . "<h6 class='text-center mt-2'>" . $linha['cpfPaciente'] . "</h6>"
                        . "<h6 class='text-center mt-2'>" . $linha['descricaoTipoSanguineo'] . " " . $linha['descricaoFatorRh'] . "</h6>"
                        . "<a href='paciente.php?idPaciente=" . $linha['idPaciente'] . "' id='" . $linha['idPaciente'] . "' class='editar-paciente'> <button class='mt-4' > <i class='fas fa-pen'></i> </button> </a>"
                        . "<a href='../controller/paciente/paciente-exclusao.php?idPaciente=" . $linha['idPaciente'] . "' class='remover-paciente'> <button class='mt-4' data-toggle='modal' data-target='#modal-remover-paciente'> <i class='far fa-trash-alt'></i> </button> </a>"
                        . "</div>";
                }
            } else {

                echo "<h6 class='mt-4'> Nenhum paciente foi cadastrado ainda </h6>";
            }

            ?>
        </div>
    </div>


    <div class="modal fade" id="modal-remover-paciente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="../controller/paciente/paciente-exclusao.php" method="POST" id="form-remover-paciente">
                    <div class="modal-header">
                        <h6 class="modal-title font-bold" id="modal-title-remover-paciente"> Remover paciente </h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row d-flex justify-content-center">
                            <div class="form-group col-md-12 py-2">
                                <h5 id="desc-remover-paciente" class="text-center"> Deseja remover o paciente selecionado ?
                                </h5>
                                <input type="hidden" name="pacienteRemovido" id="pacienteRemovido" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-danger" id="btn-remover-paciente" value="Remover" />
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade bd-example-modal-lg" id="modal-view-paciente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title font-bold" id="modal-title-view-paciente"> <i class="far fa-eye"></i> Visualizar paciente </h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2 class="text-center mt-3 nome-doador" id="nome-paciente"> Paciente </h2>

                    <div class="section-personal w-100 mt-5 mt-5">
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <h6 class="font-bold text-center"> Informações pessoais <span class="icon-modal"> <i class="far fa-id-card"></i> </span> </h6>
                                <hr />
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-3">
                                <h6 class="font-bold"> CPF: <span id="cpf-paciente"> exemplo </span> </h6>
                            </div>

                            <div class="col-md-3">
                                <h6 class="font-bold"> RG: <span id="rg-paciente"> exemplo </span> </h6>
                            </div>

                            <div class="col-md-3">

                                <h6 class="font-bold"> Sexo: <span id="sexo-paciente"> exemplo </span> </h6>

                            </div>

                            <div class="col-md-3">
                                <h6 class="font-bold"> Tipo sanguíneo: <span id="tipo-sanguineo-paciente"> exemplo </span> </h6>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-3">
                                <h6 class="font-bold"> Fator RH: <span id="fator-rh-paciente"> exemplo </span> </h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="update-paciente" class="btn btn-danger" data-dismiss="modal">Editar</button>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="modal fade bd-example-modal-lg" id="modal-filter-paciente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title font-bold" id="modal-title-filter-doador"> <i class="fas fa-filter ml-3"></i> Escolha a opção de filtro </h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="filter-container d-flex justify-content-center mt-5 mb-5 flex-wrap">
                        <div class="filter-option d-flex justify-content-center align-items-center flex-column" id="filterNomePaciente">
                            <i class="fas fa-font d-block mx-auto text-center"></i>
                            <h6 class="mt-2"> Nome </h6>
                        </div>

                        <div class="filter-option d-flex justify-content-center align-items-center flex-column" id="filterCpfPaciente">
                            <i class="fas fa-id-card-alt d-block mx-auto text-center"></i>
                            <h6 class="mt-2"> CPF </h6>
                        </div>

                        <div class="filter-option d-flex justify-content-center align-items-center flex-column" id="filterRgPaciente">
                            <i class="fas fa-address-card d-block mx-auto text-center"></i>
                            <h6 class="mt-2"> RG</h6>
                        </div>

                        <div class="filter-option d-flex justify-content-center align-items-center flex-column" id="filterTipoSanguineoPaciente">
                            <i class="fas fa-tint d-block mx-auto text-center"></i>
                            <h6 class="mt-2"> Tipo sanguíneo </h6>
                        </div>

                        <div class="filter-option d-flex justify-content-center align-items-center flex-column" id="filterFatorRhPaciente">
                            <img src="../img/plus-and-minus.png" />
                            <h6 class="mt-2"> Fator RH </h6>
                        </div>
                        
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

</main>

<?php

include_once("imports/imports-js.php");

?>

<script src="../js/script-consulta-paciente.js"></script>

</body>

</html>