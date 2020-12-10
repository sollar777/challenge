@extends('layout.app')

@section('content')

    <h1>Cadastro de Vendas</h1>

    <form action="" method="post" class="form_vendas_criar">
        @csrf

        <div class="row">
            <div class="col-md-8">

            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-8">
                        <label>
                            <h3>Código da venda:</h3>
                        </label>
                    </div>
                    <div class="col-md-4 codVenda">
                        <label class="form-control" id="codVenda">0</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-md-3">
                <label>Data da Venda</label>
                <input type="date" name="date" class="form-control data" value="">
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

        <div class="row">

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
                <input type="text" name="obs" class="form-control">
            </div>
        </div>

                <button type="submit" class="btn btn-success btn-enviar-vendas">Enviar</button>
     

    </form>

    <form action="" method="post" class="d-none form_vandas_itens">
        <label >teste</label>
    </form>

@endsection
