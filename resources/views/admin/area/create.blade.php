@extends('admin.template')

@section('content')
<div class="container box box-primary">
     <div class="page-header  text-center">
      <h1>
        <i class="fa fa-map-marker"style="color:green"></i>
       REGISTRA TU SALON<small></small>
      </h1>
    </div>
  <div class="col-xs-12 col-md-8 col-md-offset-2 col-xl-6 col-xl-offset-3">
    @if (count($errors) > 0)
        @include('admin.partials.errors')
    @endif
    
      {!! Form::open(['route'=>'area.store']) !!}
          
          <div class="form-group">
              <label for="description">Nombre del Salon:</label>
              {!! 
                  Form::text(
                      'descripcion', 
                      null, 
                      array(
                          'class'=>'form-control',
                          'placeholder' => 'Ingrese descripción...',
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
          <div class="box-body col-xs-12">
              <label for="email">Ubicacion Actual(lat, lon):</label>
              <h2>{{ $geoip }}</h2>
          </div>
          <div class="box-body col-xs-12">
              {!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
              <a href="{{ route('area.index') }}" class="btn btn-warning">Cancelar</a>
          </div>
      
      {!! Form::close() !!}
 </div>
</div>

@stop