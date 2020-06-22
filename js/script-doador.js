$("#txtCpfDoador").blur(function (e) {


    if (validarCpf($("#txtCpfDoador").val()) && !verificarExistenciaCpfDoador($("#txtCpfDoador").val())) {
        $("#txtCpfDoador").removeClass("is-invalid");
        $("#txtCpfDoador").addClass("is-valid");
    }
    else {
        $("#txtCpfDoador").removeClass("is-valid");
        $("#txtCpfDoador").addClass("is-invalid");
    }

});

$("#txtEmail").blur(function (e) {


    if (validarEmail($("#txtEmail").val()) && !verificarExistenciaEmailUsuario($("#txtEmail").val())) {
        $("#txtEmail").removeClass("is-invalid");
        $("#txtEmail").addClass("is-valid");
    }
    else {
        $("#txtEmail").removeClass("is-valid");
        $("#txtEmail").addClass("is-invalid");
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


$(document).on("change", "input[name=rbTipoContato]", function (e) {

    if ($("input[name=rbTipoContato]:checked").val() == "residencial") {

        $("#txtTelefoneDoador").mask("(00) 0000-0000");

    }
    else {

        $("#txtTelefoneDoador").mask("(00) 00000-0000");

    }


});


function limparSecaoPessoal() {

    let imgPreview = document.getElementById("imgPreview");
    let imgDoador = document.getElementById("imgDoador");
    let txtNomeDoador = document.getElementById("txtNomeDoador");
    let txtDataNascimento = document.getElementById("txtDataNascimento");
    let txtCpfDoador = document.getElementById("txtCpfDoador");
    let txtRgDoador = document.getElementById("txtRgDoador");
    let lblImgDoador = document.getElementById("file-description");

    $("#imgPreview").removeClass("img-preview");
    $("#imgPreview").addClass("form-img");


    imgPreview.src = "../img/camera.png"
    imgDoador.value = "";
    txtNomeDoador.value = "";
    txtDataNascimento.value = "";
    txtCpfDoador.value = "";
    txtRgDoador.value = "";
    lblImgDoador.innerHTML = "<span> <strong> * </strong> </span>"
        + "<span> <i class='far fa-file-image'></i> </span>"
        + "<span> Escolha uma imagem </span>";


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

    document.getElementById("txtEmail").value = "";

    $.ajax({

        url: "../controller/doador/limpar-sessao-telefone.php",
        type: "post",
        dataType: "json",
        success: function (response) {

            if (response.status) {

                $("#container-item-telefone-doador").empty();

                document.querySelector("#container-item-telefone-doador").innerHTML =
                    "<div id='msg-list-telefone-doador'> <h5 class='text-center mt-3'> Nenhum telefone adicionado </h5> </div>";

            }

        },
        error: function (request, status, error) {

            showToast('Atenção', 'Erro ao limpar o formulário', 'warning', '#dc3545', 'white', 10000);
        }

    });
}


$("#btn-limpar-campos-pessoais").click(function () {

    limparSecaoPessoal();

});

$("#btn-limpar-campos-endereco").click(function () {

    limparSecaoEndereco();

});

$("#btn-limpar-campos-contato").on("click", function (ev) {

    limparSecaoContato();

});


function validarSecaoPessoal() {

    let imgDoador = document.getElementById("imgDoador");
    let txtNomeDoador = document.getElementById("txtNomeDoador");
    let seSexo = document.getElementById("seSexo");
    let txtDataNascimento = document.getElementById("txtDataNascimento");
    let seTipoSanguineo = document.getElementById("seTipoSanguineo");
    let seFatorRh = document.getElementById("seFatorRh");
    let txtCpfDoador = document.getElementById("txtCpfDoador");
    let txtRgDoador = document.getElementById("txtRgDoador");

    let imgValida = false;
    let nomeValido = false;
    let sexoValido = false;
    let dataNascimentoValido = false;
    let tipoSanguineoValido = false;
    let fatorRhValido = false;
    let cpfValido = false;
    let rgValido = false;

    if (imgDoador.value != "") {

        imgValida = true;
        $("#imgDoador").removeClass("is-invalid");
        $("#imgDoador").addClass("is-valid");

    }
    else if ( $("#hdImgDonnor").val() != "" ){

        imgValida = true;
        $("#imgDoador").removeClass("is-invalid");
        $("#imgDoador").addClass("is-valid");
            
    }
    else {

        showToast('Atenção', 'Passe uma imagem válida', 'warning', '#dc3545', 'white', 10000);

        $("#imgDoador").removeClass("is-valid");
        $("#imgDoador").addClass("is-invalid");


    }


    if (validarNome(txtNomeDoador.value)) {

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



    if (validarDataDoador(txtDataNascimento.value)) {

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


    if (validarCpf(txtCpfDoador.value) && !verificarExistenciaCpfDoador(txtCpfDoador.value)) {

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

    let emailDoador = document.getElementById("txtEmail");

    let emailValido = false;
    let telefoneValido = false;


    if (validarEmail(emailDoador.value) && !verificarExistenciaEmailUsuario(emailDoador.value)) {

        emailValido = true;

        $("#txtEmail").removeClass("is-invalid");
        $("#txtEmail").addClass("is-valid");
    }
    else {
        showToast('Atenção', 'Email inválido, por favor passe um email válido', 'warning', '#dc3545', 'white', 10000);

        $("#txtEmail").removeClass("is-valid");
        $("#txtEmail").addClass("is-invalid");
    }

    $.ajax({

        url: "../controller/doador/verificar-tamanho-sessao-telefone.php",
        type: "post",
        dataType: "json",
        async: false,
        success: function (response) {

            if (response.status) {

                if (response.size > 0) {

                    telefoneValido = true;

                    $("#list-telefone-doador").removeClass("is-invalid");
                    $("#list-telefone-doador").addClass("is-valid");


                }
                else {

                    showToast('Atenção', 'Passe pelo menos um número para contato', 'warning', '#dc3545', 'white', 10000);

                }

            }
            else {

                showToast('Atenção', 'Passe pelo menos um número para contato', 'warning', '#dc3545', 'white', 10000);

                $("#list-telefone-doador").removeClass("is-valid");
                $("#list-telefone-doador").addClass("is-invalid");

            }

        },
        error: function (request, status, error) {

            showToast('Atenção', 'Erro ao validar a lista de telefones', 'warning', '#dc3545', 'white', 10000);
            $("#list-telefone-doador").removeClass("is-valid");
            $("#list-telefone-doador").addClass("is-invalid");
        }



    });



    if (emailValido && telefoneValido) {

        return true;

    }

    return false;

}



$("input[name=imgDoador]").change(function () {

    inserirImg();

});




$(document).ready(function () {

    try {

        const primeiraEtapa = 1;
        const segundaEtapa = 2;
        const terceiraEtapa = 3;
        const quartaEtapa = 4;

        const SUCESSO_AO_CADASTRAR_O_DOADOR = 1;
        const SUCESSO_AO_EDITAR_O_DOADOR = 1;

        const FORMULARIO_PARA_EDITAR = 1;
        const FORMULARIO_PARA_CADASTRO = 0;


        let fsPrev, fsAtual, fsNext;
        let etapa = primeiraEtapa;


        $('.next').click(function () {

            if (etapa == primeiraEtapa) {

                if (validarSecaoPessoal()) {

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

                    let dataEscolhida = new Date($('#txtDataNascimento').val());
                    let age = calculateAge(dataEscolhida);

                    if (age >= 18) {

                        let formularioDoador = document.querySelector(".form-donnor");
                        let formData = new FormData(formularioDoador);

                        if ($("#hdFormType").val() == FORMULARIO_PARA_CADASTRO) {

                            $.ajax({

                                url: "../controller/doador/cadastrar-doador.php",
                                type: "post",
                                dataType: "json",
                                processData: false,
                                contentType: false,
                                data: formData,
                                success: function (response) {

                                    if (response.status === SUCESSO_AO_CADASTRAR_O_DOADOR) {



                                        showToast('Sucesso', 'Doador cadastrado com sucesso', 'success', '#28a745', 'white', 2000);

                                        setTimeout(function () {
                                            limparTodosCampos();
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


                        }
                        else {

                            $.ajax({

                                url: "../controller/doador/editar-doador.php",
                                type: "post",
                                dataType: "json",
                                processData: false,
                                contentType: false,
                                data: formData,
                                success: function (response) {

                                    if (response.status === SUCESSO_AO_EDITAR_O_DOADOR) {


                                        showToast('Sucesso', 'Doador editado com sucesso', 'success', '#28a745', 'white', 2000);

                                        setTimeout(function () {
                                            limparTodosCampos();
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

                        }


                    }

                    else {

                        fsAtual = $(this).parent().parent().parent();
                        fsNext = fsAtual.next();

                        $('#progress li').eq($('fieldset').index(fsNext)).addClass("activated-section");

                        fsAtual.hide(800);
                        fsNext.show(800);

                        etapa++;
                    }



                }

            }
            else if (etapa == quartaEtapa) {

                const NENHUM_RESPONSAVEL_SELECIONADO = 0;

                if ($("#hdIdSelectedResponsible").val() == NENHUM_RESPONSAVEL_SELECIONADO) {

                    let formularioDoador = document.querySelector(".form-donnor");
                    let formData = new FormData(formularioDoador);


                    if (validarSecaoResponsavel()) {

                        if ($("#hdFormType").val() == FORMULARIO_PARA_CADASTRO) {

                            $.ajax({

                                url: "../controller/doador/cadastrar-doador.php",
                                type: "post",
                                dataType: "json",
                                processData: false,
                                contentType: false,
                                data: formData,
                                success: function (response) {

                                    if (response.status === SUCESSO_AO_CADASTRAR_O_DOADOR) {


                                        showToast('Sucesso', 'Doador cadastrado com sucesso', 'success', '#28a745', 'white', 2000);

                                        setTimeout(function () {
                                            limparTodosCampos();
                                            document.location.reload(true);

                                        }, 2000);

                                    }
                                    else {

                                        showToast('Atenção', 'Erro cadastrar o doador', 'warning', '#dc3545', 'white', 10000);
                                        console.log(response);

                                    }

                                },
                                error: function (request, status, error) {

                                    showToast('Atenção', 'Erro cadastrar o doador', 'warning', '#dc3545', 'white', 10000);


                                    console.log(request.responseText);
                                    console.log(request);
                                }

                            });


                        } else {


                            $.ajax({

                                url: "../controller/doador/editar-doador.php",
                                type: "post",
                                dataType: "json",
                                processData: false,
                                contentType: false,
                                data: formData,
                                success: function (response) {

                                    if (response.status === SUCESSO_AO_CADASTRAR_O_DOADOR) {


                                        showToast('Sucesso', 'Doador cadastrado com sucesso', 'success', '#28a745', 'white', 2000);

                                        setTimeout(function () {
                                            limparTodosCampos();
                                            document.location.reload(true);

                                        }, 2000);

                                    }
                                    else {

                                        showToast('Atenção', 'Erro cadastrar o doador', 'warning', '#dc3545', 'white', 10000);
                                        console.log(response);

                                    }

                                },
                                error: function (request, status, error) {

                                    showToast('Atenção', 'Erro cadastrar o doador', 'warning', '#dc3545', 'white', 10000);


                                    console.log(request.responseText);
                                    console.log(request);
                                }

                            });


                        }

                    }

                } else {

                    const SUCESSO_AO_VERIFICAR_A_SESSAO_DE_TELEFONES = true;
                    let telefonePreenchido = false;

                    $.ajax({

                          url: "../controller/doador/verificar-tamanho-sessao-telefone.php"
                        , dataType: "json"
                        , method: "get"
                        , async: false
                        , success: function (response) {

                            if (response.status === SUCESSO_AO_VERIFICAR_A_SESSAO_DE_TELEFONES) {


                                telefonePreenchido = (response.size > 0);


                            }
                            else {

                                console.log(response.status);
                            }
                        }
                        , error: function (request) {

                            console.log(request.responseText);
                        }

                    });

                    if ($("#txtNomeResponsavel").val().length > 0
                        || $("#txtDataNascimento").val().length > 0
                        || $("#txtCpfResponsavel").val().length > 0
                        || $("#txtRgResponsavel").val().length > 0
                        || telefonePreenchido) {


                        showToast('Atenção', 'Um responsavél está selecionado, portanto não é possível cadastrar um novo', 'warning', '#dc3545', 'white', 10000);
                    }

                    else {

                        let formularioDoador = document.querySelector(".form-donnor");
                        let formData = new FormData(formularioDoador);

                        if ($("#hdFormType").val() == FORMULARIO_PARA_CADASTRO) {

                            $.ajax({

                                url: "../controller/doador/cadastrar-doador.php",
                                type: "post",
                                dataType: "json",
                                processData: false,
                                contentType: false,
                                data: formData,

                                success: function (response) {

                                    if (response.status === SUCESSO_AO_CADASTRAR_O_DOADOR) {


                                        showToast('Sucesso', 'Doador cadastrado com sucesso', 'success', '#28a745', 'white', 2000);

                                        setTimeout(function () {
                                            limparTodosCampos();
                                            document.location.reload(true);

                                        }, 2000);

                                    }
                                    else {
                                        showToast('Atenção', 'Erro cadastrar o doador', 'warning', '#dc3545', 'white', 10000);
                                        console.log(response);
                                    }

                                },
                                error: function (request, status, error) {

                                    showToast('Atenção', 'Erro cadastrar o doador', 'warning', '#dc3545', 'white', 10000);


                                    console.log(request.responseText);
                                    console.log(request);
                                }

                            });


                        }
                        else {

                            $.ajax({

                                url: "../controller/doador/editar-doador.php",
                                type: "post",
                                dataType: "json",
                                processData: false,
                                contentType: false,
                                data: formData,
                                success: function (response) {

                                    if (response.status === SUCESSO_AO_EDITAR_O_DOADOR) {


                                        showToast('Sucesso', 'Doador editado com sucesso', 'success', '#28a745', 'white', 2000);

                                        setTimeout(function () {
                                            limparTodosCampos();
                                            document.location.reload(true);

                                        }, 2000);

                                    }
                                    else {

                                        showToast('Atenção', 'Erro ao editar o doador', 'warning', '#dc3545', 'white', 10000);
                                        console.log(response);

                                    }

                                },
                                error: function (request, status, error) {

                                    showToast('Atenção', 'Erro ao editar o doador', 'warning', '#dc3545', 'white', 10000);


                                    console.log(request.responseText);
                                    console.log(request);
                                }

                            });



                        }

                    }
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


$("#form-adicionar-telefone-doador").submit(function (ev) {

    const SUCESSO = 1;
    const NUMERO_REPETIDO = 2;
    const NUMERO_INVALIDO = 3;


    ev.preventDefault();


    $.ajax({

        url: "../controller/doador/adicionar-telefone.php",
        type: "post",
        dataType: "json",
        data: {

            "txtTelefoneDoador": $('#txtTelefoneDoador').val()
        },
        success: function (response) {

            if (response.status === SUCESSO) {

                if (response.size == 1) {

                    document.getElementById("msg-list-telefone-doador").remove();
                }



                $("#container-item-telefone-doador").append("<li class='item-telefone d-flex bd-highlight align-items-center'>"
                    + "<i class='fas fa-phone-alt flex-fill bd-highlight'></i>"
                    + "<div class='h-100 flex-fill bd-highlight container-span-telefone'>"
                    + "<span class='h-100 d-flex justify-content-center align-items-center desc-telefone'>" + response.novoTelefone + "</span>"
                    + "</div>"
                    + "<i class='fas fa-times flex-fill bd-highlight remover-telefone-doador'></i>"
                    + "</li>");

                showToast('Sucesso', 'Telefone adicionado com sucesso', 'success', '#28a745', 'white', 5000);

                $("#txtTelefoneDoador").removeClass("is-invalid");
                $("#txtTelefoneDoador").val("");


                $('#modal-adicionar-telefone-doador').modal('hide');

            }
            else if (response.status === NUMERO_REPETIDO) {

                showToast('Atenção', 'Telefone repetido, por favor digite outro telefone!', 'warning', '#dc3545', 'white', 5000);
                $("#txtTelefoneDoador").removeClass("is-valid");
                $("#txtTelefoneDoador").addClass("is-invalid");
            }

            else if (response.status === NUMERO_INVALIDO) {

                showToast('Atenção', 'Telefone inválido, por favor digite outro telefone!', 'warning', '#dc3545', 'white', 5000);
                $("#txtTelefoneDoador").removeClass("is-valid");
                $("#txtTelefoneDoador").addClass("is-invalid");

            }
            else {
                showToast('Atenção', 'Erro ao adicionar um telefone!', 'warning', '#dc3545', 'white', 5000);
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




});



$(document).on('click', 'i.remover-telefone-doador', function (ev) {


    let descTelefoneRemovido = this.parentNode.querySelector("div.container-span-telefone").firstChild.innerHTML;


    $('#modal-remover-telefone-doador').modal('show');
    $('#desc-remover-telefone-doador').text("Deseja remover o número " + descTelefoneRemovido + " ?");
    $('#hdTelefoneRemovidoDoador').val(descTelefoneRemovido);


});


$("#form-remover-telefone-doador").on('submit', function (ev) {

    const SUCESSO = 1;

    ev.preventDefault();

    listContainerTelefone = document.querySelectorAll("div#container-item-telefone-doador li.item-telefone");

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

            if (response.status === SUCESSO) {

                if (response.size == 0) {

                    document.querySelector("#container-item-telefone-doador").innerHTML =
                        "<div id='msg-list-telefone-doador'> <h5 class='text-center mt-3'> Nenhum telefone adicionado </h5> </div>";

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

    if ($("#txtNomeDoador").val().length > 0 || $("#imgDoador").val().length > 0 ||
        $("#txtDataNascimento").val().length > 0 || $("#txtCpfDoador").val().length > 0 ||
        $("#txtRgDoador").val().length > 0 || $("#txtCep").val().length > 0 || $("#txtLogradouro").val().length > 0
        || $("#txtCidade").val().length > 0 || $("#txtUf").val().length > 0 || $("#txtNumero").val().length > 0
        || $("#txtComplemento").val().length > 0 || $("#txtEmail").val().length > 0 || $("#txtNomeResponsavel").val().length > 0
        || $("#txtDataNascimentoResponsavel").val().length > 0 || $("#txtCpfResponsavel").val().length > 0 || $("#txtRgResponsavel").val().length > 0) {



        event.returnValue = `Tem certeza que deseja sair ?`;


    }

});





function validarDataDoador(data) {

    try {

        let dataPassada = new Date(data);

        let dataAux0 = new Date();
        let dataAux1 = new Date();

        dataAux0.setYear(dataAux0.getFullYear() - 16);

        dataAux1.setYear(dataAux1.getFullYear() - 69);

        if (dataPassada <= dataAux0 && dataPassada >= dataAux1) {

            return true;
        }

        return false;

    }

    catch (ex) {

        return false;
    }
}

function limparTodosCampos() {

    $("#imgPreview").attr("src", "../img/camera.png");
    $("#imgDoador").val("");
    $("#txtNomeDoador").val("");
    $("#seSexo").val("");
    $("#seFatorRh").val("");
    $("#txtDataNascimento").val("");
    $("#seTipoSanguineo").val("");
    $("#txtCpfDoador").val("");
    $("#txtRgDoador").val("");
    $("#txtCep").val("");
    $("#txtLogradouro").val("");
    $("#txtBairro").val("");
    $("#txtCidade").val("");
    $("#txtUf").val("");
    $("#txtNumero").val("");
    $("#txtComplemento").val("");
    $("#txtEmail").val("");
    $("#txtNomeResponsavel").val("");
    $("#txtDataNascimentoResponsavel").val("");
    $("#txtCpfResponsavel").val("");
    $("#txtRgResponsavel").val("")


    $.ajax({

        url: "../controller/doador/limpar-sessao-telefone.php",
        type: "post",
        dataType: "json",
        async: false,
        success: function (response) {



        },
        error: function (request, status, error) {

            showToast('Atenção', 'Erro ao limpar a lista de telefones do doador', 'warning', '#dc3545', 'white', 5000);

            console.log(status);

        }


    });


    $.ajax({

        url: "../controller/responsavel/limpar-sessao-telefone.php",
        type: "post",
        dataType: "json",
        async: false,
        success: function (response) {



        },
        error: function (request, status, error) {

            showToast('Atenção', 'Erro ao limpar a lista de telefones do responsável', 'warning', '#dc3545', 'white', 5000);

            console.log(status);

        }


    });



}

function verificarExistenciaCpfDoador(cpf) {

    const CPF_VALIDO = 1;
    let resultado = true;

    $.ajax({

        url: "../controller/doador/verifica-existencia-cpf-doador.php",
        type: "post",
        data:
            {  "txtCpfDoador": cpf
             , "hdIdDonnor": $("#hdIdDonnor").val()  
             , "hdFormType": $("#hdFormType").val() 
            },
        dataType: "json",
        async: false,
        success: function (response) {

            console.log(response.status);

            if (response.status === CPF_VALIDO) {

                resultado = false;


            }
        },
        error: function (request, status, error) {


            console.log(request.responseText);
        }


    });

    return resultado;

}


function verificarExistenciaEmailUsuario(email) {

    const EMAIL_VALIDO = 1;
    let resultado = true;

    $.ajax({

        url: "../controller/usuario/verifica-existencia-email-usuario.php",
        type: "post",
        data:
            { "txtEmail": email 
             ,"hdFormType" : $("#hdFormType").val()
             ,"hdIdDonnor": $("#hdIdDonnor").val()
            },

        dataType: "json",
        async: false,
        success: function (response) {


            if (response.status === EMAIL_VALIDO) {

                resultado = false;

            }
        },
        error: function (request, status, error) {


            console.log(request.responseText);
        }


    });

    return resultado;

}



