$("#txtCpfFuncionario").blur(function () {

    if (validarCpf($("#txtCpfFuncionario").val())) {

        $("#txtCpfFuncionario").removeClass("is-invalid");
        $("#txtCpfFuncionario").addClass("is-valid");

    }

    else {

        $("#txtCpfFuncionario").removeClass("is-valid");
        $("#txtCpfFuncionario").addClass("is-invalid");

    }

});


function verificarExistenciaCpfFuncionario(cpf, id) {

    let resultado = true;

    $.ajax({

        url: "../controller/funcionario/verificar-cpf-funcionario.php",
        type: "post",
        data:
        {
            "cpfFuncionario": cpf
            , "idFuncionario": id
        },
        dataType: "json",
        async: false,
        success: function (resposta) {


            if (resposta === false) {

                resultado = false;

            }

        },
        error: function (request, status, error) {


            console.log(request.responseText);
        }


    });

    return resultado;

}


function limparCamposFuncionario() {

    let imgPreview = document.getElementById("imgPreview");
    let imagemFuncionario = document.getElementById("imgFuncionario");
    let labelImgFuncionario = document.getElementById("file-description");
    let cpfFuncioNario = document.getElementById("txtCpfFuncionario");
    let nomeFuncionario = document.getElementById("txtNomeFuncionario");
    let rgFuncionario = document.getElementById("txtRgFuncionario");
    let bancoSangueFuncionario = document.getElementById("seBancoSangueFuncionario");
    let cargoFuncionario = document.getElementById("seCargoFuncionario");

    imgPreview.src = "../img/camera.png";
    imagemFuncionario.value = "";
    nomeFuncionario.value = "";
    cpfFuncioNario.value = "";
    rgFuncionario.value = "";
    bancoSangueFuncionario.value = "0";
    bancoSangueFuncionario.selectedIndex = "0";
    cargoFuncionario.value = "0";
    cargoFuncionario.selectedIndex = "0";
    labelImgFuncionario.innerHTML = "<span> <strong> * </strong> </span>"
        + "<span> <i class='far fa-file-image'></i> </span>"
        + "<span> Escolha uma imagem </span>";

}


function limparCamposContaFuncionario() {

    let emailFuncionario = document.getElementById('txtEmailFuncionario');
    let tipoUsuario = document.getElementById('seTipoUsuarioFuncionario');

    emailFuncionario.value = "";
    tipoUsuario.selectedIndex = "0";
    tipoUsuario.value = "0";

}


$("#btnLimparCamposFuncionario").click(function () {
    limparCamposFuncionario();
});


$("#btnLimparCamposContaFuncionario").click(function () {
    limparCamposContaFuncionario();
});


