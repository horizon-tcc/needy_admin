///////////// início dos Eventos /////////////////////////

$("input[name=imgBancoSangue]").change(function () {

    inserirImg();

});


$(document).on("change", "input[name=rbTipoContato]", function (e) {

    if ($("input[name=rbTipoContato]:checked").val() == "residencial") {

        $("#txtTelefoneBancoSangue").mask("(00) 0000-0000");

    }
    else {

        $("#txtTelefoneBancoSangue").mask("(00) 00000-0000");

    }


});


$(document).on("click", "#btn-adicionar-horario", function () {

    let formularioHorario = document.querySelector(".form-adicionar-horario");
    let formData = new FormData(formularioHorario);

    const ERRO_AO_ADICIONAR_UM_NOVO_HORARIO = 0;
    const SUCESSO_AO_ADICIONAR_UM_NOVO_HORARIO = 1;
    const PARAMETROS_PARA_ADICAO_DE_UM_NOVO_HORARIO_VAZIOS = 2;

    $.ajax({

        url: "../controller/banco-sangue/adicionar-horarios-banco-sangue.php"
        , method: "post"
        , dataType: "json"
        , data: formData
        , processData: false
        , contentType: false
        , success: function (response) {

            if (response.status === SUCESSO_AO_ADICIONAR_UM_NOVO_HORARIO) {

                showToast('Sucesso', 'Horário adicionado com sucesso!', 'success', '#28a745', 'white', 2000);

                limparHorariosView();
                listarHorariosView();

            }
            else if (response.status === PARAMETROS_PARA_ADICAO_DE_UM_NOVO_HORARIO_VAZIOS) {

                showToast('Atenção', 'Não deixe nenhum campo vazio ao adicionar um novo horário!', 'warning', '#dc3545', 'white', 10000);
            }
            else if (response.status === ERRO_AO_ADICIONAR_UM_NOVO_HORARIO) {

                showToast('Atenção', 'Erro ao adicionar um novo horário!', 'warning', '#dc3545', 'white', 10000);

            }


        }
        , error: function (request) {

            showToast('Atenção', 'Erro ao adicionar um novo horário!', 'warning', '#dc3545', 'white', 10000);
        }

    });


});


$(document).on("click", ".btn-remover-horario", function () {


    const SESSAO_NAO_INICIALIADA = 0;
    const SUCESSO_AO_REMOVER_HORARIO_ESPECIFICO = 1;
    const PARAMETROS_PARA_REMOCAO_NAO_ESPECIFICADOS = 2;

    $.ajax({

        url: "../controller/banco-sangue/remover-horario-especifico.php"
        , method: "post"
        , dataType: "json"
        , data: {

            "idDia": this.dataset.id
        }
        , success: function (response) {

            if (response.status === SUCESSO_AO_REMOVER_HORARIO_ESPECIFICO) {

                showToast('Sucesso', 'Horário removido com sucesso!', 'success', '#28a745', 'white', 2000);
                limparHorariosView();
                listarHorariosView();

            }
            else if (response.status === PARAMETROS_PARA_REMOCAO_NAO_ESPECIFICADOS) {

                showToast('Atenção', 'Erro ao adicionar um novo horário!', 'warning', '#dc3545', 'white', 10000);
            }
            else if (response.status === SESSAO_NAO_INICIALIADA) {

                showToast('Atenção', 'Erro ao adicionar um novo horário!', 'warning', '#dc3545', 'white', 10000);
            }

        }
        , error: function (request) {

            showToast('Atenção', 'Erro ao adicionar um novo horário!', 'warning', '#dc3545', 'white', 10000);
            console.log(resquest.responseText);
        }

    });


});



$("#txtCep").blur(function (e) {

    $.ajax({

        url: "../controller/doador/pegar-endereco.php",
        type: "post",
        dataType: "json",
        data: {

            "txtCep": $('#txtCep').val()
        },
        success: function (response) {

            if (response.sucesso) {

                $("#txtCep").removeClass("is-invalid");
                $("#txtCep").addClass("is-valid");

                $('#txtBairro').val(response.bairro);
                $('#txtLogradouro').val(response.logradouro);
                $('#txtUf').val(response.uf);
                $('#txtCidade').val(response.localidade);
            }
            else {

                $("#txtCep").removeClass("is-valid");
                $("#txtCep").addClass("is-invalid");



            }

        },
        error: function (request, status, error) {

            $("#txtCep").removeClass("is-valid");
            $("#txtCep").addClass("is-invalid");
        }

    });


});


