@extends('layout.app')

@section('content')

<h1>Lista de Clientes</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>CPF/CNPJ</th>
            <th>Telefone</th>
            <th>Email</th>
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
                      
            </tr>
        @endforeach
    </tbody>

</table>

@endsection