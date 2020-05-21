
$("#txtPesquisa").on("keyup", function () {

    const SUCESSO_AO_CONSULTAR_OS_DOADORES = 1;
    const NENHUM_DOADOR_ENCONTRADO = 2;

    $.ajax({

        url: "../controller/doador/consultar-doadores.php",
        type: "post",
        data: {
            "txtPesquisa": $("#txtPesquisa").val()
        },
        dataType: "json",
        success: function (response) {

            console.log("status : " + response.status);

            if (response.status === SUCESSO_AO_CONSULTAR_OS_DOADORES) {

                $(".container-cards").empty();
                
                response.result.forEach(element => {
                    
                    $(".container-cards").append("<div class='card-consulta'>"

                    +"<img src='../img/img_doadores/" + element.fotoUsuario + "' class='' />"

                    +"<h6 class='text-center mt-5'>"+ element.nomeDoador + "</h6>"
                    +"<h6 class='text-center mt-2'>"+ element.cpfDoador + "</h6>"
                    +"<h6 class='text-center mt-2'>"+ element.descricaoTipoSanguineo +"</h6>"

                    +"<a href='doadores.php?id="+element.idDoador+"'> <button class='mt-4'> <i class='fas fa-pen'></i> </button> </a>"
                    +"<a href='../controller/doador/remover-doador.php?id="+element.idDoador+"'> <button class='4'> <i class='far fa-trash-alt'></i> </button> </a>"
                    +"</div>");
                    

                });

                
               
            }
            else if (response.status === NENHUM_DOADOR_ENCONTRADO){


                $(".container-cards").empty();
                $(".container-cards").append("<h6 class='mt-4'> Nenhum doador encontrado </h6>");
            }

            console.log(response);
           
        },
        error: function (request, status, error) {


            console.log(request.responseText);
        }


    });

});


$(".remover-doador").on("click", function(ev){

    /*
    ev.preventDefault();

    $.ajax({

        url: "../controller/doador/consultar-doadores.php",
        type: "get",
        dataType: "json",
        success: function (response) {

            console.log("status : " + response.status);

            if (response.status === SUCESSO_AO_CONSULTAR_OS_DOADORES) {

                $(".container-cards").empty();
                
                response.result.forEach(element => {
                    
                    $(".container-cards").append("<div class='card-consulta'>"

                    +"<img src='../img/img_doadores/" + element.fotoUsuario + "' class='' />"

                    +"<h6 class='text-center mt-5'>"+ element.nomeDoador + "</h6>"
                    +"<h6 class='text-center mt-2'>"+ element.cpfDoador + "</h6>"
                    +"<h6 class='text-center mt-2'>"+ element.descricaoTipoSanguineo +"</h6>"

                    +"<a href='doadores.php?id="+element.idDoador+"'> <button class='mt-4'> <i class='fas fa-pen'></i> </button> </a>"
                    +"<a href='../controller/doador/remover-doador.php?id="+element.idDoador+"'> <button class='4'> <i class='far fa-trash-alt'></i> </button> </a>"
                    +"</div>");
                    

                });

                
               
            }
            else if (response.status === NENHUM_DOADOR_ENCONTRADO){


                $(".container-cards").empty();
                $(".container-cards").append("<h6 class='mt-4'> Nenhum doador encontrado </h6>");
            }

            console.log(response);
           
        },
        error: function (request, status, error) {


            console.log(request.responseText);
        }


    });

   */ 

});
