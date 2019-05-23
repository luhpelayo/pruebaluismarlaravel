@extends('admin.template')

@section('content')

 
  <div class="container box box-primary ">
  

    <div class="page-header  text-center">
      <h1>
       <i class="fa fa-newspaper-o"style="color:green"></i>
        NOTICIA <small>[Agregar Noticia]</small>
      </h1>
    </div>
  <div class="col-xs-12 col-md-8 col-md-offset-2 col-xl-6 col-xl-offset-3">
    @if (count($errors) > 0)
        @include('admin.partials.errors')
    @endif


     {!! Form::open(['route'=>'noticias.store','method' => 'POST','files' => true]) !!}

          <div class="form-group">
              <label for="title">Título:</label>
              {!! 
                  Form::text(
                      'title', 
                      null, 
                      array(
                         
                          'class'=>'form-control',
                          'placeholder' => 'Título del evento...',
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
          {!! Form::label('img','Agregar una imagen') !!}
          {!! Form::file('img')!!}
         </div>
         <div class="form-group">
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
          </div>
         <div class="form-group">
           <label for="auth">Autor:</label>
              {!! 
                  Form::text(
                      'auth', 
                      null, 
                      array(
                          'class'=>'form-control',
                          'placeholder' => 'Autor de la noticia... Puede dejarlo vacío si usted es el autor',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>

         <div class="form-group">
              
              {!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
              <a href="{{ route('noticias.index') }}" class="btn btn-warning">Cancelar</a>
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