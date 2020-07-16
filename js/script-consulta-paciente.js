$(document).on('keyup', '#txtPesquisaPaciente', function (event) {

    event.preventDefault();
    event.stopPropagation();

    $.ajax({

        url: "../controller/paciente/pesquisa-paciente.php",
        type: "post",
        data: {
            "txtPesquisa": $("#txtPesquisaPaciente").val()
            , "hdSearchType": $("#hdSearchTypePaciente").val()
        },
        dataType: "json",
        success: function (response) {

            if (response.status) {

                $(".container-cards").empty();

                response.resultado.forEach(element => {

                    $(".container-cards").append(
                        getCardDonnorStructure(element.idPaciente, element.nomePaciente, element.descricaoSexoPaciente,
                            element.rgPaciente, element.cpfPaciente, element.descricaoTipoSanguineo, element.descricaoFatorRh));
                });

            }
            else if (response.status === false) {

                $(".container-cards").empty();
                $(".container-cards").append("<h6 class='mt-4'> Nenhum paciente encontrado </h6>");

            }

        },
        error: function (request, status, error) {

            console.log(request.responseText);

        }
    });
});


$(document).on("change", "#seTipoSanguineo", function () {

    $.ajax({

        url: "../controller/paciente/pesquisa-paciente.php",
        type: "post",
        data: {
            "txtPesquisa": $("#seTipoSanguineo").val()
            , "hdSearchType": $("#hdSearchTypePaciente").val()
        },
        dataType: "json",
        success: function (response) {

            if (response.status === true) {

                $(".container-cards").empty();

                response.resultado.forEach(element => {

                    $(".container-cards").append(
                        getCardDonnorStructure(element.idPaciente, element.nomePaciente, element.descricaoSexoPaciente,
                            element.rgPaciente, element.cpfPaciente, element.descricaoTipoSanguineo, element.descricaoFatorRh));

                });

            }
            else if (response.status === false) {

                $(".container-cards").empty();
                $(".container-cards").append("<h6 class='mt-4'> Nenhum paciente encontrado </h6>");

            }

        },
        error: function (request, status, error) {


            console.log(request.responseText);
        }

    });

});


$(document).on("change", "#seFatorRh", function () {

    $.ajax({

        url: "../controller/paciente/pesquisa-paciente.php",
        type: "post",
        data: {
            "txtPesquisa": $("#seFatorRh").val()
            , "hdSearchType": $("#hdSearchTypePaciente").val()
        },
        dataType: "json",
        success: function (response) {


            if (response.status === true) {

                $(".container-cards").empty();

                response.resultado.forEach(element => {

                    $(".container-cards").append(
                        getCardDonnorStructure(element.idPaciente, element.nomePaciente, element.descricaoSexoPaciente,
                            element.rgPaciente, element.cpfPaciente, element.descricaoTipoSanguineo, element.descricaoFatorRh));

                });

            }
            else if (response.status === false) {

                $(".container-cards").empty();
                $(".container-cards").append("<h6 class='mt-4'> Nenhum paciente encontrado </h6>");

            }

        },
        error: function (request, status, error) {


            console.log(request.responseText);
        }

    });

});


$(document).on('click', '.remover-paciente', function (event) {

    event.preventDefault();
    event.stopPropagation();

    let link = this.getAttribute('href');

    removerPaciente = document.getElementById('pacienteRemovido');

    removerPaciente.value = link;

});


$('#form-remover-paciente').on('submit', function (event) {

    event.preventDefault();

    $.ajax({

        url: $("#pacienteRemovido").val(),
        type: "get",
        dataType: "json",
        success: function (resposta) {
            if (resposta) {

                showToast('Sucesso', 'O paciente foi removido com sucesso', 'success', '#28a745', 'white', 2000);

                setTimeout(function () {

                    location.reload(true);

                }, 2000);

            } else {

                showToast('Erro', 'Não foi possivel remover o paciente!', 'warning', '#dc3545', 'white', 2000);

            }

        },
        error: function (request, status, error) {

            console.log(request);
            console.log(error);
            console.log(status);

        }

    });

});


$(document).on('click', '.editar-', function (event) {

    event.stopPropagation();

});


$(document).on('click', '.card-consulta', function (event) {

    let id = this.getAttribute('id');

    $.ajax({

        url: "../controller/paciente/resgatar-paciente-update.php",
        type: "post",
        dataType: "json",
        data: {
            "id": id
        },
        success: function (resposta) {
            if (resposta.statusPaciente) {

                $("#nome-paciente").text(resposta.nomePaciente);
                $("#cpf-paciente").text(resposta.cpfPaciente);
                $("#rg-paciente").text(resposta.rgPaciente);
                $("#sexo-paciente").text(resposta.descricaoSexoPaciente);
                $("#tipo-sanguineo-paciente").text(resposta.descricaoTipoSanguineoPaciente);
                $("#fator-rh-paciente").text(resposta.descricaoFatorRhPaciente);

                $('#update-paciente').val(id);

                $("#modal-view-paciente").modal("show");

            } else {

                showToast('Erro', 'Paciente não encontrado!', 'warning', '#dc3545', 'white', 2000);

            }

        },
        error: function (request, status, error) {

            console.log(request);
            console.log(error);
            console.log(status);

        }


    });
});


$('#update-paciente').on('click', function (event) {

    idPaciente = document.getElementById('update-paciente');

    window.location.href = "paciente.php?idPaciente=" + idPaciente.value;

});