function validarSecaoFuncionario() {

    let imgFuncionario = document.getElementById("imgFuncionario");
    let idFuncionario = document.getElementById("hdIdFuncionario");
    let cpfFuncionario = document.getElementById("txtCpfFuncionario");
    let nomeFuncionario = document.getElementById("txtNomeFuncionario");
    let rgFuncionario = document.getElementById("txtRgFuncionario");
    let bancoSangueFuncionario = document.getElementById("seBancoSangueFuncionario");
    let cargoFuncionario = document.getElementById("seCargoFuncionario");

    let statusImagem = false;
    let statusCpf = false;
    let statusNome = false;
    let statusRg = false;
    let statusBancoSangue = false;
    let statusCargo = false;

    if (imgFuncionario.value != "" || idFuncionario.value != 0) {

        statusImagem = true;

        $("#imgFuncionario").removeClass("is-invalid");
        $("#imgFuncionario").addClass("is-valid");

    } else {

        showToast('Atenção', 'Passe uma imagem válida', 'warning', '#dc3545', 'white', 10000);

        $("#imgFuncionario").removeClass("is-valid");
        $("#imgFuncionario").addClass("is-invalid");

    } if (validarNome(nomeFuncionario.value)) {

        statusNome = true;

        $("#txtNomeFuncionario").removeClass("is-invalid");
        $("#txtNomeFuncionario").addClass("is-valid");

    } else {

        showToast('Atenção', 'O nome do funcionario deve possuir pelo menos 3 caracteres e não deve possuir números', 'warning', '#dc3545', 'white', 10000);

        $("#txtNomeFuncionario").removeClass("is-valid");
        $("#txtNomeFuncionario").addClass("is-invalid");
    }

    if (cargoFuncionario.value != "" && cargoFuncionario.value != 0) {

        statusCargo = true;

        $('#seCargoFuncionario').removeClass(("is-invalid"));
        $('#seCargoFuncionario').addClass(("is-valid"));

    } else {

        showToast('Atenção', 'Selecione uma das opções de cargo valida', 'warning', '#dc3545', 'white', 10000);

        $('#seCargoFuncionario').removeClass(("is-valid"));
        $('#seCargoFuncionario').addClass(("is-invalid"));

    }

    if (rgFuncionario.value != "") {

        statusRg = true;

        $('#txtRgFuncionario').removeClass(("is-invalid"));
        $('#txtRgFuncionario').addClass(("is-valid"));

    } else {

        showToast('Atenção', 'Digite um Rg valido', 'warning', '#dc3545', 'white', 10000);

        $('#txtRgFuncionario').removeClass(("is-valid"));
        $('#txtRgFuncionario').addClass(("is-invalid"));

    }

    if (bancoSangueFuncionario.value != "" && bancoSangueFuncionario.value != 0) {

        statusBancoSangue = true;

        $('#seBancoSangueFuncionario').removeClass(("is-invalid"));
        $('#seBancoSangueFuncionario').addClass(("is-valid"));

    } else {

        showToast('Atenção', 'Selecione uma das opções de bancos de sanguê validas', 'warning', '#dc3545', 'white', 10000);

        $('#seBancoSangueFuncionario').removeClass(("is-valid"));
        $('#seBancoSangueFuncionario').addClass(("is-invalid"));

    }

    if (validarCpf(cpfFuncionario.value)) {

        if (verificarExistenciaCpfFuncionario(cpfFuncionario.value, idFuncionario.value)) {
            statusCpf = true;

            $("#txtCpfFuncionario").removeClass("is-invalid");
            $("#txtCpfFuncionario").addClass("is-valid");
        } else {
            showToast('Atenção', 'Cpf já cadastrado em outro funcionario', 'warning', '#dc3545', 'white', 10000);

            $("#txtCpfFuncionario").removeClass("is-valid");
            $("#txtCpfFuncionario").addClass("is-invalid");
        }

    } else {

        showToast('Atenção', 'Digite um Cpf valido', 'warning', '#dc3545', 'white', 10000);

        $("#txtCpfFuncionario").removeClass("is-valid");
        $("#txtCpfFuncionario").addClass("is-invalid");

    }

    if (statusCpf && statusCargo && statusImagem && statusNome && statusRg
        && statusBancoSangue) {

        return true;

    } else {

        return false;

    }

}


function validarSecaoContaFuncionario() {

    let emailFuncionario = document.getElementById('txtEmailFuncionario');
    let tipoUsuario = document.getElementById('seTipoUsuarioFuncionario');

    let statusEmail = false;
    let statusTipoUsuario = false;

    if (validarEmail(emailFuncionario.value)) {

        statusEmail = true;

        $("#txtEmailFuncionario").removeClass("is-invalid");
        $("#txtEmailFuncionario").addClass("is-valid");

    } else {

        showToast('Atenção', 'Digite um E-mail valido!', 'warning', '#dc3545', 'white', 10000);

        $("#txtEmailFuncionario").removeClass("is-valid");
        $("#txtEmailFuncionario").addClass("is-invalid");

    }

    if (tipoUsuario.value != 0 && tipoUsuario.value != "") {

        statusTipoUsuario = true;

        $("#seTipoUsuarioFuncionario").removeClass("is-invalid");
        $("#seTipoUsuarioFuncionario").addClass("is-valid");

    } else {

        showToast('Atenção', 'Selecione um tipo de usuário valido!', 'warning', '#dc3545', 'white', 10000);

        $("#seTipoUsuarioFuncionario").removeClass("is-valid");
        $("#seTipoUsuarioFuncionario").addClass("is-invalid");

    }

    if (statusEmail && statusTipoUsuario) {

        return true;

    } else {

        return false;

    }
}


