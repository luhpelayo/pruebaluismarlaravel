@extends('admin.template')

@section('content')

 
  <div class="container box box-primary">
  

    <div class="page-header  text-center">
      <h1>
       <i class="fa fa-calendar"style="color:green"></i>
        Datos Estudiantes <small>[Agregar Registro]</small>
      </h1>
    </div>
  <div class="col-xs-12 col-md-8 col-md-offset-2 col-xl-6 col-xl-offset-3">
    @if (count($errors) > 0)
        @include('admin.partials.errors')
    @endif


     {!! Form::open(['route'=>'students.store','method' => 'POST','files' => true]) !!}

          <div class="form-group">
              <label for="dateReport">Año:</label>
              {!! 
                  Form::text(
                      'dateReport',
                      null, 
                      array(
                         
                          'class'=>'form-control',
                          'placeholder' => 'Año ...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>

          <div class="form-group">
              <label for="total">Total:</label>
              {!! 
                  Form::text(
                      'total',
                      null, 
                      array(
                          'class'=>'form-control',
                          'placeholder' => 'Cantidad de estudiantes...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>

         <div class="form-group">
           <label for="in">Nuevos Estudiantes:</label>
              {!! 
                  Form::text(
                      'in',
                      null, 
                      array(
                          'class'=>'form-control',
                          'placeholder' => 'Cantidad de alumnos nuevos...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>
          <div class="form-group">
              <label for="out">Egresados:</label>
              {!! 
                  Form::text(
                      'out',
                      null, 
                      array(
                          'class'=>'form-control',
                          'placeholder' => 'Cantidad de alumnos Egresados',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>
          <div class="form-group">
              <label for="active">Alumnos activos:</label>
              {!! 
                  Form::text(
                      'active',
                      null, 
                      array(
                          'class'=>'form-control',
                          'placeholder' => 'Cantidad de Alumnos Activos',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>

        <div class="form-group">
            <label for="inactive">Alumnos Inactivos:</label>
            {!!
                Form::text(
                    'inactive',
                    null,
                    array(
                        'class'=>'form-control',
                        'placeholder' => 'cantidad de alumnos Inactivos...',
                                      'autofocus' => 'autofocus'
                    )
                )
            !!}
        </div>

          <div class="form-group">
              
              {!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
              <a href="{{ route('students.index') }}" class="btn btn-warning">Cancelar</a>
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