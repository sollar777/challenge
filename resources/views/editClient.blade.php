@extends('layout.app')


@section('content')

    <h1>Editar Cliente</h1>
    <form action="{{ route('cliente.atualizar', ['id' => $client->id]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nome do Cliente</label>
            <input type="text" name="name" class="form-control" value="{{$client->name}}">
        </div>

        <div class="form-group">
            <label>CPF/CNPJ</label>
            <input type="text" name="cgc" class="form-control teste" id="CPF" value="{{$client->cgc}}">
        </div>

        <div class="form-group">
            <label>Telefone</label>
            <input type="text" name="phone" class="form-control" value="{{$client->phone}}">
        </div>

        <div class="form-group">
            <label>E-mail</label>
            <input type="text" name="email" class="form-control" value="{{$client->email}}">
        </div>

        <div class="form-group">
            <label>Endereço</label>
            <input type="text" name="street" class="form-control" value="{{$address->street}}">
        </div>

        <div class="form-group">
            <label>Numero</label>
            <input type="text" name="number" class="form-control" value="{{$address->number}}">
        </div>

        <div class="form-group">
            <label>Cidade</label>
            <input type="text" name="city" class="form-control" value="{{$address->city}}">
        </div>

        <div class="form-group">
            <label>Estado</label>
            <input type="text" name="state" class="form-control" value="{{$address->state}}">
        </div>

        <div class="form-group">
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

        <div>
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>

    </form>

@endsection