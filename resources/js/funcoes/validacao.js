$("#CPF").mask('000-000.000-00');
$(".money").mask('#.##0,00', { reverse: true });

// cadastrar grupos

$(".form_group").on("submit", function (e) {
    e.preventDefault();

    $.ajax({
        url: "/grupos/criar",
        type: "post",
        data: $(this).serialize(),
        dataType: 'json',
        success: function (response) {
            if (response.success === true) {
                window.location.href = "/grupos";
            } else {
                alert('error');
            }
        }
    });
});

// ---- remover grupos

$(".btn_excluir").on("click", function (e) {
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
            if (response.success === true) {
                window.location.href = "/grupos";
            } else {
                $(".messageBox").removeClass('d-none').html(response.message);
            }
        }
    })
})
// ------------ fim grupo ------------------------

// -------------------clientes cadastro----------

$(".form_client").on("submit", function (e) {
    e.preventDefault();

    $.ajax({
        url: "/clientes/create",
        type: "post",
        data: $(this).serialize(),
        dataType: 'json',
        success: function (response) {
            if (response.success === true) {
                window.location.href = "/clientes";
            } else {
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
            if (response.success === true) {
                window.location.href = "/clientes";
            } else {
                $(".messageBox-client").removeClass("d-none").html("erro ao editar o cliente!");
            }
        }
    })
})

//------clientes remover-------------

$(".teste-form").on("submit", function (e) {
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $("input[name=_token").val()
        }
    })

    var id = $(".teste-form").on("submit", function (e) {
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
                if (response.success === true) {
                    window.location.href = "/clientes";
                } else {
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
            if (response.success === true) {
                window.location.href = "/produtos";
            } else {
                $(".messageBox-product-store").removeClass("d-none").html(response.erro);
            }
        }
    })
})

$(".form-edit").on("submit", function (e) {
    e.preventDefault();

    var id = $(this).attr("id");
    var name = $(".product-edit-name").val();
    var description = $(".product-edit-description").val();
    var price = parseFloat(formatReal($(".price-product").val()).replace(',', '.'));
    var price_cost = parseFloat(formatReal($(".price-cost-product").val()).replace(',', '.'));
    var amount = parseFloat(formatReal($(".quantidade-product").val()).replace(',', '.'));
    var group_id = $(".product-edit-group").val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $("input[name=_token").val()
        }
    })

    $.ajax({
        url: "/produtos/edit/" + id,
        type: "put",
        data: {
            name: name,
            description: description,
            price: price,
            price_cost: price_cost,
            amount: amount,
            group_id: group_id
        },
        dataType: 'json',
        success: function (response) {
            if (response.success === true) {
                window.location.href = "/produtos"
            } else {
                $(".messageBox-product-update").removeClass("d-none").html(response.erro);
            }
        }
    })
})

$(".btn-remove").on("click", function (e) {
    e.preventDefault();

    var id = $(this).attr("id");

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $("input[name=_token").val()
        }
    })

    $.ajax({
        url: "/produtos/destroy/" + id,
        type: "delete",
        data: $(this).serialize(),
        dataType: 'json',
        success: function (response) {
            if (response.success === true) {
                window.location.href = "/produtos"
            } else {
                $(".messageBox-product-remove").removeClass("d-none").html(response.erro);
            }
        }
    })

})


// --------fim produtos----------------


//------------- cadastro de vendas----------------

$(".form_vendas_criar").on("submit", function (e) {
    e.preventDefault();


    if ($(".btn_id_vendas").val() == 0) {

        $.ajax({
            url: "/vendas/criar",
            type: 'post',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (response) {
                if (response.success === true) {
                    codVenda = $("#codVenda").html(response.id);
                    if (codVenda.html() > 0) {
                        $(".form_vandas_itens").removeClass('d-none');
                        $(".div-lista-produtos-vendas").removeClass('d-none');
                        if ($(".btn_id_vendas").val() == 0) {
                            $(".btn_id_vendas").attr("value", response.id);
                            $(".btn-enviar-vendas").attr("disabled", true);
                        }
                    }
                } else {
                    console.log('erro');
                }
            }
        })
    }
})

$(".select-produtos-vendas").on("change", function (e) {
    if ($(this).val() > 0) {

        var id = $(this).val();

        $.ajax({
            url: "/produtos/pesquisa/ajax/" + id,
            type: "get",
            dataType: 'json',
            success: function (response) {
                if (response.success === true) {
                    $(".price-product").val(formatReal(response.price));
                    $(".quant-product").val(1);
                    var quantidade = parseFloat($(".quant-product").val().replace(',', '.'));
                    var preco = parseFloat($(".price-product").val().replace(',', '.'));
                    $(".tot-product").val((preco * quantidade).toLocaleString('pt-BR'));
                } else {

                }
            }
        })

    }
})

$(".modal-quantidade-produto").on("change", function () { 
    var quantidade = parseFloat($(this).val().replace(',', '.'));
    var preco = parseFloat($(".modal-preco-produto").val().replace(',', '.'));
    var total = (quantidade * preco);
    $(".modal-tot-produto").val(total.toLocaleString('pt-BR'));
 })

 $(".modal-preco-produto").on("change", function () { 
    var preco = parseFloat($(this).val().replace(',', '.'));
    var quantidade = parseFloat($(".modal-quantidade-produto").val().replace(',', '.'));
    var total = (quantidade * preco);
    $(".modal-tot-produto").val(total.toLocaleString('pt-BR'));
 })

