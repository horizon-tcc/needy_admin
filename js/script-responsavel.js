
$(document).on("change", "input[name=rbTipoContatoResponsavel]", function (e) {

    if ($("input[name=rbTipoContatoResponsavel]:checked").val() == "residencial") {

        $("#txtTelefoneResponsavel").mask("(00) 0000-0000");

    }
    else {

        $("#txtTelefoneResponsavel").mask("(00) 00000-0000");

    }


});


$("#form-adicionar-telefone-responsavel").on("submit", function (event) {

    const SUCESSO = 1;
    const NUMERO_REPETIDO = 2;
    const NUMERO_INVALIDO = 3;

    event.preventDefault();

    $.ajax({

        url: "../controller/responsavel/adicionar-telefone.php",
        type: "post",
        dataType: "json",
        data: {

            "txtTelefoneResponsavel": $("#txtTelefoneResponsavel").val()
        },
        success: function (response) {

            if (response.status === SUCESSO) {

                if (response.size === 1) {

                    document.getElementById("msg-list-telefone-responsavel").remove();
                }

                $("#container-item-telefone-responsavel").append("<li class='item-telefone d-flex bd-highlight align-items-center'>"
                    + "<i class='fas fa-phone-alt flex-fill bd-highlight'></i>"
                    + "<div class='h-100 flex-fill bd-highlight container-span-telefone'>"
                    + "<span class='h-100 d-flex justify-content-center align-items-center desc-telefone'>" + response.novoTelefone + "</span>"
                    + "</div>"
                    + "<i class='fas fa-times flex-fill bd-highlight remover-telefone-responsavel'></i>"
                    + "</li>");

                showToast('Sucesso', 'Telefone adicionado com sucesso', 'success', '#28a745', 'white', 5000);

                $("#txtTelefoneResponsavel").removeClass("is-invalid");
                $("#txtTelefoneResponsavel").val("");

                $('#modal-adicionar-telefone-responsavel').modal('hide');

            }
            else if (response.status === NUMERO_REPETIDO) {

                showToast('Atenção', 'Telefone repetido, por favor insira um novo telefone!', 'warning', '#dc3545', 'white', 5000);
                $("#txtTelefoneResponsavel").removeClass("is-valid");
                $("#txtTelefoneResponsavel").addClass("is-invalid");
            }
            else if (response.status === NUMERO_INVALIDO) {

                showToast('Atenção', 'Telefone inválido', 'warning', '#dc3545', 'white', 5000);
                $("#txtTelefoneResponsavel").removeClass("is-valid");
                $("#txtTelefoneResponsavel").addClass("is-invalid");
            }
            else {

                showToast('Atenção', 'Erro ao adicionar o telefone', 'warning', '#dc3545', 'white', 5000);
                $("#txtTelefoneResponsavel").removeClass("is-valid");
                $("#txtTelefoneResponsavel").addClass("is-invalid");
            }



        },
        error: function (request, status, error) {
            showToast('Atenção', 'Erro ao adicionar o telefone do responsável', 'warning', '#dc3545', 'white', 5000);
            console.log(request);
        }



    });

});




$(document).on('click', 'i.remover-telefone-responsavel', function (ev) {


    let descTelefoneRemovido = this.parentNode.querySelector("div.container-span-telefone").firstChild.innerHTML;


    $('#modal-remover-telefone-responsavel').modal('show');
    $('#desc-remover-telefone-responsavel').text("Deseja remover o número " + descTelefoneRemovido + " ?");
    $('#hdTelefoneRemovidoResponsavel').val(descTelefoneRemovido);



});


$("#form-remover-telefone-responsavel").on('submit', function (ev) {

    const SUCESSO = 1;

    ev.preventDefault();

    listContainerTelefone = document.querySelectorAll("div#container-item-telefone-responsavel li.item-telefone");

    for (let i = 0; i < listContainerTelefone.length; i++) {

        if (listContainerTelefone[i].querySelector("div.container-span-telefone").firstChild.innerHTML
            == document.getElementById("hdTelefoneRemovidoResponsavel").value) {

            listContainerTelefone[i].remove();
            break;
        }

    }



    $.ajax({

        url: "../controller/responsavel/remover-telefone.php",
        type: "post",
        dataType: "json",
        data: {

            "telefoneRemovidoResponsavel": $("#hdTelefoneRemovidoResponsavel").val()
        },
        success: function (response) {

            if (response.status === SUCESSO) {

                if (response.size === 0) {

                    document.querySelector("#container-item-telefone-responsavel").innerHTML =
                        "<div id='msg-list-telefone-responsavel'> <h5 class='text-center mt-3'> Nenhum telefone adicionado </h5> </div>";

                }
                showToast('Sucesso', 'Telefone removido com sucesso', 'success', '#28a745', 'white', 5000);


            }
            else {

                showToast('Atenção', 'Erro ao remover o telefone', 'danger', '#dc3545', 'white', 5000);
                console.log(response.indice);
            }

        },
        error: function (request, status, error) {

            showToast('Atenção', 'Erro ao remover o telefone', 'warning', '#dc3545', 'white', 5000);

            console.log(status);

        }


    });


    $('#modal-remover-telefone-responsavel').modal('hide');

});



