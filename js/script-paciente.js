$("#txtCpfPaciente").blur(function () {

    if (validarCpf($("#txtCpfPaciente").value)) {

        $("#txtCpfPaciente").removeClass("is-invalid");
        $("#txtCpfPaciente").addClass("is-valid");

    } else {

        $("#txtCpfPaciente").removeClass("is-valid");
        $("#txtCpfPaciente").addClass("is-invalid");

    }

});

function validarPreExistenciaCpf(cpf, id) {

    let resultado = true;

    $.ajax({

        url: "../controller/paciente/paciente-verificar-cpf.php",
        type: "post",
        data:
        {
            "cpfPaciente": cpf
            , "idPaciente": id
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

function limparCamposPaciente() {

    let idPaciente = document.getElementById("hdIdPaciente");
    let cpfPaciente = document.getElementById("txtCpfPaciente");
    let nomePaciente = document.getElementById("txtNomePaciente");
    let rgPaciente = document.getElementById("txtRgPaciente");
    let tipoSanguineoPaciente = document.getElementById("seTipoSanguineoPaciente");
    let sexoPaciente = document.getElementById("seSexoPaciente");
    let fatorRhPaciente = document.getElementById("seFatorRhPaciente");

    nomePaciente.value = "";
    cpfPaciente.value = "";
    rgPaciente.value = "";
    tipoSanguineoPaciente.value = "0";
    tipoSanguineoPaciente.selectedIndex = "0";
    sexoPaciente.value = "0";
    sexoPaciente.selectedIndex = "0";
    fatorRhPaciente.value = "0";
    fatorRhPaciente.selectedIndex = "0";
    idPaciente.value = 0;

}

$("#btnLimparCamposPaciente").click(function () {

    limparCamposPaciente();

});

function validarPaciente() {

    let idPaciente = document.getElementById("hdIdPaciente");
    let cpfPaciente = document.getElementById("txtCpfPaciente");
    let nomePaciente = document.getElementById("txtNomePaciente");
    let rgPaciente = document.getElementById("txtRgPaciente");
    let tipoSanguineoPaciente = document.getElementById("seTipoSanguineoPaciente");
    let sexoPaciente = document.getElementById("seSexoPaciente");
    let fatorRhPaciente = document.getElementById("seFatorRhPaciente");

    let statusNome = false;
    let statusCpf = false;
    let statusRg = false;
    let statusSexo = false;
    let statusTipoSanguineo = false;
    let statusFatorRh = false;

    if (validarNome(nomePaciente.value)) {

        statusNome = true;

        $("#txtNomePaciente").removeClass("is-invalid");
        $("#txtNomePaciente").addClass("is-valid");

    } else {

        showToast('Atenção', 'O nome do paciente deve possuir pelo menos 3 caracteres e não deve possuir números', 'warning', '#dc3545', 'white', 10000);

        $("#txtNomePaciente").removeClass("is-valid");
        $("#txtNomePaciente").addClass("is-invalid");

    }

    if (validarCpf(cpfPaciente.value)) {

        if (validarPreExistenciaCpf(cpfPaciente.value, idPaciente.value)) {

            statusCpf = true;

            $("#txtCpfPaciente").removeClass("is-invalid");
            $("#txtCpfPaciente").addClass("is-valid");

        } else {

            showToast('Atenção', 'Cpf já cadastrado em outro paciente', 'warning', '#dc3545', 'white', 10000);

            $("#txtCpfPaciente").removeClass("is-valid");
            $("#txtCpfPaciente").addClass("is-invalid");

        }

    } else {

        showToast('Atenção', 'Digite um Cpf valido', 'warning', '#dc3545', 'white', 10000);

        $("#txtCpfPaciente").removeClass("is-valid");
        $("#txtCpfPaciente").addClass("is-invalid");

    }

    if (sexoPaciente.value != "" && sexoPaciente.value > 0) {

        statusSexo = true;

        $("#seSexoPaciente").removeClass("is-invalid");
        $("#seSexoPaciente").addClass("is-valid");

    } else {

        showToast('Atenção', 'Selecione uma opção de sexo válida', 'warning', '#dc3545', 'white', 10000);

        $("#seSexoPaciente").removeClass("is-valid");
        $("#seSexoPaciente").addClass("is-invalid");

    }
    if (rgPaciente.value != "") {

        statusRg = true;

        $("#txtRgPaciente").removeClass("is-invalid");
        $("#txtRgPaciente").addClass("is-valid");

    } else {

        showToast('Atenção', 'Informe um rg válido', 'warning', '#dc3545', 'white', 10000);

        $("#txtRgPaciente").removeClass("is-valid");
        $("#txtRgPaciente").addClass("is-invalid");

    }

    if (fatorRhPaciente.value != "" && fatorRhPaciente.value > 0) {

        statusFatorRh = true;

        $("#seFatorRhPaciente").removeClass("is-invalid");
        $("#seFatorRhPaciente").addClass("is-valid");

    } else {

        showToast('Atenção', 'Selecione uma opção de fator Rh válida', 'warning', '#dc3545', 'white', 10000);

        $("#seFatorRhPaciente").removeClass("is-valid");
        $("#seFatorRhPaciente").addClass("is-invalid");

    }

    if (tipoSanguineoPaciente.value != "" && tipoSanguineoPaciente.value > 0) {

        statusTipoSanguineo = true;

        $("#seTipoSanguineoPaciente").removeClass("is-invalid");
        $("#seTipoSanguineoPaciente").addClass("is-valid");

    } else {

        showToast('Atenção', 'Selecione uma opção de tipo sanguíneo válida', 'warning', '#dc3545', 'white', 10000);

        $("#seTipoSanguineoPaciente").removeClass("is-valid");
        $("#seTipoSanguineoPaciente").addClass("is-invalid");

    }

    if (statusCpf && statusFatorRh && statusNome && statusRg
        && statusTipoSanguineo && statusSexo) {

        return true;

    } else {

        return false;

    }

}

$(document).ready(function () {

    let idPaciente = document.getElementById("hdIdPaciente");

    if (idPaciente.value == 0) {

        limparCamposPaciente();

    } else {

        $.ajax({

            url: "../controller/paciente/resgatar-paciente-update.php",
            type: "post",
            dataType: "json",
            data: {
                "id": idPaciente.value
            },
            success: function (resposta) {
                if (resposta.statusPaciente) {

                    $("#txtNomePaciente").val(resposta.nomePaciente);
                    $("#txtCpfPaciente").val(resposta.cpfPaciente);
                    $("#txtRgPaciente").val(resposta.rgPaciente);
                    $("#seBancoSangueFuncionario").prop('selectedIndex', resposta.idSexoPaciente);
                    $("#seTipoSanguineoPaciente").prop('selectedIndex', resposta.idTipoSanguineoPaciente);
                    $("#seFatorRhPaciente").prop('selectedIndex', resposta.idFatorRhPaciente);

                } else {

                    showToast('Erro', 'Paciente não encontrado!', 'warning', '#dc3545', 'white', 2000);

                }

            },
            error: function (request, status, error) {

                console.log(request);

            }


        });
    }

    $(".next").click(function () {

        if (validarPaciente()) {

            if ($('#hdIdPaciente').val() == 0) {

                let formularioPaciente = document.querySelector(".form-donnor");
                let formData = new FormData(formularioPaciente);

                $.ajax({
                    url: "../controller/paciente/paciente-cadastro.php",
                    type: "post",
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function (resposta) {

                        if (resposta) {

                            showToast('Sucesso', 'Paciente cadastrado com sucesso', 'success', '#28a745', 'white', 2000);

                            setTimeout(function () {

                                limparCamposPaciente();
                                document.location.reload(true);

                            }, 2000);

                        } else {

                            showToast('Erro', 'Não foi possivel cadastrar o paciente!', 'warning', '#dc3545', 'white', 2000);

                        }

                    },
                    error: function (request, status, error) {

                        console.log(request.responseText);
                        console.log(request);
                        console.log(error);

                    }
                });

            } else {

                let formularioPaciente = document.querySelector(".form-donnor");
                let formData = new FormData(formularioPaciente);

                $.ajax({
                    url: "../controller/paciente/paciente-update.php",
                    type: "post",
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function (resposta) {

                        if (resposta) {

                            showToast('Sucesso', 'Paciente atualizado com sucesso, você sera redirecionado!', 'success', '#28a745', 'white', 2000);

                            setTimeout(function () {

                                limparCamposPaciente();
                                window.location.replace("consulta-pacientes.php");

                            }, 2000);

                        } else {

                            showToast('Erro', 'Não foi possivel atualizar o paciente, dados comprometidos!', 'warning', '#dc3545', 'white', 2000);

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
    });
});

window.addEventListener('beforeunload', (event) => {

    if ($("#txtNomePaciente").val().length > 0 || $("#txtCpfPaciente").val().length > 0
        || $("#txtRgPaciente").val().length > 0 || $("#seTipoSanguineoPaciente").val() > 0
        || $("#seSexoPaciente").val() > 0 || $("#seFatorRhPaciente").val() > 0) {

        event.returnValue = `Tem certeza que deseja sair ?`;

    }

});