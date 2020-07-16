<title> Banco de sangue </title>
<?php
include_once('imports/header.php');
require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

?>

<?php

define("NENHUM_BANCO_DE_SANGUE_SELECIONADO", 0);

?>

<?php

BancoSangueController::limparSessaoHorarios();
TelefoneBancoSangueController::limparSessaoBancoSangueTelefone();

?>

<?php

$bancoSangue = null;

?>



<main>

    <div class="container-fluid d-flex justify-content-center align-items-center mt-2">

        <form action="" method="post" class="form-donnor w-100 pb-5" id="form-banco-sangue" enctype="multipart/form-data">

            <input type="hidden" id="hdIdBancoSangue" name="hdIdBancoSangue" value="<?php echo NENHUM_BANCO_DE_SANGUE_SELECIONADO ?>" />


            <h2 class="text-center mt-4"> Cadastro de bancos de sangue </h2>
            <ul id="progress" class="text-center d-flex mt-2 pt-3">

                <li class="flex-fill activated-section"> Sobre </li>
                <li class="flex-fill"> Endereço </li>
                <li class="flex-fill"> Contato </li>
            </ul>

            <fieldset class="mt-5 pb-4">

                <div class="row">

                    <div class="col-md-12 mt-4">

                        <h2 class="text-center font-red"> <i class="fas fa-hospital"></i> </h2>
                        <h2 class="text-center"> Banco de sangue </h2>
                        <h6 class="text-center mt-2"> Passe algumas informações sobre o banco de sangue </h6>
                        <hr class="mt-4" />

                    </div>

                </div>


                <div class="form-row w-100 mt-5">
                    <img src="<?php echo ($bancoSangue != null) ? "../img/img_banco_sangue/" . $bancoSangue->getFoto() : "../img/camera.png" ?>" class="<?php echo ($bancoSangue != null) ? "img-preview d-block mx-auto" : "form-img d-block mx-auto"; ?>" id="imgPreview" name="imgPreview" />
                </div>
                <div class="form-row w-100 d-flex justify-content-center">

                    <div class="input-group mb-3 col-md-5">

                        <div class="custom-file w-100">

                            <input type="file" class="custom-file-input img-input" name="imgBancoSangue" id="imgBancoSangue" accept="image/*" />
                            <label class="" for="imgBancoSangue" id="file-description">
                                <span> <strong> * </strong> </span>
                                <span> <i class="far fa-file-image"></i> </span>
                                <span><?php echo ($bancoSangue != null) ? $bancoSangue->getUsuario()->getFotoUsuario() : "Escolha uma imagem"; ?></span>
                            </label>

                        </div>

                    </div>

                    <div id="feedback-valid-img-banco-sague" class="valid-feedback">
                        Imagem válida!
                    </div>
                    <div id="feedback-invalid-img-banco-sague" class="invalid-feedback">
                        Imagem inválida!
                    </div>

                </div>

                <div class="form-row">

                    <div class="col-md-12 py-3 form-group">

                        <label for="txtNomeBancoSangue"> <strong class='red'> * </strong> Nome do banco de sangue </label>

                        <input type="text" class="form-control flat" name="txtNomeBancoSangue" id="txtNomeBancoSangue" placeholder="Digite o nome do banco de sangue" />

                        <div id="feedback-valid-tipo-sobre-banco-sangue" class="valid-feedback">
                            Nome do banco de sangue válido!
                        </div>

                        <div id="feedback-invalid-tipo-sobre-banco-sangue" class="invalid-feedback">
                            Nome do banco de sangue inválido!
                        </div>

                    </div>
                </div>


                <div class="form-row">

                    <div class="col-md-12 py-3 form-group text-center">

                        <button id='btn-activate-modal' type="button" class="btn btn-outline-danger flat w-25" data-toggle="modal" data-target="#modal-adicionar-horarios"> * <i class="far fa-clock mx-1"> </i> Adicionar Horários </button>

                        <div id="feedback-valid-horario-banco-sangue" class="valid-feedback">
                            Horário válido!
                        </div>

                        <div id="feedback-valid-horario-banco-sangue" class="invalid-feedback">
                            Passe pelo menos um horário!
                        </div>
                    </div>
                </div>

                <div class="form-row">

                    <div class="col-md-12 py-5 px-5 form-group">

                        <div class="container-horarios-adicionados d-flex justify-content-center flex-wrap w-100">


                        </div>
                    </div>
                </div>

                <div class="form-row w-100 mt-5 d-flex justify-content-center">

                    <div class="form-group col-md-4 d-flex align-items-end justify-content-end pb-2 pt-2">

                        <button type="button" class="btn btn-outline-danger w-100 flat" data-toggle="modal" data-target="#modal-limpar-campos-sobre-banco-sangue">
                            <i class="far fa-window-close"></i> Limpar
                        </button>

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
                <h6 class="text-center"> Digite algumas informações sobre o endereço do banco de sangue
                </h6>
                <hr />

                <div class="form-row w-100 mt-5">

                    <div class="form-group col-md-12 pb-2">

                        <label for="txtCep"> <strong class="red"> * </strong> CEP</label>
                        <input type="text" class="form-control txtCep flat" id="txtCep" name="txtCep" placeholder="Digite o CEP" value="" />

                        <div id="feedback-valid-cep-banco-sague" class="valid-feedback">
                            CEP válido!
                        </div>
                        <div id="feedback-invalid-cep-banco-sague" class="invalid-feedback">
                            CEP inválido!
                        </div>
                    </div>

                </div>

                <div class="form-row w-100">

                    <div class="form-group col-md-4 pb-2">

                        <label for="txtLogradouro"> <strong class="red"> * </strong> Logradouro</label>
                        <input type="text" class="form-control flat" id="txtLogradouro" name="txtLogradouro" placeholder="Digite o logradouro" maxlength="100" value="" />

                        <div id="feedback-valid-logradouro-banco-sague" class="valid-feedback">
                            Logradouro válido!
                        </div>

                        <div id="feedback-invalid-logradouro-banco-sague" class="invalid-feedback">
                            Logradouro inválido!
                        </div>
                    </div>

                    <div class="form-group col-md-4 pb-2">

                        <label for="txtBairro"> <strong class="red"> * </strong> Bairro</label>
                        <input type="text" class="form-control flat" id="txtBairro" name="txtBairro" placeholder="Digite o bairro" maxlength="100" value="" />


                        <div id="feedback-valid-bairro-banco-sague" class="valid-feedback">
                            Bairro válido!
                        </div>

                        <div id="feedback-invalid-bairro-banco-sague" class="invalid-feedback">
                            Bairro inválido!
                        </div>
                    </div>

                    <div class="form-group col-md-4 pb-2">

                        <label for="txtCidade"> <strong class="red"> * </strong> Cidade</label>
                        <input type="text" class="form-control flat" id="txtCidade" name="txtCidade" placeholder="Digite a cidade" maxlength="100" value="" />


                        <div id="feedback-valid-cidade-banco-sague" class="valid-feedback">
                            Cidade válida!
                        </div>

                        <div id="feedback-invalid-cidade-banco-sague" class="invalid-feedback">
                            Cidade inválida!
                        </div>

                    </div>


                </div>

                <div class="form-row w-100">

                    <div class="form-group col-md-4 pb-2">

                        <label for="txtUf"> <strong class="red"> * </strong> UF</label>
                        <input type="text" class="form-control flat" id="txtUf" name="txtUf" placeholder="Digite o estado" maxlength="2" value="" />


                        <div id="feedback-valid-uf-banco-sague" class="valid-feedback">
                            UF válida!
                        </div>

                        <div id="feedback-invalid-uf-banco-sague" class="invalid-feedback">
                            UF inválida!
                        </div>

                    </div>

                    <div class="form-group col-md-4 pb-2">

                        <label for="txtNumero"> <strong class="red"> * </strong> Número</label>
                        <input type="text" class="form-control flat" id="txtNumero" name="txtNumero" placeholder="Digite o número residencial" maxlength="5" value="" />

                        <div id="feedback-valid-numero-banco-sague" class="valid-feedback">
                            Número válido!
                        </div>

                        <div id="feedback-invalid-numero-banco-sague" class="invalid-feedback">
                            Número inválido!
                        </div>
                    </div>

                    <div class="form-group col-md-4 pb-2">

                        <label for="txtComplemento">Complemento</label>
                        <input type="text" class="form-control flat" id="txtComplemento" name="txtComplemento" placeholder="Digite o complemento do endereço" maxlength="70" value="" />
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

                        <button type="button" class="btn btn-outline-danger w-100 flat" data-toggle="modal" data-target="#modal-limpar-campos-endereco-banco-sangue">
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
                <h6 class="text-center"> Digite algumas informações sobre as formas de contato do hemocentro </h6>
                <hr />

                <div class="form-row w-100 mt-4 d-flex justify-content-center">

                    <div class="form-group w-100">
                        <h4 class="text-center"> <strong class="red"> * </strong> Telefones </h4>
                        <div class="w-100 mt-3 d-flex justify-content-center align-items-center flex-column">

                            <ul class="list-telefone" id="list-telefone-banco-sangue">
                                <div class="container-item-telefone" id="container-item-telefone-banco-sangue">
                                    <?php

                                    if (isset($_SESSION['telefonesBancoSangue']) && !empty($_SESSION["telefonesBancoSangue"])) {

                                        $vetTelefones = $_SESSION["telefonesBancoSangue"];

                                        foreach ($vetTelefones as $telefone) {

                                            echo ("<li class='item-telefone d-flex bd-highlight align-items-center'>"
                                                . "<i class='fas fa-phone-alt flex-fill bd-highlight'></i>"
                                                . "<div class='h-100 flex-fill bd-highlight container-span-telefone'>"
                                                . "<span class='h-100 d-flex justify-content-center align-items-center desc-telefone'>" . $telefone . "</span>"
                                                . "</div>"
                                                . "<i class='fas fa-times flex-fill bd-highlight remover-telefone-banco-sangue'></i>"
                                                . "</li>");
                                        }
                                    } else {
                                        echo ("<div id='msg-list-telefone-banco-sangue'> <h5 class='text-center mt-3'> Nenhum telefone adicionado </h5> </div>");
                                    }

                                    ?>

                                </div>
                                <button type="button" class="btn btn-danger w-100 flat" data-toggle="modal" data-target="#modal-adicionar-telefone-banco-sangue">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </ul>


                            <div id="feedback-valid-telefone-banco-sangue" class="valid-feedback w-100 text-center">
                                Correto!
                            </div>

                            <div id="feedback-invalid-telefone-banco-sangue" class="invalid-feedback w-100 text-center">
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

                        <button type="button" class="btn btn-outline-danger w-100 flat" data-toggle="modal" data-target="#modal-limpar-campos-contato-banco-sangue">
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

        </form>


        <div class="modal fade" id="modal-adicionar-horarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title font-bold" id="modal-title-adicionar-horarios"> <i class="far fa-clock mx-1"> </i> Adicione horários de funcionamento para o banco de sangue </h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="../controller/banco-sangue/adicionar-horarios-banco-sangue.php" method="post" class="form-adicionar-horario">

                            <h6 class="font-bold mb-2 text-center"> Selecione os dias da semana: </h6>
                            <div class="d-flex flex-wrap justify-content-center">

                                <?php

                                $diaSemanaController = new DiaSemanaController();
                                $diasDaSemana = $diaSemanaController->getAll();


                                foreach ($diasDaSemana as $diaSemana) {

                                    echo "<div class='custom-control custom-checkbox ml-2 mt-2'>"
                                        . "<input type='checkbox' class='custom-control-input' id='" . $diaSemana['descricaoDiaSemana'] . "' value='" . $diaSemana['idDiaSemana'] . "' name='" . "cb" . $diaSemana['idDiaSemana'] . "'/>"
                                        . "<label class='custom-control-label' for='" . $diaSemana['descricaoDiaSemana'] . "'> " . $diaSemana['descricaoDiaSemana'] . " </label>"
                                        . "</div>";
                                }

                                ?>


                            </div>


                            <div class="form-row">

                                <div class="col-md-12 py-3 form-group">
                                    <label for="txtHorarioAbertura"> Horário de abertura </label>
                                    <input type="time" class='form-control' name="txtHorarioAbertura" id="txtHorarioAbertura" />
                                </div>
                            </div>


                            <div class="form-row">

                                <div class="col-md-12 py-3 form-group">
                                    <label for="txtHorarioFechamento"> Horário de fechamento </label>
                                    <input type="time" class='form-control' name="txtHorarioFechamento" id="txtHorarioFechamento" />
                                </div>
                            </div>


                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"> Cancelar </button>
                        <button type="button" id="btn-adicionar-horario" class="btn btn-danger"> Adicionar </button>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="modal-adicionar-telefone-banco-sangue" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="post" action="../controller/banco-sangue/adicionar-telefone.php" id="form-adicionar-telefone-banco-sangue">
                        <div class="modal-header">
                            <h6 class="modal-title font-bold" id="modal-title-adicionar-telefone"> <i class="fas fa-phone-alt"></i> Adicionar telefone para o
                                banco de sangue </h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="form-row d-flex justify-content-center">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="rbTipoResidencialBancoSangue" name="rbTipoContato" class="custom-control-input" value="residencial" checked="checked">
                                    <label class="custom-control-label" for="rbTipoResidencialBancoSangue">Residencial</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="rbTipoCelularBancoSangue" name="rbTipoContato" class="custom-control-input" value="celular">
                                    <label class="custom-control-label" for="rbTipoCelularBancoSangue">Celular</label>
                                </div>

                            </div>
                            <div class="form-row">

                                <div class="form-group col-md-12 py-2">
                                    <label for="txtTelefoneBancoSangue">Telefone</label>
                                    <input type="text" name="txtTelefoneBancoSangue" id="txtTelefoneBancoSangue" class="form-control telefone-residencial flat" placeholder="Digite o telefone" />

                                    <div id="feedback-valid-telefone-Banco-sangue" class="valid-feedback">
                                        Telefone válido!
                                    </div>

                                    <div id="feedback-invalid-telefone-Banco-sangue" class="invalid-feedback">
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



        <div class="modal fade" id="modal-remover-telefone-banco-sangue" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="../controller/banco-sangue/remover-telefone.php" method="POST" id="form-remover-telefone-banco-sangue">
                        <div class="modal-header">
                            <h6 class="modal-title" id="modal-title-remover-telefone"> Remover telefone </h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="form-row d-flex justify-content-center">

                                <div class="form-group col-md-12 py-2">

                                    <h5 id="desc-remover-telefone-banco-sangue" class="text-center"> Deseja remover o seguinte
                                        telefone:</h5>
                                    <input type="hidden" name="hdTelefoneRemovidoBancoSangue" id="hdTelefoneRemovidoBancoSangue" />
                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                            <input type="submit" class="btn btn-danger" id="btn-remover-telefone-banco-sangue" value="Remover" />
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="modal fade" id="modal-limpar-campos-sobre-banco-sangue" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title font-bold" id="modal-title-limpar-campos-sobre-banco-sangue"> <i class="fas fa-broom"></i> Limpar campos</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h6 class="text-center py-3"> Você deseja limpar todos os campos ? </h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"> Cancelar </button>
                        <button type="button" id="btn-limpar-campos-sobre-banco-sangue" class="btn btn-danger" data-dismiss="modal"> Limpar </button>
                    </div>
                </div>
            </div>
        </div>



        <div class="modal fade" id="modal-limpar-campos-endereco-banco-sangue" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title font-bold" id="modal-title-limpar-campos-endereco-banco-sangue"> <i class="fas fa-broom"></i> Limpar campos</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h6 class="text-center py-3"> Você deseja limpar todos os campos ? </h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"> Cancelar </button>
                        <button type="button" id="btn-limpar-campos-endereco-banco-sangue" class="btn btn-danger" data-dismiss="modal"> Limpar </button>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="modal fade" id="modal-limpar-campos-contato-banco-sangue" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title font-bold" id="modal-title-limpar-campos-contato-banco-sangue"> <i class="fas fa-broom"></i> Limpar campos</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h6 class="text-center py-3"> Você deseja limpar todos os campos ? </h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"> Cancelar </button>
                        <button type="button" id="btn-limpar-campos-contato-banco-sangue" class="btn btn-danger" data-dismiss="modal"> Limpar </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php

include_once("imports/imports-js.php");

?>
<script src="../js/script-banco-sangue.js"></script>
</body>

</html>