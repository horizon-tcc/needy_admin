<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <?php
        include_once("imports/imports-css.php");
        require_once(__DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."global.php");
    ?>

    <title> Login </title>
</head>

<body>

    <div class="container-fluid vh-100 my-0 mx-0 px-0">

        <div class="row w-100 my-0 mx-0 px-0 py-0 vh-100">

            <div class="col-md-8 bg-light d-flex align-items-center">

                <div class="mx-auto">

                    <img class="medium-height mx-auto d-block" src="../img/logo-needy.png" />

                    <br />

                    <h2 class="text-center text-danger"> Needy </h2>

                    <br />

                    <h3 class="text-center color-gray mt-4"> Seja bem vindo a versão administrativa do Needy!</h3>

                    <p class="text-center color-gray">&copy; Todos os direitos reservados
                    <p>
                </div>

            </div>

            <div class="col-md-4 background-default">

                <div class="row h-100">

                    <div class="col-md-12 d-flex align-items-center justify-content-center">


                        <form action="../controller/usuario/login-usuario.php" class="mb-6 form-login " method="post">


                            <div class="mb-5">
                                <img src="../img/user-icon.png" class="mx-auto d-block medium-height great-img mt-2" />
                                <h3 class="text-center mt-4"> Login</h3>
                            </div>


                            <div class="d-flex">

                                <img src="../img/user-icon.png" class="small-height mr-5">
                                <div class="form-secundary w-100 d-block">
                                    <input type="text" name="txtLogin" id="txtEmail" autocomplete="off" required>
                                    <label for="txtEmail" class="label">
                                        <span class="content-label"> E-mail </span>
                                    </label>
                                </div>
                            </div>

                            <br />


                            <div class="d-flex">

                                <img src="../img/bloqueio.png" class="small-height mr-5">
                                <div class="form-secundary w-100 d-block">
                                    <input type="password" name="txtSenha" id="txtSenha" autocomplete="off" required>
                                    <label for="txtSenha" class="label">
                                        <span class="content-label"> Senha </span>
                                    </label>
                                </div>
                            </div>
                            <h6 class="text-right mt-4"> Esqueceu sua senha ?</h6>

                            <input type="submit" value="Entrar" class="btn button-secundary btn-lg btn-block mt-5" />
                        </form>


                    </div>
                </div>
            </div>

        </div>

    </div>


    <?php
        include_once("imports/imports-js.php");
    ?>
</body>

</html>