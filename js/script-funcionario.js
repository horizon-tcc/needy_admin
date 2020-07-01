$("#txtCpfFuncionario").blur(function () {

    if (validarCpf($("#txtCpfFuncionario").val()) /*&& !verificarExistenciaCpfFuncionario($("#txtCpfFuncionario").val())*/) {

        $("#txtCpfFuncionario").removeClass("is-invalid");
        $("#txtCpfFuncionario").addClass("is-valid");

    }

    else {

        $("#txtCpfFuncionario").removeClass("is-valid");
        $("#txtCpfFuncionario").addClass("is-invalid");

    }

});

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

$("#btnLimparCamposFuncionario").click(function () {
    limparCamposFuncionario();
});

function validarSecaoFuncionario() {

    let imgFuncionario = document.getElementById("imgFuncionario");
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

    if (imgFuncionario.value != "") {

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

        statusCpf = true;

        $("#txtCpfFuncionario").removeClass("is-invalid");
        $("#txtCpfFuncionario").addClass("is-valid");

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

$(document).ready(function () {

    try {

        let fsAtual, fsProx;
        let etapa = 1;

        $('.next').click(function () {

            if (etapa == 1) {

                if (validarSecaoFuncionario()) {

                    fsAtual = $(this).parent().parent().parent();
                    fsProx = fsAtual.next();

                    $('#progress li').eq($('fieldset').index(fsProx)).addClass("activated-section");

                    $("#secao-Funcionario").hide(800);
                    $("#secao-Conta-Funcionario").show(800);

                    etapa++;

                }

            } else if (etapa == 2) {
                
            } else {

            }

        });
    } catch (ex) {

        console.log(ex.message);

    }

});

$("input[name=imgFuncionario]").change(function () {

    inserirImg();

});