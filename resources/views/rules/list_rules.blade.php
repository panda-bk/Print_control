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
<a href="rules/create">Cadastro</a>
<table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Franquia</th>
        <th>Valor</th>
        <th>Action</th>
      </tr>
    </thead>
    @foreach($rules as $rule)
    <tr>
    <td>{{$rule['id']}}</td>
    <td>{{$rule['name_rules']}}</td>
    <td>{{$rule['franchise']}}</td>
    <td>{{$rule['value_franchise']}}
    <td><a href="{{action('RulesController@edit', $rule['id'])}}" class="btn btn- btn-primary btn-sm">Editar 
    <i class="fa fa-edit"></i></a></td>
    <td>
    <form action="{{action('RulesController@destroy', $rule['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn- btn-danger btn-sm" type="submit">Delete</button>
        </form>
    </td>
    </tr>
    @endforeach

@stop