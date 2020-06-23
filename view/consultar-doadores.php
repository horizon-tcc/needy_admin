<title> Consultar doadores </title>

<?php
include_once('imports/header.php');
require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

?>

<?php
define("PESQUISAR_POR_NOME", 1);
define("PESQUISAR_POR_CPF", 2);
define("PESQUISAR_POR_RG", 3);
define("PESQUISAR_POR_DATA_NASCIMENTO", 4);
define("PESQUISAR_POR_EMAIL", 5);
define("PESQUISAR_POR_TIPO_SANGUINEO", 6);
define("PESQUISAR_POR_FATOR_RH", 7);
?>
<main>

    <div class="container-fluid mt-2 py-2">

        <form action="../controller/doador/consultar-doadores.php" method="post" class="w-100">

            <div class="row">

                <div class="col-md-12">

                    <h2 class="text-center"> <i class="fas fa-search"></i> </h2>
                    <h2 class="text-center"> Consultar doadores </h2>


                </div>


            </div>

            <div class="row">
                <div class="col-md-12 text-right">

                    <a href="doadores.php"> <button type="button" class="btn btn-danger"> Novo doador <i class="fas fa-plus"></i> </button> </a>
                </div>
            </div>

            <hr />

            <div class="form-row d-flex justify-content-center align-items-center mt-5">

                <div class="form-group col-md-6 d-flex align-items-center justify-content-center color-gray">

                    <input type="hidden" value="<?php echo PESQUISAR_POR_NOME; ?>" id="hdSearchType" name="hdSearchType" />
                    <div class="container-search w-75"> <input type="text" name="txtPesquisa" id="txtPesquisa" class="input-for-search w-100" placeholder="Digite o nome do doador" /> </div>

                    <div class="ml-3">

                        <i class="fas fa-search ml-2"></i>

                        <i class="fas fa-filter ml-3 selection" data-toggle="modal" data-target="#modal-filter-doador"></i>
                    </div>

                </div>

            </div>




        </form>


        <div class="container-cards d-flex justify-content-center flex-wrap">

            <?php

            $doadorController = new DoadorController();

            $doadores = $doadorController->getAll();

            if ($doadores != null) {


                foreach ($doadores as $d) {


                    echo "<div class='card-consulta' id ='" . $d['idDoador'] . "'>"

                        . "<img src='../img/img_doadores/" . $d['fotoUsuario'] . "' class='' />"

                        . "<h6 class='text-center mt-5'>" . $d['nomeDoador'] . "</h6>"
                        . "<h6 class='text-center mt-2'>" . $d['cpfDoador'] . "</h6>"
                        . "<h6 class='text-center mt-2'>" . $d['descricaoTipoSanguineo'] . "</h6>"

                        . "<a href='doadores.php?idDoador=" . $d['idDoador'] . "' class='editar-doador'> <button class='mt-4'> <i class='fas fa-pen'></i> </button> </a>"
                        . "<a href='../controller/doador/remover-doador.php?idDoador=" . $d['idDoador'] . "' class='remover-doador'> <button class='mt-4' data-toggle='modal' data-target='#modal-remover-doador'> <i class='far fa-trash-alt'></i> </button> </a>"
                        . "</div>";
                }
            } else {

                echo "<h6 class='mt-4'> Nenhum doador foi cadastrado ainda </h6>";
            }


            ?>

        </div>

    </div>



    <div class="modal fade" id="modal-remover-doador" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

    <div class="modal fade bd-example-modal-lg" id="modal-view-doador" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title font-bold" id="modal-title-view-doador"> <i class="far fa-eye"></i> Visualizar doador </h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <img src="../img/girl.jpg" alt="" class="d-block mx-auto img-doador" id="img-doador">

                    <h2 class="text-center mt-3 nome-doador" id="nome-doador"> Beatriz tenório </h2>


                    <div class="section-personal w-100 mt-5 mt-5">

                        <div class="row mt-5">
                            <div class="col-md-12">

                                <h6 class="font-bold text-center"> Informações pessoais <span class="icon-modal"> <i class="far fa-id-card"></i> </span> </h6>
                                <hr />
                            </div>
                        </div>

                        <div class="row mt-4">

                            <div class="col-md-3">

                                <h6 class="font-bold"> CPF: <span id="cpf-doador"> 491.123.428-82 </span> </h6>

                            </div>

                            <div class="col-md-3">

                                <h6 class="font-bold"> RG: <span id="rg-doador"> 38.578.783-2 </span> </h6>

                            </div>

                            <div class="col-md-3">

                                <h6 class="font-bold"> Sexo: <span id="sexo-doador"> Feminino </span> </h6>

                            </div>

                            <div class="col-md-3">

                                <h6 class="font-bold"> Tipo sanguíneo: <span id="tipo-sanguineo-doador"> B </span> </h6>

                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-3">

                                <h6 class="font-bold"> Fator RH: <span id="fator-rh-doador"> Positivo </span> </h6>

                            </div>

                            <div class="col-md-4">

                                <h6 class="font-bold"> Data de nascimento: <span id="data-nascimento-doador"> 21/12/2000 </span> </h6>

                            </div>
                        </div>

                    </div>



                    <div class="section-andress w-100 mt-5">

                        <div class="row mt-5">
                            <div class="col-md-12">

                                <h6 class="font-bold text-center"> informações do endereço <span class="icon-modal"> <i class="fas fa-map-marked-alt"></i> </span> </h6>
                                <hr />
                            </div>
                        </div>

                        <div class="row mt-4">

                            <div class="col-md-12">

                                <h6 class="font-bold"> Logradouro: <span id="logradouro-doador"> Rua Travessa estrada do sol </span> </h6>

                            </div>


                        </div>

                        <div class="row mt-4">


                            <div class="col-md-3">

                                <h6 class="font-bold"> Bairro: <span id="bairro-doador"> Castro alves </span> </h6>

                            </div>

                            <div class="col-md-3">

                                <h6 class="font-bold"> Número: <span id="numero-endereco-doador"> 60 </span> </h6>

                            </div>


                            <div class="col-md-3">

                                <h6 class="font-bold"> Cidade: <span id="cidade-doador"> São Paulo </span> </h6>

                            </div>


                            <div class="col-md-3">

                                <h6 class="font-bold"> Estado: <span id="estado-doador"> São Paulo </span> </h6>

                            </div>

                        </div>


                        <div class="row mt-4">

                            <div class="col-md-3">

                                <h6 class="font-bold"> CEP: <span id="cep-doador"> 08474-215 </span> </h6>

                            </div>

                            <div class="col-md-9">

                                <h6 class="font-bold"> Complemento: <span id="complemento-doador"> 13A </span> </h6>

                            </div>



                        </div>

                    </div>



                    <div class="section-contact w-100 mt-5">

                        <div class="row mt-5">
                            <div class="col-md-12">

                                <h6 class="font-bold text-center"> informações para contato <span class="icon-modal"> <i class="fas fa-phone-alt"></i> </span> </h6>
                                <hr />
                            </div>
                        </div>

                        <div class="row mt-4">

                            <div class="col-md-12">

                                <h6 class="font-bold text-center"> Email: <span id="email-doador"> nunesgustavo668@gmail.com </span> </h6>

                            </div>


                        </div>

                        <div class="row mt-4">

                            <div class="col-md-6 d-block mx-auto">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center" scope="col"> Telefones </th>
                                        </tr>
                                    </thead>
                                    <tbody id="telefones-doador">

                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>



                    <div class="section-responsible w-100 mt-5">

                        <div class="row mt-5">
                            <div class="col-md-12">

                                <h6 class="font-bold text-center"> informações do responsável <span class="icon-modal"> <i class="fas fa-user-tie"></i> </span> </h6>
                                <hr />
                            </div>
                        </div>

                        <div class="row mt-4">


                            <div class="col-md-6">

                                <h6 class="font-bold text-center"> Nome: <span id="nome-responsavel-doador"> Dalva Soares da Costa </span> </h6>

                            </div>

                            <div class="col-md-6">

                                <h6 class="font-bold text-center"> Data de nascimento: <span id="data-nascimento-responsavel-doador"> 21/12/1985 </span> </h6>

                            </div>


                        </div>


                        <div class="row mt-4">

                            <div class="col-md-6">

                                <h6 class="font-bold text-center"> CPF: <span id="cpf-responsavel-doador"> 503.988.496-68 </span> </h6>
                            </div>


                            <div class="col-md-6 text-center">

                                <h6 class="font-bold"> RG: <span id="rg-responsavel-doador"> 23.263.782-5 </span> </h6>
                            </div>
                        </div>

                        <div class="row mt-4">

                            <div class="col-md-6 d-block mx-auto">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center" scope="col"> Telefones </th>
                                        </tr>
                                    </thead>
                                    <tbody id="telefones-responsavel-doador">

                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>





                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade bd-example-modal-lg" id="modal-filter-doador" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                        <div class="filter-option d-flex justify-content-center align-items-center flex-column" id="<?php echo PESQUISAR_POR_NOME; ?>">
                            <i class="fas fa-font d-block mx-auto text-center"></i>
                            <h6 class="mt-2"> Nome </h6>
                        </div>

                        <div class="filter-option d-flex justify-content-center align-items-center flex-column" id="<?php echo PESQUISAR_POR_CPF; ?>">
                            <i class="fas fa-id-card-alt d-block mx-auto text-center"></i>
                            <h6 class="mt-2"> CPF </h6>
                        </div>

                        <div class="filter-option d-flex justify-content-center align-items-center flex-column" id="<?php echo PESQUISAR_POR_RG; ?>">
                            <i class="fas fa-address-card d-block mx-auto text-center"></i>
                            <h6 class="mt-2"> RG</h6>
                        </div>

                        <div class="filter-option d-flex justify-content-center align-items-center flex-column" id="<?php echo PESQUISAR_POR_DATA_NASCIMENTO; ?>">
                            <i class="fas fa-calendar-day d-block mx-auto text-center"></i>
                            <h6 class="mt-2"> Data de nascimento </h6>
                        </div>

                        <div class="filter-option d-flex justify-content-center align-items-center flex-column" id="<?php echo PESQUISAR_POR_EMAIL; ?>">
                            <i class="fas fa-at d-block mx-auto text-center"></i>
                            <h6 class="mt-2"> Email </h6>
                        </div>


                        <div class="filter-option d-flex justify-content-center align-items-center flex-column" id="<?php echo PESQUISAR_POR_TIPO_SANGUINEO; ?>">
                            <i class="fas fa-tint d-block mx-auto text-center"></i>
                            <h6 class="mt-2"> Tipo sanguíneo </h6>
                        </div>


                        <div class="filter-option d-flex justify-content-center align-items-center flex-column" id="<?php echo PESQUISAR_POR_FATOR_RH; ?>">
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


<script src="../js/script-consulta-doador.js"></script>

</body>

</html>