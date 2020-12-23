@extends('layouts.app')


@section('content')

    <h1>Criar Empresa</h1>
    <form action="{{route('empresa.enviar')}}" method="post" class="">
        @csrf

        <div class="row">
            <div class="form-group col-md-3">
                <label>CNPJ</label>
                <input type="text" name="cgc" class="form-control">
            </div>
            <div class="form-group col-md-3">
                <label>Nome da Empresa</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label>Descrição</label>
                <input type="text" name="description" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label>Telefone</label>
                <input type="text" name="phone" class="form-control">
            </div>
        </div>
        

        <div>
            <button type="submit" class="btn btn-success" >Criar Empresa</button>
        </div>


    </form>

@endsection