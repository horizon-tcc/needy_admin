$(".txtCpf").mask("000.000.000-00");
$(".txtCep").mask("00000-000");
$(".txtRg").mask("00.000.000-0");
$(".telefone-residencial").mask("(00) 0000-0000");
$(".telefone-celular").mask("(00) 00000-0000");

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

            $('#txtBairro').val(response.bairro);
            $('#txtLogradouro').val(response.logradouro);
            $('#txtCidade').val(response.localidade);
            $('#txtUf').val(response.uf);

        }



    });


});





function validarCpf(cpf) {

    if (cpf.length == 14) {



        var cpfFormatado = cpf.replace(/\./g, "");
        cpfFormatado = cpfFormatado.replace("-", "");


        var vetCpf = cpfFormatado.split("");

        var primeiroCaracter = vetCpf[0];

        for (var i = 1; primeiroCaracter == vetCpf[i]; i++) {
            if (i == vetCpf.length - 2) {
                return;
            }
        }

        var primeiraSoma = 0;

        for (var i = 0, m = 10; i < vetCpf.length - 2; i++ , m--) {

            primeiraSoma += vetCpf[i] * m;

        }
        var primeiroResto = (primeiraSoma * 10) % 11;

        if (primeiroResto == vetCpf[vetCpf.length - 2] ||
            (primeiroResto == 10 && vetCpf[vetCpf.length - 2] == 0)) {

            var segundaSoma = 0;

            for (var i = 0, m = 11; i < vetCpf.length - 1; i++ , m--) {

                segundaSoma += vetCpf[i] * m;

            }

            segundoResto = (segundaSoma * 10) % 11;

            if (segundoResto == vetCpf[vetCpf.length - 1] ||
                (segundoResto == 10 && vetCpf[vetCpf.length - 1] == 0)) {

                return true;
            }

            else {
                return false;
            }
        }
        else {

            return false;
        }


    }
    else {

        return false;
    }

}

