
@extends('adminlte::page')

@section('title', 'PandaBK')

@section('content_header')
    <h1>Edit</h1>
@stop
@section('content')
{!! Form::model($counters, ['route' => ['counters.update', $id], 'method' => 'PUT']) !!} 
@include('counters.form_counters')
{!! Form::close() !!} {{-- Fechar formulário --}} 
@stop

    