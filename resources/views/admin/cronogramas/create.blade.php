@extends('admin.template')

@section('content')

 
  <div class="container box box-primary">
  

    <div class="page-header  text-center">
      <h1>
       <i class="fa fa-calendar"style="color:green"></i>
        CRONOGRAMA <small>[Agregar Cronograma]</small>
      </h1>
    </div>
  <div class="col-xs-12 col-md-8 col-md-offset-2 col-xl-6 col-xl-offset-3">
    @if (count($errors) > 0)
        @include('admin.partials.errors')
    @endif


     {!! Form::open(['route'=>'cronogramas.store','method' => 'POST','files' => true]) !!}

          <div class="form-group">
              <label for="title">Título:</label>
              {!! 
                  Form::text(
                      'title', 
                      null, 
                      array(
                         
                          'class'=>'form-control',
                          'placeholder' => 'Título del cronograma...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>

          <div class="form-group">
              <label for="cronog_date">Fecha:</label>
              <?php

date_default_timezone_set('America/La_Paz');
$fecha_actual=date("Y-m-d");

?>
<?= $fecha_actual?>


<!-- 
              {!! 
                  Form::date(
                      'cronog_date', 
                      null, 
                      array(
                          'class'=>'form-control',
                          'placeholder' => 'Título del cronograma...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!} -->
          </div>

          <div class="form-group">
          {!! Form::label('file','Agregar un archivo') !!}
          {!! Form::file('file')!!}
         </div>

          <div class="form-group">
          {!! Form::label('img','Agregar una imagen') !!}
          {!! Form::file('img')!!}
         </div>
         <!-- <div class="form-group">
           <label for="content">Contenido:</label>
              {!! 
                  Form::textarea(
                      'content', 
                      null, 
                      array(
                          'class'=>'form-control textarea-content',
                          'placeholder' => 'Contenido del artículo...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div> -->
          <div class="form-group">
              <label for="lugar">Tipo de Archivo:</label>
              {!! 
                  Form::text(
                      'lugar', 
                      null, 
                      array(
                          'class'=>'form-control',
                          'placeholder' => 'Lugar del cronograma...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>
          <!-- <div class="form-group">
              <label for="org">Organizador:</label>
              {!! 
                  Form::text(
                      'org', 
                      null, 
                      array(
                          'class'=>'form-control',
                          'placeholder' => 'Organizador del cronograma...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div> -->

          <div class="form-group">
              
              {!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
              <a href="{{ route('cronogramas.index') }}" class="btn btn-warning">Cancelar</a>
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