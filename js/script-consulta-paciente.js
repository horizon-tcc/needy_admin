$(document).on('click', '.remover-paciente', function(event) {

    event.preventDefault();
    event.stopPropagation();

    let link = this.getAttribute('href');

    removerPaciente = document.getElementById('pacienteRemovido');

    removerPaciente.value = link;

});

$(document).on("click", ".editar-paciente", (event) => {

    event.preventDefault();
    event.stopPropagation();

});

$('#form-remover-paciente').on('submit', function(event){

    event.preventDefault();

    $.ajax({

        url: $("#pacienteRemovido").val(),
        type: "get",
        dataType: "json",
        success: function (resposta) {
            if(resposta){

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

$(document).on('click', '.editar-paciente', function(event){

    idPaciente = this.id

    $.ajax({

        url:"../controller/paciente/resgatar-paciente-update.php",
        type: "post",
        dataType: "json",
        data: {
            "idPaciente": idPaciente
        },
        success: function (resposta) {
            if(resposta.statusPaciente){

                $("#nome-paciente").text(resposta.nomePaciente);
                $("#cpf-paciente").text(resposta.cpfPaciente);
                $("#rg-paciente").text(resposta.rgPaciente);
                $("#sexo-paciente").text(resposta.descricaoSexoPaciente);
                $("#tipo-sanguineo-paciente").text(resposta.descricaoTipoSanguineoPaciente);
                $("#fator-rh-paciente").text(resposta.descricaoFatorRhPaciente);

                $('#update-paciente').val(idPaciente);

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

$('#update-paciente').on('click', function(event){

    console.log("cu");

    idPaciente = document.getElementById('update-paciente');
    
    window.location.href ="paciente.php?idPaciente="+idPaciente.value;
});