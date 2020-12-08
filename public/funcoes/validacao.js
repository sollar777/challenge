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

// -------------------clientes cadastro----------

$(".form_client").on("submit", function(e){
    e.preventDefault();

    $.ajax({
        url: "/clientes/create",
        type: "post",
        data: $(this).serialize(),
        dataType: 'json',
        success: function (response) { 
            if(response.success === true){
                window.location.href = "/clientes";
            }else{
                $(".messageBox-client").removeClass("d-none").html("erro ao cadastrar o cliente!");
            }
         }
    })
})

// -------------------clientes editar----------

    

    $(".form_client_edit").on("submit", function (e) {
        e.preventDefault();

        var id = $(".btn-editar-client").attr('value');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $("input[name=_token").val()
            }
        })

        $.ajax({
            url: "/clientes/edit/" + id,
            type: "put",
            data: $(this).serialize(),
            dataType: 'json',
            success: function (response) {
                if(response.success === true){
                    window.location.href = "/clientes";
                }else {
                    $(".messageBox-client").removeClass("d-none").html("erro ao editar o cliente!");
                }
            }
        })
    })

    //------clientes remover-------------

    $(".teste-form").on("submit", function(e){
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $("input[name=_token").val()
            }
        })

        var id =  $(".teste-form").on("submit", function(e){
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $("input[name=_token").val()
            }
        })

        var id = $(this).attr("value");

        $.ajax({
            url: "/clientes/destroy/" + id,
            type: "delete",
            data: $(this).serialize(),
            dataType: 'json',
            success: function (response) { 
                if(response.success === true){
                    window.location.href = "/clientes";
                }else {
                    $(".messageBox-clientRemove").removeClass("d-none").html(response.message);
                }
             }
        })

       
    });

       
    })
//------- FIM CLIENTES-------------


//----- produtos cadastro---------

$(".form-product-store").on("submit", function (e) { 
    e.preventDefault();

    $.ajax({
        url: "/produtos/criar",
        type: "post",
        data: $(this).serialize(),
        dataType: 'json',
        success: function (response) { 
            if(response.success === true){
                window.location.href = "/produtos";
            }else {
                $(".messageBox-product-store").removeClass("d-none").html(response.erro);
            }
         }
    })
 })

 // --------fim produtos----------------