@extends('layouts.app')


@section('content')

    <h1 class="h1-cliente">Cadastrar Cliente</h1>

    <div class="alert alert-danger d-none messageBox-client" role="alert"></div>

    <input type="hidden" value="{{url('/')}}" id="url_cliente" name="url">

    <form action="{{route('clientes.enviar')}}" method="post" class="form_client">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <label>Nome do Cliente</label>
                <input type="text" name="name" class="form-control @error('cgc') is-invalid @enderror" value="">

                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>
            <div class="col-md-4">
                <label>CPF/CNPJ</label>
                <input type="text" name="cgc" class="form-control @error('cgc') is-invalid @enderror teste" id="" value="">

                @error('cgc')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label>Cep</label>
                <input type="text" name="cep" class="form-control @error('cep') is-invalid @enderror cep-cad-cliente" value="" id="cep">
                
                @error('cep')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>
            <div class="col-md-4">
                <label>Endereço</label>
                <input type="text" name="street" class="form-control @error('street') is-invalid @enderror end-cad-cliente" value="">
            
                @error('street')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>
            <div class="col-md-2">
                <label>Numero</label>
                <input type="text" name="number" class="form-control @error('number') is-invalid @enderror numero-cad-cliente" value="">
                
                @error('number')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>
            <div class="col-md-2">
                <label>Cidade</label>
                <input type="text" name="city" class="form-control @error('city') is-invalid @enderror cidade-cad-cliente" value="">
            
                @error('city')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>
            <div class="col-md-2">
                <label>Estado</label>
                <input type="text" name="state" class="form-control @error('state') is-invalid @enderror uf-cad-cliente" value="">
            
                @error('state')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <label>Telefone</label>
                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="">
            
                @error('phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>
            <div class="col-md-6">
                <label>E-mail</label>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="">
            
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

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
