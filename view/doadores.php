<title>Home</title>
<?php
    include_once('imports/header.php');
?>

    <main>

        <div class="container-fluid d-flex justify-content-center align-items-center mt-2">

            <form action="" method="  " class="w-100">

                <h2> Cadastro de Doadores </h2>
                <ul id="progress">

                    <li> Informações pessoais </li>
                    <li> Informações de endereço </li>
                    <li> Informações para contato </li>
                    <li> Informações sobre os responsáveis </li>

                </ul>


                <fieldset>
                    <i class="fas fa-user text-center d-block mx-auto small-icon"></i>
                    <h2 class="text-center mt-2"> Informações pessoais </h2>
                    <h6 class="text-center"> Digite algumas informações sobre o doador </h6>
                    <hr />
                    <div class="form-row w-100 mt-5">
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
                        <div class="form-group col-md-12 pb-2">
                            <label for="txtNome">Nome</label>
                            <input type="text" class="form-control" name="txtNome" id="txtNome" placeholder="Digite o nome" />
                        </div>
                    </div>

                    <div class="form-row w-100">
                        <div class="form-group col-md-6 pb-2">
                            <label for="seSexo">Sexo</label>
                            <select class="form-control" name="seSexo">
                            </select>
                        </div>

                        <div class="form-group col-md-6 pb-2">
                            <label for="txtDataNascimento">Data de nascimento</label>
                            <input type="date" class="form-control" id="txtDataNascimento" name="txtDataNascimento" placeholder="Escolha a data de nascimento" />
                        </div>
                    </div>

                    <div class="form-row w-100">

                        <div class="form-group col-md-6 pb-2">
                            <label for="seTipoSanguineo">Tipo sanguíneo</label>
                            <select class="form-control" name="seTipoSanguineo">
                            </select>
                        </div>

                        <div class="form-group col-md-6 pb-2">
                            <label for="seFatorRh">Fator Rh</label>
                            <select class="form-control" name="seFatorRh">
                            </select>
                        </div>



                    </div>

                    <div class="form-row w-100">


                        <div class="form-group col-md-6 pb-2">

                            <label for="txtCpf">CPF</label>
                            <input type="text" class="form-control txtCpf" id="txtCpfDoador" name="txtCpfDoador" placeholder="Digite o CPF"/>
                        </div>

                        <div class="form-group col-md-6 pb-2">
                            <label for="txtRg txtRg">RG</label>
                            <input type="text" class="form-control txtRg" id="txtRgDoador" name="txtRgDoador" placeholder="Digite o RG" />
                        </div>


                    </div>


                    <div class="form-row w-100 mt-5">


                        <div class="form-group col-md-6 d-flex align-items-end justify-content-end pb-2">

                            <button type="reset" class="btn btn-outline-danger w-100 flat">
                                <i class="far fa-window-close"></i> Limpar
                            </button>

                            <!-- <input type="button" class="btn btn-outline-danger w-100" value="Adicionar responsável" data-toggle="modal" data-target="#exampleModal" /> -->

                        </div>


                        <div class="form-group col-md-6 d-flex align-items-end justify-content-end pb-2">

                            <button type="submit" class="btn btn-danger w-100 flat">
                                <i class="far fa-paper-plane"></i> Próxima etapa
                            </button>

                        </div>

                    </div>

                </fieldset>



                <fieldset>
                    <i class="fas fa-road text-center d-block mx-auto small-icon"></i>
                    <h2 class="text-center mt-2"> Informações de endereço </h2>
                    <h6 class="text-center"> Digite algumas informações para que os hemocentros possam encontrar o doador</h6>
                    <hr />
                    <div class="form-row w-100">


                        <div class="form-group col-md-4 pb-2">

                            <label for="txtCep">CEP</label>
                            <input type="text" class="form-control txtCep" id="txtCep" name="txtCep" placeholder="Digite o CEP" />
                        </div>

                        <div class="form-group col-md-4 pb-2">

                            <label for="txtLogradouro">Logradouro</label>
                            <input type="text" class="form-control" id="txtLogradouro" name="txtLogradouro" placeholder="Digite o logradouro" />
                        </div>

                        <div class="form-group col-md-4 pb-2">

                            <label for="txtBairro">Bairro</label>
                            <input type="text" class="form-control" id="txtBairro" name="txtBairro" placeholder="Digite o bairro" />
                        </div>


                    </div>

                    <div class="form-row w-100">

                        <div class="form-group col-md-4 pb-2">

                            <label for="txtUf">UF</label>
                            <input type="text" class="form-control" id="txtCidade" name="txtCidade" placeholder="Digite o estado" />

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


                    <div class="form-row w-100 mt-5">



                        <div class="form-group col-md-4 d-flex align-items-end justify-content-end pb-2 pt-2">

                            <button type="reset" class="btn btn-outline-danger w-100 flat">
                                <i class="fas fa-arrow-left"></i> Voltar etapa
                            </button>

                        </div>


                        <div class="form-group col-md-4 d-flex align-items-end justify-content-end pb-2 pt-2">

                            <button type="reset" class="btn btn-outline-danger w-100 flat">
                                <i class="far fa-window-close"></i> Limpar
                            </button>

                        </div>




                        <div class="form-group col-md-4 d-flex align-items-end justify-content-end pb-2 pt-2">

                            <button type="submit" class="btn btn-danger w-100 flat">
                                <i class="far fa-paper-plane"></i> Próxima etapa
                            </button>

                        </div>

                    </div>
                </fieldset>


                <fieldset>

                    <i class="fas fa-child text-center d-block mx-auto small-icon"></i>
                    <h2 class="text-center mt-2"> Informações sobre os responsáveis do doador </h2>
                    <h6 class="text-center"> Digite algumas informações sobre os responsáveis (caso o doador seja menor de idade) </h6>
                    <hr />

                    <div class="form-row">

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
                            <input type="text" class="form-control txtCep" id="txtCpfResponsavel" name="txtCpfResponsavel" placeholder="Digite o CPF" />
                        </div>


                        <div class="form-group col-md-6 pb-2">
                            <label for="txtRg">RG</label>
                            <input type="text" class="form-control txtRg" id="txtRgResponsavel" name="txtRgResponsavel" placeholder="Digite o RG" />
                        </div>

                    </div>


                    <div class="form-row w-100 mt-5">



                        <div class="form-group col-md-4 d-flex align-items-end justify-content-end pb-2 pt-2">

                            <button type="reset" class="btn btn-outline-danger w-100 flat">
                                <i class="fas fa-arrow-left"></i> Voltar etapa
                            </button>

                        </div>


                        <div class="form-group col-md-4 d-flex align-items-end justify-content-end pb-2 pt-2">

                            <button type="reset" class="btn btn-outline-danger w-100 flat">
                                <i class="far fa-window-close"></i> Limpar
                            </button>

                        </div>




                        <div class="form-group col-md-4 d-flex align-items-end justify-content-end pb-2 pt-2">

                            <button type="submit" class="btn btn-danger w-100 flat">
                                <i class="far fa-paper-plane"></i> Próxima etapa
                            </button>

                        </div>

                    </div>

                </fieldset>




                <fieldset>

                    <i class="fas fa-phone-alt text-center d-block mx-auto small-icon"></i>
                    <h2 class="text-center mt-2"> Informações para contato </h2>
                    <h6 class="text-center"> Digite algumas informações para que o hemocentro possa entrar em contato com o doador </h6>
                    <hr />

                    <div class="form-row w-100">

                        <div class="form-group col-md-12 pb-2">
                            <label for="txtEmail">E-mail</label>
                            <input type="email" class="form-control" name="txtEmail" id="txtEmail" placeholder="Digite o e-mail" />
                        </div>

                    </div>

                    <div class="form-row w-100 d-flex justify-content-center align-items-center">

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
                            <button class="btn btn-danger w-100 flat"> <i class="fas fa-plus"></i> </button>
                        </ul>


                    </div>

                    <div class="form-row w-100 mt-5">



                        <div class="form-group col-md-4 d-flex align-items-end justify-content-end pb-2 pt-2">

                            <button type="reset" class="btn btn-outline-danger w-100 flat">
                                <i class="fas fa-arrow-left"></i> Voltar etapa
                            </button>

                        </div>


                        <div class="form-group col-md-4 d-flex align-items-end justify-content-end pb-2 pt-2">

                            <button type="reset" class="btn btn-outline-danger w-100 flat">
                                <i class="far fa-window-close"></i> Limpar
                            </button>

                        </div>




                        <div class="form-group col-md-4 d-flex align-items-end justify-content-end pb-2 pt-2">

                            <button type="submit" class="btn btn-danger w-100 flat">
                                <i class="far fa-paper-plane"></i> Finalizar Cadastro
                            </button>

                        </div>

                    </div>

                </fieldset>
                <!--                 
                <div class="form-row w-100">


                    <div class="form-group col-md-4 pb-2">

                        <label for="txtCep">CEP</label>
                        <input type="text" class="form-control" id="txtCep" name="txtCep" placeholder="Digite o CEP" />
                    </div>

                    <div class="form-group col-md-4 pb-2">

                        <label for="txtLogradouro">Logradouro</label>
                        <input type="text" class="form-control" id="txtLogradouro" name="txtLogradouro" placeholder="Digite o logradouro" />
                    </div>

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
                </div> -->

            </form>
        </div>

    </main>

    <?php

    include_once("imports/imports-js.php");

    ?>


</body>

</html>