<title>Home</title>
<?php
    include_once('imports/header.php');
    require_once(__DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."global.php");
?>

<main>

    <div class="container-fluid d-flex justify-content-center align-items-center mt-2">

        <form action="../controller/paciente/paciente-cadastro.php" method="post" class="w-100">

            <h2 lass="text-center mt-4"> Cadastro de Pacientes </h2>


            <fieldset class="mt-5 pb-4">
                <i class="fas fa-user text-center d-block mx-auto small-icon"></i>
                <h2 class="text-center mt-2"> Resgistrar </h2>
                <h6 class="text-center"> Digite algumas informações sobre o paciente </h6>
                <hr />

                <div class="form-row w-100 d-flex justify-content-center">

                    <div class="input-group mb-3 col-md-5">

                        <div class="custom-file">

                            <input type="file" class="custom-file-input img-input" name="imgDoador" id="imgDoador" accept="image/*">
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
                        <label for="txtNomePaciente"> <strong class="red"> * </strong> Nome </label>
                        <input type="text" class="form-control flat" name="txtNomePaciente" id="txtNomePaciente" placeholder="Digite o nome" maxlength="100" />

                        <div id="feedback-valid-nome-Paciente" class="valid-feedback">
                            Nome válido!
                        </div>
                        <div id="feedback-invalid-nome-Paciente" class="invalid-feedback">
                            Nome inválido!
                        </div>
                    </div>
                </div>

                <div class="form-row w-100">
                    <div class="form-group col-md-12 pb-2">
                        <label for="seSexo">Sexo</label>
                        <select class="form-control" name="seSexo">
                            <option selected>Selecione uma opção</option>
                            <option value=1> Masculino </option>
                            <option value=2> Feminino </option>
                        </select>
                    </div>
                </div>

                <div class="form-row w-100">

                    <div class="form-group col-md-6 pb-2">
                        <label for="seTipoSanguineo">Tipo sanguíneo</label>
                        <select class="form-control" name="seTipoSanguineo">
                            <option selected>Selecione uma opção</option>
                            <option value=1> A </option>
                            <option value=2> B </option>
                            <option value=3> AB </option>
                            <option value=4> O </option>
                        </select>
                    </div>

                    <div class="form-group col-md-6 pb-2">
                        <label for="seFatorRh">Fator Rh</label>
                        <select class="form-control" name="seFatorRh">
                            <option selected>Selecione uma opção</option>
                            <option value=1> Positivo </option>
                            <option value=2> Negativo </option>
                        </select>
                    </div>



                </div>

                <div class="form-row w-100">


                    <div class="form-group col-md-6 pb-2">

                        <label for="txtCpf">CPF</label>
                        <input type="text" class="form-control txtCpf" id="txtCpfPaciente" name="txtCpfPaciente"
                            placeholder="Digite o CPF" />
                        <div id="feedback-cpf-Doador" class="valid-feedback">
                            CPF válido!
                        </div>
                        <div id="feedback-cpf-Doador" class="invalid-feedback">
                            CPF inválido!
                        </div>
                    </div>

                    <div class="form-group col-md-6 pb-2">
                        <label for="txtRg txtRg">RG</label>
                        <input type="text" class="form-control txtRg" id="txtRgPaciente" name="txtRgPaciente"
                            placeholder="Digite o RG" />
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
                            <i class="far fa-paper-plane"></i> Enviar
                        </button>

                    </div>

                </div>

            </fieldset>
        </form>
        <table>
            <tr>
                <th>
                    nome
                </th>
                <th>
                    Sexo
                </th>
                <th>
                    Tipo Sanguineo
                </th>
                <th>
                    Fator Rh
                </th>
                <th>
                    CPF
                </th>
                <th>
                    RG
                </th>
                <th>
                </th>
            </tr>
            <?php
                    $lista = PacienteDAO::listarPaciente();
                    foreach($lista as $linha){?>
            <tr>
                <td>
                    <?php echo $linha['nomePaciente']; ?>
                </td>
                <td>
                    <?php echo $linha['descricaoSexo']; ?>
                </td>
                <td>
                    <?php echo $linha['descricaoTipoSanguineo']; ?>
                </td>
                <td>
                    <?php echo $linha['descricaoFatorRh']; ?>
                </td>
                <td>
                    <?php echo $linha['cpfPaciente']; ?>
                </td>
                <td>
                    <?php echo $linha['rgPaciente']; ?>
                </td>
                <td>
                    <a href="#">Editar</a>
                </td>
                <td>
                    <a
                        href="../controller/paciente/paciente-exclusao.php?id=<?php echo $linha['idPaciente']; ?>">Excluir</a>
                </td>
            </tr>
            <?php  } ?>
        </table>
    </div>
</main>


<?php

        include_once("imports/imports-js.php");

    ?>

</body>

</html>