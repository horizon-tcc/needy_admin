<title>Paciente</title>

<?php

    include_once('imports/header.php');
    require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

?>

<main>

    <div class="container-fluid d-flex justify-content-center align-items-center mt-2">

        <form action="../controller/doador/cadastrar-doador.php" method="post" class="w-100" id="form-insert"
            enctype="multipart/form-data">

            <h2 class="text-center mt-4"> Cadastro de Pacientes </h2>

            <fieldset class="mt-5 pb-4">

                <i class="fas fa-user text-center d-block mx-auto small-icon"></i>
                <h2 class="text-center mt-2"> Informações pessoais </h2>
                <h6 class="text-center mt-2"> Digite algumas informações sobre o funcionario </h6>
                <hr />

                <div class="form-row w-100">
                    <div class="form-group col-md-12 pb-2">
                        <label for="txtNomePaciente"> <strong class="red"> * </strong> Nome </label>
                        <input type="text" class="form-control flat" name="txtNomePaciente" id="txtNomePaciente"
                            placeholder="Digite o nome" maxlength="100" />

                        <div id="feedback-valid-nome-Paciente" class="valid-feedback">
                            Nome válido!
                        </div>
                        <div id="feedback-invalid-nome-Funcionario" class="invalid-feedback">
                            Nome inválido!
                        </div>
                    </div>
                </div>

                <div class="form-row w-100">
                    <div class="form-group col-md-6 pb-2">
                        <label for="seBancoSangueFuncionario"> <strong class="red"> * </strong>Tipo Sanguineo</label>
                        <select class="form-control flat" name="seBancoSangueFuncionario" id="seBancoSangueFuncionario">
                            <option value=0 selected disabled> Selecione uma opção </option>
                            <?php

                                $tipoSanguineo = new TipoSanguineoController();
                                $listaTipoSanguineo = $tipoSanguineo->getAll();

                                foreach ($listaTipoSanguineo as $linha) {
                                    echo "<option value='".$linha["idTipoSanguineo"]."'>"
                                        .$linha["descricaoTipoSanguineo"]
                                        ."</option>";
                                }

                            ?>

                        </select>

                        <div id="feedback-valid-cargo-Funcionario" class="valid-feedback">
                            Tipo sanguineo válido!
                        </div>
                        <div id="feedback-invalid-cargo-Funcionario" class="invalid-feedback">
                            Tipo sanguineo inválido!
                        </div>
                    </div>

                    <div class="form-group col-md-6 pb-2">
                        <label for="seBancoSangueFuncionario"> <strong class="red"> * </strong> Fator Rh </label>
                        <select class="form-control flat" name="seSexoPaciente" id="seSexoPaciente">
                            <option value=0 selected disabled> Selecione uma opção </option>
                            <?php
                                $fatorRh = new FatorRhController();
                                $listaFatorRh = $fatorRh->getAll();

                                foreach ($listaFatorRh as $linha) {
                                    echo "<option value='".$linha["idFatorRh"]."'>"
                                        .$linha["descricaoFatorRh"]
                                        ."</option>";
                                }
                            ?>
                        </select>

                        <div id="feedback-valid-banco-Funcionario" class="valid-feedback">
                            Sexo válido!
                        </div>
                        <div id="feedback-invalid-banco-Funcionario" class="invalid-feedback">
                            Sexo inválido!
                        </div>
                    </div>
                </div>

                <div class="form-row w-100">
                    <div class="form-group col-md-6 pb-2">
                        <label for="seBancoSangueFuncionario"> <strong class="red"> * </strong> Sexo </label>
                        <select class="form-control flat" name="seSexoPaciente" id="seSexoPaciente">
                            <option value = 0 selected disabled> Selecione uma opção </option>
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

                        <div id="feedback-valid-banco-Funcionario" class="valid-feedback">
                            Sexo válido!
                        </div>
                        <div id="feedback-invalid-banco-Funcionario" class="invalid-feedback">
                            Sexo inválido!
                        </div>
                    </div>
                </div>

                <div class="form-row w-100">
                    <div class="form-group col-md-6 pb-2">
                        <label for="txtCpfFuncionario"> <strong class="red"> * </strong> CPF</label>
                        <input type="text" class="form-control txtCpf flat" id="txtCpfFuncionario"
                            name="txtCpfFuncionario" placeholder="Digite o CPF" />
                        <div id="feedback-valid-cpf-Funcionario" class="valid-feedback">
                            CPF válido!
                        </div>
                        <div id="feedback-invalid-cpf-Funcionario" class="invalid-feedback">
                            CPF inválido!
                        </div>
                    </div>

                    <div class="form-group col-md-6 pb-2">
                        <label for="txtRgFuncionario"> <strong class="red"> * </strong> RG</label>
                        <input type="text" class="form-control txtRg flat" id="txtRgFuncionario" name="txtRgFuncionario"
                            placeholder="Digite o RG" />
                        <div id="feedback-valid-rg-Funcionario" class="valid-feedback">
                            RG válido!
                        </div>
                        <div id="feedback-invalid-rg-Funcionario" class="invalid-feedback">
                            RG inválido!
                        </div>
                    </div>
                </div>

                <div class="form-row w-100 mt-2 d-flex justify-content-end">
                    <h6 class="text-center mt-2"> Dados obrigatórios <strong class="red"> * </strong> </h6>
                </div>

                <div class="form-row w-100 mt-5 d-flex justify-content-center">
                    <div class="form-group col-md-4 d-flex align-items-end justify-content-end pb-2 pt-2">
                        <button type="button" class="btn btn-outline-danger w-100 flat" data-toggle="modal"
                            data-target="#limpar-campos-pessoais">
                            <i class="far fa-window-close"></i> Limpar
                        </button>
                    </div>

                    <div class="form-group col-md-4 d-flex align-items-end justify-content-end pb-2">
                        <button type="button" class="btn btn-danger w-100 flat next action" name="next"
                            id="btn-pessoal">
                            <i class="far fa-paper-plane"></i> Próxima etapa
                        </button>
                    </div>
                </div>

            </fieldset>


            <fieldset class="mt-5 pb-4">

                <i class="fas fa-phone-alt text-center d-block mx-auto small-icon"></i>
                <h2 class="text-center mt-2"> Informações para contato </h2>
                <h6 class="text-center"> Digite algumas informações para que o hemocentro possa entrar em contato com o
                    doador </h6>
                <hr />

                <div class="form-row w-100 mt-5 d-flex justify-content-center">

                    <div class="form-group col-md-6 pb-2">
                        <label for="txtEmailFuncionario"> <strong class="red"> * </strong> E-mail</label>
                        <input type="email" class="form-control flat" name="txtEmailFuncionario"
                            id="txtEmailFuncionario" placeholder="Digite o e-mail" maxlength="80" />

                        <div id="feedback-valid-email-Funcionario" class="valid-feedback">
                            Email válido!
                        </div>

                        <div id="feedback-invalid-email-Funcionario" class="invalid-feedback">
                            Email inválido!
                        </div>

                    </div>

                </div>

                <div class="form-row w-100 mt-4 d-flex justify-content-center">

                    <div class="form-group w-100">
                        <h4 class="text-center"> <strong class="red"> * </strong> Telefones </h4>
                        <div class="w-100 mt-3 d-flex justify-content-center align-items-center flex-column">

                            <ul class="list-telefone" id="list-telefone-doador">
                                <div class="container-item-telefone" id="container-item-telefone-doador">
                                    <?php

                                    if (isset($_SESSION['telefonesDoador']) && !empty($_SESSION["telefonesDoador"])) {

                                        $vetTelefones = $_SESSION["telefonesDoador"];

                                        foreach ($vetTelefones as $telefone) {

                                            echo ("<li class='item-telefone d-flex bd-highlight align-items-center'>"
                                                . "<i class='fas fa-phone-alt flex-fill bd-highlight'></i>"
                                                . "<div class='h-100 flex-fill bd-highlight container-span-telefone'>"
                                                . "<span class='h-100 d-flex justify-content-center align-items-center desc-telefone'>" . $telefone . "</span>"
                                                . "</div>"
                                                . "<i class='fas fa-times flex-fill bd-highlight remover-telefone-doador'></i>"
                                                . "</li>");
                                        }
                                    } else {
                                        echo ("<div id='msg-list-telefone-doador'> <h5 class='text-center mt-3'> Nenhum telefone adicionado </h5> </div>");
                                    }

                                    ?>

                                </div>
                                <button type="button" class="btn btn-danger w-100 flat" data-toggle="modal"
                                    data-target="#modal-adicionar-telefone-doador">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </ul>


                            <div id="feedback-valid-telefone-Doador" class="valid-feedback w-100 text-center">
                                Correto!
                            </div>

                            <div id="feedback-invalid-telefone-Doador" class="invalid-feedback w-100 text-center">
                                Passe pelo menos um telefone!
                            </div>
                        </div>
                    </div>


                </div>

                <div class="form-row w-100 mt-2 d-flex justify-content-end">
                    <h6 class="text-center mt-2"> Dados obrigatórios <strong class="red"> * </strong> </h6>
                </div>

                <div class="form-row w-100 mt-5">
                    <div class="form-group col-md-4 d-flex align-items-end justify-content-end pb-2 pt-2">
                        <button type="button" class="btn btn-outline-danger w-100 flat prev action" name="prev">
                            <i class="fas fa-arrow-left"></i> Voltar etapa
                        </button>
                    </div>

                    <div class="form-group col-md-4 d-flex align-items-end justify-content-end pb-2 pt-2">
                        <button type="button" class="btn btn-outline-danger w-100 flat" data-toggle="modal"
                            data-target="#limpar-campos-contato">
                            <i class="far fa-window-close"></i> Limpar
                        </button>
                    </div>

                    <div class="form-group col-md-4 d-flex align-items-end justify-content-end pb-2 pt-2">
                        <button type="button" class="btn btn-danger w-100 flat next action" name="next">
                            <i class="far fa-paper-plane"></i> Próxima etapa
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


        <div class="modal fade" id="limpar-campos-pessoais" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-title-limpar-campos-pessoais"> Limpar campos </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5> Deseja limpar os campos desta etapa ?</h5>
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger" id="btn-limpar-campos-pessoais"
                            data-dismiss="modal">Limpar</button>
                    </div>

                </div>

            </div>

        </div>

        <div class="modal fade" id="limpar-campos-responsavel" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-title-limpar-campos-responsavel"> Limpar campos </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <h5> Deseja limpar os campos desta etapa ? </h5>
                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger" id="btn-limpar-campos-responsavel"
                            data-dismiss="modal">Limpar</button>
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
<script src="../js/script-usuario.js"></script>

</body>

</html>