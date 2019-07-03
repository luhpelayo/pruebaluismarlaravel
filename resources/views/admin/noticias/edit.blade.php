@extends('admin.template')

@section('content')

<div class="row">  
  <div class="box box-primary col-xs-12">

        <div class="page-header  text-center">
           <h1>
           <i class="fa fa-newspaper-o"style="color:green"></i>
              NOTICIAS <small>[Editar Noticia]</small>
          </h1>
        </div><!-- /.box-header -->             
      <div class="col-xs-12 col-md-8 col-md-offset-2 col-xl-6 col-xl-offset-3">
        
        @if (count($errors) > 0)
            @include('admin.partials.errors')
        @endif
        
        {!! Form::model($noticia, array('route' => array('noticias.update', $noticia),'files' => true)) !!}

            <input type="hidden" name="_method" value="PUT">
             
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

                 @if(isset($noticia->url_document))
                    <p>
                      <a  >{{ $noticia->url_document }}</a>
                    </p>

                  @endif

          {!! Form::file('file')!!}
         </div>

          <div class="form-group">
          {!! Form::label('img','Agregar una imagen') !!}
              @if (isset($noticia->url_img))
                 <a class="" href="{{ $noticia->url_img }}">
                  <img src="{{ asset('images/noticias/'.$noticia->url_img) }}" class="img-responsive" alt="" height="120" width="120" />
                  </a><br/>
                @else
                  <p>No image</p>
                @endif

         {!! Form::file('img')!!}
         </div>

         <div class="form-group">
           <label for="content">PreContenido:</label>
              {!! 
                  Form::textarea(
                      'precontent', 
                      null, 
                      array(
                          'class'=>'form-control textarea-content',
                          'placeholder' => 'Pre-Contenido del artículo...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
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
            
            <div class="box-body col-xs-12">
                {!! Form::submit('Actualizar', array('class'=>'btn btn-primary')) !!}
                <a href="{{ route('noticias.index') }}" class="btn btn-warning">Cancelar</a>
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