///////////// início dos Eventos /////////////////////////

$("input[name=imgBancoSangue]").change(function () {

    inserirImg();

});


$(document).on("click","#btn-adicionar-horario",function(){

    let formularioHorario = document.querySelector(".form-adicionar-horario");
    let formData = new FormData(formularioHorario);

    $.ajax({
        
        url: "../controller/banco-sangue/adicionar-horarios-banco-sangue.php"
       ,method:"post"
       ,dataType:"json"
       ,data: formData
       ,success : function( response ){


       }
       ,error : function (request){


       }

    });


});

///////////// fim dos Eventos /////////////////////////