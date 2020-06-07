
$(document).on("keyup", "#txtPesquisa", function () {

    const SUCESSO_AO_CONSULTAR_OS_DOADORES = 1;
    const NENHUM_DOADOR_ENCONTRADO = 2;

    $.ajax({

        url: "../controller/doador/consultar-doadores.php",
        type: "post",
        data: {
            "txtPesquisa": $("#txtPesquisa").val()
            , "hdSearchType": $("#hdSearchType").val()
        },
        dataType: "json",
        success: function (response) {


            if (response.status === SUCESSO_AO_CONSULTAR_OS_DOADORES) {

                $(".container-cards").empty();

                response.result.forEach(element => {

                    $(".container-cards").append(
                        getCardDonnorStructure(element.idDoador, element.fotoUsuario,
                            element.nomeDoador, element.cpfDoador, element.descricaoTipoSanguineo));


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

$(document).on("keyup", "#txtDataInicial", function () {

    const SUCESSO_AO_CONSULTAR_OS_DOADORES = 1;
    const NENHUM_DOADOR_ENCONTRADO = 2;

    $.ajax({

        url: "../controller/doador/consultar-doadores.php",
        type: "post",
        data: {
            "txtDataInicial": $("#txtDataInicial").val()
            , "txtDataFinal": $("#txtDataFinal").val()
            , "hdSearchType": $("#hdSearchType").val()
        },
        dataType: "json",
        success: function (response) {


            if (response.status === SUCESSO_AO_CONSULTAR_OS_DOADORES) {

                $(".container-cards").empty();

                response.result.forEach(element => {

                    $(".container-cards").append(
                        getCardDonnorStructure(element.idDoador, element.fotoUsuario,
                            element.nomeDoador, element.cpfDoador, element.descricaoTipoSanguineo));


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


$(document).on("keyup", "#txtDataFinal", function () {

    const SUCESSO_AO_CONSULTAR_OS_DOADORES = 1;
    const NENHUM_DOADOR_ENCONTRADO = 2;

    $.ajax({

        url: "../controller/doador/consultar-doadores.php",
        type: "post",
        data: {
            "txtDataInicial": $("#txtDataInicial").val()
            , "txtDataFinal": $("#txtDataFinal").val()
            , "hdSearchType": $("#hdSearchType").val()
        },
        dataType: "json",
        success: function (response) {


            if (response.status === SUCESSO_AO_CONSULTAR_OS_DOADORES) {

                $(".container-cards").empty();

                response.result.forEach(element => {

                    $(".container-cards").append(
                        getCardDonnorStructure(element.idDoador, element.fotoUsuario,
                            element.nomeDoador, element.cpfDoador, element.descricaoTipoSanguineo));


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

$(document).on("change", "#seTipoSanguineo", function () {

    const SUCESSO_AO_CONSULTAR_OS_DOADORES = 1;
    const NENHUM_DOADOR_ENCONTRADO = 2;

    $.ajax({

        url: "../controller/doador/consultar-doadores.php",
        type: "post",
        data: {
            "txtPesquisa": $("#seTipoSanguineo").val()
            , "hdSearchType": $("#hdSearchType").val()
        },
        dataType: "json",
        success: function (response) {


            if (response.status === SUCESSO_AO_CONSULTAR_OS_DOADORES) {

                $(".container-cards").empty();

                response.result.forEach(element => {

                    $(".container-cards").append(
                        getCardDonnorStructure(element.idDoador, element.fotoUsuario,
                            element.nomeDoador, element.cpfDoador, element.descricaoTipoSanguineo));


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


$(document).on("change", "#seFatorRh", function () {

    const SUCESSO_AO_CONSULTAR_OS_DOADORES = 1;
    const NENHUM_DOADOR_ENCONTRADO = 2;
    
    $.ajax({

        url: "../controller/doador/consultar-doadores.php",
        type: "post",
        data: {
            "txtPesquisa": $("#seFatorRh").val()
            , "hdSearchType": $("#hdSearchType").val()
        },
        dataType: "json",
        success: function (response) {


            if (response.status === SUCESSO_AO_CONSULTAR_OS_DOADORES) {

                $(".container-cards").empty();

                response.result.forEach(element => {

                    $(".container-cards").append(
                        getCardDonnorStructure(element.idDoador, element.fotoUsuario,
                            element.nomeDoador, element.cpfDoador, element.descricaoTipoSanguineo));


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

            if (calculateAge(FormataStringData(response.dataNascimentoDoador)) < 18) {

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
                $("#complemento-doador").text((response.complementoEnderecoDoador != null) ? response.complementoEnderecoDoador : "Vazio");
                $("#email-doador").text(response.emailDoador);

                $("#telefones-doador").empty();

                response.telefonesDoador.forEach(function (element) {

                    $("#telefones-doador").append("<tr> <td>" + element.numeroTelefoneDoador + "</td> </tr>");
                });

                $("#nome-responsavel-doador").text(response.nomeResponsavelDoador);
                $("#cpf-responsavel-doador").text(response.cpfResponsavel);
                $("#rg-responsavel-doador").text(response.rgResponsavel);
                $("#data-nascimento-responsavel-doador").text(response.dataNascimentoResponsavelDoador);

                $("#telefones-responsavel-doador").empty();

                response.telefonesResponsavel.forEach(function (element) {

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
                $("#complemento-doador").text((response.complementoEnderecoDoador != null) ? response.complementoEnderecoDoador : "Vazio");
                $("#email-doador").text(response.emailDoador);

                $("#telefones-doador").empty();

                response.telefonesDoador.forEach(function (element) {

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


$(".filter-option").on("click", function (ev) {

    const FILTRO_NOME = 1;
    const FILTRO_CPF = 2;
    const FILTRO_RG = 3;
    const FILTRO_DATA_NASCIMENTO = 4;
    const FILTRO_EMAIL = 5;
    const FILTRO_TIPO_SANGUINEO = 6;
    const FILTRO_FATOR_RH = 7;


    if (this.id == FILTRO_NOME) {

        loadNameFilter();
        $('#hdSearchType').val(FILTRO_NOME);

    }
    else if (this.id == FILTRO_CPF) {

        loadCpfFilter();
        $('#hdSearchType').val(FILTRO_CPF);

    }
    else if (this.id == FILTRO_RG) {

        loadRgFilter();
        $('#hdSearchType').val(FILTRO_RG);

    }
    else if (this.id == FILTRO_DATA_NASCIMENTO) {

        loadDateOfBirthFilter();
        $('#hdSearchType').val(FILTRO_DATA_NASCIMENTO);
    }

    else if (this.id == FILTRO_EMAIL) {

        loadEmailFilter();
        $('#hdSearchType').val(FILTRO_EMAIL);
    }
    else if (this.id == FILTRO_TIPO_SANGUINEO) {

        loadBloodTypeFilter();
        $('#hdSearchType').val(FILTRO_TIPO_SANGUINEO);
    }
    else if (this.id == FILTRO_FATOR_RH) {

        loadRhFactorFilter();
        $('#hdSearchType').val(FILTRO_FATOR_RH);
    }

    $("#modal-filter-doador").modal('hide');

});

function loadNameFilter() {

    $(".container-search").empty();
    $(".container-search").append(" <input type='text' name='txtPesquisa' id='txtPesquisa' class='input-for-search w-100' placeholder='Digite o nome do doador' />");
}

function loadCpfFilter() {

    $(".container-search").empty();
    $(".container-search").append("<input type='text' name='txtPesquisa' id='txtPesquisa' class='input-for-search w-100 txtCpf' placeholder='Digite o CPF do doador' />");
    $(".txtCpf").mask("000.000.000-00");

}

function loadRgFilter() {

    $(".container-search").empty();
    $(".container-search").append("<input type='text' name='txtPesquisa' id='txtPesquisa' class='input-for-search w-100 txtRg' placeholder='Digite o RG do doador' />");
    $(".txtRg").mask("00.000.000-0");

}
function loadDateOfBirthFilter() {
    $(".container-search").empty();
    $(".container-search").append("<div class='d-flex flex-row'>"
        + "<div class ='w-75 text-center'> <label for='txtDataInicial'> Data de início </label> <br/> <input type='date' name='txtDataInicial' id='txtDataInicial' class='input-for-search w-100 text-center' placeholder='Digite a data de nascimento do doador' /> </div>"
        + "<div class ='w-75 ml-3 text-center'> <label for='txtDataFinal'> Data final </label> <br/> <input type='date' name='txtDataFinal' id='txtDataFinal' class='input-for-search w-100 text-center' placeholder='Digite a data de nascimento do doador' /> </div>"
        + "</div>");
}
function loadEmailFilter() {

    $(".container-search").empty();
    $(".container-search").append("<input type='text' name='txtPesquisa' id='txtPesquisa' class='input-for-search w-100' placeholder='Digite o email do doador' />");

}

function loadBloodTypeFilter() {

    $(".container-search").empty();
    $(".container-search").append("<label for='seTipoSanguineo'> Tipo sanguíneo </label> <select name='txtPesquisa' id='seTipoSanguineo' class='input-for-search w-100' placeholder='Escolha o tipo sanguíneo do doador' />");

    $.ajax({

        url: "../controller/tipo-sanguineo/pegar-tipos-sanguineos.php"
        , dataType: "json"
        , method: "get"
        , success: function (response) {

            response.forEach(element => {

                $("#seTipoSanguineo").append("<option value='" +
                    element.idTipoSanguineo + "'>"
                    + element.descricaoTipoSanguineo + "</option>");
            });


        }
        , error: function (request) {

            console.log(request.responseText);

        }



    });
}

function loadRhFactorFilter() {


    $(".container-search").empty();
    $(".container-search").append(" <label for='seFatorRh'> Fator RH </label> <select name='txtPesquisa' id='seFatorRh' class='input-for-search w-100' placeholder='Escolha o tipo sanguíneo do doador' />");

    $.ajax({

        url: "../controller/fator-rh/pegar-fatores-rh.php"
        , dataType: "json"
        , method: "get"
        , success: function (response) {

            response.forEach(element => {

                $("#seFatorRh").append("<option value='" +
                    element.idFatorRh + "'>"
                    + element.descricaoFatorRh + "</option>");
            });

        }
        , error: function (request) {

            console.log(request.responseText);

        }



    });

}

function getCardDonnorStructure(idDoador, fotoUsuario, nomeDoador, cpfDoador, descricaoTipoSanguineo) {

    return "<div class='card-consulta' id ='" + idDoador + "'>"

        + "<img src='../img/img_doadores/" + fotoUsuario + "' class='' />"

        + "<h6 class='text-center mt-5'>" + nomeDoador + "</h6>"
        + "<h6 class='text-center mt-2'>" + cpfDoador + "</h6>"
        + "<h6 class='text-center mt-2'>" + descricaoTipoSanguineo + "</h6>"

        + "<a href='doadores.php?idDoador=" + idDoador + "'> <button class='mt-4'> <i class='fas fa-pen'></i> </button> </a>"
        + "<a href='../controller/doador/remover-doador.php?idDoador=" + idDoador + "' class='remover-doador'> <button class='mt-4' data-toggle='modal' data-target='#modal-remover-doador'> <i class='far fa-trash-alt'></i> </button> </a>"
        + "</div>";
}