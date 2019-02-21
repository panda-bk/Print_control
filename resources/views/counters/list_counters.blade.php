@extends('adminlte::page')

@section('title', 'PandaBK')
@section('content_header')
    <h1>Home</h1>
@stop
@section('content')
<a href="counters/create">Cadastro</a>
<table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Impressora<th>
        <th>Conters</th>
        <th>date</th>
        <th>Action</th>
      </tr>
    </thead>
    @foreach($counters as $counter)
    <tr>
    <td>{{$counter['id']}}</td>
    <td>{{$counter['id_print']}}</td>
    <td>{{$counter['counters']}}</td>
    <td>{{$counter['date']}}</td>
    <td><a href="{{action('CountersController@edit', $counter['id'])}}" class="btn btn- btn-primary btn-sm">Editar 
    <i class="fa fa-edit"></i></a></td>
    <td>
    <form action="{{action('CountersController@destroy', $counter['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn- btn-danger btn-sm" type="submit">Delete</button>
        </form>
    </td>
    </tr>
    @endforeach

@stop