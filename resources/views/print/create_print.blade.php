
@extends('adminlte::page')

@section('title', 'PandaBK')

@section('content_header')
    <h1>Create</h1>
@stop
@section('content')
{!! Form::open(['url' => '/print', 'method' => 'POST']) !!} 
@include('print.form_print')
{!! Form::close() !!} {{-- Fechar formulário --}}

@stop