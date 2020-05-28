
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


            if (response.status === SUCESSO_AO_CONSULTAR_OS_DOADORES) {

                $(".container-cards").empty();

                response.result.forEach(element => {

                    $(".container-cards").append("<div class='card-consulta' id ='" + element.idDoador + "'>"

                        + "<img src='../img/img_doadores/" + element.fotoUsuario + "' class='' />"

                        + "<h6 class='text-center mt-5'>" + element.nomeDoador + "</h6>"
                        + "<h6 class='text-center mt-2'>" + element.cpfDoador + "</h6>"
                        + "<h6 class='text-center mt-2'>" + element.descricaoTipoSanguineo + "</h6>"

                        + "<a href='doadores.php?idDoador=" + element.idDoador + "'> <button class='mt-4'> <i class='fas fa-pen'></i> </button> </a>"
                        + "<a href='../controller/doador/remover-doador.php?idDoador=" + element.idDoador + "' class='remover-doador'> <button class='mt-4' data-toggle='modal' data-target='#modal-remover-doador'> <i class='far fa-trash-alt'></i> </button> </a>"
                        + "</div>");


                });



            }
            else if (response.status === NENHUM_DOADOR_ENCONTRADO) {


                $(".container-cards").empty();
                $(".container-cards").append("<h6 class='mt-4'> Nenhum doador encontrado </h6>");
            }



        },
        error: function (request, status, error) {


            console.log(request.responseText);
        }


    });

});


$(document).on("click", ".remover-doador", function (ev) {


    ev.preventDefault();
    ev.stopPropagation();

    let url = this.getAttribute("href");

    hdUrlDoadorRemovido = document.querySelector("#hdUrlDoadorRemovido");

    hdUrlDoadorRemovido.value = url;





});

$(document).on("click", ".editar-doador", (ev) => {

    ev.stopPropagation();

});



$(document).on("click", ".card-consulta", function (event) {
  

    $.ajax({

          url: "../controller/doador/pegar-doador-pelo-id.php"
        , type: "post"
        , dataType: "json"
        , data: {

            "idDoador": this.id
        }


        , success: function (response) {

            if ( calculateAge(response.dataNascimentoDoador) < 18 ) {
                
                $("#img-doador").attr("src", "../img/img_doadores/" + response.imgDoador);
                $("#nome-doador").text(response.nomeDoador);
                $("#cpf-doador").text(response.cpfDoador);
                $("#rg-doador").text(response.rgDoador);
                $("#sexo-doador").text(response.descricaoSexoDoador);
                $("#tipo-sanguineo-doador").text(response.descricaoTipoSanguineoDoador);
                $("#fator-rh-doador").text(response.descricaoFatorRhDoador);
                $("#data-nascimento-doador").text(response.dataNascimentoDoador);
                $("#logradouro-doador").text(response.logradouroDoador);
                $("#bairro-doador").text(response.bairroDoador);
                $("#numero-endereco-doador").text(response.numeroEnderecoDoador);
                $("#cidade-doador").text(response.cidadeDoador);
                $("#estado-doador").text(response.estadoDoador);
                $("#cep-doador").text(response.cepDoador);
                $("#complemento-doador").text( (response.complementoEnderecoDoador != null ) ? response.complementoEnderecoDoador : "Vazio" );
                $("#email-doador").text(response.emailDoador);
                
                $("#telefones-doador").empty();

                response.telefonesDoador.forEach(function(element){

                    $("#telefones-doador").append("<tr> <td>" + element.numeroTelefoneDoador + "</td> </tr>");
                });
                
                $("#nome-responsavel-doador").text(response.nomeResponsavelDoador);
                $("#cpf-responsavel-doador").text(response.cpfResponsavel);
                $("#rg-responsavel-doador").text(response.rgResponsavel);
                $("#data-nascimento-responsavel-doador").text(response.dataNascimentoResponsavelDoador);

                $("#telefones-responsavel-doador").empty();

                response.telefonesResponsavel.forEach(function(element){

                    $("#telefones-responsavel-doador").append("<tr> <td>" + element.numeroTelefoneResponsavel + "</td> </tr>"); 
                });

                $(".section-responsible").removeClass("d-none");
                
            }
            else {
                
                $("#img-doador").attr("src", "../img/img_doadores/" + response.imgDoador);
                $("#nome-doador").text(response.nomeDoador);
                $("#cpf-doador").text(response.cpfDoador);
                $("#rg-doador").text(response.rgDoador);
                $("#sexo-doador").text(response.descricaoSexoDoador);
                $("#tipo-sanguineo-doador").text(response.descricaoTipoSanguineoDoador);
                $("#fator-rh-doador").text(response.descricaoFatorRhDoador);
                $("#data-nascimento-doador").text(response.dataNascimentoDoador);
                $("#logradouro-doador").text(response.logradouroDoador);
                $("#bairro-doador").text(response.bairroDoador);
                $("#numero-endereco-doador").text(response.numeroEnderecoDoador);
                $("#cidade-doador").text(response.cidadeDoador);
                $("#estado-doador").text(response.estadoDoador);
                $("#cep-doador").text(response.cepDoador);
                $("#complemento-doador").text( (response.complementoEnderecoDoador != null ) ? response.complementoEnderecoDoador : "Vazio" );
                $("#email-doador").text(response.emailDoador);
                
                $("#telefones-doador").empty();

                response.telefonesDoador.forEach(function(element){

                    $("#telefones-doador").append("<tr> <td>" + element.numeroTelefoneDoador + "</td> </tr>");
                });
                
                $(".section-responsible").addClass("d-none");

            }
          
              $("#modal-view-doador").modal("show");
        }

        , error: function (request) {

            console.log(request.responseText);
        }


    });


});




$("#form-remover-doador").on("submit", (ev) => {

    const SUCESSO_AO_REMOVER_DOADOR = 1;
    const ERRO_AO_REMOVER_DOADOR = 0;

    ev.preventDefault();

    $.ajax({

        url: $("#hdUrlDoadorRemovido").val(),
        type: "get",
        dataType: "json",
        success: function (response) {



            if (response.status === SUCESSO_AO_REMOVER_DOADOR) {

                showToast('Sucesso', 'Doador removido com sucesso', 'success', '#28a745', 'white', 2000);

                setTimeout(function () {

                    location.reload(true);

                }, 2000);



            }
            else if (response.status === ERRO_AO_REMOVER_DOADOR) {


                showToast('Erro', 'Error ao remover o doador!', 'warning', '#dc3545', 'white', 5000);
            }



        },
        error: function (request, status, error) {


            console.log(request.responseText);
        }


    });



});


