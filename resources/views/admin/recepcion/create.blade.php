@extends('store.template')

@section('content')
<div class="row">
  <div class="box box-primary col-xs-12">

    <div class="page-header  text-center">
      <h1>
        <i class="fa fa-folder-open-o"style="color:green"></i>
        RECEPCIÓN <small>[Agregar Recepción]</small>
      </h1>
    </div>
  <div class="page">
    @if (count($errors) > 0)
        @include('admin.partials.errors')
    @endif
    
      {!! Form::open(['route'=>'recepcion.store']) !!}
          
          <div class="box-body col-xs-12">
              <label for="NOMBRE">Descripción:</label>
              {!! 
                  Form::text(
                      'nombre', 
                      null, 
                      array(
                          'class'=>'form-control',
                          'placeholder' => 'Ingrese descripción...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>
          <div class="box-body col-xs-12">
              {!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
              <a href="{{ route('recepcion.index') }}" class="btn btn-warning">Cancelar</a>
          </div>
      
      {!! Form::close() !!}
 </div>
</div>

</div>
@stop