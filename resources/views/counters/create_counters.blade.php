
@extends('adminlte::page')

@section('title', 'PandaBK')

@section('content_header')
    <h1>Create</h1>
@stop
@section('content')
{!! Form::open(['url' => '/counters', 'method' => 'POST']) !!} 
<h1>Create</h1>
@include('counters.form_counters')
{!! Form::close() !!} {{-- Fechar formulário --}}

@stop