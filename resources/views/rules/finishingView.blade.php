@extends('adminlte::page')

@section('title', 'PandaBK')
@section('content_header')
    <h1></h1>
@stop
@section('content')
<div class="row">
    <div class="form-group col-sm-12">
        {!! Form::label('id_rule', 'Contrato', array('class' => 'control-label' )) !!} 
        {!! Form::text('id_rule', $rule->name_rules, ['class' => 'form-control','required', 'readonly' => 'true']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('first_date', 'Data Inicial', array('class' => 'control-label' )) !!} 
        {!! Form::text('first_date', $monthClosure->first_date, ['class' => 'form-control','required', 'readonly' => 'true']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('last_date', 'Data Final', array('class' => 'control-label' )) !!} 
        {!! Form::text('last_date', $monthClosure->first_date, ['class' => 'form-control','required', 'readonly' => 'true']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('total_page', 'Total de Páginas', array('class' => 'control-label' )) !!} 
        {!! Form::text('total_page', $monthClosure->total_page, ['class' => 'form-control','required', 'readonly' => 'true']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('total_surplus', 'Total de exedentes', array('class' => 'control-label' )) !!} 
        {!! Form::text('total_surplus', $monthClosure->value_surplus, ['class' => 'form-control','required','readonly' => 'true']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('total_pay', 'Valor Total', array('class' => 'control-label' )) !!} 
        {!! Form::text('total_pay', $monthClosure->total_pay, ['class' => 'form-control','required','readonly' => 'true']) !!}
    </div>
</div>

@stop