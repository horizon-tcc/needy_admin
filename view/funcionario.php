<title>Funcionario</title>

<?php

include_once('imports/header.php');
require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

?>

<main>

    <div class="container-fluid d-flex justify-content-center align-items-center mt-2">
        <form action="../controller/doador/cadastrar-doador.php" method="post" class="form-donnor w-100" id="form-insert" enctype="multipart/form-data">

            <h2 class="text-center mt-4"> Cadastro de Funcionarios </h2>
            <ul id="progress" class="text-center d-flex mt-2 pt-3">
                <li class="flex-fill activated-section"> Pessoal </li>
                <li class="flex-fill"> Conta </li>
            </ul>

            <fieldset class="mt-5 pb-4" id="secao-Funcionario">
                <i class="fas fa-user text-center d-block mx-auto small-icon"></i>
                <h2 class="text-center mt-2"> Informações pessoais </h2>
                <h6 class="text-center mt-2"> Digite algumas informações sobre o funcionario </h6>
                <hr />

                <div class="form-row w-100 mt-5">
                    <img src="../img/camera.png" class="form-img d-block mx-auto" id="imgPreview" name="imgPreview" />
                </div>

                <div class="form-row w-100 d-flex justify-content-center">
                    <div class="input-group mb-3 col-md-5">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input img-input" name="imgFuncionario" id="imgFuncionario" accept="image/*">
                            <label class="" for="imgFuncionario" id="file-description">
                                <span> <strong> * </strong> </span>
                                <span> <i class="far fa-file-image"></i> </span>
                                <span> Escolha uma imagem </span>
                            </label>
                        </div>
                    </div>

                    <div id="feedback-valid-img-Funcionario" class="valid-feedback">
                        Imagem válida!
                    </div>
                    <div id="feedback-invalid-img-Funcionario" class="invalid-feedback">
                        Imagem inválida!
                    </div>
                </div>

                <div class="form-row w-100">
                    <div class="form-group col-md-12 pb-2">
                        <label for="txtNomeDoador"> <strong class="red"> * </strong> Nome </label>
                        <input type="text" class="form-control flat" name="txtNomeFuncionario" id="txtNomeFuncionario" placeholder="Digite o nome" maxlength="100" />

                        <div id="feedback-valid-nome-Funcionario" class="valid-feedback">
                            Nome válido!
                        </div>
                        <div id="feedback-invalid-nome-Funcionario" class="invalid-feedback">
                            Nome inválido!
                        </div>
                    </div>
                </div>

                <div class="form-row w-100">
                    <div class="form-group col-md-6 pb-2">
                        <label for="seBancoSangueFuncionario"> <strong class="red"> * </strong> Banco de Sangue</label>
                        <select class="form-control flat" name="seBancoSangueFuncionario" id="seBancoSangueFuncionario">
                            <option value=0 selected disabled> Selecione uma opção </option>
                            <?php

                            $bancoSangue = new BancoSangueDAO();
                            $listaBanco = BancoSangueDAO::listar();

                            foreach ($listaBanco as $linha) {
                                echo "<option value=" . $linha["idBancoSangue"] . ">"
                                    . $linha["nomeBancoSangue"]
                                    . "</option>";
                            }

                            ?>

                        </select>

                        <div id="feedback-valid-banco-Funcionario" class="valid-feedback">
                            Banco válido!
                        </div>
                        <div id="feedback-invalid-banco-Funcionario" class="invalid-feedback">
                            Banco inválido!
                        </div>
                    </div>

                    <div class="form-group col-md-6 pb-2">

                        <label for="seCargoFuncionario"> <strong class="red"> * </strong> Cargo Funcionario </label>
                        <select class="form-control flat" name="seCargoFuncionario" id="seCargoFuncionario">
                            <option value=0 selected disabled> Selecione uma opção </option>
                            <?php

                            $cargoFuncionario = new CargoFuncionarioDAO();
                            $listaCargo = $cargoFuncionario->getAll();

                            foreach ($listaCargo as $linha) {
                                echo "<option value=" . $linha["idCargoFuncionario"] . ">"
                                    . $linha["descricaoCargoFuncionario"]
                                    . "</option>";
                            }

                            ?>

                        </select>

                        <div id="feedback-valid-cargo-Funcionario" class="valid-feedback">
                            Cargo válido!
                        </div>
                        <div id="feedback-invalid-cargo-Funcionario" class="invalid-feedback">
                            Cargo inválido!
                        </div>

                    </div>

                    <div class="form-row w-100">
                        <div class="form-group col-md-6 pb-2">
                            <label for="txtCpfFuncionario"> <strong class="red"> * </strong> CPF</label>
                            <input type="text" class="form-control txtCpf flat" id="txtCpfFuncionario" name="txtCpfFuncionario" placeholder="Digite o CPF" />

                            <div id="feedback-valid-cpf-Funcionario" class="valid-feedback">
                                CPF válido!
                            </div>
                            <div id="feedback-invalid-cpf-Funcionario" class="invalid-feedback">
                                CPF inválido!
                            </div>
                        </div>

                        <div class="form-group col-md-6 pb-2">
                            <label for="txtRgFuncionario"> <strong class="red"> * </strong> RG</label>
                            <input type="text" class="form-control txtRg flat" id="txtRgFuncionario" name="txtRgFuncionario" placeholder="Digite o RG" />

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
                            <button type="button" class="btn btn-outline-danger w-100 flat" data-toggle="modal" data-target="#limpar-campos-pessoais-funcionario">
                                <i class="far fa-window-close"></i> Limpar
                            </button>
                            <!-- <input type="button" class="btn btn-outline-danger w-100" value="Adicionar responsável" data-toggle="modal" data-target="#exampleModal" /> -->
                        </div>

                        <div class="form-group col-md-4 d-flex align-items-end justify-content-end pb-2">
                            <button type="button" class="btn btn-danger w-100 flat next action" name="next" id="btn-pessoal">
                                <i class="far fa-paper-plane"></i> Próxima etapa
                            </button>
                        </div>
                    </div>
            </fieldset>

            <fieldset class="mt-5 pb-4" id="secao-Conta-Funcionario">
                <i class="fas fa-phone-alt text-center d-block mx-auto small-icon"></i>
                <h2 class="text-center mt-2"> Informações para contato </h2>
                <h6 class="text-center"> Digite algumas informações para que o hemocentro possa entrar em contato com o
                    doador </h6>
                <hr />

                <div class="form-row w-100 mt-5 d-flex justify-content-center">
                    <div class="form-group col-md-6 pb-2">
                        <label for="txtEmailFuncionario"> <strong class="red"> * </strong> E-mail</label>
                        <input type="email" class="form-control flat" name="txtEmailFuncionario" id="txtEmailFuncionario" placeholder="Digite o e-mail" maxlength="80" />

                        <div id="feedback-valid-email-Funcionario" class="valid-feedback">
                            Email válido!
                        </div>
                        <div id="feedback-invalid-email-Funcionario" class="invalid-feedback">
                            Email inválido!
                        </div>
                    </div>

                    <div class="form-group col-md-6 pb-2">
                        <label for="txtSenhaFuncionario"> <strong class="red"> * </strong> E-mail</label>
                        <input type="password" class="form-control flat" name="psSenhaFuncionario" id="psSenhaFuncionario" placeholder="Digite uma senha" maxlength="30" />

                        <div id="feedback-valid-email-Funcionario" class="valid-feedback">
                            Senha válida!
                        </div>
                        <div id="feedback-invalid-email-Funcionario" class="invalid-feedback">
                            Senha inválida!
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
                        <button type="button" class="btn btn-outline-danger w-100 flat" data-toggle="modal" data-target="#limpar-campos-conta-funcionario">
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


        <div class="modal fade" id="limpar-campos-pessoais-funcionario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-title-limpar-campos-pessoais-funcionario"> Limpar campos </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <h5> Deseja limpar os campos desta etapa ?</h5>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger" id="btnLimparCamposFuncionario" data-dismiss="modal">Limpar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="limpar-campos-conta-funcionario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-title-limpar-campos-conta"> Limpar campos </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <h5> Deseja limpar os campos desta etapa? </h5>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"> Cancelar </button>
                        <button type="button" class="btn btn-danger" id="btn-limpar-campos-conta-funcionario" data-dismiss="modal">Limpar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<?php

include_once("imports/imports-js.php");

?>

<script src="../js/script-funcionario.js"></script>
<script src="../js/script-usuario.js"></script>

</body>

</html>