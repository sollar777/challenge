@extends('layouts.app')


@section('content')

    <input type="hidden" value="{{url('/')}}" id="url_grupo" name="url">

    <h1>Criar Grupo</h1>
    <form action="{{ route('grupo.enviar') }}" method="post" class="form_group">
        @csrf

        <div class="form-group">
            <label>Nome do Grupo</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div>
            <button type="submit" class="btn btn-success enviar" >Criar Grupo</button>
        </div>


    </form>

@endsection
