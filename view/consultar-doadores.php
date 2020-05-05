<title> Consultar doadores </title>
<?php
include_once('imports/header.php');
require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

?>

<main>

    <div class="container-fluid d-flex justify-content-center align-items-center mt-2 py-2">

        <form action="../controller/doador/consultar-doadores.php" method="post" class="w-100">

            <div class="form-row text-center">

                <div class="form-group col-md-12">

                    <h2> Consultar doadores </h2>
                </div>

            </div>

            <hr />

            <div class="form-row d-flex justify-content-center align-items-center mt-5">

                <div class="form-group col-md-6 d-flex align-items-center justify-content-center color-gray">

                    <input type="text" name="txtPesquisa" id="txtPesquisa" class="input-for-search" />

                    <i class="fas fa-search ml-2"></i>
                </div>

            </div>

            <div class="container-cards d-flex justify-content-center flex-wrap">

                
                    <div class="card-consulta">

                        <img src="../img/girl.jpg" class="" />

                        <h6 class="text-center mt-4"> Beatriz Soares </h6>
                        <h6 class="text-center mt-2"> 491.123.428-82 </h6>
                        <h6 class="text-center mt-2"> A </h6>

                        <a> <button> <i class="fas fa-pen"></i> </button> </a>
                        <a href=""> <button> <i class="far fa-trash-alt"></i> </button> </a>

                    </div>

                    <div class="card-consulta">

                        <img src="../img/girl.jpg" class="" />

                        <h6 class="text-center mt-4"> Beatriz Soares </h6>
                        <h6 class="text-center mt-2"> 491.123.428-82 </h6>
                        <h6 class="text-center mt-2"> A </h6>

                        <a> <button> <i class="fas fa-pen"></i> </button> </a>
                        <a href=""> <button> <i class="far fa-trash-alt"></i> </button> </a>

                    </div>


                    
                    <div class="card-consulta">

                        <img src="../img/girl.jpg" class="" />

                        <h6 class="text-center mt-4"> Beatriz Soares </h6>
                        <h6 class="text-center mt-2"> 491.123.428-82 </h6>
                        <h6 class="text-center mt-2"> A </h6>

                        <a> <button> <i class="fas fa-pen"></i> </button> </a>
                        <a href=""> <button> <i class="far fa-trash-alt"></i> </button> </a>

                    </div>

                    
                    <div class="card-consulta">

                        <img src="../img/girl.jpg" class="" />

                        <h6 class="text-center mt-4"> Beatriz Soares </h6>
                        <h6 class="text-center mt-2"> 491.123.428-82 </h6>
                        <h6 class="text-center mt-2"> A </h6>

                        <a> <button> <i class="fas fa-pen"></i> </button> </a>
                        <a href=""> <button> <i class="far fa-trash-alt"></i> </button> </a>

                    </div>

                    
                    <div class="card-consulta">

                        <img src="../img/girl.jpg" class="" />

                        <h6 class="text-center mt-4"> Beatriz Soares </h6>
                        <h6 class="text-center mt-2"> 491.123.428-82 </h6>
                        <h6 class="text-center mt-2"> A </h6>

                        <a> <button> <i class="fas fa-pen"></i> </button> </a>
                        <a href=""> <button> <i class="far fa-trash-alt"></i> </button> </a>

                    </div>
                    
                    <div class="card-consulta">

                        <img src="../img/girl.jpg" class="" />

                        <h6 class="text-center mt-4"> Beatriz Soares </h6>
                        <h6 class="text-center mt-2"> 491.123.428-82 </h6>
                        <h6 class="text-center mt-2"> A </h6>

                        <a> <button> <i class="fas fa-pen"></i> </button> </a>
                        <a href=""> <button> <i class="far fa-trash-alt"></i> </button> </a>

                    </div>
                    
                    <div class="card-consulta">

                        <img src="../img/girl.jpg" class="" />

                        <h6 class="text-center mt-4"> Beatriz Soares </h6>
                        <h6 class="text-center mt-2"> 491.123.428-82 </h6>
                        <h6 class="text-center mt-2"> A </h6>

                        <a> <button> <i class="fas fa-pen"></i> </button> </a>
                        <a href=""> <button> <i class="far fa-trash-alt"></i> </button> </a>

                    </div>
                    
                    <div class="card-consulta">

                        <img src="../img/girl.jpg" class="" />

                        <h6 class="text-center mt-4"> Beatriz Soares </h6>
                        <h6 class="text-center mt-2"> 491.123.428-82 </h6>
                        <h6 class="text-center mt-2"> A </h6>

                        <a> <button> <i class="fas fa-pen"></i> </button> </a>
                        <a href=""> <button> <i class="far fa-trash-alt"></i> </button> </a>

                    </div>
                
            </div>



        </form>


    </div>



</main>

<?php

include_once("imports/imports-js.php");

?>


<script src="../js/script-consulta-doador.js"></script>

</body>

</html>