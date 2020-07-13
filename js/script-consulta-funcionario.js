$(document).on('keyup', '#txtPesquisaFuncionario', function (event) {

    event.preventDefault();
    event.stopPropagation();

    $.ajax({

        url: "../controller/funcionario/pesquisa-funcionario.php",
        type: "post",
        data: {
            "txtPesquisa": $("#txtPesquisaFuncionario").val()
            , "hdSearchType": $("#hdSearchTypeFuncionario").val()
        },
        dataType: "json",
        success: function (response) {

            if (response.status) {

                $(".container-cards").empty();

                response.resultado.forEach(element => {

                    $(".container-cards").append(
                        getCardDonnorStructure(element.idFuncionario, element.fotoUsuario, element.nomeFuncionario, 
                                                element.cpfFuncionario, element.nomeBancoSangue, element.descricaoCargoFuncionario));
                });

            }
            else if (response.status === false) {

                $(".container-cards").empty();
                $(".container-cards").append("<h6 class='mt-4'> Nenhum funcionario encontrado </h6>");

            }

        },
        error: function (request, status, error) {

            console.log(request.responseText);

        }
    });
});


$(document).on("change", "#seCargoFuncionario", function () {

    $.ajax({

        url: "../controller/funcionario/pesquisa-funcionario.php",
        type: "post",
        data: {
            "txtPesquisa": $("#seCargoFuncionario").val()
            , "hdSearchType": $("#hdSearchTypeFuncionario").val()
        },
        dataType: "json",
        success: function (response) {


            if (response.status === true) {

                $(".container-cards").empty();

                response.resultado.forEach(element => {

                    $(".container-cards").append(
                        getCardDonnorStructure(element.idFuncionario, element.fotoUsuario, element.nomeFuncionario, 
                                                element.cpfFuncionario, element.nomeBancoSangue, element.descricaoCargoFuncionario));

                });

            }
            else if (response.status === false) {

                $(".container-cards").empty();
                $(".container-cards").append("<h6 class='mt-4'> Nenhum funcionario encontrado </h6>");

            }

        },
        error: function (request, status, error) {


            console.log(request.responseText);
        }

    });

});


$(document).on("change", "#seBancoFuncionario", function () {

    $.ajax({

        url: "../controller/funcionario/pesquisa-funcionario.php",
        type: "post",
        data: {
            "txtPesquisa": $("#seBancoFuncionario").val()
            , "hdSearchType": $("#hdSearchTypeFuncionario").val()
        },
        dataType: "json",
        success: function (response) {


            if (response.status === true) {

                $(".container-cards").empty();

                response.resultado.forEach(element => {

                    $(".container-cards").append(
                        getCardDonnorStructure(element.idFuncionario, element.fotoUsuario, element.nomeFuncionario, 
                                                element.cpfFuncionario, element.nomeBancoSangue, element.descricaoCargoFuncionario));

                });

            }
            else if (response.status === false) {

                $(".container-cards").empty();
                $(".container-cards").append("<h6 class='mt-4'> Nenhum funcionario encontrado </h6>");

            }

        },
        error: function (request, status, error) {

            console.log(request.responseText);

            console.log(error);

        }

    });

});


$(document).on('click', '.remover-funcionario', function (event) {

    event.preventDefault();
    event.stopPropagation();

    let link = this.getAttribute('href');

    removerFuncionario = document.getElementById('funcionarioRemovido');

    removerFuncionario.value = link;

});


$(document).on('click', '.editar-funcionario', function (event) {

    event.stopPropagation();

});


$('#form-remover-funcionario').on('submit', function (event) {

    event.preventDefault();

    $.ajax({

        url: $("#funcionarioRemovido").val(),
        type: "get",
        dataType: "json",
        success: function (resposta) {
            if (resposta) {

                showToast('Sucesso', 'O funcionario foi removido com sucesso', 'success', '#28a745', 'white', 2000);

                setTimeout(function () {

                    location.reload(true);

                }, 2000);

            } else {

                showToast('Erro', 'Não foi possivel remover o funcionario!', 'warning', '#dc3545', 'white', 2000);

            }

        },
        error: function (request, status, error) {

            console.log(request);
            console.log(error);
            console.log(status);

        }

    });

});

$(document).on('click', '.card-consulta', function (event) {

    let id = this.getAttribute('id');

    $.ajax({

        url: "../controller/funcionario/resgatar-funcionario-update.php",
        type: "post",
        dataType: "json",
        data: {
            "idFuncionario": id
        },
        success: function (resposta) {
            if (resposta.statusFuncionario) {

                $('#img-funcionario').attr('src', '../img/img_funcionario/' + resposta.fotoFuncionario + '');

                $("#nome-funcionario").text(resposta.nomeFuncionario);
                $("#email-funcionario").text(resposta.emailUsuario);
                $("#cpf-funcionario").text(resposta.cpfFuncionario);
                $("#rg-funcionario").text(resposta.rgFuncionario);
                $("#banco-funcionario").text(resposta.nomeBancoSangue);
                $("#cargo-funcionario").text(resposta.descricaoCargoFuncionario);

                $('#update-funcionario').val(id);

                $("#modal-view-funcionario").modal("show");

            } else {

                showToast('Erro', 'Funcionario não encontrado!', 'warning', '#dc3545', 'white', 2000);

                console.log(resposta);

            }

        },
        error: function (request, status, error) {

            console.log(request);
            console.log(error);
            console.log(status);

        }

    });

});


$('#update-funcionario').on('click', function (event) {

    idFuncionario = document.getElementById('update-funcionario');

    window.location.href = "funcionario.php?idFuncionario=" + idFuncionario.value;

});


