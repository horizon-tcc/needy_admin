
$("#txtPesquisa").on("keyup", function () {

    const SUCESSO_AO_CONSULTAR_OS_DOADORES = 1;

    $.ajax({

        url: "../controller/doador/consultar-doadores.php",
        type: "post",
        data: {
            "txtPesquisa": $("#txtPesquisa").val()
        },
        dataType: "json",
        success: function (response) {

            console.log("status : " + response.status);
            if (response.status === SUCESSO_AO_CONSULTAR_OS_DOADORES) {

                $(".container-cards").empty();
                
                response.result.forEach(element => {
                    
                    $(".container-cards").append(element);
                    

                });

                
               
            }

            console.log(response);
           
        },
        error: function (request, status, error) {


            console.log(request.responseText);
        }


    });

});

