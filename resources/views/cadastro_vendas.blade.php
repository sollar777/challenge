@extends('layout.app')

@section('content')

    <h1 class="titulo-vendas display-6">Cadastro de Vendas</h1>

    <form action="" method="post" class="form_vendas_criar">
        @csrf

        <div class="row div-row-1-vendas">
            <div class="col-md-8">

            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-8">
                        <label class="lb-cod-venda">
                            <h3>Código da venda:</h3>
                        </label>
                    </div>
                    <div class="col-md-4 codVenda">
                        <label class="form-control" id="codVenda">0</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row div-row-vendas">

            <div class="col-md-3">
                <label>Data da Venda</label>
                <input type="date" name="date" class="form-control data-venda" value="">
            </div>

            <div class="col-md-6">
                <label>Nome do Cliente</label>
                <select name="clients_id" class="form-control">
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <label>Vendedor</label>
                <select name="user_id" class="form-control">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row div-row-vendas">

            <div class="col-md-6">
                <label>Empresa</label>
                <select name="store_id" class="form-control">
                    @foreach ($stores as $store)
                        <option value="{{ $store->id }}">{{ $store->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label>Observação</label>
                <input type="text" name="obs" class="form-control obs-vendas">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-success btn-lg btn-enviar-vendas">Enviar</button>
            </div>
        </div>

    </form>

    <form action="" method="post" class="form_vandas_itens d-none">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <label>Produto</label>
                <select name="product_id" class="form-control select-produtos-vendas">
                    <option value=""></option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <label>Quantidade</label>
                <input type="text" class="form-control money quant-product" name="amount" value="1">
            </div>

            <div class="col-md-2">
                <label>Preço</label>
                <input type="text" class="form-control money price-product" name="price" value="1">
            </div>

            <div class="col-md-2">
                <label>Total</label>
                <input type="text" class="form-control money tot-product" name="Tot" id="vendas-tot" value="1" disabled>
            </div>

            <div class="col-md-2">
                <input type="hidden" name="id" value="0" class="btn_id_vendas">
                <button type="submit" class="btn btn-sm btn-success form-control" id="btn-itens-vendas">
                    Adicionar
                </button>
            </div>

        </div>

    </form>

    <div class="div-lista-produtos-vendas d-none">
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
                <input type="hidden" name="_token" class="teste_modal" value="{{csrf_token()}}">
                <tbody id="tr-lista-produtos-vendas">

                </tbody>
            </form>
        </table>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="modalVendaEditProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar produto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
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
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary">Salvar mudanças</button>
                </div>
            </div>
        </div>
    </div>

@endsection
