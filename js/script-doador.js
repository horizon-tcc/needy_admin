
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
                showToast('Atenção', 'CEP inválido, por favor passe um cep válido', 'warning', '#dc3545', 'white', 10000);
                $("#txtCep").removeClass("is-valid");
                $("#txtCep").addClass("is-invalid");

            }


        },
        error: function (request, status, error) {

            showToast('Atenção', 'CEP inválido, por favor passe um cep válido', 'warning', '#dc3545', 'white', 10000);
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
    lblImgDoador.innerHTML ="<strong class='red'>*</strong> Escolha uma imagem";

    validarSecaoPessoal();

}


$("#btn-limpar-campos-pessoais").click(function () {

    limparSecaoPessoal();

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

function validadarSecaoEndereco(){


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