@extends('layout.app')

@section('content')

<h1>Listagem dos Grupos</h1>

<table class="table table-striped">
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
                <td>{{$group->id}}</td>
                <td>{{$group->name}}</td>    
                <td>
                    <form action="{{route('grupo.excluir', ['id' => $group->id])}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="id" value="{{$group->id}}">
                        <input type="submit" class="btn btn-danger" value="Remover">
                    </form>
                </td> 
            </tr>
        @endforeach
    </tbody>

</table>

@endsection