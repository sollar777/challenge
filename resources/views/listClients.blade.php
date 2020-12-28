@extends('layouts.app')

@section('content')

<input type="hidden" value="{{url('/')}}" id="url_cliente" name="url">

<div class="row">
    <div class="col">
        <h1 class="h1-cliente">Lista de Clientes</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-8"></div>
    <div class="col-md-4">
        <a href="{{route('clientes.criar')}}" class="btn btn-success a-lista-clientes form-control">Cadastrar Cliente</a>
    </div>
</div>


<div class="alert alert-danger d-none messageBox-clientRemove" role="alert"></div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>CPF/CNPJ</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>

        @foreach($clients as $client)
            <tr>
                <td>{{$client->id}}</td>
                <td>{{$client->name}}</td>
                <td>{{$client->cgc}}</td>
                <td>{{$client->phone}}</td>
                <td>{{$client->email}}</td>    
                <td>
                    <form action="" class="teste-form" 
                        value="{{$client->id}}" method="">
                        @csrf
                        <a href="{{route('clientes.editar', ['id' => $client->id])}}" class="btn btn-sm btn-primary">
                            Editar
                        </a>
                        <input type="hidden" name="id" value="{{ $client->id }}" class="btn_remover_id">
                        <input type="submit" class="btn btn-sm btn-danger btn_remover_client" value="Remover">
                    </form>
                </td>          
            </tr>
        @endforeach
    </tbody>

</table>

@endsection