$("#btn-limpar-campos-sobre-banco-sangue").on("click", function () {

    limparCamposSobreBancoSangue();
});


$("#modal-limpar-campos-endereco-banco-sangue").on("click", function () {

    limparSecaoEndereco();
});


$("#btn-limpar-campos-contato-banco-sangue").on("click", function () {

    limparSecaoContato();
});



$(document).on('click', 'i.remover-telefone-banco-sangue', function (ev) {


    let descTelefoneRemovido = this.parentNode.querySelector("div.container-span-telefone").firstChild.innerHTML;


    $('#modal-remover-telefone-banco-sangue').modal('show');
    $('#desc-remover-telefone-banco-sangue').text("Deseja remover o número " + descTelefoneRemovido + " ?");
    $('#hdTelefoneRemovidoBancoSangue').val(descTelefoneRemovido);


});


$("#form-remover-telefone-banco-sangue").on('submit', function (ev) {

    const SUCESSO = 1;

    ev.preventDefault();

    listContainerTelefone = document.querySelectorAll("div#container-item-telefone-banco-sangue li.item-telefone");

    for (let i = 0; i < listContainerTelefone.length; i++) {

        if (listContainerTelefone[i].querySelector("div.container-span-telefone").firstChild.innerHTML
            == document.getElementById("hdTelefoneRemovidoBancoSangue").value) {

            listContainerTelefone[i].remove();
            break;
        }

    }

    $.ajax({

        url: "../controller/banco-sangue/remover-telefone.php",
        type: "post",
        dataType: "json",
        data: {

            "telefoneRemovido": $("#hdTelefoneRemovidoBancoSangue").val()
        },
        success: function (response) {

            console.log(response.status);

            if (response.status === SUCESSO) {

                if (response.size == 0) {

                    document.querySelector("#container-item-telefone-banco-sangue").innerHTML =
                        "<div id='msg-list-telefone-banco-sangue'> <h5 class='text-center mt-3'> Nenhum telefone adicionado </h5> </div>";

                }
                showToast('Sucesso', 'Telefone removido com sucesso', 'success', '#28a745', 'white', 5000);


            }
            else {

                showToast('Atenção', 'Erro ao remover o telefone', 'danger', '#dc3545', 'white', 5000);

            }

        },
        error: function (request, status, error) {

            showToast('Atenção', 'Erro ao remover o telefone', 'warning', '#dc3545', 'white', 5000);

            console.log(status);

        }


    });


    $('#modal-remover-telefone-banco-sangue').modal('hide');

});



///////////// fim dos Eventos /////////////////////////



////////// início das funções ////////////////////



function adicionarHorarioView(horario) {

    $(".container-horarios-adicionados").append(
        '<div class="horario-adicionado mx-3 mt-5" style="display:none;">'
        + '<span class="icon-container icon-top-center"> <i class="fas fa-calendar-day icon"></i> </span>'
        + '<h6 class="font-bold text-center mt-2">' + horario.descricaoDia + '</h6>'
        + '<h6 class="font-bold text-left mt-3"> Horário de abertura: <span>' + horario.horarioAbertura + '</span> </h6>'
        + '<h6 class="font-bold text-left mt-3"> Horário de fechamento: <span>' + horario.horarioFechamento + ' </span> </h6>'
        + '<button type="button" class="btn-remover-horario btn btn-danger d-block mx-auto mt-3" data-id="' + horario.idDia + '"> <i class="far fa-window-close"></i> Cancelar </button>'
        + '</div>');

    $("#modal-adicionar-horarios").modal('hide');

    window.scrollTo({
        top: window.outerHeight,
        behavior: "smooth"
    });

    $(".horario-adicionado").slideDown();
}

