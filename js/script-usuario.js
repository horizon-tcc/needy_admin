$('#txtEmailUsuario').blur(function () {

    let email = $("#txtEmailUsuario").val();

    let validar = validarEmail(email);

    if (validar) {
        $('#txtEmailUsuario').removeClass(("is-invalid"));
        $('#txtEmailUsuario').addClass(("is-valid"));
    } else {
        $('#txtEmailUsuario').removeClass(("is-valid"));
        $('#txtEmailUsuario').addClass(("is-invalid"));
    }

});

$('#psSenhaUsuario').blur(function () {

    let password = $("#psSenhaUsuario").value();

    if (password.search(/["´`ÁÀÓÒ*^¨.':;,Â!Ã?ÔÕ¨]/i) != -1 || !password) {
        $('#psSenhaUsuario').removeClass(("is-valid"));
        $('#psSenhaUsuario').addClass(("is-invalid"));
    } else if (password.search(/[0123456789]/) == -1 || password.search(/[-_<>@&%$#]/) == -1) {
        $('#psSenhaUsuario').removeClass(("is-valid"));
        $('#psSenhaUsuario').addClass(("is-invalid"));
    } else {
        $('#psSenhaUsuario').removeClass(("is-invalid"));
        $('#psSenhaUsuario').addClass(("is-valid"));
    }

});

/*function limparCamposUsuario() {

    ev.preventDefault();

    document.getElementById("#scTipoUsuario").value = "";
    document.getElementById("#txtEmailUsuario").value = "";
    document.getElementById("#psSenhaUsuario").value = "";

}

$("#btnLimparCamposUsuario").click(limparCamposUsuario());*/