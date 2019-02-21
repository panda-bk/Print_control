
@extends('adminlte::page')

@section('title', 'PandaBK')

@section('content_header')
    <h1>Edit</h1>
@stop
@section('content')
{!! Form::model($rules, ['route' => ['rules.update', $id], 'method' => 'PUT']) !!} 
@include('rules.form_rules')
{!! Form::close() !!} {{-- Fechar formulário --}}

@stop