function validarSecaoResponsavel() {

    let nomeResponsavelValido = false;
    let dataResponsavelValido = false;
    let cpfResponsavelValido = false;
    let rgResponsavelValido = false;
    let telefoneResponsavelValido = false;

    if (validarNome($("#txtNomeResponsavel").val())) {

        nomeResponsavelValido = true;

        $("#txtNomeResponsavel").addClass("is-valid");
        $("#txtNomeResponsavel").removeClass("is-invalid");
    }
    else {

        $("#txtNomeResponsavel").addClass("is-invalid");
        $("#txtNomeResponsavel").removeClass("is-valid");

        showToast('Atenção', 'Nome do responsável inválido', 'warning', '#dc3545', 'white', 5000);

    }

    if (validarDataResponsavel($("#txtDataNascimentoResponsavel").val())) {

        dataResponsavelValido = true;

        $("#txtDataNascimentoResponsavel").addClass("is-valid");
        $("#txtDataNascimentoResponsavel").removeClass("is-invalid");
    }
    else {

        $("#txtDataNascimentoResponsavel").addClass("is-invalid");
        $("#txtDataNascimentoResponsavel").removeClass("is-valid");

        showToast('Atenção', 'A data de nascimento do responsável está inválida', 'warning', '#dc3545', 'white', 5000);

    }

    if (validarCpf($("#txtCpfResponsavel").val())) {

        cpfResponsavelValido = true;

        $("#txtCpfResponsavel").addClass("is-valid");
        $("#txtCpfResponsavel").removeClass("is-invalid");
    }

    else {

        $("#txtCpfResponsavel").addClass("is-invalid");
        $("#txtCpfResponsavel").removeClass("is-valid");

        showToast('Atenção', 'O CPF do responsável está inválido', 'warning', '#dc3545', 'white', 5000);

    }


    if ( $("#txtRgResponsavel").val() != "") {

        rgResponsavelValido = true;

        $("#txtRgResponsavel").addClass("is-valid");
        $("#txtRgResponsavel").removeClass("is-invalid");
    }

    else {

        $("#txtRgResponsavel").addClass("is-invalid");
        $("#txtRgResponsavel").removeClass("is-valid");

        showToast('Atenção', 'O RG do responsável está vazio', 'warning', '#dc3545', 'white', 5000);
    }

    $.ajax({

        url: "../controller/responsavel/verificar-tamanho-sessao-telefone.php",
        type: "post",
        dataType: "json",
        async: false,
        success: function (response) {

            if (response.status) {

                if (response.size > 0) {

                     telefoneResponsavelValido = true;

                    $("#list-telefone-responsavel").removeClass("is-invalid");
                    $("#list-telefone-responsavel").addClass("is-valid");

                }
                else {

                    showToast('Atenção', 'Passe pelo menos um número para contato do responsável', 'warning', '#dc3545', 'white', 10000);

                }

            }
            else {

                showToast('Atenção', 'Passe pelo menos um número para contato do responsável', 'warning', '#dc3545', 'white', 10000);

                $("#list-telefone-responsavel").removeClass("is-valid");
                $("#list-telefone-responsavel").addClass("is-invalid");

            }

        },
        error: function (request, status, error) {

            showToast('Atenção', 'Erro ao validar a lista de telefones do responsável', 'warning', '#dc3545', 'white', 10000);
            $("#list-telefone-responsavel").removeClass("is-valid");
            $("#list-telefone-responsavel").addClass("is-invalid");
        }



    });


    if (nomeResponsavelValido && dataResponsavelValido && cpfResponsavelValido 
    
        && rgResponsavelValido) {

            return true;

        }
    return false;
}


function validarDataResponsavel(data) {

    try {

        let dataPassada = new Date(data);

        let dataAux0 = new Date();
        let dataAux1 = new Date();

        dataAux0.setYear(dataAux0.getFullYear() - 18);

        dataAux1.setYear(dataAux1.getFullYear() - 90);

        if (dataPassada <= dataAux0 && dataPassada >= dataAux1) {

            return true;
        }

        return false;

    }

    catch (ex) {

        return false;
    }

}