$(".quant-product").on("change", function (e) {
    if ($(".select-produtos-vendas").val() > 0) {
        var quantidade = parseFloat(formatReal($(this).val()).replace(',', '.'));
        var preco = parseFloat(formatReal($(".price-product").val()).replace(',', '.'));
        var total = (quantidade * preco);
        $(".tot-product").val(total.toLocaleString('pt-BR'));
    }
})

$(".price-product").on("change", function (e) {
    if ($(".select-produtos-vendas").val() > 0) {
        var quantidade = parseFloat(formatReal($(".quant-product").val()).replace(',', '.'));
        var preco = parseFloat(formatReal($(this).val()).replace(',', '.'));
        var total = (quantidade * preco);
        $(".tot-product").val(total.toLocaleString('pt-BR'));
    }
})

function itens_vendas(callback) {

    var venda_id = $(".btn_id_vendas").val();
    var product_id = $(".select-produtos-vendas").val();
    var price = parseFloat(formatReal($(".price-product").val()).replace(',', '.'));
    var amount = parseFloat(formatReal($(".quant-product").val()).replace(',', '.'));

    if ($(".select-produtos-vendas").val() > 0) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $("input[name=_token").val()
            }
        })

        $.ajax({
            url: "/vendas/produtos/criar/",
            type: "post",
            data: {
                venda_id: venda_id,
                product_id: product_id,
                price: price,
                amount: amount
            },
            dataType: 'json',
        }).done(function (response) {
            callback(response);
        }).fail(function (erro) {
            console.log('erro: ' + erro);
        })
    }
}

function modalEditarProduto(idvenda) {
    var id = idvenda;
    $.ajax({
        url: "/vendas/produtos/buscar/" + id,
        type: "get",
        dataType: "json",
        success: function (response) {
            if (response.success === true) {
                $(".modal-produto-editarId").val(response.id);
                $(".modal-nome-produto").val(response.name_product);
                $(".modal-quantidade-produto").val(response.amount);
                $(".modal-preco-produto").val(response.price);
                var quantidade = parseFloat(formatReal($(".modal-quantidade-produto").val()).replace(",", "."));
                var preco = parseFloat(formatReal($(".modal-preco-produto").val()).replace(",", "."));
                var total = (quantidade * preco);
                $(".modal-tot-produto").val(total.toLocaleString('pt-BR'));
            } else {

            }
        }
    })
}

// adicionar funcao formatReal no preços da listagem
function popular_lista_vendas_itens(response) {
    var cols = "";
        $("#tr-lista-produtos-vendas td").remove();
        $.each(response, function (a) {
                cols += "<tr>";
                cols += "<td>" + response[a].name_product + "</td>";
                cols += "<td>" + response[a].amount + "</td>";
                cols += "<td>" + response[a].price + "</td>";
                cols += "<td>" + (response[a].price * response[a].amount).toLocaleString('pt-BR') + "</td>";
                cols += "<td>" + "<a href='javascript:func()' onclick='modalEditarProduto(" + response[a].id + ")' id='" + response[a].id + "' class='fas fa-edit btn btn-primary btn-modal-vendas-edit'" + 
                "data-toggle='modal' data-target='#modalVendaEditProduct'></a>" + 
                "<button type='submit' onclick='modalRemoverProduto(" + response[a].id + ")' class='fas fa-trash-alt btn btn-danger btn-modal-vendas-excluir'></button>" + "</td>";
                cols += "</tr>";
        })
        $("#tr-lista-produtos-vendas").append(cols);
        
}

function modalRemoverProduto(idProdutoVenda) {
    var id = idProdutoVenda;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $(".teste_modal").val()
            }
        })

        $.ajax({
            url: "/vendas/produtos/deletar/" + id,
            type: "delete",
            dataType: "json",
            success: function (response) { 
                var i = 0;
                $.each(response, function (e, element) { 
                  if(element.length > 0){
                    popular_lista_vendas_itens(element);
                  }else{
                    $("#tr-lista-produtos-vendas td").remove();
                  }
                 });
                 
             }
        })

}

$(".btn-cancelar-vendas").on("click", function (e) { 
    e.preventDefault();

    var id = $("#codVenda").html();

    if(id > 0){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $("input[name=_token").val()
            }
        })
    }

 })

$(".form_vandas_itens").on("submit", function (e) {
    e.preventDefault();

    itens_vendas(popular_lista_vendas_itens);

})

$(".form-modal-editar-item-venda").on("submit", function (e) { 
    e.preventDefault();

    var id = $(".modal-produto-editarId").val();
    var product_id = $(".hidden-modal-editar-item-produto").val();
    var sales_id = $(".hidden-modal-editar-item-id-venda").val();
    var amount = parseFloat(formatReal($(".modal-quantidade-produto").val()).replace(',', '.'));
    var price = parseFloat(formatReal($(".modal-preco-produto").val()).replace(',', '.'));
    var name_product = $(".modal-nome-produto").val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $("input[name=_token").val()
        }
    })

    $.ajax({
        url: "/vendas/produtos/editar/" + id,
        type: "put",
        data: {
            product_id: product_id,
            sales_id: sales_id,
            price: price,
            amount: amount,
            name_product: name_product
        },
        dataType: "json",
    }).done(function (data) { 
        $.each(data, function (e, element) { 
            if(element.length > 0){
                popular_lista_vendas_itens(element);
                $(".btn-modal-fechar").trigger("click");
            }else{
                $("#tr-lista-produtos-vendas td").remove();
            }
         })
     }).fail(function (e) { 
         console.log("erro: " + e);
      })
 })

 // faltando adicionar as div sem os label na listagem do itens de vendas

 // desabilitar um campo $(".campo").attr("disabled", true pra desativar ou false pra ativar)