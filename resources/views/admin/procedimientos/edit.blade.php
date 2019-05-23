@extends('admin.template')

@section('content')

<div class="container box box-primary">
  
        <div class="page-header  text-center">
           <h1>
            <i class="fa fa-toggle-on"style="color:green"></i>
              PERMISOS <small>[Editar Permiso]</small>
          </h1>
        </div><!-- /.box-header -->             
    <div class="col-xs-12 col-md-8 col-md-offset-2 col-xl-6 col-xl-offset-3">
        
        @if (count($errors) > 0)
            @include('admin.partials.errors')
        @endif
        
        {!! Form::model($procedimiento, array('route' => array('procedimientos.update', $procedimiento),'files' => true)) !!}

            <input type="hidden" name="_method" value="PUT">
             
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
          {!! Form::label('img','Agregar una imagen') !!}
              @if (isset($procedimiento->url_img))
                 <a class="" href="{{ $procedimiento->url_img }}">
                  <img src="{{ asset('images/procedimientos/'.$procedimiento->url_img) }}" class="img-responsive" alt="" height="120" width="120" />
                  </a><br/>
                @else
                  <p>No image</p>
                @endif

         {!! Form::file('img')!!}
         </div>
          <div class="form-group">
          {!! Form::label('file','Agregar un archivo') !!}

                 @if(isset($procedimiento->url_document))
                    <p>
                      <a  >{{ $procedimiento->url_document }}</a>
                    </p>

                  @endif

          {!! Form::file('file')!!}
         </div>

         <div class="form-group">
              
              {!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
              <a href="{{ route('procedimientos.index') }}" class="btn btn-warning">Cancelar</a>
          </div>

        
        
        {!! Form::close() !!}
        
    </div>  

</div> <!-- end row -->
@endsection

@section('js')
  <script>
    $('.textarea-content').trumbowyg();

  </script>
@endsection