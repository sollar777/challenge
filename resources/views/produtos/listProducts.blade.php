@extends('layouts.app')

@section('content')

<input type="hidden" value="{{url('/')}}" id="url_produto" name="url">

    <div class="row">
        <div class="col">
            <h1 class="h1-lista-produtos">Lista de Produtos</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8"></div>
        <div class="col-md-4">
            <a href="{{route('produto.criar')}}" class="btn btn-success form-control a-lista-produtos">Cadastrar Produto</a>
        </div>
    </div>
    

    <div class="alert alert-danger d-none messageBox-product-remove" role="alert"></div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Preço de Custo</th>
                <th>Preço de Venda</th>
                <th>Quantidade</th>
                <th>Grupo</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price_cost }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->amount }}</td>
                    <td>{{ $product->groups->name }}</td>
                    <td>
                        <form action="{{ route('produto.excluir', ['id' => $product->id]) }}" method="post" 
                            id="{{ $product->id }}">
                            @csrf
                            @method('delete')
                            <a href="{{ route('produto.editar', ['id' => $product->id]) }}" 
                                class="btn btn-sm btn-primary btn-edit">
                                Editar
                            </a>
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="submit" class="btn btn-sm btn-danger btn-remove" value="Remover" 
                            id="{{ $product->id }}">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>


@endsection
