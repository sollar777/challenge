@extends('layout.app')


@section('content')

    <h1>Cadastrar Cliente</h1>

    <div class="alert alert-danger d-none messageBox-client" role="alert"></div>

    <form action=""  class="form_client" method="">
        @csrf
        
        <div class="form-group">
            <label>Nome do Cliente</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="form-group">
            <label>CPF/CNPJ</label>
            <input type="text" name="cgc" class="form-control">
        </div>

        <div class="form-group">
            <label>Telefone</label>
            <input type="text" name="phone" class="form-control">
        </div>

        <div class="form-group">
            <label>E-mail</label>
            <input type="text" name="email" class="form-control">
        </div>

        <div class="form-group">
            <label>Endereço</label>
            <input type="text" name="street" class="form-control">
        </div>

        <div class="form-group">
            <label>Numero</label>
            <input type="text" name="number" class="form-control">
        </div>

        <div class="form-group">
            <label>Cidade</label>
            <input type="text" name="city" class="form-control">
        </div>

        <div class="form-group">
            <label>Estado</label>
            <input type="text" name="state" class="form-control">
        </div>

        <div class="form-group">
            <label>Vendedor</label>
            <select name="user" class="form-control">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>


    </form>

@endsection
