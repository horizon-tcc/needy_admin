<title> Consultar doadores </title>
<?php
include_once('imports/header.php');
require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

?>

<main>

    <div class="container-fluid mt-2 py-2">

        <form action="../controller/doador/consultar-doadores.php" method="post" class="w-100">

            <div class="row">

                <div class="col-md-12">

                    <h2 class="text-center"> Consultar pelos doadores </h2>


                </div>


            </div>

            <div class="row">
                <div class="col-md-12 text-right">

                    <a href="doadores.php"> <button type="button" class="btn btn-danger"> Novo doador <i
                                class="fas fa-plus"></i> </button> </a>
                </div>
            </div>

            <hr />

            <div class="form-row d-flex justify-content-center align-items-center mt-5">

                <div class="form-group col-md-6 d-flex align-items-center justify-content-center color-gray">

                    <input type="text" name="txtPesquisa" id="txtPesquisa" class="input-for-search"
                        placeholder="Digite o nome do doador" />

                    <i class="fas fa-search ml-2"></i>
                </div>

            </div>




        </form>


        <div class="container-cards d-flex justify-content-center flex-wrap">

            <?php

                $doadorController = new DoadorController();

                $doadores = $doadorController->getAll();

                if ($doadores != null) {


                    foreach ($doadores as $d) {

                        // echo "<div class='card-consulta'>"

                        //     . "<img src='../img/img_doadores/" . $d['fotoUsuario'] . "' class='' />"

                        //     . "<h6 class='text-center mt-5'>" . $d['nomeDoador'] . "</h6>"
                        //     . "<h6 class='text-center mt-2'>" . $d['cpfDoador'] . "</h6>"
                        //     . "<h6 class='text-center mt-2'>" . $d['descricaoTipoSanguineo'] . "</h6>"

                        //     . "<a href='doadores.php?idDoador=" . $d['idDoador'] . "'> <button class='mt-4'> <i class='fas fa-pen'></i> </button> </a>"
                        //     . "<a href='../controller/doador/remover-doador.php?idDoador=" . $d['idDoador'] . "'> <button class='mt-4 remover-doador'> <i class='far fa-trash-alt'></i> </button> </a>"
                        //     . "</div>";


                        echo "<div class='card-consulta'>"

                            . "<img src='../img/img_doadores/" . $d['fotoUsuario'] . "' class='' />"

                            . "<h6 class='text-center mt-5'>" . $d['nomeDoador'] . "</h6>"
                            . "<h6 class='text-center mt-2'>" . $d['cpfDoador'] . "</h6>"
                            . "<h6 class='text-center mt-2'>" . $d['descricaoTipoSanguineo'] . "</h6>"

                            . "<a href='doadores.php?idDoador=" . $d['idDoador'] . "'> <button class='mt-4'> <i class='fas fa-pen'></i> </button> </a>"
                            . "<a href='../controller/doador/remover-doador.php?idDoador=" . $d['idDoador'] . "' class='remover-doador'> <button class='mt-4' data-toggle='modal' data-target='#modal-remover-doador'> <i class='far fa-trash-alt'></i> </button> </a>"
                            . "</div>";
                    }
                } else {

                    echo "<h6 class='mt-4'> Nenhum doador foi cadastrado ainda </h6>";
                }

            ?>

        </div>

    </div>



    <div class="modal fade" id="modal-remover-doador" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="../controller/doador/remover-doador.php" method="POST" id="form-remover-doador">
                    <div class="modal-header">
                        <h6 class="modal-title font-bold" id="modal-title-remover-doador"> Remover doador </h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">


                        <div class="form-row d-flex justify-content-center">

                            <div class="form-group col-md-12 py-2">

                                <h5 id="desc-remover-doador" class="text-center"> Deseja remover o doador selecionado ?
                                </h5>
                                <input type="hidden" name="hdUrlDoadorRemovido" id="hdUrlDoadorRemovido" />
                            </div>


                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-danger" id="btn-remover-doador" value="Remover" />
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- <div class="modal fade" id="modal-remover-doador" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="../controller/doador/remover-doador.php" method="POST" id="form-remover-doador">
                    <div class="modal-header">
                        <h6 class="modal-title font-bold" id="modal-title-remover-doador"> Remover doador </h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">


                        <div class="form-row d-flex justify-content-center">

                            <div class="form-group col-md-12 py-2">

                                <h5 id="desc-remover-doador" class="text-center"> Deseja remover o doador selecionado ? </h5>
                                <input type="hidden" name="hdUrlDoadorRemovido" id="hdUrlDoadorRemovido" />
                            </div>


                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-danger" id="btn-remover-doador" value="Remover" />
                    </div>
                </form>
            </div>
        </div>
    </div> -->

</main>

<?php

include_once("imports/imports-js.php");

?>


<script src="../js/script-consulta-doador.js"></script>

</body>

</html>