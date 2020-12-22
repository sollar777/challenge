@extends('layouts.app')


@section('content')

    <h1 class="h1-cliente">Cadastrar Cliente</h1>

    <div class="alert alert-danger d-none messageBox-client" role="alert"></div>

    <form action="" method="" class="form_client">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <label>Nome do Cliente</label>
                <input type="text" name="name" class="form-control" value="">
            </div>
            <div class="col-md-4">
                <label>CPF/CNPJ</label>
                <input type="text" name="cgc" class="form-control teste" id="CPF" value="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label>Endereço</label>
                <input type="text" name="street" class="form-control" value="">
            </div>
            <div class="col-md-2">
                <label>Numero</label>
                <input type="text" name="number" class="form-control" value="">
            </div>
            <div class="col-md-2">
                <label>Cidade</label>
                <input type="text" name="city" class="form-control" value="">
            </div>
            <div class="col-md-2">
                <label>Estado</label>
                <input type="text" name="state" class="form-control" value="">
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <label>Telefone</label>
                <input type="text" name="phone" class="form-control" value="">
            </div>
            <div class="col-md-6">
                <label>E-mail</label>
                <input type="text" name="email" class="form-control" value="">
            </div>
            <div class="col-md-4">
                <label>Vendedor</label>
                <select name="user" class="form-control">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8"></div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-success form-control btn-cadastro-client">
                    Salvar
                </button>
            </div>
        </div>

    </form>

@endsection