$(".filter-option").on("click", function (ev) {

    if (this.id == 'filterNomeFuncionario') {

        $('#hdSearchTypeFuncionario').val('filterNomeFuncionario');
        loadNameFilter();

    }
    else if (this.id == 'filterCpfFuncionario') {

        $('#hdSearchTypeFuncionario').val('filterCpfFuncionario');
        loadCpfFilter();


    }
    else if (this.id == 'filterRgFuncionario') {

        $('#hdSearchTypeFuncionario').val('filterRgFuncionario');
        loadRgFilter();


    }
    else if (this.id == 'filterTipoSanguineoFuncionario') {

        $('#hdSearchTypeFuncionario').val('filterTipoSanguineoFuncionario');
        loadBloodTypeFilter();

    }
    else if (this.id == 'filterFatorRhFuncionario') {

        $('#hdSearchTypeFuncionario').val('filterFatorRhFuncionario');
        loadRhFactorFilter();

    } else if (this.id == 'filterEmailFuncionario') {

        $('#hdSearchTypeFuncionario').val('filterEmailFuncionario');
        loadEmailFilter();

    } else if (this.id == 'filterCargoFuncionario'){

        $('#hdSearchTypeFuncionario').val('filterCargoFuncionario');
        loadOPFilter();

    } else if (this.id == 'filterBancoFuncionario'){

        $('#hdSearchTypeFuncionario').val('filterBancoFuncionario');
        loadBancoFilter();

    }

    $("#modal-filter-funcionario").modal('hide');

});


function loadNameFilter() {

    $(".container-search").empty();
    $(".container-search").append(" <input type='text' name='txtPesquisaFuncionario' id='txtPesquisaFuncionario' class='input-for-search w-100' placeholder='Digite o nome do funcionario' />");

}


function loadCpfFilter() {

    $(".container-search").empty();
    $(".container-search").append("<input type='text' name='txtPesquisaFuncionario' id='txtPesquisaFuncionario' class='input-for-search w-100 txtCpf' placeholder='Digite o CPF do funcionario' />");
    $(".txtCpf").mask("000.000.000-00");

}


function loadRgFilter() {

    $(".container-search").empty();
    $(".container-search").append("<input type='text' name='txtPesquisaFuncionario' id='txtPesquisaFuncionario' class='input-for-search w-100 txtRg' placeholder='Digite o RG do funcionario' />");
    $(".txtRg").mask("00.000.000-0");

}


function loadEmailFilter() {

    $(".container-search").empty();
    $(".container-search").append("<input type='text' name='txtPesquisaFuncionario' id='txtPesquisaFuncionario' class='input-for-search w-100' placeholder='Digite o email do funcionario' />");

}


function loadOPFilter() {

    $(".container-search").empty();
    $(".container-search").append(" <label for='seCargoFuncionario'> Cargo Funcionario </label> <select name='seCargoFuncionario' id='seCargoFuncionario' class='input-for-search w-100' placeholder='Escolha o cargo do funcionario' />");

    $.ajax({

        url: "../controller/cargo-funcionario/pegar-cargo-funcionario.php"
        , dataType: "json"
        , method: "get"
        , success: function (response) {

            $("#seCargoFuncionario").append("<option selected disabled>Selecione uma opção</option>");

            response.forEach(element => {

                $("#seCargoFuncionario").append("<option value='" +
                    element.idCargoFuncionario + "'>"
                    + element.descricaoCargoFuncionario + "</option>");

            });

        }
        , error: function (request) {

            console.log(request.responseText);

        }
    });
}


function loadBancoFilter() {

    $(".container-search").empty();
    $(".container-search").append(" <label for='seBancoFuncionario'> Banco de Sangue </label> <select name='seBancoFuncionario' id='seBancoFuncionario' class='input-for-search w-100' placeholder='Escolha o Banco de Sangue' />");

    $.ajax({

        url: "../controller/banco-sangue/pegar-banco-sangue.php"
        , dataType: "json"
        , method: "get"
        , success: function (response) {

            $("#seBancoFuncionario").append("<option selected disabled>Selecione uma opção</option>");

            response.forEach(element => {

                $("#seBancoFuncionario").append("<option value='" +
                    element.idBancoSangue + "'>"
                    + element.nomeBancoSangue + "</option>");

            });

        }
        , error: function (request) {

            console.log(request.responseText);

        }
    });
}


function getCardDonnorStructure(idFuncionario, fotoUsuario, nomeFuncionario, cpfFuncionario, nomeBancoSangue, descricaoCargoFuncionario) {

    return "<div class='card-consulta' id ='" + idFuncionario + "'>"
        + "<img src='../img/img_funcionario/" + fotoUsuario + "' class='' />"
        + "<h6 class='text-center mt-4'>" + nomeFuncionario + "</h6>"
        + "<h6 class='text-center mt-2'>" + cpfFuncionario + "</h6>"
        + "<h6 class='text-center mt-2'>" + nomeBancoSangue + "</h6>"
        + "<h6 class='text-center mt-2'>" + descricaoCargoFuncionario + "</h6>"
        + "<a href='funcionario.php?idFuncionario=" + idFuncionario + "' id= " + idFuncionario + " class='editar-funcionario'> <button class='mt-4'> <i class='fas fa-pen'></i> </button> </a>"
        + "<a href='../controller/funcionario/funcionario-exclusao.php?idFuncionario=" + idFuncionario + "' class='remover-funcionario'> <button class='mt-4' data-toggle='modal' data-target='#modal-remover-funcionario'> <i class='far fa-trash-alt'></i> </button> </a>"
        + "</div>";

}