function limparHorariosView() {

    $(".container-horarios-adicionados").empty();
}

function listarHorariosView() {

    const SESSAO_NAO_INICIALIZADA = 0;
    const SESSAO_RETORNADA_COM_SUCESSO = 1;

    $.ajax({

        url: "../controller/banco-sangue/listar-horarios-registrados.php"
        , method: "get"
        , dataType: "json"
        , async: false
        , success: function (response) {

            if (response.status === SESSAO_RETORNADA_COM_SUCESSO) {

                response.horariosRegistrados.forEach(function (element) {

                    if (element != null) {

                        adicionarHorarioView({
                            idDia: element.idDia,
                            descricaoDia: element.descricaoDia,
                            horarioAbertura: element.horarioAbertura,
                            horarioFechamento: element.horarioFechamento
                        });
                    }

                });
            }
            else if (response.status === SESSAO_NAO_INICIALIZADA) {

                console.log("Não inicializada!");
            }

        }
        , error: function (request) {

            console.log(request.responseText);
        }

    });
}

$(document).ready(function () {

    try {

        const primeiraEtapa = 1;
        const segundaEtapa = 2;
        const terceiraEtapa = 3;

        const SUCESSO_AO_CADASTRAR_O_BANCO_DE_SANGUE = 1;

        let fsPrev, fsAtual, fsNext;
        let etapa = primeiraEtapa;


        $('.next').click(function () {

            if (etapa == primeiraEtapa) {

                if (validarSecaoSobre()) {

                    fsAtual = $(this).parent().parent().parent();
                    fsNext = fsAtual.next();

                    $('#progress li').eq($('fieldset').index(fsNext)).addClass("activated-section");

                    fsAtual.hide(800);
                    fsNext.show(800);

                    etapa++;
                }

            }
            else if (etapa == segundaEtapa) {


                if (validarSecaoEndereco()) {

                    fsAtual = $(this).parent().parent().parent();
                    fsNext = fsAtual.next();

                    $('#progress li').eq($('fieldset').index(fsNext)).addClass("activated-section");

                    fsAtual.hide(800);
                    fsNext.show(800);

                    etapa++;

                }
            }

            else if (etapa == terceiraEtapa) {

                if (validarSecaoContato()) {

                    let formularioDoador = document.querySelector("#form-banco-sangue");
                    let formData = new FormData(formularioDoador);

                    $.ajax({

                        url: "../controller/banco-sangue/inserir-banco-sangue.php",
                        type: "post",
                        dataType: "json",
                        processData: false,
                        contentType: false,
                        data: formData,
                        success: function (response) {

                            if (response.status === SUCESSO_AO_CADASTRAR_O_BANCO_DE_SANGUE) {

                                showToast('Sucesso', 'Banco de sangue cadastrado com sucesso', 'success', '#28a745', 'white', 2000);

                                setTimeout(function () {
                                    document.location.reload(true);

                                }, 2000);

                            }
                            else {

                                console.log(response);

                            }

                        },
                        error: function (request, status, error) {

                            console.log(request.responseText);
                            console.log(request);
                        }

                    });


                    showToast('Sucesso', 'Banco de sangue cadastrado com sucesso!', 'success', '#28a745', 'white', 2000);


                }

            }
        });


        $('.prev').click(function () {

            fsAtual = $(this).parent().parent().parent();
            fsPrev = fsAtual.prev();

            $('#progress li').eq($('fieldset').index(fsAtual)).removeClass("activated-section");

            fsAtual.hide(800);
            fsPrev.show(800);

            etapa--;


        });

    }
    catch (ex) {
        console.log(ex.message);
    }
});



