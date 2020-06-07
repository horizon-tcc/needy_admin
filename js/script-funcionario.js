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

$("#txtNomeFuncionario").blur(function () {
    let nome = $("#txtNomeFuncionario").value();

    if (nome.length >= 3 && validarNome(nome)) {
        $("#txtNomeFuncionario").removeClass("is-invalid");
        $("#txtNomeFuncionario").addClass("is-valid");
    }
    else {
        showToast('Atenção', 'O nome do doador deve possuir pelo menos 3 caracteres e não deve possuir números', 'warning', '#dc3545', 'white', 10000);

        $("#txtNomeFuncionario").removeClass("is-valid");
        $("#txtNomeFuncionario").addClass("is-invalid");
    }

});

$("#scCargoFuncionario").blur(function () {

    if (!$("#scCargoFuncionario").value()) {
        showToast('Atenção', 'Selecione uma das opções de cargo disponivel', 'warning', '#dc3545', 'white', 10000);
        $('#scCargoFuncionario').removeClass(("is-valid"));
        $('#scCargoFuncionario').addClass(("is-invalid"));
    } else {
        $('#scCargoFuncionario').removeClass(("is-invalid"));
        $('#scCargoFuncionario').addClass(("is-valid"));
    }

});

$("#txtRgFuncionario").blur(function () {

    if (!$("#txtRgFuncionario").value()) {
        showToast('Atenção', 'Digite um Rg valido', 'warning', '#dc3545', 'white', 10000);
        $('#txtRgFuncionario').removeClass(("is-valid"));
        $('#txtRgFuncionario').addClass(("is-invalid"));
    } else {
        $('#txtRgFuncionario').removeClass(("is-invalid"));
        $('#txtRgFuncionario').addClass(("is-valid"));
    }

});

function limparCamposFuncionario() {

    document.getElementById("#txtCpfFuncionario").value = "";
    document.getElementById("#txtNomeFuncionario").value = "";
    document.getElementById("#txtRgFuncionario").value = "";
    document.getElementById("#scBancoSangue").value = "";
    document.getElementById("#scCargoFuncionario").value = "";

}

$("#btnLimparCamposFuncionario").click(limparCamposFuncionario());