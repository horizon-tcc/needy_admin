<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <?php
    include_once("imports/imports-css.php");
    ?>
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

        <div class="container-fluid d-flex justify-content-center align-items-center h-100">

            <div class="row">
                <div class="col-md-12">

                    <div class="boas-vindas text-center">
                        <img src="../img/love.png" />
                        <h4 class="mt-3">Facilite a procura por doadores com o needy!</h4>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <?php

    include_once("imports/imports-js.php");
    ?>

</body>

</html>