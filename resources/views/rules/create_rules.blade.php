
@extends('adminlte::page')

@section('title', 'PandaBK')

@section('content_header')
    <h1>Create</h1>
@stop
@section('content')
{!! Form::open(['url' => '/rules', 'method' => 'POST']) !!} 
<h1>Create</h1>
@include('rules.form_rules')


<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
$(document).ready(function(){
  var savePrint = []
  $(document).on('click','#save', function(event){
    var printValue = $("#print option:selected").val();
    var printText = $("#print option:selected").text();
    savePrint.push(printValue, printText);
    var html = '<tr>'+
            '<td>'+printText+
            '<input type="hidden" name="printers[]" value="'+printValue+'">'+
            '</td>'+
            '<td>'+
            '<button type="button" id="remove" onclick="console.log(savePrint)" class="btn btn-danger">X</button>'+
            '</tr>'+
          '</tr>';
    $("#printersTable tbody").append(html);
    console.log(savePrint);
  });
  $(document).on('click','#remove', function(event){
    savePrint.pop;
  }); 
});
</script>
<div class="form-group col-sm-8">
                {!! Form::select('id_print', $print, null, ['class'=>'form-control impressora', 'id'=>'print']) !!}
        </div>
        <div class="form-group col-md-4">
            <button type="button" id="save" class="btn btn-secondy">Add</button>
        </div>
        <table class="table table-striped" id="printersTable">
          <thead>
            <tr>
              <th>Impressora</th>
              <th>Action</th>
            </tr>            
        </thead>
        <tbody>          
        </tbody>
        </div>
      </table>
      {!! Form::close() !!} {{-- Fechar formulário --}}
@stop