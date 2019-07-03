@extends('admin.template')

@section('content')

<div class="row">  
  <div class="box box-primary col-xs-12">

        <div class="page-header  text-center">
           <h1>
           <i class="fa fa-newspaper-o"style="color:green"></i>
              CRONOGRAMA <small>[Editar Cronograma]</small>
          </h1>
        </div><!-- /.box-header -->             
      <div class="col-xs-12 col-md-8 col-md-offset-2 col-xl-6 col-xl-offset-3">
        
        @if (count($errors) > 0)
            @include('admin.partials.errors')
        @endif
        
        {!! Form::model($cronograma, array('route' => array('cronogramas.update', $cronograma),'files' => true)) !!}

            <input type="hidden" name="_method" value="PUT">
             
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
              {!! 
                  Form::date(
                      'cronog_date', 
                      null, 
                      array(
                          'class'=>'form-control',
                          'placeholder'=>'2012-12-12',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>
          <div class="form-group">
          {!! Form::label('file','Agregar un archivo') !!}

                 @if(isset($cronograma->url_document))
                    <p>
                      <a  >{{ $cronograma->url_document }}</a>
                    </p>

                  @endif

          {!! Form::file('file')!!}
         </div>

          <div class="form-group">
          {!! Form::label('img','Agregar una imagen') !!}
              @if (isset($cronograma->url_img))
                 <a class="" href="{{ $cronograma->url_img }}">
                  <img src="{{ asset('images/cronogramas/'.$cronograma->url_img) }}" class="img-responsive" alt="" height="120" width="120" />
                  </a><br/>
                @else
                  <p>No image</p>
                @endif

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
            
            <div class="box-body col-xs-12">
                {!! Form::submit('Actualizar', array('class'=>'btn btn-primary')) !!}
                <a href="{{ route('cronogramas.index') }}" class="btn btn-warning">Cancelar</a>
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