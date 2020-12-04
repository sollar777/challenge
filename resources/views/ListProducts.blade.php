@extends('layout.app')

@section('content')

    <h1>Lista de Produtos</h1>

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
                        <form action="{{ route('produto.excluir', ['id' => $product->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <a href="{{ route('produto.editar', ['id' => $product->id]) }}" class="btn btn-sm btn-primary">
                                Editar
                            </a>
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="submit" class="btn btn-sm btn-danger" value="Remover">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

@endsection
