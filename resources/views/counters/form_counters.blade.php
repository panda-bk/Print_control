<div class="row">
        <div class="form-group col-sm-6">
            {!! Form::label('name', 'Impressora', array('class' => 'control-label' )) !!} 
            {!! Form::select('id_print', $prints, null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('counter', 'Contador', array('class' => 'control-label' )) !!}
            {!! Form::number('total_page', null, ['class' => 'form-control', 'required',]) !!}
        </div> 
        <div class="form-group col-md-6">
            {!! Form::label('date', 'Data', array('class' => 'control-label' )) !!}
            {!! Form::date('date', null, ['class' => 'form-control', 'required',]) !!}
        </div> 
        <div class="form-group col-md-10">
            <button type="submit" class="btn btn-success">Salvar</button>
    </div>