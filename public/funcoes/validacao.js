$("#CPF").mask('000.000.000-00');

// cadastrar grupos

$(".form_group").on("submit", function(e){
    e.preventDefault();
  
    $.ajax({
        url: "/grupos/criar",
        type: "post",
        data: $(this).serialize(),
        dataType: 'json',
        success: function (response) { 
            if(response.success === true){
                window.location.href = "/grupos";
            }else {
                alert('error');
            }
         }
    });
});

// ---- remover grupos

$(".btn_excluir").on("click", function(e){
    e.preventDefault()
    
    var id = $(this).attr("id");

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $("input[name=_token").val()
        }
    });

    $.ajax({
        url: "/grupos/deletar/" + id,
        type: "delete",
        data: $(this).serialize(),
        dataType: 'json',
        success: function (response) { 
            if(response.success === true){
               window.location.href = "/grupos";
            }else{
                $(".messageBox").removeClass('d-none').html(response.message);
            }
         }
    })
})
// ------------ fim grupo ------------------------




