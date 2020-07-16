<title> Consultar Funcionarios </title>

<?php

include_once('imports/header.php');
require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

?>

<main>

    <div class="container-fluid mt-2 py-2">
        <form action="../controller/funcionario/consultar-funcionario.php" method="post" class="w-100">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center"> <i class="fas fa-search"></i> </h2>
                    <h2 class="text-center"> Consultar funcionarios </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-right">
                    <a href="funcionario.php?idFuncionario=0"> <button type="button" class="btn btn-danger"> Novo Funcionario <i class="fas fa-plus"></i> </button> </a>
                </div>
            </div>
            <hr />
            <div class="form-row d-flex justify-content-center align-items-center mt-5">
                <div class="form-group col-md-6 d-flex align-items-center justify-content-center color-gray">

                <input type="hidden" value="filterNomeFuncionario" id="hdSearchTypeFuncionario" name="hdSearchTypeFuncionario" />

                    <div class="container-search w-75"> <input type="text" name="txtPesquisaFuncionario" id="txtPesquisaFuncionario" class="input-for-search w-100" placeholder="Digite o nome do funcionario" /> </div>
                    <div class="ml-3">
                        <i class="fas fa-search ml-2"></i>
                        <i class="fas fa-filter ml-3 selection" data-toggle="modal" data-target="#modal-filter-funcionario"></i>
                    </div>
                </div>
            </div>
        </form>

        
        <div class="container-cards d-flex justify-content-center flex-wrap">
            <?php

            $funcionarios = new FuncionarioController();

            $listaFuncionarios = $funcionarios->getFuncionario();

            if ($listaFuncionarios != null) {

                foreach ($listaFuncionarios as $linha) {

                    echo "<div class='card-consulta' id ='" . $linha['idFuncionario'] . "'>"
                        . "<img src='../img/img_funcionario/" . $linha['fotoUsuario'] . "' class='' />"
                        . "<h6 class='text-center mt-4'>" . $linha['nomeFuncionario'] . "</h6>"
                        . "<h6 class='text-center mt-2'>" . $linha['cpfFuncionario'] . "</h6>"
                        . "<h6 class='text-center mt-2'>" . $linha['nomeBancoSangue'] . "</h6>"
                        . "<h6 class='text-center mt-2'>" . $linha['descricaoCargoFuncionario'] . "</h6>"
                        . "<a href='funcionario.php?idFuncionario=" . $linha['idFuncionario'] . "' id= " . $linha['idFuncionario'] . " class='editar-funcionario'> <button class='mt-4'> <i class='fas fa-pen'></i> </button> </a>"
                        . "<a href='../controller/funcionario/funcionario-exclusao.php?idFuncionario=" . $linha['idFuncionario'] . "' class='remover-funcionario'> <button class='mt-4' data-toggle='modal' data-target='#modal-remover-funcionario'> <i class='far fa-trash-alt'></i> </button> </a>"
                        . "</div>";
                }
            } else {

                echo "<h6 class='mt-4'> Nenhum funcionario foi cadastrado ainda </h6>";
            }

            ?>
        </div>
    </div>


    <div class="modal fade" id="modal-remover-funcionario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="../controller/funcionario/funcionario-exclusao.php" method="POST" id="form-remover-funcionario">
                    <div class="modal-header">
                        <h6 class="modal-title font-bold" id="modal-title-remover-funcionario"> Remover funcionario </h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row d-flex justify-content-center">
                            <div class="form-group col-md-12 py-2">
                                <h5 id="desc-remover-funcionario" class="text-center"> Deseja remover o funcionario selecionado ?
                                </h5>
                                <input type="hidden" name="funcionarioRemovido" id="funcionarioRemovido" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-danger" id="btn-remover-funcionario" value="Remover" />
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade bd-example-modal-lg" id="modal-view-funcionario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title font-bold" id="modal-title-view-funcionario"> <i class="far fa-eye"></i> Visualizar funcionario </h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <img src="../img/girl.jpg" alt="" class="d-block mx-auto img-doador" id="img-funcionario">

                    <h2 class="text-center mt-3 nome-doador" id="nome-funcionario"> Funcionario </h2>

                    <div class="section-personal w-100 mt-5 mt-5">
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <h6 class="font-bold text-center"> Informações pessoais <span class="icon-modal"> <i class="far fa-id-card"></i> </span> </h6>
                                <hr />
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-4">
                                <h6 class="font-bold"> CPF: <span id="cpf-funcionario"> exemplo </span> </h6>
                            </div>

                            <div class="col-md-4">
                                <h6 class="font-bold"> RG: <span id="rg-funcionario"> exemplo </span> </h6>
                            </div>

                            <div class="col-md-4">
                                <h6 class="font-bold"> Cargo: <span id="cargo-funcionario"> exemplo </span> </h6>
                            </div>
                            
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <h6 class="font-bold"> Banco: <span id="banco-funcionario"> exemplo </span> </h6>
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
                                <h6 class="font-bold text-center"> Email: <span id="email-funcionario"> Exemplo </span> </h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="update-funcionario" class="btn btn-danger" data-dismiss="modal">Editar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="modal-filter-funcionario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <div class="filter-option d-flex justify-content-center align-items-center flex-column" id="filterNomeFuncionario">
                            <i class="fas fa-font d-block mx-auto text-center"></i>
                            <h6 class="mt-2"> Nome </h6>
                        </div>

                        <div class="filter-option d-flex justify-content-center align-items-center flex-column" id="filterCpfFuncionario">
                            <i class="fas fa-id-card-alt d-block mx-auto text-center"></i>
                            <h6 class="mt-2"> CPF </h6>
                        </div>

                        <div class="filter-option d-flex justify-content-center align-items-center flex-column" id="filterRgFuncionario">
                            <i class="fas fa-address-card d-block mx-auto text-center"></i>
                            <h6 class="mt-2"> RG</h6>
                        </div>

                        <div class="filter-option d-flex justify-content-center align-items-center flex-column" id="filterEmailFuncionario">
                            <i class="fas fa-at d-block mx-auto text-center"></i>
                            <h6 class="mt-2"> Email </h6>
                        </div>
                        
                        <div class="filter-option d-flex justify-content-center align-items-center flex-column" id="filterCargoFuncionario">
                            <img src="../img/maleta-icon.png" />
                            <h6 class="mt-2"> Cargo Funcionario </h6>
                        </div>

                        <div class="filter-option d-flex justify-content-center align-items-center flex-column" id="filterBancoFuncionario">
                            <img src="../img/emocentro_icon.png" />
                            <h6 class="mt-2"> Banco Sangue </h6>
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

<script src="../js/script-consulta-funcionario.js"></script>

</body>

</html>