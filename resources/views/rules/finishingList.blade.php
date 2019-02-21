 
@extends('adminlte::page')

@section('title', 'PandaBK')

@section('content_header')
    <h1></h1>
@stop
@section('content')
<table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Rules</th>
        <th>Total</th>
      </tr>
    </thead>
    @foreach($monthClosures as $monthClosure)
    <tr>
    <td>{{$monthClosure['id']}}</td>
    <td>{{$monthClosure['id_rule']}}</td>
    <td>{{$monthClosure['total_page']}}</td>
    <td><td><a href="/rules/finishing/{{{$monthClosure['id']}}}" class="btn btn- btn-info btn-sm">Visualizar
    <i class="fa fa-edit"></i></a></td>
    <td>
    </td>
    </tr>
    @endforeach
@stop

    