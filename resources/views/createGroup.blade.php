@extends('layout.app')


@section('content')

    <h1>Criar Grupo</h1>
    <form action="{{ route('grupo.enviar') }}" method="post">
        @csrf

        <div class="form-group">
            <label>Nome do Grupo</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div>
            <button type="submit" class="btn btn-success">Criar Grupo</button>
        </div>


    </form>

@endsection
