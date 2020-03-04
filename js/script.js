$(".txtCpf").mask("000.000.000-00");
$(".txtCep").mask("00000-000");
$(".txtRg").mask("00.000.000-0");

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
    //374.545.510-09 

}