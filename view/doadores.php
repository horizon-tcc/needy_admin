<title>Doadores</title>
<?php
include_once('imports/header.php');
require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

?>

<?php 

    TelefoneDoadorController::limparSessaoDoadorTelefone();
    TelefoneResponsavelController::limparSessaoResponsavelTelefone();
?>

<main>

    <div class="container-fluid d-flex justify-content-center align-items-center mt-2">

        <form action="../controller/doador/cadastrar-doador.php" method="post" class="w-100" id="form-insert"
            enctype="multipart/form-data">

            <h2 class="text-center mt-4"> Cadastro de doadores </h2>
            <ul id="progress" class="text-center d-flex mt-2 pt-3">

                <li class="flex-fill activated-section"> Pessoal </li>
                <li class="flex-fill"> Endereço </li>
                <li class="flex-fill"> Contato </li>
                <li class="flex-fill"> Responsável </li>

            </ul>


            <fieldset class="mt-5 pb-4">
                <i class="fas fa-user text-center d-block mx-auto small-icon"></i>
                <h2 class="text-center mt-2"> Informações pessoais </h2>
                <h6 class="text-center mt-2"> Digite algumas informações sobre o doador </h6>
                <hr />
                <div class="form-row w-100 mt-5">
                    <img src="../img/camera.png" class="form-img d-block mx-auto" id="imgPreview" name="imgPreview" />
                </div>
                <div class="form-row w-100 d-flex justify-content-center">

                    <div class="input-group mb-3 col-md-5">

                        <div class="custom-file">

                            <input type="file" class="custom-file-input img-input" name="imgDoador" id="imgDoador"
                                accept="image/*">
                            <label class="" for="imgDoador" id="file-description">
                                <span> <strong> * </strong> </span>
                                <span> <i class="far fa-file-image"></i> </span>
                                <span> Escolha uma imagem </span>
                            </label>

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
                        <label for="txtNomeDoador"> <strong class="red"> * </strong> Nome </label>
                        <input type="text" class="form-control flat" name="txtNomeDoador" id="txtNomeDoador"
                            placeholder="Digite o nome" maxlength="100" />

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
                        <label for="seSexo"> <strong class="red"> * </strong> Sexo</label>
                        <select class="form-control flat" name="seSexo" id="seSexo">

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
                        <label for="txtDataNascimento"> <strong class="red"> * </strong> Data de nascimento</label>
                        <input type="date" class="form-control input-date flat" id="txtDataNascimento"
                            name="txtDataNascimento" placeholder="Escolha a data de nascimento" />

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
                        <label for="seTipoSanguineo"> <strong class="red"> * </strong> Tipo sanguíneo</label>
                        <select class="form-control flat" name="seTipoSanguineo" id="seTipoSanguineo">
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
                        <label for="seFatorRh"> <strong class="red"> * </strong> Fator Rh</label>
                        <select class="form-control flat" name="seFatorRh" id="seFatorRh">

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

                        <label for="txtCpfDoador"> <strong class="red"> * </strong> CPF</label>
                        <input type="text" class="form-control txtCpf flat" id="txtCpfDoador" name="txtCpfDoador"
                            placeholder="Digite o CPF" />
                        <div id="feedback-valid-cpf-Doador" class="valid-feedback">
                            CPF válido!
                        </div>
                        <div id="feedback-invalid-cpf-Doador" class="invalid-feedback">
                            CPF inválido!
                        </div>
                    </div>

                    <div class="form-group col-md-6 pb-2">
                        <label for="txtRgDoador"> <strong class="red"> * </strong> RG</label>
                        <input type="text" class="form-control txtRg flat" id="txtRgDoador" name="txtRgDoador"
                            placeholder="Digite o RG" />

                        <div id="feedback-valid-rg-Doador" class="valid-feedback">
                            RG válido!
                        </div>
                        <div id="feedback-invalid-rg-Doador" class="invalid-feedback">
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

                        <!-- <input type="button" class="btn btn-outline-danger w-100" value="Adicionar responsável" data-toggle="modal" data-target="#exampleModal" /> -->

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

                <i class="fas fa-road text-center d-block mx-auto small-icon"></i>
                <h2 class="text-center mt-2"> Informações de endereço </h2>
                <h6 class="text-center"> Digite algumas informações para que os hemocentros possam encontrar o doador
                </h6>
                <hr />

                <div class="form-row w-100 mt-5">

                    <div class="form-group col-md-12 pb-2">

                        <label for="txtCep"> <strong class="red"> * </strong> CEP</label>
                        <input type="text" class="form-control txtCep flat" id="txtCep" name="txtCep"
                            placeholder="Digite o CEP" />

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

                        <label for="txtLogradouro"> <strong class="red"> * </strong> Logradouro</label>
                        <input type="text" class="form-control flat" id="txtLogradouro" name="txtLogradouro"
                            placeholder="Digite o logradouro" maxlength="100" />

                        <div id="feedback-valid-logradouro-Doador" class="valid-feedback">
                            Logradouro válido!
                        </div>

                        <div id="feedback-invalid-logradouro-Doador" class="invalid-feedback">
                            Logradouro inválido!
                        </div>
                    </div>

                    <div class="form-group col-md-4 pb-2">

                        <label for="txtBairro"> <strong class="red"> * </strong> Bairro</label>
                        <input type="text" class="form-control flat" id="txtBairro" name="txtBairro"
                            placeholder="Digite o bairro" maxlength="100" />


                        <div id="feedback-valid-bairro-Doador" class="valid-feedback">
                            Bairro válido!
                        </div>

                        <div id="feedback-invalid-bairro-Doador" class="invalid-feedback">
                            Bairro inválido!
                        </div>
                    </div>

                    <div class="form-group col-md-4 pb-2">

                        <label for="txtCidade"> <strong class="red"> * </strong> Cidade</label>
                        <input type="text" class="form-control flat" id="txtCidade" name="txtCidade"
                            placeholder="Digite a cidade" maxlength="100" />


                        <div id="feedback-valid-cidade-Doador" class="valid-feedback">
                            Cidade válida!
                        </div>

                        <div id="feedback-invalid-cidade-Doador" class="invalid-feedback">
                            Cidade inválida!
                        </div>

                    </div>


                </div>

                <div class="form-row w-100">

                    <div class="form-group col-md-4 pb-2">

                        <label for="txtUf"> <strong class="red"> * </strong> UF</label>
                        <input type="text" class="form-control flat" id="txtUf" name="txtUf"
                            placeholder="Digite o estado" maxlength="2" />


                        <div id="feedback-valid-uf-Doador" class="valid-feedback">
                            UF válida!
                        </div>

                        <div id="feedback-invalid-uf-Doador" class="invalid-feedback">
                            UF inválida!
                        </div>

                    </div>

                    <div class="form-group col-md-4 pb-2">

                        <label for="txtNumero"> <strong class="red"> * </strong> Número</label>
                        <input type="text" class="form-control flat" id="txtNumero" name="txtNumero"
                            placeholder="Digite o número residencial" maxlength="5" />

                        <div id="feedback-valid-numero-Doador" class="valid-feedback">
                            Número válido!
                        </div>

                        <div id="feedback-invalid-numero-Doador" class="invalid-feedback">
                            Número inválido!
                        </div>
                    </div>

                    <div class="form-group col-md-4 pb-2">

                        <label for="txtComplemento">Complemento</label>
                        <input type="text" class="form-control flat" id="txtComplemento" name="txtComplemento"
                            placeholder="Digite o complemento do endereço" maxlength="70" />
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
                            data-target="#limpar-campos-endereco">
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
                <h6 class="text-center"> Digite algumas informações para que o hemocentro possa entrar em contato com o
                    doador </h6>
                <hr />

                <div class="form-row w-100 mt-5 d-flex justify-content-center">

                    <div class="form-group col-md-6 pb-2">
                        <label for="txtEmail"> <strong class="red"> * </strong> E-mail</label>
                        <input type="email" class="form-control flat" name="txtEmail" id="txtEmail"
                            placeholder="Digite o e-mail" maxlength="80" />

                        <div id="feedback-valid-nome-Doador" class="valid-feedback">
                            Email válido!
                        </div>
                        <div id="feedback-invalid-nome-Doador" class="invalid-feedback">
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

                </div>

            </fieldset>

            <fieldset class="mt-5 pb-4">

                <i class="fas fa-child text-center d-block mx-auto small-icon"></i>
                <h2 class="text-center mt-2"> Informações sobre os responsáveis do doador </h2>
                <h6 class="text-center"> Digite algumas informações sobre os responsáveis (caso o doador seja menor de
                    idade) </h6>
                <hr />

                <div class="form-row mt-5 w-100">

                    <div class="form-group col-md-6 pb-2">

                        <label for="txtNomeResponsavel"> <strong class="red"> * </strong> Nome</label>
                        <input type="text" class="form-control flat" name="txtNomeResponsavel" id="txtNomeResponsavel"
                            placeholder="Digite o nome" />

                        <div id="feedback-valid-nome-Responsavel" class="valid-feedback">
                            Nome válido!
                        </div>
                        <div id="feedback-invalid-nome-Responsavel" class="invalid-feedback">
                            Nome inválido!
                        </div>
                    </div>

                    <div class="form-group col-md-6 pb-2">
                        <label for="txtDataNascimentoResponsavel"> <strong class="red"> * </strong> Data de
                            nascimento</label>
                        <input type="date" class="form-control flat" id="txtDataNascimentoResponsavel"
                            name="txtDataNascimentoResponsavel" placeholder="Escolha a data de nascimento" />

                        <div id="feedback-valid-data-Responsavel" class="valid-feedback">
                            Data de nascimento válida!
                        </div>

                        <div id="feedback-invalid-data-Responsavel" class="invalid-feedback">
                            Data de nascimento inválida!
                        </div>

                    </div>

                </div>

                <div class="form-row w-100">


                    <div class="form-group col-md-6 pb-2">
                        <label for="txtCpfResponsavel"> <strong class="red"> * </strong> CPF</label>
                        <input type="text" class="form-control txtCpf flat" id="txtCpfResponsavel"
                            name="txtCpfResponsavel" placeholder="Digite o CPF" />

                        <div id="feedback-valid-cpf-Responsavel" class="valid-feedback">
                            CPF válido!
                        </div>

                        <div id="feedback-invalid-cpf-Responsavel" class="invalid-feedback">
                            CPF inválido!
                        </div>

                    </div>


                    <div class="form-group col-md-6 pb-2">
                        <label for="txtRgResponsavel"> <strong class="red"> * </strong> RG</label>
                        <input type="text" class="form-control txtRg flat" id="txtRgResponsavel" name="txtRgResponsavel"
                            placeholder="Digite o RG" />

                        <div id="feedback-valid-rg-Responsavel" class="valid-feedback">
                            RG válido!
                        </div>
                        <div id="feedback-invalid-rg-Responsavel" class="invalid-feedback">
                            RG inválido!
                        </div>
                    </div>

                </div>


                <div class="form-row w-100 mt-4 d-flex justify-content-center">

                    <div class="form-group w-100">
                        <h4 class="text-center"> <strong class="red"> * </strong> Telefones </h4>
                        <div class="w-100 mt-3 d-flex justify-content-center align-items-center flex-column">

                            <ul class="list-telefone" id="list-telefone-responsavel">
                                <div class="container-item-telefone" id="container-item-telefone-responsavel">
                                    <?php

                                    if (isset($_SESSION['telefonesResponsavel']) && !empty($_SESSION["telefonesResponsavel"])) {

                                        $vetTelefones =  $_SESSION["telefonesResponsavel"];

                                        foreach ($vetTelefones as $telefone) {

                                            echo ("<li class='item-telefone d-flex bd-highlight align-items-center'>"
                                                . "<i class='fas fa-phone-alt flex-fill bd-highlight'></i>"
                                                . "<div class='h-100 flex-fill bd-highlight container-span-telefone'>"
                                                . "<span class='h-100 d-flex justify-content-center align-items-center desc-telefone'>" . $telefone . "</span>"
                                                . "</div>"
                                                . "<i class='fas fa-times flex-fill bd-highlight remover-telefone-responsavel'></i>"
                                                . "</li>");
                                        }
                                    } else {
                                        echo ("<div id='msg-list-telefone-responsavel'> <h5 class='text-center mt-3'> Nenhum telefone adicionado </h5> </div>");
                                    }

                                    ?>

                                </div>
                                <button type="button" class="btn btn-danger w-100 flat" data-toggle="modal"
                                    data-target="#modal-adicionar-telefone-responsavel">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </ul>

                            <div id="feedback-valid-telefone-Responsavel" class="valid-feedback w-100 text-center">
                                Correto!
                            </div>

                            <div id="feedback-invalid-telefone-Responsavel" class="invalid-feedback w-100 text-center">
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
                            data-target="#limpar-campos-responsavel">
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


        <div class="modal fade" id="limpar-campos-endereco" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-title-limpar-campos-endereco"> Limpar campos </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5> Deseja limpar os campos desta etapa ? </h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger" id="btn-limpar-campos-endereco"
                            data-dismiss="modal">Limpar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="limpar-campos-contato" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-title-limpar-campos-contato"> Limpar campos </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5> Deseja limpar os campos desta etapa ? </h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger" id="btn-limpar-campos-contato"
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


        <div class="modal fade" id="modal-adicionar-telefone-doador" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="post" action="../controller/doador/adicionar-telefone.php"
                        id="form-adicionar-telefone-doador">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal-title-adicionar-telefone"> Adicionar telefone para o
                                doador </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="form-row d-flex justify-content-center">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="rbTipoResidencialDoador" name="rbTipoContato"
                                        class="custom-control-input" value="residencial" checked="checked">
                                    <label class="custom-control-label"
                                        for="rbTipoResidencialDoador">Residencial</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="rbTipoCelularDoador" name="rbTipoContato"
                                        class="custom-control-input" value="celular">
                                    <label class="custom-control-label" for="rbTipoCelularDoador">Celular</label>
                                </div>

                            </div>
                            <div class="form-row">

                                <div class="form-group col-md-12 py-2">
                                    <label for="txtTelefoneDoador">Telefone</label>
                                    <input type="text" name="txtTelefoneDoador" id="txtTelefoneDoador"
                                        class="form-control telefone-residencial flat"
                                        placeholder="Digite o telefone" />

                                    <div id="feedback-valid-telefone-Doador" class="valid-feedback">
                                        Telefone válido!
                                    </div>

                                    <div id="feedback-invalid-telefone-Doador" class="invalid-feedback">
                                        Telefone inválido!
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                            <input type="submit" class="btn btn-danger" value="Adicionar" />
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="modal fade" id="modal-remover-telefone-doador" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="../controller/doador/remover-telefone.php" method="POST"
                        id="form-remover-telefone-doador">
                        <div class="modal-header">
                            <h6 class="modal-title" id="modal-title-remover-telefone"> Remover telefone </h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="form-row d-flex justify-content-center">

                                <div class="form-group col-md-12 py-2">

                                    <h5 id="desc-remover-telefone-doador" class="text-center"> Deseja remover o seguinte
                                        telefone:</h5>
                                    <input type="hidden" name="hdTelefoneRemovidoDoador"
                                        id="hdTelefoneRemovidoDoador" />
                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                            <input type="submit" class="btn btn-danger" id="btn-remover-telefone-doador"
                                value="Remover" />
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="modal fade" id="modal-adicionar-telefone-responsavel" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="post" action="../controller/responsavel/adicionar-telefone.php"
                        id="form-adicionar-telefone-responsavel">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal-title-adicionar-telefone-responsavel"> Adicionar telefone
                                para o responsável </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">


                            <div class="form-row d-flex justify-content-center">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="rbTipoResidencialResponsavel"
                                        name="rbTipoContatoResponsavel" class="custom-control-input" value="residencial"
                                        checked="checked">
                                    <label class="custom-control-label"
                                        for="rbTipoResidencialResponsavel">Residencial</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="rbTipoCelularResponsavel" name="rbTipoContatoResponsavel"
                                        class="custom-control-input" value="celular">
                                    <label class="custom-control-label" for="rbTipoCelularResponsavel">Celular</label>
                                </div>

                            </div>
                            <div class="form-row">

                                <div class="form-group col-md-12 py-2">
                                    <label for="txtTelefoneResponsavel">Telefone</label>
                                    <input type="text" name="txtTelefoneResponsavel" id="txtTelefoneResponsavel"
                                        class="form-control telefone-residencial flat  "
                                        placeholder="Digite o telefone" />

                                    <div id="feedback-valid-telefone-Doador" class="valid-feedback">
                                        Telefone válido!
                                    </div>

                                    <div id="feedback-invalid-telefone-Doador" class="invalid-feedback">
                                        Telefone inválido!
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                            <input type="submit" class="btn btn-danger" value="Adicionar" />
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="modal fade" id="modal-remover-telefone-responsavel" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="../controller/responsavel/remover-telefone.php" method="POST"
                        id="form-remover-telefone-responsavel">
                        <div class="modal-header">
                            <h6 class="modal-title" id="modal-title-remover-telefone-responsavel"> Remover telefone
                            </h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">

                            <div class="form-row d-flex justify-content-center">

                                <div class="form-group col-md-12 py-2">

                                    <h5 id="desc-remover-telefone-responsavel" class="text-center"> Deseja remover o
                                        seguinte telefone:</h5>
                                    <input type="hidden" name="hdTelefoneRemovidoResponsavel"
                                        id="hdTelefoneRemovidoResponsavel" />
                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                            <input type="submit" class="btn btn-danger" id="btn-remover-telefone-responsavel"
                                value="Remover" />
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>


</main>

<?php

include_once("imports/imports-js.php");

?>


<script src="../js/script-doador.js"></script>
<script src="../js/script-responsavel.js"></script>
</body>

</html>