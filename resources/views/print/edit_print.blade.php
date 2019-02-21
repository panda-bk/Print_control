
@extends('adminlte::page')

@section('title', 'PandaBK')

@section('content_header')
    <h1>Edit</h1>
@stop
@section('content')
<form method="POST" action="{{action('PrintController@update', $id)}}">
<input type="hidden"  name="_method" value="put">
@csrf
<div class="row">
        <div class="form-group col-sm-6">
            {!! Form::label('model', 'Model', array('class' => 'control-label' )) !!} 
            {!! Form::text('model', $prints->model, ['class' => 'form-control','required']) !!}
        </div>
       
        <div class="form-group col-md-6">
            {!! Form::label('brand', 'Marca', array('class' => 'control-label' )) !!} 
            {!! Form::text('brand', $prints->brand, ['class' => 'form-control','required']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('ip', 'IP', array('class' => 'control-label' )) !!} 
            {!! Form::text('ip', $prints->ip, ['class' => 'form-control','required']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('first_value', 'Contador Inicial', array('class' => 'control-label' )) !!}
            {!! Form::text('first_value', $counter, ['class' => 'form-control']) !!}
        </div>  
        <div class="form-group col-md-6">
            {!! Form::label('sector', 'Setor', array('class' => 'control-label' )) !!}
            {!! Form::text('sector', $prints->sector, ['class' => 'form-control', 'required']) !!}
        </div>  
        <div class="form-group col-md-12">
            <button type="submit" class="btn btn-success">Salvar</button>
    </div>
    </form>
@stop

    