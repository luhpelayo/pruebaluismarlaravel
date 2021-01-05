@extends('admin.template')

@section('content')
<div class="container box box-primary">  

    <div class="page-header  text-center">
      <h1>
       <i class="fa fa-user-secret"style="color:green"></i>
        SOLICITANTES <small>[Agregar Solicitante]</small>
      </h1>
    </div>
  <div class="page">
    @if (count($errors) > 0)
        @include('admin.partials.errors')
    @endif
    
      {!! Form::open(['route'=>'solicitante.store']) !!}
          
          <div class="form-group col-xs-6">
              <label for="ci">C.I.:</label>
              {!! 
                  Form::text(
                      'ci', 
                      null, 
                      array(
                          'class'=>'form-control',
                          'placeholder' => 'Ingrese su identificación...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>
          <div class="form-group col-xs-6">
              <label for="nombre">Nombre:</label>
              {!! 
                  Form::text(
                      'nombre', 
                      null, 
                      array(
                          'class'=>'form-control',
                          'placeholder' => 'Ingrese nombre...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>
          <div class="form-group col-xs-6">
              <label for="apellido">Apellido:</label>
              {!! 
                  Form::text(
                      'apellido', 
                      null, 
                      array(
                          'class'=>'form-control',
                          'placeholder' => 'Ingrese apellido...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>
          <div class="form-group col-xs-6">
              <label for="telefono">Telefono:</label>
              {!! 
                  Form::text(
                      'telefono', 
                      null, 
                      array(
                          'class'=>'form-control',
                          'placeholder' => 'Ingrese numero telefonico...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>
          <div class="form-group col-xs-6">
              <label for="direccion">Direccion:</label>
              {!! 
                  Form::text(
                      'direccion', 
                      null, 
                      array(
                          'class'=>'form-control',
                          'placeholder' => 'Ingrese direccion...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>
          <div class="form-group col-xs-6">
              <label for="lat">Lat:</label>
              {!! 
                  Form::text(
                      'lat', 
                      null, 
                      array(
                          'class'=>'form-control',
                          'placeholder' => 'Ingrese numero lat...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>
          <div class="form-group col-xs-6">
              <label for="lon">Lon:</label>
              {!! 
                  Form::text(
                      'lon', 
                      null, 
                      array(
                          'class'=>'form-control',
                          'placeholder' => 'Ingrese numero lon...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>
          <div class="form-group col-xs-12">
              <label for="email">Email:</label>
              {!! 
                  Form::text(
                      'email', 
                      null, 
                      array(
                          'class'=>'form-control',
                          'placeholder' => 'Ingrese su email...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>
          <div class="box-body col-xs-12">
              {!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
              <a href="{{ route('solicitante.index') }}" class="btn btn-warning">Cancelar</a>
          </div>
      
      {!! Form::close() !!}
 </div>
</div>

@stop