$(".filter-option").on("click", function (ev) {

    if (this.id == 'filterNomePaciente') {

        $('#hdSearchTypePaciente').val('filterNomePaciente');
        loadNameFilter();

    }
    else if (this.id == 'filterCpfPaciente') {

        $('#hdSearchTypePaciente').val('filterCpfPaciente');
        loadCpfFilter();


    }
    else if (this.id == 'filterRgPaciente') {

        $('#hdSearchTypePaciente').val('filterRgPaciente');
        loadRgFilter();


    }
    else if (this.id == 'filterTipoSanguineoPaciente') {

        $('#hdSearchTypePaciente').val('filterTipoSanguineoPaciente');
        loadBloodTypeFilter();

    }
    else if (this.id == 'filterFatorRhPaciente') {

        $('#hdSearchTypePaciente').val('filterFatorRhPaciente');
        loadRhFactorFilter();

    }

    $("#modal-filter-paciente").modal('hide');

});


function loadNameFilter() {

    $(".container-search").empty();
    $(".container-search").append(" <input type='text' name='txtPesquisaPaciente' id='txtPesquisaPaciente' class='input-for-search w-100' placeholder='Digite o nome do paciente' />");

}


function loadCpfFilter() {

    $(".container-search").empty();
    $(".container-search").append("<input type='text' name='txtPesquisaPaciente' id='txtPesquisaPaciente' class='input-for-search w-100 txtCpf' placeholder='Digite o CPF do paciente' />");
    $(".txtCpf").mask("000.000.000-00");

}


function loadRgFilter() {

    $(".container-search").empty();
    $(".container-search").append("<input type='text' name='txtPesquisaPaciente' id='txtPesquisaPaciente' class='input-for-search w-100 txtRg' placeholder='Digite o RG do paciente' />");
    $(".txtRg").mask("00.000.000-0");

}


function loadBloodTypeFilter() {

    $(".container-search").empty();

    let containerPesquisa = document.querySelector(".container-search");

    let selectBloodType = document.createElement("select");
    let labelSelectBloodType = document.createElement("label");

    labelSelectBloodType.setAttribute("for", "seTipoSanguineo");
    labelSelectBloodType.appendChild(document.createTextNode("Selecione o tipo sanguíneo"));
    containerPesquisa.appendChild(labelSelectBloodType);

    selectBloodType.classList.add("input-for-search");
    selectBloodType.classList.add("w-100");
    selectBloodType.setAttribute("name", "seTipoSanguineo");
    selectBloodType.setAttribute("id", "seTipoSanguineo");
    selectBloodType.setAttribute("placeholder", "Escolha o tipo sanguíneo do paciente");

    containerPesquisa.appendChild(selectBloodType);

    $.ajax({

        url: "../controller/tipo-sanguineo/pegar-tipos-sanguineos.php"
        , dataType: "json"
        , method: "get"
        , asynch: false
        , success: function (response) {


            let option1 = document.createElement("option");
            let txtOption1 = document.createTextNode('Selecione uma das opções');

            option1.appendChild(txtOption1);
            selectBloodType.appendChild(option1);
                    
            option1.setAttribute("selected", "true");
            option1.setAttribute("disabled", "true");
            
            response.forEach((element, index) => {

                let option = document.createElement("option");
                let txtOption = document.createTextNode(element.descricaoTipoSanguineo);

                option.setAttribute("value", element.idTipoSanguineo);

                option.appendChild(txtOption);
                selectBloodType.appendChild(option);

            });

        }
        , error: function (request) {

            console.log(request.responseText);

        }

    });

}


function loadRhFactorFilter() {

    $(".container-search").empty();
    $(".container-search").append(" <label for='seFatorRh'> Fator RH </label> <select name='seFatorRh' id='seFatorRh' class='input-for-search w-100' placeholder='Escolha o tipo sanguíneo do paciente' />");

    $.ajax({

        url: "../controller/fator-rh/pegar-fatores-rh.php"
        , dataType: "json"
        , method: "get"
        , success: function (response) {

            $("#seFatorRh").append("<option selected disabled>Selecione uma opção</option>");

            response.forEach(element => {

                $("#seFatorRh").append("<option value='" +
                    element.idFatorRh + "'>"
                    + element.descricaoFatorRh + "</option>");

            });

        }
        , error: function (request) {

            console.log(request.responseText);

        }
    });
}


function getCardDonnorStructure(idPaciente, nomePaciente, descricaoSexo, rgPaciente, cpfPaciente, descricaoTipoSanguineo, descricaoFatorRh) {

    return "<div class='card-consulta' id ='" + idPaciente + "'>"
        + "<h6 class='text-center mt-5'>" + nomePaciente + "</h6>"
        + "<h6 class='text-center mt-2'>" + descricaoSexo + "</h6>"
        + "<h6 class='text-center mt-2'>" + rgPaciente + "</h6>"
        + "<h6 class='text-center mt-2'>" + cpfPaciente + "</h6>"
        + "<h6 class='text-center mt-2'>" + descricaoTipoSanguineo + " " + descricaoFatorRh + "</h6>"
        + "<a href='paciente.php?idPaciente=" + idPaciente + "' id='" + idPaciente + "' class='editar-paciente'> <button class='mt-4' > <i class='fas fa-pen'></i> </button> </a>"
        + "<a href='../controller/paciente/paciente-exclusao.php?idPaciente=" + idPaciente + "' class='remover-paciente'> <button class='mt-4' data-toggle='modal' data-target='#modal-remover-paciente'> <i class='far fa-trash-alt'></i> </button> </a>"
        + "</div>";

}