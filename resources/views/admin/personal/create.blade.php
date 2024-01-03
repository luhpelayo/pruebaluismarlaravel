@extends('admin.template')

@section('content')
<div class="container box box-primary">
     <div class="page-header  text-center">
      <h1>
        <i class="fa fa-user"style="color:green"></i>
       REGISTRA PERSONAL<small></small>
      </h1>
    </div>
  <div class="col-xs-12 col-md-8 col-md-offset-2 col-xl-6 col-xl-offset-3">
    @if (count($errors) > 0)
        @include('admin.partials.errors')
    @endif

    {!! Form::open(['route'=>'personal.store','method' => 'POST','files' => true]) !!}
          
          <div class="form-group">
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

          <div class="form-group">
              <label for="apellido_paterno">Apellido Paterno:</label>
              {!! 
                  Form::text(
                      'apellido_paterno', 
                      null, 
                      array(
                          'class'=>'form-control',
                          'placeholder' => 'Ingrese apellido paterno...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>

          <div class="form-group">
              <label for="apellido_materno">Apellido Materno:</label>
              {!! 
                  Form::text(
                      'apellido_materno', 
                      null, 
                      array(
                          'class'=>'form-control',
                          'placeholder' => 'Ingrese apellido materno...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>
        
          <div class="form-group">
                <label for="telefono">Teléfono:</label>
                
                {!! 
                    Form::text(
                        'telefono', 
                        null, 
                        array(
                            'class' => 'form-control',
                            'placeholder' => 'Teléfono...',
                            'autofocus' => 'autofocus',
                            'maxlength' => '8', // Limitar a 8 dígitos
                        )
                    ) 
                !!}
            </div>

          <div class="form-group">
              <label for="ci">CI:</label>
              {!! 
                  Form::text(
                      'ci', 
                      null, 
                      array(
                          'class'=>'form-control',
                          'placeholder' => 'Ingrese ci...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>

          <div class="form-group">
             <label for="genero">Género:</label>
                 {!! 
                      Form::select(
                        'genero', 
                      ['' => 'Seleccione un género', 'masculino' => 'Masculino', 'femenino' => 'Femenino', 'no_decidido' => 'Prefiero no decir'], 
                      null, 
                      array(
                        'class' => 'form-control',
                        'placeholder' => 'Seleccione un género...',
                         'autofocus' => 'autofocus'
                          )
                    ) 
                !!}
        </div>


        <div class="form-group">
                <label for="estado_civil">Estado Civil:</label>
                 {!! 
                    Form::select(
                     'estado_civil', 
                     ['' => 'Seleccione un estado civil', 'casado' => 'Casado', 'soltero' => 'Soltero', 'divorciado' => 'Divorciado', 'viudo' => 'Viudo'], 
                         null, 
                         array(
                         'class' => 'form-control',
                         'placeholder' => 'Seleccione un estado civil...',
                      'autofocus' => 'autofocus'
                  )
                  ) 
             !!}
        </div>


          <div class="form-group">
              <label for="direccion">Direccion:</label>
              {!! 
                  Form::text(
                      'direccion', 
                      null, 
                      array(
                         
                          'class'=>'form-control',
                          'placeholder' => 'Direccion...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>


          
              <div class="form-group">
          {!! Form::label('img','Agregar una imagen') !!}
          {!! Form::file('img')!!}
         </div>

     
          <div class="row">
   <div class="col-md-12">
       
       </div>
</div>

</html>
      
          <div class="box-body col-xs-12">
         
              {!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
              <a href="{{ route('personal.index') }}" class="btn btn-warning">Cancelar</a>
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