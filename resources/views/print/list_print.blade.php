@extends('adminlte::page')

@section('title', 'PandaBK')
@section('content_header')
@if(session()->get('error') == true)
<div class="alert alert-warning alert-dismissible">
<button type="button" class="close" data-dismiss="alert" arial-hidden="true">x</button>
{!! session()->get('error') !!}
</div>
@endif
@stop
@section('content')

<a href="print/create">Cadastro</a>
<table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Marca</th>
        <th>Model</th>
        <th>IP</th>
        <th>Setor</th>
        <th>Action</th>
      </tr>
    </thead>
    @foreach($prints as $print)
    <tr>
    <td>{{$print['id']}}</td>
    <td>{{$print['brand']}}</td>
    <td>{{$print['model']}}</td>
    <td>{{$print['ip']}}</td>
    <td>{{$print['sector']}}</td>
    <td><a href="{{action('PrintController@edit', $print['id'])}}" class="btn btn- btn-primary btn-sm">Editar 
    <i class="fa fa-edit"></i></a></td>
    <td>
    <form action="{{action('PrintController@destroy', $print['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn- btn-danger btn-sm" type="submit">Delete</button>
        </form>
    </td>
    </tr>
    @endforeach

@stop