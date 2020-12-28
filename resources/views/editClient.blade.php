@extends('layouts.app')


@section('content')

    <h1 class="h1-cliente">Editar Cliente</h1>

    <div class="alert alert-danger d-none messageBox-clientEdit" role="alert"></div>

    <input type="hidden" value="{{url('/')}}" id="url_cliente" name="url">

    <form action="" method="" class="form_client_edit">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <label>Nome do Cliente</label>
                <input type="text" name="name" class="form-control" value="{{ $client->name }}">
            </div>
            <div class="col-md-4">
                <label>CPF/CNPJ</label>
                <input type="text" name="cgc" class="form-control teste" id="CPF" value="{{ $client->cgc }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label>Endereço</label>
                <input type="text" name="street" class="form-control"
                    value="{{ $address != null ? $address->street : '' }}">
            </div>
            <div class="col-md-2">
                <label>Numero</label>
                <input type="text" name="number" class="form-control"
                    value="{{ $address != null ? $address->number : '' }}">
            </div>
            <div class="col-md-2">
                <label>Cidade</label>
                <input type="text" name="city" class="form-control" value="{{ $address != null ? $address->city : '' }}">
            </div>
            <div class="col-md-2">
                <label>Estado</label>
                <input type="text" name="state" class="form-control" value="{{ $address != null ? $address->state : '' }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <label>Telefone</label>
                <input type="text" name="phone" class="form-control" value="{{ $client->phone }}">
            </div>
            <div class="col-md-6">
                <label>E-mail</label>
                <input type="text" name="email" class="form-control" value="{{ $client->email }}">
            </div>
            <div class="col-md-4">
                <label>Vendedor</label>
                <select name="user" class="form-control">
                    <option value="{{ $client->user_id }}">{{ $client->user->name }}</option>
                    @foreach ($users as $user)
                        @if ($user->id != $client->user_id)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8"></div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-success form-control btn-editar-client" value="{{ $client->id }}">
                    Salvar
                </button>
            </div>
        </div>

    </form>

@endsection
