@extends('layouts.app')

@section('content')

    <h1 class="titulo-vendas display-6">Dados da Venda</h1>

    <form action="" method="post" class="form_vendas_editar">
        @csrf

        <div class="row div-row-1-vendas">
            <div class="col-md-8">

            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-8">
                        <label class="lb-cod-venda form-group">
                            <h3>Código da venda:</h3>
                        </label>
                    </div>
                    <div class="col-md-4 codVenda">
                        <label class="form-control" id="codVenda">{{$venda->id}}</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row div-row-vendas">

            <div class="col-md-3">
                <label class="form-group">Data da Venda</label>
                <input type="date" name="date" class="form-control data-venda" value="{{$venda->date}}">
            </div>

            <div class="col-md-6">
                <label class="form-group">Nome do Cliente</label>
                <select id="select-clientes-vendas-editar" name="clients_id" class="form-control select-clientes-vendas-editar">
                    <option value="{{$venda->user_id}}">{{$venda->client->name}}</option>
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-group">Vendedor</label>
                <select name="user_id" class="form-control">
                        <option value="{{$venda->user_id}}">{{$venda->user->name}}</option>
                </select>
            </div>
        </div>

        <div class="row div-row-vendas">

            <div class="col-md-4">
                <label class="form-group">Empresa</label>
                <select name="store_id" class="form-control">
                        <option value="{{$venda->store_id}}">{{$venda->store->name}}</option>
                </select>
            </div>

            <div class="col-md-8">
                <label class="form-group">Observação</label>
                <input type="text" name="obs" class="form-control obs-vendas" value="{{$venda->obs}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-success btn-enviar-vendas btn-vendas form-control" disabled>
                    Salvar
                </button>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary btn-editar-vendas btn-vendas form-control">
                    Editar
                </button>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-danger btn-cancelar-vendas btn-vendas form-control">
                    Cancelar
                </button>
            </div>
        </div>

    </form>

    <form action="" method="post" class="form_vandas_itens">
        @csrf
        <input type="hidden" name="id" value="" class="modal-produto-editarId">
        <div class="row">
            <div class="col-md-4">
                <label class="form-group">Produto</label>
                <select name="product_id" class="form-control select-produtos-vendas">
                    <option value="0"></option>
                    @foreach ($produtos as $produto)
                        <option value="{{$produto->id}}">{{$produto->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <label class="form-group">Quantidade</label>
                <input type="text" class="form-control money quant-product" name="amount" value="1">
            </div>

            <div class="col-md-2">
                <label class="form-group">Preço</label>
                <input type="text" class="form-control money price-product" name="price" value="1">
            </div>

            <div class="col-md-2">
                <label class="form-group">Total</label>
                <input type="text" class="form-control money tot-product" name="Tot" id="vendas-tot" value="1" disabled>
            </div>

            <div class="col-md-2">
                <input type="hidden" name="id" value="{{$venda->id}}" class="btn_id_vendas">
                <button type="submit" class="btn btn-sm btn-success form-control" id="btn-itens-vendas">
                    Adicionar
                </button>
            </div>

        </div>

    </form>

    <div class="div-lista-produtos-vendas">
        <div id="linha"></div>
        <h3 class="h3-lista-produtos display-5">Lista de Produtos</h3>
        <table class="table table-sm table-striped listagem-itens-vendas">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Produto</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Total</th>
                    <th scope="col">Editar/Excluir</th>
                </tr>
            </thead>

            <form action="" method="">
                <input type="hidden" name="_token" class="teste_modal" value="{{ csrf_token() }}">
                <tbody id="tr-lista-produtos-vendas">
                    @foreach ($vendas_itens as $venda)
                        <tr>
                            <td>{{$venda->name_product}}</td>
                            <td>{{$venda->quantidade}}</td>
                            <td>{{$venda->preço}}</td>
                            <td>{{$venda->total}}</td>
                            <td>
                                <a href="javascript:modalEditarProduto({{$venda->vendasItens_id}})" onclick="modalEditarProduto({{$venda->vendasItens_id}})" 
                                    class="fas fa-edit btn btn-primary btn-modal-vendas-edit" 
                                    data-toggle="modal" data-target="#modalVendaEditProduct">
                                </a>
                                <button type="submit" onclick="modalRemoverProduto({{$venda->vendasItens_id}})" 
                                    class="fas fa-trash-alt btn btn-danger btn-modal-vendas-excluir">
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </form>
        </table>
        <div class="row">
            <div class="col-md-9"></div>
            <div class="col-md-3">
                <button type="button" class="btn btn-success form-control btn-salvar-produtos">
                    Salvar Produtos
                </button>
            </div>
        </div>
    </div>

    <!-- Forma de pagamento -->
    <div class="div-forma-pagamento-venda">
        <div id="linha"></div>
        <h3 class="h3-lista-produtos">Total Venda</h3>
        <form action="" class="form-pagamento-vendas">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <label class="form-group">Sub-Total</label>
                    <input type="text" name="subTot" class="form-control subTot-vendas" value="1" disabled>
                </div>
                <div class="col-md-3">
                    <label class="form-group">Desconto(%)</label>
                    <input type="text" name="desc" class="form-control desc-percentual money" value="1">
                </div>
                <div class="col-md-3">
                    <label class="form-group">Desconto($)</label>
                    <input type="text" name="desc" class="form-control desc-valor money" value="1">
                </div>
                <div class="col-md-3">
                    <label class="form-group">Total</label>
                    <input type="text" name="total" class="form-control total-vendas" value="1" disabled>
                </div>
            </div>
            <div id="linha"></div>
            <h3 class="h3-forma-pagamento">Forma de Pagamento</h3>
            <div class="row">
                <div class="col-md-4">
                    <label class="form-group">Forma de Pagamento</label>
                    <select name="formaPagamento" id="" class="form-control select-forma-pagamento select-forma-pagamento-editar">
                           @if ($bloquetes_venda)
                                <option value="{{$bloquetes_venda->pagamento_id}}">{{$bloquetes_venda->description}}</option>
                           @else
                                <option value="0"></option>
                            @endif
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-group">Valor</label>
                    <input type="text" name="valorPago" id="" value="0" class="form-control input-valor-parcela-venda">
                </div>
            </div>
        </form>
    </div>



    <!-- Modal -->
    <div class="modal fade modal-principal-editar-produto" id="modalVendaEditProduct" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar produto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" class="form-modal-editar-item-venda" id="">
                        @csrf
                        <label>Produto</label>
                        <input type="text" name="name" class="form-control modal-nome-produto" style="border: none"
                            disabled>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Quantidade</label>
                                <input type="text" name="amount" class="form-control modal-quantidade-produto">
                            </div>
                            <div class="col-md-6">
                                <label>Preço</label>
                                <input type="text" name="price" class="form-control modal-preco-produto">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Total</label>
                                <input type="text" name="tot" class="form-control modal-tot-produto" style="border: none"
                                    disabled>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-modal-fechar" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary btn-modal-salvar-edicao">Salvar mudanças</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    

@endsection


