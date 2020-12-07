@extends('layout.app')

@section('content')

<h1>Listagem dos Grupos</h1>

<table class="table table-striped">

    <div class="alert alert-danger d-none messageBox" role="alert">

    </div>
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>

        @foreach($groups as $group)
            <tr>
                <td id:"teste4">{{$group->id}}</td>
                <td>{{$group->name}}</td>    
                <td>
                    <form action="" class="form_remove_group" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$group->id}}">
                        <input type="submit" class="btn btn-danger btn_excluir" id="{{$group->id}}" value="remover">
                    </form>
                </td> 
            </tr>
        @endforeach
    </tbody>

</table>

@endsection