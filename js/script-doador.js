$("#txtCpfDoador").blur(function (e) {

    if (validarCpf($("#txtCpfDoador").val())) {
        $("#txtCpfDoador").removeClass("is-invalid");
        $("#txtCpfDoador").addClass("is-valid");
    }
    else {
        $("#txtCpfDoador").removeClass("is-valid");
        $("#txtCpfDoador").addClass("is-invalid");

    }

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

            if (response.sucesso == true) {

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


$(document).on("change", "input[name=rbTipoContato]", function (e) {

    if ($("input[name=rbTipoContato]:checked").val() == "residencial") {

        $("#txtTelefoneDoador").mask("(00) 0000-0000");

    }
    else {

        $("#txtTelefoneDoador").mask("(00) 00000-0000");

    }


});


function limparSecaoPessoal() {

    var imgPreview = document.getElementById("imgPreview");
    var imgDoador = document.getElementById("imgDoador");
    var txtNomeDoador = document.getElementById("txtNomeDoador");
    var txtDataNascimento = document.getElementById("txtDataNascimento");
    var txtCpfDoador = document.getElementById("txtCpfDoador");
    var txtRgDoador = document.getElementById("txtRgDoador");
    var lblImgDoador = document.getElementById("file-description");

    $("#imgPreview").removeClass("img-preview");
    $("#imgPreview").addClass("form-img");



    imgPreview.src = "../img/camera.png"
    imgDoador.value = "";
    txtNomeDoador.value = "";
    txtDataNascimento.value = "";
    txtCpfDoador.value = "";
    txtRgDoador.value = "";
    lblImgDoador.innerHTML = "<strong class='red'>*</strong> Escolha uma imagem";




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


$("#btn-limpar-campos-pessoais").click(function () {

    limparSecaoPessoal();
    validarSecaoPessoal();

});

$("#btn-limpar-campos-endereco").click(function () {

    limparSecaoEndereco();
    validarSecaoEndereco();

});


function validarSecaoPessoal() {

    var imgDoador = document.getElementById("imgDoador");
    var txtNomeDoador = document.getElementById("txtNomeDoador");
    var seSexo = document.getElementById("seSexo");
    var txtDataNascimento = document.getElementById("txtDataNascimento");
    var seTipoSanguineo = document.getElementById("seTipoSanguineo");
    var seFatorRh = document.getElementById("seFatorRh");
    var txtCpfDoador = document.getElementById("txtCpfDoador");
    var txtRgDoador = document.getElementById("txtRgDoador");

    var imgValida = false;
    var nomeValido = false;
    var sexoValido = false;
    var dataNascimentoValido = false;
    var tipoSanguineoValido = false;
    var fatorRhValido = false;
    var cpfValido = false;
    var rgValido = false;


    if (imgDoador.value != "") {

        imgValida = true;

        $("#imgDoador").removeClass("is-invalid");
        $("#imgDoador").addClass("is-valid");

    }
    else {

        showToast('Atenção', 'Passe uma imagem válida', 'warning', '#dc3545', 'white', 10000);

        $("#imgDoador").removeClass("is-valid");
        $("#imgDoador").addClass("is-invalid");


    }

    if (txtNomeDoador.value.length >= 3 && validarNome(txtNomeDoador.value)) {

        nomeValido = true;

        $("#txtNomeDoador").removeClass("is-invalid");
        $("#txtNomeDoador").addClass("is-valid");

    }
    else {

        showToast('Atenção', 'O nome do doador deve possuir pelo menos 3 caracteres e não deve possuir números', 'warning', '#dc3545', 'white', 10000);

        $("#txtNomeDoador").removeClass("is-valid");
        $("#txtNomeDoador").addClass("is-invalid");


    }

    if (seSexo.value != "") {

        sexoValido = true;

        $("#seSexo").removeClass("is-invalid");
        $("#seSexo").addClass("is-valid");

    }
    else {

        showToast('Atenção', 'Passe um sexo válido', 'warning', '#dc3545', 'white', 10000);

        $("#seSexo").removeClass("is-valid");
        $("#seSexo").addClass("is-invalid");

    }



    if (validarData(txtDataNascimento.value)) {

        dataNascimentoValido = true;

        $("#txtDataNascimento").removeClass("is-invalid");
        $("#txtDataNascimento").addClass("is-valid");

    }
    else {

        showToast('Atenção', 'Passe uma data válida', 'warning', '#dc3545', 'white', 10000);

        $("#txtDataNascimento").removeClass("is-valid");
        $("#txtDataNascimento").addClass("is-invalid");
    }

    if (seTipoSanguineo.value != "") {

        tipoSanguineoValido = true;

        $("#seTipoSanguineo").removeClass("is-invalid");
        $("#seTipoSanguineo").addClass("is-valid");
    }
    else {

        showToast('Atenção', 'Passe um tipo de sangue válido', 'warning', '#dc3545', 'white', 10000);

        $("#seTipoSanguineo").removeClass("is-valid");
        $("#seTipoSanguineo").addClass("is-invalid");
    }

    if (seFatorRh.value != "") {

        fatorRhValido = true;

        $("#seFatorRh").removeClass("is-invalid");
        $("#seFatorRh").addClass("is-valid");
    }
    else {

        showToast('Atenção', 'Passe um tipo de fator RH válido', 'warning', '#dc3545', 'white', 10000);

        $("#seFatorRh").removeClass("is-valid");
        $("#seFatorRh").addClass("is-invalid");
    }


    if (validarCpf(txtCpfDoador.value)) {

        cpfValido = true;

        $("#txtCpfDoador").removeClass("is-invalid");
        $("#txtCpfDoador").addClass("is-valid");
    }
    else {

        showToast('Atenção', 'Passe um CPF válido', 'warning', '#dc3545', 'white', 10000);

        $("#txtCpfDoador").removeClass("is-valid");
        $("#txtCpfDoador").addClass("is-invalid");
    }



    if (txtRgDoador.value != "") {

        rgValido = true;

        $("#txtRgDoador").removeClass("is-invalid");
        $("#txtRgDoador").addClass("is-valid");
    }
    else {

        showToast('Atenção', 'Passe um rg válido', 'warning', '#dc3545', 'white', 10000);

        $("#txtRgDoador").removeClass("is-valid");
        $("#txtRgDoador").addClass("is-invalid");
    }

    if (imgValida && nomeValido && sexoValido && dataNascimentoValido &&
        tipoSanguineoValido && fatorRhValido && cpfValido && rgValido) {

        return true;
    }

    else {
        return false;
    }
}

function validarSecaoEndereco() {


    var txtCep = document.getElementById("txtCep");
    var txtLogradouro = document.getElementById("txtLogradouro");
    var txtBairro = document.getElementById("txtBairro");
    var txtCidade = document.getElementById("txtCidade");
    var txtUf = document.getElementById("txtUf");
    var txtNumero = document.getElementById("txtNumero");
    var txtComplemento = document.getElementById("txtComplemento");

    var cepValido = false;
    var logradouroValido = false;
    var bairroValido = false;
    var cidadeValida = false;
    var ufValido = false;
    var numeroValido = false;



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



$("input[name=imgDoador]").change(function () {

    inserirImg();

});


function validarNome() {

    var nome = document.getElementById("txtNomeDoador");

    for (var i = 0; i < nome.value.length; i++) {

        if (!checkNumber(nome.value[i])) {
            continue;
        }
        else {
            return false;
        }

    }

    return true;
}


$(document).ready(function () {
    try {
        var fsPrev, fsAtual, fsNext;
        var etapa = 1;

        $('.next').click(function () {

            if (etapa == 1) {

                if (validarSecaoPessoal()) {

                    fsAtual = $(this).parent().parent().parent();
                    fsNext = fsAtual.next();

                    $('#progress li').eq($('fieldset').index(fsNext)).addClass("activated-section");

                    fsAtual.hide(800);
                    fsNext.show(800);

                    etapa++;
                }

            }
            else if (etapa == 2) {


                if (validarSecaoEndereco()) {

                    fsAtual = $(this).parent().parent().parent();
                    fsNext = fsAtual.next();

                    $('#progress li').eq($('fieldset').index(fsNext)).addClass("activated-section");

                    fsAtual.hide(800);
                    fsNext.show(800);

                    etapa++;

                }
            }

            else if (etapa == 3) {

            }
            else if (etapa == 4) {


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
    catch (e) {
        logMyErrors(e);
    }
});


$("#form-adicionar-telefone-doador").submit(function (ev) {

    ev.preventDefault();


    $.ajax({

        url: "../controller/doador/adicionar-telefone.php",
        type: "post",
        dataType: "json",
        data: {

            "txtTelefoneDoador": $('#txtTelefoneDoador').val()
        },
        success: function (response) {

            if (response.status) {

                if (response.size == 1) {

                    document.getElementById("msg-list-telefone").remove();
                }



                $(".container-item-telefone").append("<li class='item-telefone d-flex bd-highlight align-items-center'>"
                    + "<i class='fas fa-phone-alt flex-fill bd-highlight'></i>"
                    + "<div class='h-100 flex-fill bd-highlight container-span-telefone'>"
                    + "<span class='h-100 d-flex justify-content-center align-items-center desc-telefone'>" + response.novoTelefone + "</span>"
                    + "</div>"
                    + "<i class='fas fa-times flex-fill bd-highlight remover-telefone'></i>"
                    + "</li>");

                showToast('Sucesso', 'Telefone adicionado com sucesso', 'success', '#28a745', 'white', 5000);

                $("#txtTelefoneDoador").removeClass("is-invalid");
                $("#txtTelefoneDoador").val("");

            }
            else {

                showToast('Atenção', 'Telefone inválido', 'warning', '#dc3545', 'white', 5000);
                $("#txtTelefoneDoador").removeClass("is-valid");
                $("#txtTelefoneDoador").addClass("is-invalid");
            }

        },
        error: function (request, status, error) {

            showToast('Atenção', 'Telefone inválido', 'warning', '#dc3545', 'white', 5000);
            $("#txtTelefoneDoador").removeClass("is-valid");
            $("#txtTelefoneDoador").addClass("is-invalid");


        }



    });



    $('#modal-adicionar-telefone-doador').modal('hide');

});



$(document).on('click', 'i.remover-telefone', function (ev) {


    let descTelefoneRemovido = this.parentNode.querySelector("div.container-span-telefone").firstChild.innerHTML;


    $('#modal-remover-telefone-doador').modal('show');
    $('#desc-remover-telefone').text("Deseja remover o número " + descTelefoneRemovido + " ?");
    $('#hdTelefoneRemovidoDoador').val(descTelefoneRemovido);


});


$("#form-remover-telefone-doador").on('submit', function (ev) {

    ev.preventDefault();

    listContainerTelefone = document.querySelectorAll("li.item-telefone");

    for (let i = 0; i < listContainerTelefone.length; i++) {

        if (listContainerTelefone[i].querySelector("div.container-span-telefone").firstChild.innerHTML
            == document.getElementById("hdTelefoneRemovidoDoador").value) {

            listContainerTelefone[i].remove();
            break;
        }

    }

    $.ajax({

        url: "../controller/doador/remover-telefone.php",
        type: "post",
        dataType: "json",
        data: {

            "telefoneRemovido": $("#hdTelefoneRemovidoDoador").val()
        },
        success: function (response) {

            if (response.status) {

                if (response.size == 0) {

                    document.querySelector(".container-item-telefone").innerHTML =
                        "<div id='msg-list-telefone'> <h5 class='text-center mt-3'> Nenhum telefone adicionado </h5> </div>";

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


    $('#modal-remover-telefone-doador').modal('hide');

});

window.addEventListener('beforeunload', (event) => {

    if ( $("#txtNomeDoador").val().length > 0 || $("#imgDoador").val().length > 0 ||
    $("#txtDataNascimento").val().length > 0 || $("#txtCpfDoador").val().length > 0 || 
    $("#txtRgDoador").val().length > 0 || $("txtCep").val().length > 0 || $("txtLogradouro").val().length > 0
    || $("txtCidade").val().length > 0 || $("txtUf").val().length > 0 || $("txtNumero").val().length > 0
    || $("txtComplemento").val().length > 0 || $("txtEmail").val().length > 0 || $("txtNomeResponsavel").val().length > 0    
    || $("txtDataNascimentoResponsavel").val().length > 0 || $("txtCpfResponsavel").val().length > 0 || $("txtRgResponsavel").val().length > 0) {
       
        event.returnValue = `Tem certeza que deseja sair ?`;
    }
});
