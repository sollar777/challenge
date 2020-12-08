@extends('layout.app')

@section('content')

<h1>Lista de Clientes</h1>

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
                        <a href="{{route('cliente.editar', ['id' => $client->id])}}" class="btn btn-sm btn-primary">
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

