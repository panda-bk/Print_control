<div class="row">
        <div class="form-group col-sm-6">
            {!! Form::label('model', 'Model', array('class' => 'control-label' )) !!} 
            {!! Form::text('model', null, ['class' => 'form-control','required']) !!}
        </div>
       
        <div class="form-group col-md-6">
            {!! Form::label('brand', 'Marca', array('class' => 'control-label' )) !!} 
            {!! Form::text('brand', null, ['class' => 'form-control','required']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('ip', 'IP', array('class' => 'control-label' )) !!} 
            {!! Form::text('ip', null, ['class' => 'form-control','required']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('first_value', 'Contador Inicial', array('class' => 'control-label' )) !!}
            {!! Form::text('first_value', null, ['class' => 'form-control']) !!}
        </div>  
        <div class="form-group col-md-6">
            {!! Form::label('sector', 'Setor', array('class' => 'control-label' )) !!}
            {!! Form::text('sector', null, ['class' => 'form-control', 'required']) !!}
        </div>  
        <div class="form-group col-md-12">
            <button type="submit" class="btn btn-success">Salvar</button>
    </div>