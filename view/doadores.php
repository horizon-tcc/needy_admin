<title>Doadores</title>
<?php
include_once('imports/header.php');
require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");
?>

<main>

    <div class="container-fluid d-flex justify-content-center align-items-center mt-2">

        <form action="controller/doador/cadastrarDoador.php" method="post" class="w-100" id="form-insert">

            <h2 class="text-center mt-4"> Cadastro de doadores </h2>
            <ul id="progress" class="text-center d-flex mt-2 pt-3">

                <li class="flex-fill activated-section"> Informações pessoais </li>
                <li class="flex-fill"> Informações de endereço </li>
                <li class="flex-fill"> Informações para contato </li>
                <li class="flex-fill"> Informações sobre os responsáveis </li>

            </ul>


            <fieldset class="mt-5 pb-4">
                <i class="fas fa-user text-center d-block mx-auto small-icon"></i>
                <h2 class="text-center mt-2"> Informações pessoais </h2>
                <h6 class="text-center"> Digite algumas informações sobre o doador </h6>
                <hr />
                <div class="form-row w-100 mt-5">
                    <img src="../img/camera.png" class="form-img d-block mx-auto" id="imgPreview" name="imgPreview" />
                </div>
                <div class="form-row w-100 d-flex justify-content-center">

                    <div class="input-group mb-3 col-md-5">

                        <div class="custom-file">

                            <input type="file" class="custom-file-input img-input" name="imgDoador" id="imgDoador" accept="image/*">
                            <label class="custom-file-label" for="imgDoador" id="file-description">Escolha uma imagem</label>

                        </div>

                    </div>

                    <div id="feedback-valid-img-Doador" class="valid-feedback">
                        Imagem válida!
                    </div>
                    <div id="feedback-invalid-img-Doador" class="invalid-feedback">
                        Imagem inválida!
                    </div>

                </div>
                <div class="form-row w-100">
                    <div class="form-group col-md-12 pb-2">
                        <label for="txtNomeDoador">Nome</label>
                        <input type="text" class="form-control" name="txtNomeDoador" id="txtNomeDoador" placeholder="Digite o nome" maxlength="100" />

                        <div id="feedback-valid-nome-Doador" class="valid-feedback">
                            Nome válido!
                        </div>
                        <div id="feedback-invalid-nome-Doador" class="invalid-feedback">
                            Nome inválido!
                        </div>
                    </div>
                </div>

                <div class="form-row w-100">
                    <div class="form-group col-md-6 pb-2">
                        <label for="seSexo">Sexo</label>
                        <select class="form-control" name="seSexo" id="seSexo">

                            <?php

                            $sexoController = new SexoController();
                            $listSexo = $sexoController->getAll();

                            foreach ($listSexo as $s) {
                                echo "<option value='" . $s["idSexo"] . "'>"
                                    . $s["descricaoSexo"]
                                    . "</option>";
                            }

                            ?>

                        </select>


                        <div id="feedback-valid-sexo-Doador" class="valid-feedback">
                            Sexo válido!
                        </div>
                        <div id="feedback-invalid-sexo-Doador" class="invalid-feedback">
                            Sexo inválido!
                        </div>

                    </div>

                    <div class="form-group col-md-6 pb-2">
                        <label for="txtDataNascimento">Data de nascimento</label>
                        <input type="date" class="form-control input-date" id="txtDataNascimento" name="txtDataNascimento" placeholder="Escolha a data de nascimento" />

                        <div id="feedback-valid-data-nascimento" class="valid-feedback">
                            Data de nascimento válida!
                        </div>
                        <div id="feedback-invalid-data-nascimento" class="invalid-feedback">
                            Data de nascimento inválida!
                        </div>
                    </div>
                </div>

                <div class="form-row w-100">

                    <div class="form-group col-md-6 pb-2">
                        <label for="seTipoSanguineo">Tipo sanguíneo</label>
                        <select class="form-control" name="seTipoSanguineo" id="seTipoSanguineo">
                            <?php

                            $tipoSanguineoController = new TipoSanguineoController();
                            $listTipoSanguineo = $tipoSanguineoController->getAll();

                            foreach ($listTipoSanguineo as $t) {
                                echo "<option value='" . $t["idTipoSanguineo"] . "'>"
                                    . $t["descricaoTipoSanguineo"]
                                    . "</option>";
                            }

                            ?>
                        </select>

                        <div id="feedback-valid-tipo-sanguineo-Doador" class="valid-feedback">
                            Tipo sanguíneo válido!
                        </div>
                        <div id="feedback-invalid-tipo-sanguineo-Doador" class="invalid-feedback">
                            Tipo sanguíneo inválido!
                        </div>
                    </div>

                    <div class="form-group col-md-6 pb-2">
                        <label for="seFatorRh">Fator Rh</label>
                        <select class="form-control" name="seFatorRh" id="seFatorRh">

                            <?php

                            $fatorRhController = new FatorRhController();
                            $listFatorRh = $fatorRhController->getAll();
                            foreach ($listFatorRh as $f) {
                                echo "<option value='" . $f["idFatorRh"] . "'>"
                                    . $f["descricaoFatorRh"]
                                    . "</option>";
                            }

                            ?>


                        </select>

                        <div id="feedback-valid-fator-rh-Doador" class="valid-feedback">
                            Fator RH válido!
                        </div>
                        <div id="feedback-invalid-fator-rh-Doador" class="invalid-feedback">
                            Fator RH inválido!
                        </div>
                    </div>



                </div>

                <div class="form-row w-100">


                    <div class="form-group col-md-6 pb-2">

                        <label for="txtCpfDoador">CPF</label>
                        <input type="text" class="form-control txtCpf" id="txtCpfDoador" name="txtCpfDoador" placeholder="Digite o CPF" />
                        <div id="feedback-valid-cpf-Doador" class="valid-feedback">
                            CPF válido!
                        </div>
                        <div id="feedback-invalid-cpf-Doador" class="invalid-feedback">
                            CPF inválido!
                        </div>
                    </div>

                    <div class="form-group col-md-6 pb-2">
                        <label for="txtRgDoador">RG</label>
                        <input type="text" class="form-control txtRg" id="txtRgDoador" name="txtRgDoador" placeholder="Digite o RG" />

                        <div id="feedback-valid-rg-Doador" class="valid-feedback">
                            RG válido!
                        </div>
                        <div id="feedback-invalid-rg-Doador" class="invalid-feedback">
                            RG inválido!
                        </div>

                    </div>


                </div>


                <div class="form-row w-100 mt-5 d-flex justify-content-center">


                    <div class="form-group col-md-4 d-flex align-items-end justify-content-end pb-2">

                        <button type="button" class="btn btn-outline-danger w-100 flat" data-toggle="modal" data-target="#limpar-campos-pessoais">
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



            <fieldset class="mt-5 pb-4">

                <i class="fas fa-road text-center d-block mx-auto small-icon"></i>
                <h2 class="text-center mt-2"> Informações de endereço </h2>
                <h6 class="text-center"> Digite algumas informações para que os hemocentros possam encontrar o doador</h6>
                <hr />

                <div class="form-row w-100 mt-5">

                    <div class="form-group col-md-12 pb-2">

                        <label for="txtCep">CEP</label>
                        <input type="text" class="form-control txtCep" id="txtCep" name="txtCep" placeholder="Digite o CEP" />

                        <div id="feedback-valid-cep-Doador" class="valid-feedback">
                            CEP válido!
                        </div>
                        <div id="feedback-invalid-cep-Doador" class="invalid-feedback">
                            CEP inválido!
                        </div>
                    </div>

                </div>

                <div class="form-row w-100">

                    <div class="form-group col-md-4 pb-2">

                        <label for="txtLogradouro">Logradouro</label>
                        <input type="text" class="form-control" id="txtLogradouro" name="txtLogradouro" placeholder="Digite o logradouro" maxlength="100" />
                    </div>

                    <div class="form-group col-md-4 pb-2">

                        <label for="txtBairro">Bairro</label>
                        <input type="text" class="form-control" id="txtBairro" name="txtBairro" placeholder="Digite o bairro" maxlength="100" />
                    </div>

                    <div class="form-group col-md-4 pb-2">

                        <label for="txtCidade">Cidade</label>
                        <input type="text" class="form-control" id="txtCidade" name="txtCidade" placeholder="Digite a cidade" maxlength="100" />
                    </div>


                </div>

                <div class="form-row w-100">

                    <div class="form-group col-md-4 pb-2">

                        <label for="txtUf">UF</label>
                        <input type="text" class="form-control" id="txtUf" name="txtUf" placeholder="Digite o estado" maxlength="2" />

                    </div>

                    <div class="form-group col-md-4 pb-2">

                        <label for="txtNumero">Número</label>
                        <input type="text" class="form-control" id="txtNumero" name="txtNumero" placeholder="Digite o número residencial" maxlength="5" />
                    </div>

                    <div class="form-group col-md-4 pb-2">

                        <label for="txtComplemento">Complemento</label>
                        <input type="text" class="form-control" id="txtComplemento" name="txtComplemento" placeholder="Digite o complemento do endereço" maxlength="70" />
                    </div>



                </div>


                <div class="form-row w-100 mt-5">



                    <div class="form-group col-md-4 d-flex align-items-end justify-content-end pb-2 pt-2">

                        <button type="button" class="btn btn-outline-danger w-100 flat prev action" name="prev">
                            <i class="fas fa-arrow-left"></i> Voltar etapa
                        </button>

                    </div>


                    <div class="form-group col-md-4 d-flex align-items-end justify-content-end pb-2 pt-2">

                        <button type="reset" class="btn btn-outline-danger w-100 flat">
                            <i class="far fa-window-close"></i> Limpar
                        </button>

                    </div>




                    <div class="form-group col-md-4 d-flex align-items-end justify-content-end pb-2 pt-2">

                        <button type="button" class="btn btn-danger w-100 flat next action" name="next">
                            <i class="far fa-paper-plane"></i> Próxima etapa
                        </button>

                    </div>

                </div>
            </fieldset>


            <fieldset class="mt-5 pb-4">

                <i class="fas fa-phone-alt text-center d-block mx-auto small-icon"></i>
                <h2 class="text-center mt-2"> Informações para contato </h2>
                <h6 class="text-center"> Digite algumas informações para que o hemocentro possa entrar em contato com o doador </h6>
                <hr />

                <div class="form-row w-100 mt-5 d-flex justify-content-center">

                    <div class="form-group col-md-6 pb-2">
                        <label for="txtEmail">E-mail</label>
                        <input type="email" class="form-control" name="txtEmail" id="txtEmail" placeholder="Digite o e-mail" />
                    </div>

                </div>

                <div class="form-row w-100 d-flex justify-content-center align-items-center mt-4">

                    <ul class="list-telefone">
                        <div class="container-item-telefone">
                            <li class="item-telefone d-flex bd-highlight align-items-center">
                                <i class="fas fa-phone-alt flex-fill bd-highlight"></i>
                                <div class="h-100 flex-fill bd-highlight">
                                    <span class="h-100 d-flex justify-content-center align-items-center"> 4002-8922 </span>
                                </div>

                                <i class="fas fa-times flex-fill bd-highlight"></i>
                            </li>
                        </div>
                        <button type="button" class="btn btn-danger w-100 flat" data-toggle="modal" data-target="#adicionar-telefone">
                            <i class="fas fa-plus"></i>
                        </button>
                    </ul>


                </div>

                <div class="form-row w-100 mt-5">



                    <div class="form-group col-md-4 d-flex align-items-end justify-content-end pb-2 pt-2">

                        <button type="button" class="btn btn-outline-danger w-100 flat prev action" name="prev">
                            <i class="fas fa-arrow-left"></i> Voltar etapa
                        </button>

                    </div>


                    <div class="form-group col-md-4 d-flex align-items-end justify-content-end pb-2 pt-2">

                        <button type="reset" class="btn btn-outline-danger w-100 flat">
                            <i class="far fa-window-close"></i> Limpar
                        </button>

                    </div>




                    <div class="form-group col-md-4 d-flex align-items-end justify-content-end pb-2 pt-2">

                        <button type="button" class="btn btn-danger w-100 flat next action" name="next">
                            <i class="far fa-paper-plane"></i> Próxima etapa
                        </button>

                    </div>

                </div>

            </fieldset>


            <fieldset class="mt-5 pb-4">

                <i class="fas fa-child text-center d-block mx-auto small-icon"></i>
                <h2 class="text-center mt-2"> Informações sobre os responsáveis do doador </h2>
                <h6 class="text-center"> Digite algumas informações sobre os responsáveis (caso o doador seja menor de idade) </h6>
                <hr />

                <div class="form-row mt-5">

                    <div class="form-group col-md-6 pb-2">
                        <label for="txtNome">Nome</label>
                        <input type="text" class="form-control" name="txtNome" id="txtNome" placeholder="Digite o nome" />
                    </div>

                    <div class="form-group col-md-6 pb-2">
                        <label for="txtDataNascimento">Data de nascimento</label>
                        <input type="date" class="form-control" id="txtDataNascimento" name="txtDataNascimento" placeholder="Escolha a data de nascimento" />
                    </div>

                </div>

                <div class="form-row w-100">


                    <div class="form-group col-md-6 pb-2">
                        <label for="txtCpf">CPF</label>
                        <input type="text" class="form-control txtCpf" id="txtCpfResponsavel" name="txtCpfResponsavel" placeholder="Digite o CPF" />
                    </div>


                    <div class="form-group col-md-6 pb-2">
                        <label for="txtRg">RG</label>
                        <input type="text" class="form-control txtRg" id="txtRgResponsavel" name="txtRgResponsavel" placeholder="Digite o RG" />
                    </div>

                </div>


                <div class="form-row w-100 mt-5">



                    <div class="form-group col-md-4 d-flex align-items-end justify-content-end pb-2 pt-2">

                        <button type="button" class="btn btn-outline-danger w-100 flat prev action" name="prev">
                            <i class="fas fa-arrow-left"></i> Voltar etapa
                        </button>

                    </div>


                    <div class="form-group col-md-4 d-flex align-items-end justify-content-end pb-2 pt-2">

                        <button type="reset" class="btn btn-outline-danger w-100 flat">
                            <i class="far fa-window-close"></i> Limpar
                        </button>

                    </div>




                    <div class="form-group col-md-4 d-flex align-items-end justify-content-end pb-2 pt-2">

                        <button type="submit" class="btn btn-danger w-100 flat action" name="next">
                            <i class="far fa-paper-plane"></i> Finalizar Cadastro
                        </button>

                    </div>

                </div>

            </fieldset>


            <div class="modal fade" id="adicionar-telefone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal-title-adicionar-telefone"> Adicionar telefone </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="../controller/adicionarTelefoneDoador.php">

                                <div class="form-row d-flex justify-content-center">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="rbTipoResidencial" name="rbTipoContato" class="custom-control-input" value="residencial" checked="checked">
                                        <label class="custom-control-label" for="rbTipoResidencial">Residencial</label>
                                    </div>

                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="rbTipoCelular" name="rbTipoContato" class="custom-control-input" value="celular">
                                        <label class="custom-control-label" for="rbTipoCelular">Celular</label>
                                    </div>

                                </div>
                                <div class="form-row">

                                    <div class="form-group col-md-12 py-2">
                                        <label for="txtTelefoneDoador">Telefone</label>
                                        <input type="text" name="txtTelefoneDoador" id="txtTelefoneDoador" class="form-control telefone-residencial" placeholder="Digite o telefone" />
                                    </div>

                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-danger">Adicionar</button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="limpar-campos-pessoais" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal-title-limpar-campos-pessoais"> Limpar campos </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5> Deseja limpar todos os campos ?</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-danger" id="btn-limpar-campos-pessoais" data-dismiss="modal">Limpar</button>
                        </div>
                    </div>
                </div>
            </div>


        </form>

    </div>


</main>

<?php

include_once("imports/imports-js.php");

?>


</body>

</html>