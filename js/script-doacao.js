

$("#txtConsultarCpfDoador").on("keyup", function () {

    const TIPO_CONSULTA = 2;
    const SUCESSO_AO_PESQUISAR_POR_CPF = 1;
    const NENHUM_DOADOR_ENCONTRADO = 2;

    $.ajax({

        url: "../controller/doador/consultar-doadores.php"
        , dataType: "json"
        , method: "post"
        , data: {

            "hdSearchType": TIPO_CONSULTA
            , "txtPesquisa": $("#txtConsultarCpfDoador").val()
        }

        , success: function (response) {

            if (response.status === SUCESSO_AO_PESQUISAR_POR_CPF) {

                $(".container-donors").empty();


                response.result.forEach(element => {

                    $(".container-donors").append(
                        '<div class="mt-2 selected-donor w-50 d-block mx-auto cursor-pointer card-donor-for-search" data-id="' + element.idDoador + '" data-name="' + element.nomeDoador + '" data-photo="' + element.fotoUsuario + '">'
                        + '<div class= "selected-donor-content-container d-flex justify-content-start h-100">'
                        + '<img src="../img/img_doadores/' + element.fotoUsuario + '" />'

                        + '<div class="d-flex align-items-center w-50">'
                        + '<span class="ml-3">' + element.cpfDoador + '</span>'
                        + '</div>'


                        + '<div class="d-flex  justify-content-end align-items-center text-right w-50">'

                        + ' <i class="fas fa-user mr-3"></i>'
                        + '</div>'
                        + '</div>'
                        + '</div>');

                });


            } else if (response.status === NENHUM_DOADOR_ENCONTRADO) {

                $(".container-donors").empty();
                $(".container-donors").append("<h6 class='text-center'> Nenhum doador encontrado! </h6>");

            }

        }
        , error: function (request) {

            console.log(request.responseText);

        }
    });




});

$(document).on("click", ".card-donor-for-search", function (ev) {



    $("#card-donor-selected").empty();

    $("#card-donor-selected").append(

        '<div class= "selected-donor-content-container d-flex justify-content-start h-100">'
        + '<img src="../img/img_doadores/' + this.dataset.photo + '" />'

        + '<div class="d-flex align-items-center w-50">'
        + '<span class="ml-3">' + this.dataset.name + '</span>'
        + '</div>'


        + '<div class="d-flex  justify-content-end align-items-center text-right w-50">'

        + ' <i class="fas fa-edit mr-3"></i>'
        + '</div>'
        + '</div>');

    $("#modal-search-for-donors").modal('hide');
    $("#hdIdDonor").val(this.dataset.id);
});

function limparDoador() {

    const NENHUM_DOADOR_SELECIONADO = 0;
    $("#hdIdDonor").val(NENHUM_DOADOR_SELECIONADO);


}

function limparCamposDoacao() {

    const NENHUM_DOADOR_SELECIONADO = 0;

    $("#card-donor-selected").empty();

    $("#card-donor-selected").append('<div class="selected-donor-content-container d-flex justify-content-start h-100">'

        + '<div class="d-flex justify-content-center align-items-center w-100">'
        + '<span class="ml-3"> <strong class="font-size-medium"> ... </strong> </span>'
        + '<i class="fas fa-edit ml-3"> </i>'
        + '</div>'

        + '</div>');

    $("#hdIdDonor").val(NENHUM_DOADOR_SELECIONADO);

    $("#txtTotalDoacao").val("");
    $("#txtDataDoacao").val("");
    $("#txtPesoDoador").val("");
}

$("#btn-limpar-campos-doacao").on("click", function () {


    limparCamposDoacao();

});


function validarTodosCampos() {

    const NENHUM_DOADOR_SELECIONADO = 0;

    let tipoDoacao = $("#seTipoDoacao");
    let totalDoacao = $("#txtTotalDoacao");
    let unidadeMedida = $("#seUnidadeMedida");
    let dataDoacao = $("#txtDataDoacao");
    let materialDoado = $("#seMaterialDoado");
    let pesoDoador = $("#txtPesoDoador")


    let doadorValido = false;
    let tipoDoacaoValido = false;
    let totalDoacaoValido = false;
    let unidadeMedidaValida = false;
    let dataDoacaoValida = false;
    let materialDoadoValido = false;
    let pesoDoadorValido = false;

    if ($("#hdIdDonor").val() != NENHUM_DOADOR_SELECIONADO) {

        doadorValido = true;

        $("#card-donor-selected").addClass("is-valid");
        $("#card-donor-selected").removeClass("is-invalid");
    }
    else {

        $("#card-donor-selected").addClass("is-invalid");
        $("#card-donor-selected").removeClass("is-valid");

        showToast('Atenção', 'Doador não selecionado, por favor selecione um doador!', 'warning', '#dc3545', 'white', 10000);
    }


    if (tipoDoacao.val() != "") {

        tipoDoacaoValido = true;

        tipoDoacao.addClass("is-valid");
        tipoDoacao.removeClass("is-invalid");
    }
    else {

        tipoDoacao.addClass("is-valid");
        tipoDoacao.removeClass("is-invalid");

        showToast('Atenção', 'Tipo da doação inválido, por favor selecione um dos tipos estabelecidos!', 'warning', '#dc3545', 'white', 10000);
    }



    if ( totalDoacao.val() != "" && totalDoacao.val() > 0) {

        totalDoacaoValido = true;

        totalDoacao.addClass("is-valid");
        totalDoacao.removeClass("is-invalid");
    }
    else {

        totalDoacao.addClass("is-invalid");
        totalDoacao.removeClass("is-valid");

        showToast('Atenção', 'Total da doação inválido, por favor passe um número válido!', 'warning', '#dc3545', 'white', 10000);

    }

    if ( unidadeMedida.val() != "") {

        unidadeMedidaValida = true;

        unidadeMedida.addClass("is-valid");
        unidadeMedida.removeClass("is-invalid");
    }
    else {

        
        unidadeMedida.addClass("is-invalid");
        unidadeMedida.removeClass("is-valid");

        showToast('Atenção', 'Unidade de medida inválida, Passe uma das unidades de medida estabelecidas!', 'warning', '#dc3545', 'white', 10000);
    }
}


function validarDataDoacao(data) {

    try {

        let dataPassada = new Date(data);

        let dataMinima = new Date();
        let dataMaxima = new Date();

        dataMinima.setMouth( dataMinima.getMonth() - 1 );

        if ( dataPassada >= dataMinima && dataPassada <= dataMaxima ) {

            return true;
        }

        return false;

    }

    catch (ex) {

        return false;
    }

}