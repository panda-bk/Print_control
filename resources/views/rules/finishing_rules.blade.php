
@extends('adminlte::page')

@section('title', 'PandaBK')

@section('content_header')
    <h1>Finalizar</h1>
@stop
@section('content')
{!! Form::open(['url' => '/rules/calculate', 'method' => 'POST']) !!} 
<div class='row'>
    <div class="form-group col-sm-12">
        {!! Form::label('rules', 'Contrato', array('class' => 'control-label' )) !!} 
        {!! Form::select('rules', $rules, null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group col-md-6">
            {!! Form::label('start_date', 'Data Inicial', array('class' => 'control-label' )) !!}
            {!! Form::date('start_date', null, ['class' => 'form-control ', 'required']) !!}
    </div> 
    <div class="form-group col-md-6">
            {!! Form::label('last_date', 'Data Final', array('class' => 'control-label' )) !!}
            {!! Form::date('last_date', null, ['class' => 'form-control ', 'required']) !!}
        </div> 
        <div class="form-group col-md-12">
            <button type="submit" class="btn btn-success">Salvar</button>
    </div>
</div>
{!! Form::close() !!} {{-- Fechar formulário --}}
@stop