@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col">
            <h1 class="h1-vendas">Listagem de Vendas</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8"></div>
        <div class="col-md-4">
            <a href="{{route('vendas.criar')}}" class="btn btn-success a-lista-vendas form-control">Cadastro de Vendas</a>
        </div>
    </div>

    <table class="table table-striped vendas-listagem">
        <thead>
            <tr>
                <th>#</th>
                <th>Data da Venda</th>
                <th>Cliente</th>
                <th>Vendedor</th>
                <th>Loja</th>
                <th>Desconto</th>
                <th>Total</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vendas as $venda)
                <tr>
                    <td>{{ $venda->id }}</td>
                    <td>{{ $venda->date }}</td>
                    <td>{{ $venda->cliente }}</td>
                    <td>{{ $venda->vendedor }}</td>
                    <td>{{ $venda->loja }}</td>
                    <td>R$ {{ number_format($venda->discount, 2, ',', '.') }}</td>
                    <td>R$ {{ number_format($venda->total_venda, 2, ',','.') }}</td>
                    <td>
                        <a href="{{route('vendas.buscar', ['id' => $venda->id])}}" class="btn btn-primary btn-vendas-listagem">
                            Exibir
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{$vendas->links()}}

@endsection