function validarSecaoSobre() {

    let nomeBancoSangueValido = false;
    let horarioBancoSangueValido = false;
    let imagemBancoSangueValida = false;

    let nomeBancoSangue = $("#txtNomeBancoSangue").val();
    let arquivoImagemBancoSangue = $("#imgBancoSangue").val();

    if (arquivoImagemBancoSangue != "") {

        imagemBancoSangueValida = true;

    }
    else {

        showToast('Atenção', 'A imagem está inválida, por favor passe uma imagem válida!', 'warning', '#dc3545', 'white', 5000);

    }

    if (validarNome(nomeBancoSangue)) {

        nomeBancoSangueValido = true;

        $("#txtNomeBancoSangue").addClass("is-valid");
        $("#txtNomeBancoSangue").removeClass("is-invalid");

    }
    else {


        $("#txtNomeBancoSangue").addClass("is-invalid");
        $("#txtNomeBancoSangue").removeClass("is-valid");

        showToast('Atenção', 'O nome do banco de sangue está inválido, por favor passe um nome válido !', 'warning', '#dc3545', 'white', 5000);
    }


    if (validarHorariosBancoSangue()) {

        horarioBancoSangueValido = true;

        $("#btn-activate-modal").addClass("is-valid");
        $("#btn-activate-modal").removeClass("is-invalid");
    }
    else {

        $("#btn-activate-modal").addClass("is-invalid");
        $("#btn-activate-modal").removeClass("is-valid");

        showToast('Atenção', 'Os horários estão inválidos, por favor passe pelo menos um horário!', 'warning', '#dc3545', 'white', 5000);
    }

    if (nomeBancoSangueValido && horarioBancoSangueValido && imagemBancoSangueValida) {

        return true;
    }
    else {

        return false;
    }


}


function validarHorariosBancoSangue() {

    const SESSAO_NAO_INICIALIZADA = 0;
    const HORARIOS_VALIDOS = 1;
    const HORARIOS_INVALIDOS = 2;

    let horarioValido = false;

    $.ajax({

        url: "../controller/banco-sangue/verifica-horarios-registrados.php"
        , method: "get"
        , dataType: "json"
        , async: false
        , success: function (response) {

            if (response.status === HORARIOS_VALIDOS) {

                horarioValido = true;
            }


        }
        , error: function (request) {

            console.log(request.responseText);
        }


    });

    return horarioValido;

}


function validarSecaoEndereco() {

    let txtCep = document.getElementById("txtCep");
    let txtLogradouro = document.getElementById("txtLogradouro");
    let txtBairro = document.getElementById("txtBairro");
    let txtCidade = document.getElementById("txtCidade");
    let txtUf = document.getElementById("txtUf");
    let txtNumero = document.getElementById("txtNumero");
    let txtComplemento = document.getElementById("txtComplemento");

    let cepValido = false;
    let logradouroValido = false;
    let bairroValido = false;
    let cidadeValida = false;
    let ufValido = false;
    let numeroValido = false;

    $.ajax({

        url: "../controller/doador/pegar-endereco.php",
        type: "post",
        dataType: "json",
        async: false,
        data: {

            "txtCep": $('#txtCep').val()
        },
        success: function (response) {

            if (response.sucesso == true) {

                $("#txtCep").removeClass("is-invalid");
                $("#txtCep").addClass("is-valid");

                $('#txtBairro').val(response.bairro);
                $('#txtLogradouro').val(response.logradouro);
                $('#txtUf').val(response.uf);
                $('#txtCidade').val(response.localidade);

                cepValido = true;

            }
            else {

                $("#txtCep").removeClass("is-valid");
                $("#txtCep").addClass("is-invalid");

            }

        },
        error: function (request, status, error) {

            $("#txtCep").removeClass("is-valid");
            $("#txtCep").addClass("is-invalid");
        }

    });



    if (!cepValido) {
        showToast('Atenção', 'CEP inválido, por favor passe um cep válido - inválido', 'warning', '#dc3545', 'white', 10000);
    }


    if (txtLogradouro.value != "") {


        logradouroValido = true;

        $("#txtLogradouro").removeClass("is-invalid");
        $("#txtLogradouro").addClass("is-valid");

    }
    else {

        showToast('Atenção', 'Logradouro inválido, por favor passe um logradouro válido', 'warning', '#dc3545', 'white', 10000);

        $("#txtLogradouro").removeClass("is-valid");
        $("#txtLogradouro").addClass("is-invalid");

    }

    if (txtBairro.value != "") {


        bairroValido = true;

        $("#txtBairro").removeClass("is-invalid");
        $("#txtBairro").addClass("is-valid");

    }
    else {

        showToast('Atenção', 'Bairro inválido, por favor passe um bairro válido', 'warning', '#dc3545', 'white', 10000);

        $("#txtBairro").removeClass("is-valid");
        $("#txtBairro").addClass("is-invalid");

    }


    if (txtCidade.value != "") {


        cidadeValida = true;

        $("#txtCidade").removeClass("is-invalid");
        $("#txtCidade").addClass("is-valid");

    }
    else {

        showToast('Atenção', 'Cidade inválida, por favor passe uma cidade válida', 'warning', '#dc3545', 'white', 10000);

        $("#txtCidade").removeClass("is-valid");
        $("#txtCidade").addClass("is-invalid");

    }


    if (txtUf.value != "") {


        ufValido = true;

        $("#txtUf").removeClass("is-invalid");
        $("#txtUf").addClass("is-valid");

    }
    else {

        showToast('Atenção', 'UF inválida, por favor passe um UF válida', 'warning', '#dc3545', 'white', 10000);

        $("#txtUf").removeClass("is-valid");
        $("#txtUf").addClass("is-invalid");

    }



    if (txtNumero.value != "") {


        numeroValido = true;

        $("#txtNumero").removeClass("is-invalid");
        $("#txtNumero").addClass("is-valid");

    }
    else {

        showToast('Atenção', 'Número inválido, por favor passe um número válido', 'warning', '#dc3545', 'white', 10000);

        $("#txtNumero").removeClass("is-valid");
        $("#txtNumero").addClass("is-invalid");

    }

    if (cepValido && logradouroValido && bairroValido && cidadeValida && ufValido && numeroValido) {

        return true;
    }
    else {
        return false;
    }

}

