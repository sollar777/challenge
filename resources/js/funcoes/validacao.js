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
                        $(".listagem-itens-vendas").removeClass('d-none');
                        $(".h3-lista-produtos").removeClass('d-none');
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
                    $(".price-product").attr("value", formatReal(response.price));
                    var quantidade = parseFloat($(".quant-product").val().replace(',','.'));
                    var preco = parseFloat($(".price-product").val().replace(',','.'));
                    $(".tot-product").attr("value", (preco * quantidade).toLocaleString('pt-BR'));
                } else {

                }
            }
        })

    }
})

$(".quant-product").on("change", function (e) {
    if ($(".select-produtos-vendas").val() > 0) {
        var quantidade = parseFloat(formatReal($(this).val()).replace(',', '.'));
        var preco = parseFloat(formatReal($(".price-product").val()).replace(',', '.'));
        var total = (quantidade * preco);
        $(".tot-product").attr("value", total.toLocaleString('pt-BR'));
    }
})

$(".price-product").on("change", function (e) {
    if ($(".select-produtos-vendas").val() > 0) {
        var quantidade = parseFloat(formatReal($(".quant-product").val()).replace(',', '.'));
        var preco = parseFloat(formatReal($(this).val()).replace(',', '.'));
        var total = (quantidade * preco);
        $(".tot-product").attr("value", total.toLocaleString('pt-BR'));
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
        }).fail(function () {
            console.log('erro');
        })
    }
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
                cols += "<td>" + "<a href='#' id='" + response[a].id + "' class='fas fa-edit btn btn-primary btn-modal-vendas-edit'" + 
                "data-toggle='modal' data-target='#modalVendaEditProduct'>" + 
                "<a href='#' id='" + response[a].id + "' class='fas fa-trash-alt btn btn-danger btn-modal-vendas-excluir'>" + "</td>";
                cols += "</tr>";
        })
        $("#tr-lista-produtos-vendas").append(cols);
        
}

$(".form_vandas_itens").on("submit", function (e) {
    e.preventDefault();

    itens_vendas(popular_lista_vendas_itens);

})

 // faltando adicionar as div sem os label na listagem do itens de vendas

 // desabilitar um campo $(".campo").attr("disabled", true pra desativar ou false pra ativar)