@extends('layouts.app')


@section('content')

<h1>Editar Produto</h1>

<div class="alert alert-danger d-none messageBox-product-update" role="alert"></div>

<input type="hidden" value="{{url('/')}}" id="url_produto" name="url">

<form action="{{route('produto.edit', ['id' => $product->id])}}" method="post" class="form-edit" id="{{$product->id}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label >Nome do Produto</label>
        <input type="text" name="name" value="{{$product->name}}" class="form-control product-edit-name">
    </div>

    <div class="form-group">
        <label >Descrição</label>
        <input type="text" name="description" value="{{$product->description}}" 
        class="form-control product-edit-description">
    </div>

    <div class="form-group">
        <label >Preço de Compra</label>
        <input type="text" name="price_cost" value="{{$product->price_cost}}" 
        class="form-control money price-cost-product">
    </div>

    <div class="form-group">
        <label >Preço de Venda</label>
        <input type="text" name="price" value="{{$product->price}}" class="form-control money price-product">
    </div>

    <div class="form-group">
        <label >Quantidade</label>
        <input type="text" name="amount" value="{{$product->amount}}" class="form-control money quantidade-product">
    </div>

    <div class="form-group">
        <label >Grupo</label>
        <select name="group" class="form-control product-edit-group">
            <option value="{{$product->group_id}}">{{$product->groups->name}}</option>
            @foreach($groups as $group)
                @if($group->id != $product->group_id)
                    <option value="{{$group->id}}">{{$group->name}}</option>
                @endif
            @endforeach
        </select>
    </div>

    <div>
        <button type="submit" class="btn btn-success btn-edit">Atualizar Produto</button>
    </div>


</form>

@endsection