function validarSecaoContato() {

    let telefoneValido = false;

    $.ajax({

        url: "../controller/banco-sangue/verificar-tamanho-sessao-telefone.php",
        type: "post",
        dataType: "json",
        async: false,
        success: function (response) {

            if (response.status) {

                if (response.size > 0) {

                    telefoneValido = true;

                    $("#list-telefone-banco-sangue").removeClass("is-invalid");
                    $("#list-telefone-banco-sangue").addClass("is-valid");


                }
                else {

                    showToast('Atenção', 'Passe pelo menos um número para contato', 'warning', '#dc3545', 'white', 10000);

                }

            }
            else {

                showToast('Atenção', 'Passe pelo menos um número para contato', 'warning', '#dc3545', 'white', 10000);

                $("#list-telefone-banco-sangue").removeClass("is-valid");
                $("#list-telefone-banco-sangue").addClass("is-invalid");

            }

        },
        error: function (request, status, error) {

            showToast('Atenção', 'Erro ao validar a lista de telefones', 'warning', '#dc3545', 'white', 10000);
            $("#list-telefone-banco-sangue").removeClass("is-valid");
            $("#list-telefone-banco-sangue").addClass("is-invalid");
        }

    });


    if (telefoneValido) {

        return true;

    }

    return false;

}


