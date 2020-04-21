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
    let nome = $("#txtNomeDoador").value();

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

$("#scBancoSangue").blur(function () {
    if (!$("#scBancoSangue").value()) {
        showToast('Atenção', 'Selecione uma das opções de Banco de Sangue Disponivel', 'warning', '#dc3545', 'white', 10000);
        $('#scBancoSangue').removeClass(("is-valid"));
        $('#scBancoSangue').addClass(("is-invalid"));
    } else {
        $('#scBancoSangue').removeClass(("is-invalid"));
        $('#scBancoSangue').addClass(("is-valid"));
    }
});

$("#scBancoSangue").blur(function () {
    if (!$("#scBancoSangue").value()) {
        showToast('Atenção', 'Selecione uma das opções de Banco de Sangue Disponivel', 'warning', '#dc3545', 'white', 10000);
        $('#scBancoSangue').removeClass(("is-valid"));
        $('#scBancoSangue').addClass(("is-invalid"));
    } else {
        $('#scBancoSangue').removeClass(("is-invalid"));
        $('#scBancoSangue').addClass(("is-valid"));
    }

});

$("#scBancoSangue").blur(function () {

    if (!$("#scBancoSangue").value()) {
        showToast('Atenção', 'Selecione uma das opções de banco de sangue disponivel', 'warning', '#dc3545', 'white', 10000);
        $('#scBancoSangue').removeClass(("is-valid"));
        $('#scBancoSangue').addClass(("is-invalid"));
    } else {
        $('#scBancoSangue').removeClass(("is-invalid"));
        $('#scBancoSangue').addClass(("is-valid"));
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