<div class="row">
        <div class="form-group col-sm-6">
            {!! Form::label('name_rules', 'Name', array('class' => 'control-label' )) !!} 
            {!! Form::text('name_rules', null, ['class' => 'form-control','required']) !!}
        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('franchise', 'Pg. Franquia', array('class' => 'control-label' )) !!} 
            {!! Form::number('franchise', null, ['class' => 'form-control','required']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('value_franchise', 'Valor da Franquia', array('class' => 'control-label' )) !!} 
            {!! Form::number('value_franchise', null, ['class' => 'form-control','required', 'step' => '0.01']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('value_surplus', 'Valor Pg.Excedente', array('class' => 'control-label' )) !!}
            {!! Form::number('value_surplus', null, ['class' => 'form-control', 'required', 'step' => '0.01']) !!}
        </div>  
        <div class="form-group col-md-6">
            {!! Form::label('start_date', 'Data Inicial', array('class' => 'control-label' )) !!}
            {!! Form::date('start_date', null, ['class' => 'form-control', 'required']) !!}
        </div>  
        <div class="form-group col-md-6">
            {!! Form::label('last_date', 'Data Final', array('class' => 'control-label' )) !!}
            {!! Form::date('last_date', null, ['class' => 'form-control ', 'required']) !!}
        </div> 
        <div class="form-group col-md-2 col-md-offset-5">
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
</div>