$(function () {
    try {
        var fsPrev, fsAtual, fsNext;

        $('.next').click(function () {

            if (validarSecaoPessoal()) {

                fsAtual = $(this).parent().parent().parent();
                fsNext = fsAtual.next();

                $('#progress li').eq($('fieldset').index(fsNext)).addClass("activated-section");

                fsAtual.hide(800);
                fsNext.show(800);

            }
            else {


            }
        });


        $('.prev').click(function () {

            fsAtual = $(this).parent().parent().parent();
            fsPrev = fsAtual.prev();

            $('#progress li').eq($('fieldset').index(fsAtual)).removeClass("activated-section");

            fsAtual.hide(800);
            fsPrev.show(800);


        });

    }
    catch (e) {
        logMyErrors(e);
    }
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

    var imgDoador = document.getElementById("imgDoador");
    var txtNomeDoador = document.getElementById("txtNomeDoador");
    var txtDataNascimento = document.getElementById("txtDataNascimento");
    var txtCpfDoador = document.getElementById("txtCpfDoador");
    var txtRgDoador = document.getElementById("txtRgDoador");


    imgDoador.value = "";
    txtNomeDoador.value = "";
    txtDataNascimento.value = "";
    txtCpfDoador.value = "";
    txtRgDoador.value = "";
}


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

    console.log(txtNomeDoador.value);

    if (imgDoador.value != "") {

        imgValida = true;

        $("#imgDoador").removeClass("is-invalid");
        $("#imgDoador").addClass("is-valid");

    }
    else {

        $.toast({
            heading: 'Atenção',
            text: 'Passe uma imagem válida',
            icon: 'warning',
            loader: true,
            bgColor: '#dc3545',        // Change it to false to disable loader
            loaderBg: 'white',  // To change the background
            position: 'top-right'
        });

        $("#imgDoador").removeClass("is-valid");
        $("#imgDoador").addClass("is-invalid");


    }

    if (txtNomeDoador.value.length >= 3) {

        nomeValido = true;

        $("#txtNomeDoador").removeClass("is-invalid");
        $("#txtNomeDoador").addClass("is-valid");

    }
    else {

        $.toast({
            heading: 'Atenção',
            text: 'O nome do doador deve possuir pelo menos três caracteres',
            icon: 'warning',
            loader: true,
            bgColor: '#dc3545',        // Change it to false to disable loader
            loaderBg: 'white',  // To change the background
            position: 'top-right'
        });

        $("#txtNomeDoador").removeClass("is-valid");
        $("#txtNomeDoador").addClass("is-invalid");


    }

    if (seSexo.value != "") {

        sexoValido = true;

        $("#seSexo").removeClass("is-invalid");
        $("#seSexo").addClass("is-valid");

    }
    else {

        $.toast({
            heading: 'Atenção',
            text: 'Passe um sexo válido',
            icon: 'warning',
            loader: true,
            bgColor: '#dc3545',        // Change it to false to disable loader
            loaderBg: 'white',  // To change the background
            position: 'top-right'
        });

        $("#seSexo").removeClass("is-valid");
        $("#seSexo").addClass("is-invalid");

    }



    if (validarData(txtDataNascimento.value)) {

        dataNascimentoValido = true;

        $("#txtDataNascimento").removeClass("is-invalid");
        $("#txtDataNascimento").addClass("is-valid");

    }
    else {

        $.toast({
            heading: 'Atenção',
            text: 'Passe uma data válida',
            icon: 'warning',
            loader: true,
            bgColor: '#dc3545',        // Change it to false to disable loader
            loaderBg: 'white',  // To change the background
            position: 'top-right'
        });

        $("#txtDataNascimento").removeClass("is-valid");
        $("#txtDataNascimento").addClass("is-invalid");
    }

    if (seTipoSanguineo.value != "") {

        tipoSanguineoValido = true;

        $("#seTipoSanguineo").removeClass("is-invalid");
        $("#seTipoSanguineo").addClass("is-valid");
    }
    else {

        $.toast({
            heading: 'Atenção',
            text: 'Passe um tipo de sangue válido',
            icon: 'warning',
            loader: true,
            bgColor: '#dc3545',        // Change it to false to disable loader
            loaderBg: 'white',  // To change the background
            position: 'top-right'
        });

        $("#seTipoSanguineo").removeClass("is-valid");
        $("#seTipoSanguineo").addClass("is-invalid");
    }

    if (seFatorRh.value != "") {

        fatorRhValido = true;

        $("#seFatorRh").removeClass("is-invalid");
        $("#seFatorRh").addClass("is-valid");
    }
    else {

        $.toast({
            heading: 'Atenção',
            text: 'Passe um tipo de fator RH válido',
            icon: 'warning',
            loader: true,
            bgColor: '#dc3545',        // Change it to false to disable loader
            loaderBg: 'white',  // To change the background
            position: 'top-right'
        });

        $("#seFatorRh").removeClass("is-valid");
        $("#seFatorRh").addClass("is-invalid");
    }


    if (validarCpf(txtCpfDoador.value)) {

        cpfValido = true;

        $("#txtCpfDoador").removeClass("is-invalid");
        $("#txtCpfDoador").addClass("is-valid");
    }
    else {

        $.toast({
            heading: 'Atenção',
            text: 'Passe um CPF válido',
            icon: 'warning',
            loader: true,
            bgColor: '#dc3545',        // Change it to false to disable loader
            loaderBg: 'white',  // To change the background
            position: 'top-right'
        });

        $("#txtCpfDoador").removeClass("is-valid");
        $("#txtCpfDoador").addClass("is-invalid");
    }



    if (txtRgDoador.value != "") {

        rgValido = true;

        $("#txtRgDoador").removeClass("is-invalid");
        $("#txtRgDoador").addClass("is-valid");
    }
    else {

        $.toast({
            heading: 'Atenção',
            text: 'Passe um rg válido',
            icon: 'warning',
            loader: true,
            bgColor: '#dc3545',        // Change it to false to disable loader
            loaderBg: 'white',  // To change the background
            position: 'top-right'
        });

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

function checkNumber(valor) {
    var regra = /^[0-9]+$/;
    if (valor.match(regra)) {
        return true;
    } else {
        return false;
    }
}

function validarData(data) {

    data = data.split("-");

    if (checkNumber(data[0]) && checkNumber(data[1]) && checkNumber(data[2])) {

        return true;
    }
    else {
        return false;
    }
}


$("#btn-limpar-campos-pessoais").click(function () {

    limparSecaoPessoal();

});


$("input[name=imgDoador]").change(function () {

    inserirImg();

});


function inserirImg() {

    var file = document.querySelector('.img-input').files[0];

    var img = document.querySelector('img[name=imgPreview]');

    var reader = new FileReader();

    reader.onloadend = function () {

        img.src = reader.result;

        $("#imgPreview").removeClass("form-img");
        $("#imgPreview").addClass("img-preview");

        $(".img-input").removeClass("is-invalid");
        $(".img-input").addClass("is-valid");

    }

    if (file) {

        reader.readAsDataURL(file);

    } else {

        img.src = "../img/camera.png";

        $("#imgPreview").removeClass("img-preview");
        $("#imgPreview").addClass("form-img");


        $(".img-input").removeClass("is-valid");
        $(".img-input").addClass("is-invalid");

    }

}