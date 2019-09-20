@extends('admin.template')

@section('content')

<div class="row">  
  <div class="box box-primary col-xs-12">

        <div class="page-header  text-center">
           <h1>
           <i class="fa fa-newspaper-o"style="color:green"></i>
              Datos Estudiantes <small>[Editar datos]</small>
          </h1>
        </div><!-- /.box-header -->             
      <div class="col-xs-12 col-md-8 col-md-offset-2 col-xl-6 col-xl-offset-3">
        
        @if (count($errors) > 0)
            @include('admin.partials.errors')
        @endif
        
        {!! Form::model($student, array('route' => array('students.update', $student),'files' => true)) !!}

            <input type="hidden" name="_method" value="PUT">
             
           <div class="form-group">
              <label for="dateReport">Año:</label>
              {!! 
                  Form::text(
                      'dateReport',
                      null, 
                      array(
                         
                          'class'=>'form-control',
                          'placeholder' => 'Año...',
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
                          'placeholder'=>'cantidad total de estudiantes',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>
         <div class="form-group">
           <label for="in">Estudiantes Nuevos:</label>
              {!! 
                  Form::text(
                      'in',
                      null, 
                      array(
                          'class'=>'form-control',
                          'placeholder' => 'cantidad de nuevos estudiantes...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>
          <div class="form-group">
              <label for="out">Estudiantes Egresados:</label>
              {!! 
                  Form::text(
                      'out',
                      null, 
                      array(
                          'class'=>'form-control',
                          'placeholder' => 'Estudiantes Egresados...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div> 
          <div class="form-group">
              <label for="active">Estudiantes Activos:</label>
              {!! 
                  Form::text(
                      'active',
                      null, 
                      array(
                          'class'=>'form-control',
                          'placeholder' => 'Estudiantes Activos...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>
            <div class="form-group">
                <label for="inactive">Estudiantes Inactivos:</label>
                {!!
                    Form::text(
                        'inactive',
                        null,
                        array(
                            'class'=>'form-control',
                            'placeholder' => 'Estudiantes Inactivos...',
                                          'autofocus' => 'autofocus'
                        )
                    )
                !!}
            </div>
            
            <div class="box-body col-xs-12">
                {!! Form::submit('Actualizar', array('class'=>'btn btn-primary')) !!}
                <a href="{{ route('students.index') }}" class="btn btn-warning">Cancelar</a>
            </div>
        
        {!! Form::close() !!}
        
    </div>  
  </div>


</div> <!-- end row -->
@stop
@section('js')

  <script>
    $('.textarea-content').trumbowyg();

  </script>
@endsection