$("#form-adicionar-telefone-banco-sangue").submit(function (ev) {

    const SUCESSO = 1;
    const NUMERO_REPETIDO = 2;
    const NUMERO_INVALIDO = 3;

    ev.preventDefault();


    $.ajax({

        url: "../controller/banco-sangue/adicionar-telefone.php",
        type: "post",
        dataType: "json",
        data: {

            "txtTelefoneBancoSangue": $('#txtTelefoneBancoSangue').val()
        },
        success: function (response) {

            if (response.status === SUCESSO) {

                if (response.size == 1) {

                    document.getElementById("msg-list-telefone-banco-sangue").remove();
                }



                $("#container-item-telefone-banco-sangue").append("<li class='item-telefone d-flex bd-highlight align-items-center'>"
                    + "<i class='fas fa-phone-alt flex-fill bd-highlight'></i>"
                    + "<div class='h-100 flex-fill bd-highlight container-span-telefone'>"
                    + "<span class='h-100 d-flex justify-content-center align-items-center desc-telefone'>" + response.novoTelefone + "</span>"
                    + "</div>"
                    + "<i class='fas fa-times flex-fill bd-highlight remover-telefone-banco-sangue'></i>"
                    + "</li>");

                showToast('Sucesso', 'Telefone adicionado com sucesso', 'success', '#28a745', 'white', 5000);

                $("#txtTelefoneBancoSangue").removeClass("is-invalid");
                $("#txtTelefoneBancoSangue").val("");


                $('#modal-adicionar-telefone-banco-sangue').modal('hide');

            }
            else if (response.status === NUMERO_REPETIDO) {

                showToast('Atenção', 'Telefone repetido, por favor digite outro telefone!', 'warning', '#dc3545', 'white', 5000);
                $("#txtTelefoneBancoSangue").removeClass("is-valid");
                $("#txtTelefoneBancoSangue").addClass("is-invalid");
            }

            else if (response.status === NUMERO_INVALIDO) {

                showToast('Atenção', 'Telefone inválido, por favor digite outro telefone!', 'warning', '#dc3545', 'white', 5000);
                $("#txtTelefoneBancoSangue").removeClass("is-valid");
                $("#txtTelefoneBancoSangue").addClass("is-invalid");

            }
            else {
                showToast('Atenção', 'Erro ao adicionar um telefone!', 'warning', '#dc3545', 'white', 5000);
                $("#txtTelefoneBancoSangue").removeClass("is-valid");
                $("#txtTelefoneBancoSangue").addClass("is-invalid");

            }

        },
        error: function (request, status, error) {

            showToast('Atenção', 'Telefone inválido', 'warning', '#dc3545', 'white', 5000);
            $("#txtTelefoneBancoSangue").removeClass("is-valid");
            $("#txtTelefoneBancoSangue").addClass("is-invalid");


        }



    });




});

function limparCamposSobreBancoSangue() {

    // limpando a imagem

    let imgPreview = document.getElementById("imgPreview");
    let imgBancoSangue = document.getElementById("imgBancoSangue");
    let lblImgBancoSangue = document.getElementById("file-description");

    $("#imgPreview").removeClass("img-preview");
    $("#imgPreview").addClass("form-img");


    imgPreview.src = "../img/camera.png"
    imgBancoSangue.value = "";

    lblImgBancoSangue.innerHTML = "<span> <strong> * </strong> </span>"
        + "<span> <i class='far fa-file-image'></i> </span>"
        + "<span> Escolha uma imagem </span>";


    // limpando o nome do banco

    $("#txtNomeBancoSangue").val("");

    // limpando os horários registrados

    const SESSÃO_NÃO_INICIALIADA = 0;
    const SUCESSO_AO_LIMPAR_A_SESSAO = 1;

    $.ajax({

        url: "../controller/banco-sangue/limpar-horarios-registrados.php"
        , dataType: "json"
        , method: "get"
        , async: false
        , success: function (response) {

            if (response.status === SUCESSO_AO_LIMPAR_A_SESSAO) {

                limparHorariosView();

            }

        }

        , error: function (request) {

            console.log(request.responseText);

        }


    });



}


function limparSecaoEndereco() {

    document.getElementById("txtCep").value = "";
    document.getElementById("txtLogradouro").value = "";
    document.getElementById("txtBairro").value = "";
    document.getElementById("txtCidade").value = "";
    document.getElementById("txtUf").value = "";
    document.getElementById("txtNumero").value = "";
    document.getElementById("txtComplemento").value = "";

}



function limparSecaoContato() {


    $.ajax({

        url: "../controller/banco-sangue/limpar-sessao-telefone.php",
        type: "post",
        dataType: "json",
        success: function (response) {

            if (response.status) {

                $("#container-item-telefone-banco-sangue").empty();

                document.querySelector("#container-item-telefone-banco-sangue").innerHTML =
                    "<div id='msg-list-telefone-banco-sangue'> <h5 class='text-center mt-3'> Nenhum telefone adicionado </h5> </div>";

            }

        },
        error: function (request, status, error) {

            showToast('Atenção', 'Erro ao limpar o formulário', 'warning', '#dc3545', 'white', 10000);
        }

    });
}
/////////// Fim das funções  ///////////////////////