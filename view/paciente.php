<title>Paciente</title>

<?php

include_once('imports/header.php');
require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

?>

<main>

    <div class="container-fluid d-flex justify-content-center align-items-center mt-2">
        <form action="../controller/doador/cadastrar-doador.php" method="post" class="form-donnor w-100" id="form-insert" enctype="multipart/form-data">

            <input type="hidden" value="<?php echo ($_GET['idPaciente']); ?>" name="hdIdPaciente" id="hdIdPaciente" />

            <h2 class="text-center mt-4"> Cadastro de Pacientes </h2>
            <fieldset class="mt-5 pb-4">
                <i class="fas fa-user text-center d-block mx-auto small-icon"></i>
                <h2 class="text-center mt-2"> Informações pessoais </h2>
                <h6 class="text-center mt-2"> Digite algumas informações sobre o paciente </h6>
                <hr />

                <div class="form-row w-100">
                    <div class="form-group col-md-6 pb-2">
                        <label for="txtNomePaciente"> <strong class="red"> * </strong> Nome </label>
                        <input type="text" class="form-control flat" name="txtNomePaciente" id="txtNomePaciente" placeholder="Digite o nome" maxlength="100" />

                        <div id="feedback-valid-nome-paciente" class="valid-feedback">
                            Nome válido!
                        </div>
                        <div id="feedback-invalid-nome-paciente" class="invalid-feedback">
                            Nome inválido!
                        </div>
                    </div>

                    <div class="form-group col-md-6 pb-2">
                        <label for="seSexoPaciente"> <strong class="red"> * </strong> Sexo </label>
                        <select class="form-control flat" name="seSexoPaciente" id="seSexoPaciente">
                            <option value=0 selected disabled> Selecione uma opção </option>
                            <?php

                            $sexoController = new SexoController();
                            $listaSexo = $sexoController->getAll();

                            foreach ($listaSexo as $linha) {
                                echo "<option value='" . $linha["idSexo"] . "'>"
                                    . $linha["descricaoSexo"]
                                    . "</option>";
                            }
                            ?>
                        </select>

                        <div id="feedback-valid-sexo-paciente" class="valid-feedback">
                            Sexo válido!
                        </div>
                        <div id="feedback-invalid-sexo-paciente" class="invalid-feedback">
                            Sexo inválido!
                        </div>
                    </div>
                </div>

                <div class="form-row w-100">
                    <div class="form-group col-md-6 pb-2">
                        <label for="seBancoSanguePaciente"> <strong class="red"> * </strong>Tipo Sanguineo</label>
                        <select class="form-control flat" name="seTipoSanguineoPaciente" id="seTipoSanguineoPaciente">
                            <option value=0 selected disabled> Selecione uma opção </option>
                            <?php

                            $tipoSanguineo = new TipoSanguineoController();
                            $listaTipoSanguineo = $tipoSanguineo->getAll();

                            foreach ($listaTipoSanguineo as $linha) {
                                echo "<option value='" . $linha["idTipoSanguineo"] . "'>"
                                    . $linha["descricaoTipoSanguineo"]
                                    . "</option>";
                            }

                            ?>

                        </select>

                        <div id="feedback-valid-tipoSanguineo-paciente" class="valid-feedback">
                            Tipo sanguineo válido!
                        </div>
                        <div id="feedback-invalid-tipoSanguineo-paciente" class="invalid-feedback">
                            Tipo sanguineo inválido!
                        </div>
                    </div>

                    <div class="form-group col-md-6 pb-2">
                        <label for="seFatorRhPaciente"> <strong class="red"> * </strong> Fator Rh </label>
                        <select class="form-control flat" name="seFatorRhPaciente" id="seFatorRhPaciente">
                            <option value=0 selected disabled> Selecione uma opção </option>
                            <?php
                            $fatorRh = new FatorRhController();
                            $listaFatorRh = $fatorRh->getAll();

                            foreach ($listaFatorRh as $linha) {
                                echo "<option value='" . $linha["idFatorRh"] . "'>"
                                    . $linha["descricaoFatorRh"]
                                    . "</option>";
                            }
                            ?>
                        </select>

                        <div id="feedback-valid-fatorRh-paciente" class="valid-feedback">
                            Fator Rh válido!
                        </div>
                        <div id="feedback-invalid-fatorRh-paciente" class="invalid-feedback">
                            Fator Rh inválido!
                        </div>
                    </div>
                </div>

                <div class="form-row w-100">
                    <div class="form-group col-md-6 pb-2">
                        <label for="txtCpfPaciente"> <strong class="red"> * </strong> CPF</label>
                        <input type="text" class="form-control txtCpf flat" id="txtCpfPaciente" name="txtCpfPaciente" placeholder="Digite o CPF" />

                        <div id="feedback-valid-cpf-paciente" class="valid-feedback">
                            CPF válido!
                        </div>
                        <div id="feedback-invalid-cpf-paciente" class="invalid-feedback">
                            CPF inválido!
                        </div>
                    </div>

                    <div class="form-group col-md-6 pb-2">
                        <label for="txtRgPaciente"> <strong class="red"> * </strong> RG</label>
                        <input type="text" class="form-control txtRg flat" id="txtRgPaciente" name="txtRgPaciente" placeholder="Digite o RG" />

                        <div id="feedback-valid-rg-paciente" class="valid-feedback">
                            RG válido!
                        </div>
                        <div id="feedback-invalid-rg-paciente" class="invalid-feedback">
                            RG inválido!
                        </div>
                    </div>
                </div>

                <div class="form-row w-100 mt-2 d-flex justify-content-end">
                    <h6 class="text-center mt-2"> Dados obrigatórios <strong class="red"> * </strong> </h6>
                </div>

                <div class="form-row w-100 mt-5 d-flex justify-content-center">
                    <div class="form-group col-md-4 d-flex align-items-end justify-content-end pb-2 pt-2">
                        <button type="button" class="btn btn-outline-danger w-100 flat" data-toggle="modal" data-target="#limpar-campos-paciente">
                            <i class="far fa-window-close"></i> Limpar
                        </button>
                    </div>

                    <div class="form-group col-md-4 d-flex align-items-end justify-content-end pb-2 pt-2">
                        <button type="button" class="btn btn-danger w-100 flat action next" name="next">
                            <i class="far fa-paper-plane"></i> Finalizar Cadastro
                        </button>
                    </div>
                </div>
            </fieldset>
        </form>
    
        <div class="modal fade" id="limpar-campos-paciente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-title-limpar-campos-paciente"> Limpar campos </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5> Deseja limpar os campos do paciente ?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger" id="btnLimparCamposPaciente" data-dismiss="modal">Limpar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<?php

include_once("imports/imports-js.php");

?>

<script src="../js/script-paciente.js"></script>

</body>

</html>