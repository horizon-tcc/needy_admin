$(".txtCpf").mask("000.000.000-00");
$(".txtCep").mask("00000-000");
$(".txtRg").mask("00.000.000-0");
$(".telefone-residencial").mask("(00) 0000-0000");
$(".telefone-celular").mask("(00) 00000-0000");



$(document).ready(function () {
    $('input').keypress(function (e) {
        var code = null;
        code = (e.keyCode ? e.keyCode : e.which);
        return (code == 13) ? false : true;
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

        for (var i = 0, m = 10; i < vetCpf.length - 2; i++, m--) {

            primeiraSoma += vetCpf[i] * m;

        }
        var primeiroResto = (primeiraSoma * 10) % 11;

        if (primeiroResto == vetCpf[vetCpf.length - 2] ||
            (primeiroResto == 10 && vetCpf[vetCpf.length - 2] == 0)) {

            var segundaSoma = 0;

            for (var i = 0, m = 11; i < vetCpf.length - 1; i++, m--) {

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



function checkNumber(valor) {
    var regra = /^[0-9]+$/;
    if (valor.match(regra)) {
        return true;
    } else {
        return false;
    }
}

function validarData(data) {
    dataAtual = new Date();
    data = data.split("-");

    if (checkNumber(data[0]) && checkNumber(data[1]) && checkNumber(data[2])) {


        if (((dataAtual.getFullYear() - data[0]) >= 16)
            && (data[0] >= dataAtual.getFullYear() - 80)
            && (data[0] < dataAtual.getFullYear())) {

            return true;
        }

    }
    else {
        return false;
    }
}



function inserirImg() {

    var file = document.querySelector('.img-input').files[0];

    var img = document.querySelector('img[name=imgPreview]');

    var reader = new FileReader();

    nomeImg = $("#file-description").val()

    reader.onloadend = function () {

        img.src = reader.result;

        $("#imgPreview").removeClass("form-img");
        $("#imgPreview").addClass("img-preview");

        $(".img-input").removeClass("is-invalid");
        $(".img-input").addClass("is-valid");

        nomeImg = $(".img-input").val();
        nomeImg = nomeImg.split("\\");

        $("#file-description").empty();
        $("#file-description").append("<span> <strong> * </strong> </span>"
            + "<span> <i class='far fa-file-image'></i> </span>"
            + "<span>" + nomeImg[nomeImg.length - 1] + "</span>   ");

    }

    if (file) {

        reader.readAsDataURL(file);

    } else {

        img.src = "../img/camera.png";

        $("#imgPreview").removeClass("img-preview");
        $("#imgPreview").addClass("form-img");

        $(".img-input").removeClass("is-valid");
        $(".img-input").addClass("is-invalid");

        $("#file-description").empty();
        $("#file-description").append("<span> <strong> * </strong> </span>"
            + "<span> <i class='far fa-file-image'></i> </span>"
            + "<span> Escolha uma imagem </span>   ");

    }

}



function showToast(title, text, icon, bgColor, bgLoader, time) {


    $.toast({
        heading: title,
        text: text,
        icon: icon,
        loader: true,
        bgColor: bgColor,
        loaderBg: bgLoader,
        position: 'top-right',
        hideAfter: time
    });

}



function validarEmail(email) {
    var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    
    if (filter.test(email)) {
        return true;
    }
    return false;
}