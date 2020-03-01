<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    include_once("imports/imports-css.php");
    ?>

    <title> Doadores </title>
</head>

<body>


    <nav class="menu side-menu background-default d-flex align-items-center flex-wrap">


        <h5 class="text-center w-100"> <i class="fas fa-heart"></i> Needy </h5>

        <ul class="d-flex flex-wrap">

            <li class="menu-item d-flex justify-content-start"> <span class=""> <i class="fas fa-home"> </i> </span> <span> Home </span> </li>

            <li class="menu-item d-flex justify-content-start"> <span class=""><i class="fas fa-users ali"></i> </span> <span> Doadores </span> </li>

            <li class="menu-item d-flex justify-content-start"> <span class=""><i class="fas fa-tint"></i> </span> <span> Doação </span> </li>

            <li class="menu-item d-flex justify-content-start"> <span class=""> <i class="fas fa-stethoscope"></i> </span> <span> Funcionários </span> </li>

            <li class="menu-item d-flex justify-content-start"> <span class=""> <i class="fas fa-user-injured"></i> </span> <span> Pacientes </span> </li>

            <li class="menu-item d-flex justify-content-start"> <span class=""> <i class="fas fa-file-alt"></i> </span> <span> Relatórios </span> </li>

            <li class="menu-item d-flex justify-content-start"> <span class=""> <i class="fas fa-clock"></i> </span> <span> Agendamentos </span> </li>



        </ul>

        <img src="../img/logo-branca.png" class="" />


    </nav>

    <nav class="top-menu shadow p-1 bg-white rounded d-block">

        <div class="d-flex bd-highlight align-items-center">
            <div class="p-2 flex-fill bd-highlight">

                <ul class="nav justify-content-start align-items-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="#"> <img src="../img/girl.jpg" alt="..." class="user-img" /></a>
                    </li>
                    <li class="nav-item align-items-center">
                        <h6>Beatriz soares </h6>
                    </li>

                </ul>

            </div>
            <div class="p-2 flex-fill bd-highlight text-right">


                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <button type="button" class="btn bg-light">
                            <i class="fas fa-bell"></i> <span class="badge badge-secondary">5</span>
                        </button>
                    </li>

                    <li class="nav-item">
                        <button type="button" class="btn bg-light">
                            <i class="fas fa-power-off"></i>
                        </button>
                    </li>
                </ul>
            </div>

        </div>

    </nav>

    <main class="">

        <div class="container-fluid d-flex justify-content-center align-items-center h-100 mt-2">

            <form action="" method="post" class="w-100">

                <div class="form-row w-100">
                    <img src="../img/camera.png" class="form-img d-block mx-auto" />
                </div>
                <div class="form-row w-100 d-flex justify-content-center">

                    <div class="input-group mb-3 col-md-5">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="imgDoador" id="imgDoador">
                            <label class="custom-file-label" for="inputGroupFile01">Escolha uma imagem</label>
                        </div>
                    </div>

                </div>
                <div class="form-row w-100">
                    <div class="form-group col-md-4 pb-2">
                        <label for="txtNome">Nome</label>
                        <input type="text" class="form-control" name="txtNome" id="txtNome" placeholder="Digite o nome" />
                    </div>
                    <div class="form-group col-md-4 pb-2">
                        <label for="seSexo">Sexo</label>
                        <select class="form-control" name="seSexo">
                        </select>
                    </div>

                    <div class="form-group col-md-4 pb-2">
                        <label for="txtDataNascimento">Data de nascimento</label>
                        <input type="date" class="form-control" id="txtDataNascimento" name="txtDataNascimento" placeholder="Escolha a data de nascimento" />
                    </div>
                </div>

                <div class="form-row w-100">

                    <div class="form-group col-md-4 pb-2">
                        <label for="seTipoSanguineo">Tipo sanguíneo</label>
                        <select class="form-control" name="seTipoSanguineo">
                        </select>
                    </div>

                    <div class="form-group col-md-4 pb-2">
                        <label for="seFatorRh">Fator Rh</label>
                        <select class="form-control" name="seFatorRh">
                        </select>
                    </div>


                    <div class="form-group col-md-4 pb-2">

                        <label for="txtCpf">CPF</label>
                        <input type="text" class="form-control" id="txtCpf" name="txtCpf" placeholder="Digite o CPF" />
                    </div>

                </div>

                <div class="form-row w-100">

                    <div class="form-group col-md-4 pb-2">
                        <label for="txtRg">RG</label>
                        <input type="text" class="form-control" id="txtRg" name="txtRg" placeholder="Digite o RG" />
                    </div>


                    <div class="form-group col-md-4 pb-2">

                        <label for="txtCep">CEP</label>
                        <input type="text" class="form-control" id="txtCep" name="txtCep" placeholder="Digite o CEP" />
                    </div>

                    <div class="form-group col-md-4 pb-2">

                        <label for="txtLogradouro">Logradouro</label>
                        <input type="text" class="form-control" id="txtLogradouro" name="txtLogradouro" placeholder="Digite o logradouro" />
                    </div>

                </div>

                <div class="form-row w-100">




                    <div class="form-group col-md-4 pb-2">

                        <label for="txtBairro">Bairro</label>
                        <input type="text" class="form-control" id="txtBairro" name="txtBairro" placeholder="Digite o bairro" />
                    </div>


                    <div class="form-group col-md-4 pb-2">

                        <label for="txtNumero">Número</label>
                        <input type="text" class="form-control" id="txtNumero" name="txtNumero" placeholder="Digite o número residencial" />
                    </div>

                    <div class="form-group col-md-4 pb-2">

                        <label for="txtCidade">Cidade</label>
                        <input type="text" class="form-control" id="txtCidade" name="txtCidade" placeholder="Digite a cidade" />
                    </div>



                </div>

                <div class="form-row w-100">

                    <div class="form-group col-md-4 pb-2">

                        <label for="txtUf">UF</label>
                        <input type="text" class="form-control" id="txtCidade" name="txtCidade" placeholder="Digite o estado" />

                    </div>

                    <div class="form-group col-md-4 d-flex align-items-end justify-content-end pb-2">

                        <input type="submit" value="Cadastrar" class="btn btn-danger w-100" />

                    </div>

                    <div class="form-group col-md-4 d-flex align-items-end justify-content-end pb-2">


                        <input type="button" class="btn btn-outline-danger w-100" value="Adicionar responsável" data-toggle="modal" data-target="#exampleModal" />

                    </div>

                </div>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> Adicionar responsável pelo doador </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="inserirResponsavel.php" method="post">



                                    <div class="form-row">

                                        <div class="form-group col-md-6 pb-2">
                                            <label for="txtNome">Nome</label>
                                            <input type="text" class="form-control" name="txtNome" id="txtNome" placeholder="Digite o nome" />
                                        </div>

                                        <div class="form-group col-md-6 pb-2">
                                            <label for="txtDataNascimento">Data de nascimento</label>
                                            <input type="date" class="form-control" id="txtDataNascimento" name="txtDataNascimento" placeholder="Escolha a data de nascimento" />
                                        </div>

                                        <div class="form-row w-100">


                                            <div class="form-group col-md-6 pb-2">
                                                <label for="txtCpf">CPF</label>
                                                <input type="text" class="form-control" id="txtCpf" name="txtCpf" placeholder="Digite o CPF" />
                                            </div>


                                            <div class="form-group col-md-6 pb-2">
                                                <label for="txtRg">RG</label>
                                                <input type="text" class="form-control" id="txtRg" name="txtRg" placeholder="Digite o RG" />
                                            </div>

                                        </div>


                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                <input type="submit" class="btn btn-success" />
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>


        </div>


    </main>

    <?php

    include_once("imports/imports-js.php");
    ?>


</body>

</html>