$(document).ready(function () {

    let idFuncionario = document.getElementById("hdIdFuncionario");

    if (idFuncionario.value != 0) {

        $.ajax({

            url: "../controller/funcionario/resgatar-funcionario-update.php",
            type: "post",
            dataType: "json",
            data: {
                "idFuncionario": idFuncionario.value
            },
            success: function (resposta) {
                if (resposta.statusFuncionario) {

                    $("#imgPreview").removeClass("form-img");
                    $("#imgPreview").addClass("img-preview");
                    $('#imgPreview').attr('src', '../img/img_funcionario/' + resposta.fotoFuncionario + '');

                    $("#txtNomeFuncionario").val(resposta.nomeFuncionario);
                    $("#txtCpfFuncionario").val(resposta.cpfFuncionario);
                    $("#txtRgFuncionario").val(resposta.rgFuncionario);
                    $("#seBancoSangueFuncionario").prop('selectedIndex', resposta.idBancoSangue);
                    $("#seCargoFuncionario").prop('selectedIndex', resposta.idCargoFuncionario);

                    $("#txtEmailFuncionario").val(resposta.emailUsuario);
                    $("#seTipoUsuarioFuncionario").prop('selectedIndex', resposta.idTipoUsuario);
                    $("#hdIdUsuarioFunc").val(resposta.idUsuario);
                }
            },
            error: function (request, status, error) {

                console.log(request.responseText);

                console.log(status);

                console.log(error);

            }


        });

    } else {

        limparCamposFuncionario();
        limparCamposContaFuncionario();

    }


    try {

        let fsAtual, fsProx, fsAnt;
        let etapa = 1;

        $('.next').click(function () {

            if (etapa === 1) {

                if (validarSecaoFuncionario()) {

                    fsAtual = $(this).parent().parent().parent();
                    fsProx = fsAtual.next();

                    $('#progress li').eq($('fieldset').index(fsProx)).addClass("activated-section");

                    $("#secao-Funcionario").hide(800);
                    $("#secao-Conta-Funcionario").show(800);

                    etapa++;

                }

            } else if (etapa == 2) {

                if (validarSecaoContaFuncionario()) {


                    let formularioFuncionario = document.querySelector(".form-donnor");
                    let formData = new FormData(formularioFuncionario);

                    if ($('#hdIdFuncionario').val() == 0) {

                        $.ajax({
                            url: "../controller/funcionario/funcionario-cadastro.php",
                            type: "post",
                            dataType: "json",
                            async: true,
                            processData: false,
                            contentType: false,
                            data: formData,
                            success: function (resposta) {

                                if (resposta) {

                                    showToast('Sucesso', 'Funcionario cadastrado com sucesso', 'success', '#28a745', 'white', 2000);

                                    setTimeout(function () {

                                        limparCamposFuncionario();
                                        limparCamposContaFuncionario();
                                        document.location.reload(true);

                                    }, 2000);

                                } else if (resposta) {

                                    showToast('Erro', 'Não foi possivel cadastrar o funcionario!', 'warning', '#dc3545', 'white', 2000);

                                    console.log(resposta);
                                }

                            },
                            error: function (request, status, error) {

                                console.log(request.responseText);
                                console.log(request);
                                console.log(error);

                            }
                        });

                    } else {

                        $.ajax({
                            url: "../controller/funcionario/funcionario-update.php",
                            type: "post",
                            dataType: "json",
                            processData: false,
                            contentType: false,
                            data: formData,
                            success: function (resposta) {

                                if (resposta) {

                                    showToast('Sucesso', 'Funcionario atualizado com sucesso, você sera redirecionado!', 'success', '#28a745', 'white', 2000);

                                    setTimeout(function () {

                                        limparCamposFuncionario();
                                        window.location.replace("consulta-funcionarios.php");

                                    }, 2000);

                                } else {

                                    showToast('Erro', 'Não foi possivel' + resposta + 'atualizar o funcionario, dados comprometidos!', 'warning', '#dc3545', 'white', 2000);

                                }

                            },
                            error: function (request, status, error) {

                                console.log(request.responseText);
                                console.log(request);
                                console.log(error);

                            }
                        });

                    }

                }

            }

        });

        $('.prev').click(function () {

            if (etapa === 2) {
                fsAtual = $(this).parent().parent().parent();
                fsAnt = fsAtual.prev();

                $('#progress li').eq($('fieldset').index(fsAnt)).addClass("activated-section");

                $("#secao-Funcionario").show(800);
                $("#secao-Conta-Funcionario").hide(800);

                etapa--;
            }
        });

    } catch (ex) {

        console.log(ex.message);

    }

});


$("input[name=imgFuncionario]").change(function () {

    inserirImg();

    $("#hdImgStatus").val(1);

});