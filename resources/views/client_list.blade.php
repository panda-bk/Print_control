@extends('adminlte::page')

@section('title', 'PandaBK')
@section('content_header')
    <h1>Home</h1>
@stop
@section('content')
@if(session()->get('error') == true)
<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" arial-hidden="true">x</button>
{!! session()->get('error') !!}
</div>
@endif
<table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Endereço</th>
        <th>Numero</th>
        <th>Action</th>
      </tr>
    </thead>
@foreach($clients as $client)
    <tr>
    <td>{{$client['id']}}</td>
    <td>{{$client['name']}}</td>
    <td>{{$client['address']}}</td>
    <td>{{$client['number']}}</td>
    <td><a href="{{action('ClientsController@edit', $client['id'])}}" class="btn btn- btn-primary btn-sm">Editar 
    <i class="fa fa-edit"></i></a></td>
    <td>
    <form action="{{action('ClientsController@destroy', $client['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn- btn-danger btn-sm" type="submit">Delete</button>
        </form>
    </td>
    </tr>
    @endforeach
@stop