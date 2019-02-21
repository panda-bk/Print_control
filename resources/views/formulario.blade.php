<div class="row">
        <div class="form-group col-sm-6">
            {!! Form::label('name', 'Nome', array('class' => 'control-label' )) !!} 
            {!! Form::text('name', null, ['class' => 'form-control','required']) !!}
        </div>
        <div class="form-group col-md-4">
            {!! Form::label('counters', 'Contador', array('class' => 'control-label' )) !!} 
            {!! Form::number('conuters', null, ['class' => 'form-control','required']) !!}
        </div>
        <div class="form-group col-md-2">
            {!! Form::label('date', 'Data', array('class' => 'control-label' )) !!}
            {!! Form::date('date', null, ['class' => 'form-control', 'required']) !!}

        </div>  
        <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success">Salvar</button>
    </div>