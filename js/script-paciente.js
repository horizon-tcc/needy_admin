$("#txtCpfPaciente").blur(function () {

    if (validarCpf($("#txtCpfPaciente").val())) {
        $("#txtCpfPaciente").removeClass("is-invalid");
        $("#txtCpfPaciente").addClass("is-valid");
    }
    else {
        $("#txtCpfPaciente").removeClass("is-valid");
        $("#txtCpfPaciente").addClass("is-invalid");
    }

});

$("#txtNomePaciente").blur(function () {

    let nome = $("#txtNomePaciente").value();

    if (nome.length >= 3 && validarNome(nome)) {
        $("#txtNomePaciente").removeClass("is-invalid");
        $("#txtNomePaciente").addClass("is-valid");
    }
    else {
        showToast('Atenção', 'O nome do paciente deve possuir pelo menos 3 caracteres e não deve possuir números', 'warning', '#dc3545', 'white', 10000);

        $("#txtNomePaciente").removeClass("is-valid");
        $("#txtNomePaciente").addClass("is-invalid");
    }

});

$("#scSexo").blur(function () {

    if (!$("#scSexo").value()) {
        showToast('Atenção', 'Selecione o sexo do paciente', 'warning', '#dc3545', 'white', 10000);

        $('#scSexo').removeClass(("is-valid"));
        $('#scSexo').addClass(("is-invalid"));
    } else {
        $('#scSexo').removeClass(("is-invalid"));
        $('#scSexo').addClass(("is-valid"));
    }

});

$("#scTipoSanguineoPaciente").blur(function () {

    if (!$("#scTipoSanguineoPaciente").value()) {
        showToast('Atenção', 'Selecione um tipo sanguineo', 'warning', '#dc3545', 'white', 10000);

        $('#scTipoSanguineoPaciente').removeClass(("is-valid"));
        $('#scTipoSanguineoPaciente').addClass(("is-invalid"));
    } else {
        $('#scTipoSanguineoPaciente').removeClass(("is-invalid"));
        $('#scTipoSanguineoPaciente').addClass(("is-valid"));
    }

});

$("#txtRgPaciente").blur(function () {

    if (!$("#txtRgPaciente").value()) {
        showToast('Atenção', 'Digite um Rg valido', 'warning', '#dc3545', 'white', 10000);

        $('#txtRgPaciente').removeClass(("is-valid"));
        $('#txtRgPaciente').addClass(("is-invalid"));
    } else {
        $('#txtRgPaciente').removeClass(("is-invalid"));
        $('#txtRgPaciente').addClass(("is-valid"));
    }

});

$("#scFatorRh").blur(function () {

    if (!$("#scFatorRh").value()) {
        showToast('Atenção', 'Selecione uma das opções de cargo disponivel', 'warning', '#dc3545', 'white', 10000);

        $('#scFatorRh').removeClass(("is-valid"));
        $('#scFatorRh').addClass(("is-invalid"));
    } else {
        $('#scFatorRh').removeClass(("is-invalid"));
        $('#scFatorRh').addClass(("is-valid"));
    }

});

function limparCamposPaciente() {

    ev.preventDefault();

    document.getElementById("#txtCpfPaciente").value = "";
    document.getElementById("#txtNomePaciente").value = "";
    document.getElementById("#txtRgPaciente").value = "";
    document.getElementById("#scTipoSanguineoPaciente").value = "";
    document.getElementById("#scSexoPaciente").value = "";
    document.getElementById("#scFatorRhPaciente").value = "";

}

$("#form-adicionar-paciente").submit(function (ev) {
    ev.preventDefault();
});

$("#btnLimparCamposPaciente").click(limparCamposPaciente());