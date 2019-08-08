@extends('admin.template')

@section('content')

 
  <div class="container box box-primary">
  

    <div class="page-header  text-center">
      <h1>
       <i class="fa fa-newspaper-o"style="color:grey"></i>
       BOLSA_DE_TRABAJO <small>[Agregar Bolsa_de_trabajo]</small>
      </h1>
    </div>
  <div class="col-xs-12 col-md-8 col-md-offset-2 col-xl-6 col-xl-offset-3">
    @if (count($errors) > 0)
        @include('admin.partials.errors')
    @endif


     {!! Form::open(['route'=>'bolsa_de_trabajos.store','method' => 'POST','files' => true]) !!}

          <div class="form-group">
              <label for="nombre">Nombre:</label>
              {!! 
                  Form::text(
                      'nombre', 
                      null, 
                      array(
                         
                          'class'=>'form-control',
                          'placeholder' => 'Nombre de la bolsa_de_trabajo...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>


          <div class="form-group">
              <label for="nroregistro">Nroregistro:</label>
              {!! 
                  Form::text(
                      'nroregistro', 
                      null, 
                      array(
                         
                          'class'=>'form-control',
                          'placeholder' => 'Nroregistro de la bolsa_de_trabajo...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>

          <div class="form-group">
              <label for="email">Email:</label>
              {!! 
                  Form::text(
                      'email', 
                      null, 
                      array(
                         
                          'class'=>'form-control',
                          'placeholder' => 'Email de la bolsa_de_trabajo...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>

          <div class="form-group">
              <label for="telefono">Telefono:</label>
              {!! 
                  Form::text(
                      'telefono', 
                      null, 
                      array(
                         
                          'class'=>'form-control',
                          'placeholder' => 'Telefono de la bolsa_de_trabajo...',
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
          {!! Form::label('file','Agregar un archivo') !!}
          {!! Form::file('file')!!}
         </div>


         
         <div class="form-group">
              <label for="event_date">Fecha:</label>


							
<?php

date_default_timezone_set('America/La_Paz');
$fecha_actual=date("Y-m-d");

?>
<?= $fecha_actual?>
						
              {!! 
						
                  Form::date(
										'event_date', 
                      $fecha_actual
                  ) 
              !!}
          </div> 


          <div class="form-group">
              
              {!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
              <a href="{{ route('bolsa_de_trabajos.index') }}" class="btn btn-warning">Cancelar</a>
          </div>
      
      {!! Form::close() !!}
 </div>
</div>

@endsection

@section('js')
  <script>
    $('.textarea-content').trumbowyg();

  </script>
@endsection