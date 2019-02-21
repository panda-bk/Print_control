
@extends('adminlte::page')

@section('title', 'PandaBK')

@section('content_header')
    <h1>Create</h1>
@stop
@section('content')
{!! Form::open(['url' => '/client', 'method' => 'POST']) !!} 
@include('formulario')
{!! Form::close() !!} {{-- Fechar formulário --}}

@stop

    