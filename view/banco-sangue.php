<title> Doação </title>
<?php
include_once('imports/header.php');
require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

?>

<?php

define("NENHUM_BANCO_DE_SANGUE_SELECIONADO", 0);

?>

<?php

$bancoSangue = null;
?>



<main>

    <div class="container-fluid d-flex justify-content-center align-items-center mt-2">

        <form action="../controller/doador/cadastrar-doacao.php" method="post" class="form-donnor w-100 pb-5" id="form-doacao" enctype="multipart/form-data">

            <input type="hidden" id="hdIdBancoSangue" name="hdIdBancoSangue" value="<?php echo NENHUM_BANCO_DE_SANGUE_SELECIONADO ?>" />
            <div class="row">

                <div class="col-md-12 mt-4">

                    <h2 class="text-center font-red"> <i class="fas fa-hospital"></i> </h2>
                    <h2 class="text-center"> Banco de sangue </h2>
                    <h6 class="text-center mt-2"> Registre novos bancos de sangue e hemocentros que usarão o needy admin </h6>
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

                <div id="feedback-valid-img-Doador" class="valid-feedback">
                    Imagem válida!
                </div>
                <div id="feedback-invalid-img-Doador" class="invalid-feedback">
                    Imagem inválida!
                </div>

            </div>

            <div class="form-row">

                <div class="col-md-12 py-3 form-group">

                    <label for="txtNomeBancoSangue"> <strong class='red'> * </strong> Nome do banco de sangue </label>

                    <input type="text" class="form-control flat" name="txtNomeBancoSangue" id="txtNomeBancoSangue" placeholder="Digite o nome do banco de sangue" />

                    <div id="feedback-valid-tipo-doacao" class="valid-feedback">
                        Nome do banco de sangue válido!
                    </div>

                    <div id="feedback-invalid-tipo-doacao" class="invalid-feedback">
                        Nome do banco de sangue inválido!
                    </div>

                </div>
            </div>


            <div class="form-row">

                <div class="col-md-12 py-3 form-group text-center">

                    <button type="button" class="btn btn-danger flat" data-toggle="modal" data-target="#modal-adicionar-horarios"> * <i class="far fa-clock mx-1"> </i> Adicionar Horários </button>
                </div>
            </div>


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
                        <form action="../controller/banco-sangue/adicionar-horarios-banco-sangue.php" method="post">

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

                            <input type="submit" />
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"> Cancelar </button>
                        <button type="button" class="btn btn-danger"> Adicionar </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

<?php

include_once("imports/imports-js.php");

?>
<script src="../js/banco-sangue.js"></script>
</body>

</html>