
@extends('adminlte::page')

@section('title', 'PandaBK')

@section('content_header')
    <h1>Edit</h1>
@stop
@section('content')
{!! Form::model($clients, ['url' => '/client', 'method' => 'put']) !!} 
@include('formulario')
{!! Form::close() !!} {{-- Fechar formulário --}}
@stop

    