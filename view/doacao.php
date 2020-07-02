<title> Doação </title>
<?php
include_once('imports/header.php');
require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

?>

<?php

define("NENHUM_DOADOR_SELECIONADO", 0);

?>



<main>

    <div class="container-fluid d-flex justify-content-center align-items-center mt-2">

        <form action="../controller/doador/cadastrar-doacao.php" method="post" class="form-donnor w-100 pb-5" id="form-doacao" enctype="multipart/form-data">

            <input type="hidden" id="hdIdDonor" name="hdIdDonor" value="<?php echo NENHUM_DOADOR_SELECIONADO ?>" />
            <div class="row">

                <div class="col-md-12 mt-4">

                    <h2 class="text-center font-red"> <i class="fas fa-tint"></i> </h2>
                    <h2 class="text-center"> Cadastro de doações </h2>
                    <h6 class="text-center mt-2"> Registre as doações de cada doador </h6>
                    <hr class="mt-4" />

                </div>

            </div>


            <div class="form-row">

                <div class="form-group col-md-12 py-3">
                    <h6 class="mb-3 text-center"> <strong class="red"> * </strong> Selecione o doador</h6>

                    <div id="card-donor-selected" class="selected-donor w-100 d-block mx-auto cursor-pointer" data-toggle="modal" data-target="#modal-search-for-donors">
                        <div class="selected-donor-content-container d-flex justify-content-start h-100">

                            <div class="d-flex justify-content-center align-items-center w-100">
                                <span class="ml-3"> <strong class="font-size-medium"> ... </strong> </span>
                                <i class="fas fa-edit ml-3"> </i>
                            </div>

                        </div>

                        <div id="feedback-valid-doador-selecionado" class="valid-feedback">
                            Doador selecionado!
                        </div>
                        <div id="feedback-invalid-doador-selecionado" class="invalid-feedback">
                            Doador não selecionado!
                        </div>

                    </div>
                </div>
            </div>

            <hr />

            <div class="form-row">

                <div class="col-md-3 py-3 form-group">

                    <label for="seTipoDoacao"> <strong class='red'> * </strong> Tipo da doação </label>

                    <select class="form-control flat w-100" name="seTipoDoacao" id="seTipoDoacao">


                        <?php

                        $tipoDoacaoController = new TipoDoacaoController();

                        $result = $tipoDoacaoController->getAll();

                        foreach ($result as $r) {

                            echo "<option value='" . $r['idTipoDoacao'] . "'>" . $r['descricaoTipoDoacao'] . "</option>";
                        }
                        ?>

                    </select>


                    <div id="feedback-valid-tipo-doacao" class="valid-feedback">
                        Tipo da doação válido!
                    </div>

                    <div id="feedback-invalid-tipo-doacao" class="invalid-feedback">
                        Tipo da doação inválido
                    </div>

                </div>

                <div class="col-md-3 py-3 form-group">

                    <label for="txtTotalDoacao"> <strong class="red">*</strong> Total doado </label>
                    <input class="form-control flat" type="number" id="txtTotalDoacao" name="txtTotalDoacao" placeholder="Digite o total doado" maxlength="5" />


                    <div id="feedback-valid-total-doacao" class="valid-feedback">
                        Total da doação válido!
                    </div>

                    <div id="feedback-invalid-total-doacao" class="invalid-feedback">
                        Total da doação inválido!
                    </div>
                </div>

                <div class="col-md-6 py-3 form-group">


                    <label for="seUnidadeMedida"> <strong class='red'> * </strong> Unidade de medida </label>

                    <select class="form-control flat w-100" name="seUnidadeMedida" id="seUnidadeMedida">

                        <?php

                        $unidadeMedidaDao = new UnidadeMedidaDAO();

                        $result = $unidadeMedidaDao->getAll();

                        foreach ($result as $r) {

                            echo "<option value='" . $r['idUnidadeMedida'] . "'>" . $r['descricaoUnidadeMedida'] . "</option>";
                        }
                        ?>

                    </select>



                    <div id="feedback-valid-unidade-medida" class="valid-feedback">
                        Unidade de medida válida!
                    </div>

                    <div id="feedback-invalid-unidade-medida" class="invalid-feedback">
                        Unidade de medida inválida!
                    </div>

                </div>
            </div>

            <div class="form-row">

                <div class="form-group col-md-12 py-3">

                    <label for="txtDataDoacao"> Data da doação </label>
                    <input type="date" class="form-control flat" name="txtDataDoacao" id="txtDataDoacao" />


                    <div id="feedback-valid-data-doacao" class="valid-feedback">
                        Material doado válido!
                    </div>

                    <div id="feedback-invalid-material-doado" class="invalid-feedback">
                        Material doado inválido!
                    </div>
                </div>
            </div>

            <div class="form-row">

                <div class="form-group col-md-12 py-3">


                    <label for="seMaterialDoado"> Informe o material doado </label>

                    <select name="seMaterialDoado" id="seMaterialDoado" class="form-control flat">

                        <?php

                        $materialDao = new MaterialDoadoDAO();

                        $result = $materialDao->getAll();

                        foreach ($result as $r) {

                            echo "<option value='" . $r['idMaterialDoado'] . "'>" . $r['descricaoMaterialDoado'] . "</option>";
                        }

                        ?>


                    </select>


                    <div id="feedback-valid-material-doado" class="valid-feedback">
                        Material doado válido!
                    </div>

                    <div id="feedback-invalid-material-doado" class="invalid-feedback">
                        Material doado inválido!
                    </div>
                </div>
            </div>

            <div class="form-row">

                <div class="form-group col-md-12 py-3">
                    <label for="txtPesoDoador"> Informe o peso atual do doador </label>
                    <input type="number" class="form-control flat" name="txtPesoDoador" id="txtPesoDoador" name="txtPesoDoador" placeholder="Digite o peso atual do doador" maxlength="3"/>


                    <div id="feedback-valid-peso-doador" class="valid-feedback">
                        Peso do doador válido!
                    </div>

                    <div id="feedback-invalid-peso-doador" class="invalid-feedback">
                        Peso do doador inválido!
                    </div>
                </div>
            </div>


            <div class="form-row w-100 mt-5 d-flex justify-content-center">


                <div class="form-group col-md-4 d-flex align-items-end justify-content-end pb-2 pt-2">

                    <button type="button" class="btn btn-outline-danger w-100 flat" data-toggle="modal" data-target="#modal-limpar-campos-doacao">
                        <i class="far fa-window-close"></i> Limpar
                    </button>

                </div>


                <div class="form-group col-md-4 d-flex align-items-end justify-content-end pb-2 pt-2">

                    <button type="button" class="btn btn-danger w-100 flat action next" name="next">
                        <i class="far fa-paper-plane"></i> Finalizar cadastro
                    </button>

                </div>

            </div>

        </form>


        <div class="modal fade bd-example-modal-lg" id="modal-search-for-donors" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title font-bold" id="exampleModalLongTitle"> <i class="fas fa-search"></i> Selecione um doador </h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="txtConsultarCpfDoador"> Pesquisar por CPF </label>
                                <input type="text" class="input-for-search w-100 txtCpf" name="txtConsultarCpfDoador" id="txtConsultarCpfDoador" />
                            </div>
                        </div>

                        <div class="container-donors w-100 pt-5">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> OK </button>
                    </div>
                </div>
            </div>
        </div>



        <div class="modal fade" id="modal-limpar-campos-doacao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title font-bold" id="modal-title-limpar-campos-doacao"> <i class="fas fa-broom"></i> Limpar campos</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h6 class="text-center py-3"> Você deseja limpar todos os campos ? </h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"> Cancelar </button>
                        <button type="button" id="btn-limpar-campos-doacao" class="btn btn-danger" data-dismiss="modal"> Limpar </button>
                    </div>
                </div>
            </div>
        </div>

    </div>

</main>

<?php

include_once("imports/imports-js.php");

?>


<script src="../js/script-doacao.js"></script>
</body>

</html>