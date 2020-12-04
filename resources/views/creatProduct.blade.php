@extends('layout.app')


@section('content')

    <h1>Criar Produto</h1>
    <form action="{{ route('produto.enviar') }}" method="post">
        @csrf

        <div class="form-group">
            <label>Nome do Produto</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="form-group">
            <label>Descrição</label>
            <input type="text" name="description" class="form-control">
        </div>

        <div class="form-group">
            <label>Preço de Compra</label>
            <input type="text" name="price_cost" class="form-control">
        </div>

        <div class="form-group">
            <label>Preço de Venda</label>
            <input type="text" name="price" class="form-control">
        </div>

        <div class="form-group">
            <label>Quantidade</label>
            <input type="text" name="amount" class="form-control">
        </div>

        <div class="form-group">
            <label>Grupo</label>
            <select name="group" class="form-control">
                @foreach ($groups as $group)
                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <button type="submit" class="btn btn-success">Criar Produto</button>
        </div>


    </form>

@endsection