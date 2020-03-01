$(".txtCpf").mask("000.000.000-00");
$(".txtCep").mask("00000-000");
$(".txtRg").mask("00.000.000-0");

$("#txtCpfDoador").blur(function(e){

    console.log(validarCpf($("#txtCpfDoador").val()));

});

function validarCpf(cpf){

  
    var cpfFormatado = cpf.replace(/\./g,"");
    cpfFormatado = cpfFormatado.replace("-","");


    var vetCpf = cpfFormatado.split("");
    var soma = 0;

    for ( var i = 0 , m = 10 ; i < vetCpf.length - 2 ; i++, m--){

        soma += vetCpf[i] * m;
        
    }

    console.log(soma);

    return cpfFormatado;

}