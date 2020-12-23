@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col">
        <h1 class="h1-grupo">Listagem dos Empresas</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-8"></div>
    <div class="col-md-4">
        <a href="{{route('empresa.criar')}}" class="btn btn-success a-lista-grupos form-control">Cadastro de Empresa</a>
    </div>
</div>

<table class="table table-striped">

    <div class="alert alert-danger d-none messageBox" role="alert">

    </div>
    <thead>
        <tr>
            <th>CNPJ</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Telefone</th>
        </tr>
    </thead>
    <tbody>

        @foreach($empresas as $empresa)
            <tr>
                <td id:>{{$empresa->cgc}}</td>
                <td>{{$empresa->name}}</td>    
                <td>{{$empresa->description}}</td>
                <td>{{$empresa->phone}}</td>  
            </tr>
        @endforeach
    </tbody>

</table>

@endsection