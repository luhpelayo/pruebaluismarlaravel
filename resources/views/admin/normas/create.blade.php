@extends('admin.template')

@section('content')
<div class="container box box-primary">

    <div class="page-header  text-center">
      <h1>
       <i class="fa fa-file-text-o"style="color:green"></i>
        NORMAS <small>[Agregar Norma]</small>
      </h1>
    </div>
  <div class="col-xs-12 col-md-8 col-md-offset-2 col-xl-6 col-xl-offset-3">
    @if (count($errors) > 0)
        @include('admin.partials.errors')
    @endif
    
      {!! Form::open(['route'=>'normas.store','method' => 'POST','files' => true]) !!}
           <h4>Tipo norma:</h3>
           <div class="form-group">

            <label>{{Form::radio('tipo_norma','EXTERNO')}} Normativa Externa</label>
            <label>{{Form::radio('tipo_norma','INTERNA')}} Normativa Interna</label>
           </div>
            <div class="form-group">
              <label for="nombre">Nombre:</label>
              {!! 
                  Form::text(
                      'nombre', 
                      null, 
                      array(
                         
                          'class'=>'form-control',
                          'placeholder' => 'Nombre del procedimiento...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>
          <div class="form-group">
          {!! Form::label('file','Agregar un archivo') !!}
          {!! Form::file('file')!!}
         </div>

         <div class="form-group">
              
              {!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
              <a href="{{ route('normas.index') }}" class="btn btn-warning">Cancelar</a>
          </div>

      
      {!! Form::close() !!}
 </div>

</div>
@stop