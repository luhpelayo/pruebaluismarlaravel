@extends('admin.template')

@section('content')

<div class="row">  
  <div class="box box-primary col-xs-12">

        <div class="page-header  text-center">
           <h1>
           <i class="fa fa-newspaper-o"style="color:green"></i>
              SOLICITUD <small>[Editar Cronograma]</small>
          </h1>
        </div><!-- /.box-header -->             
      <div class="col-xs-12 col-md-8 col-md-offset-2 col-xl-6 col-xl-offset-3">
        
        @if (count($errors) > 0)
            @include('admin.partials.errors')
        @endif
        
        {!! Form::model($solicitante, array('route' => array('solicitantes.update', $solicitante),'files' => true)) !!}

            <input type="hidden" name="_method" value="PUT">
             
           <div class="form-group">
              <label for="nombre">Nombre:</label>
              {!! 
                  Form::text(
                      'nombre', 
                      null, 
                      array(
                         
                          'class'=>'form-control',
                          'placeholder' => 'Nombre del solicitante...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>
         

          <div class="form-group">
              <label for="apellido">Apellido:</label>
              {!! 
                  Form::text(
                      'apellido', 
                      null, 
                      array(
                         
                          'class'=>'form-control',
                          'placeholder' => 'Apellido del solicitante...',
                                        'autofocus' => 'autofocus'
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
                          'placeholder' => 'CI del solicitante...',
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
                          'placeholder' => 'Telefono del solicitante...',
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
                          'placeholder' => 'Direccion del solicitante...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>
          <div class="form-group">
              <label for="lat">Lat:</label>
              {!! 
                  Form::text(
                      'lat', 
                      null, 
                      array(
                         
                          'class'=>'form-control',
                          'placeholder' => 'Lat del solicitante...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>
          <div class="form-group">
              <label for="lon">Lon:</label>
              {!! 
                  Form::text(
                      'lon', 
                      null, 
                      array(
                         
                          'class'=>'form-control',
                          'placeholder' => 'Lon del solicitante...',
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
                          'placeholder' => 'Email del solicitante...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>
          <div class="form-group">
              <label for="email">Precio:</label>
              {!! 
                  Form::text(
                      'precio', 
                      null, 
                      array(
                         
                          'class'=>'form-control',
                          'placeholder' => 'Precio del solicitante...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>

          <div class="form-group">
          {!! Form::label('img','Agregar una imagen') !!}
              @if (isset($solicitante->url_img))
                 <a class="" href="{{ $solicitante->url_img }}">
                  <img src="{{ asset($solicitante->url_img) }}" class="img-responsive" alt="" height="120" width="120" />
                  </a><br/>
                @else
                  <p>No image</p>
                @endif

         {!! Form::file('img')!!}
         </div>
     
            
            <div class="box-body col-xs-12">
                {!! Form::submit('Actualizar', array('class'=>'btn btn-primary')) !!}
                <a href="{{ route('solicitantes.index') }}" class="btn btn-warning">Cancelar</a>
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