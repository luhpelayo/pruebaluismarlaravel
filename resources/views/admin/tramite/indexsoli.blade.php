@extends('admin.template')

@section('content')

<div class="container box box-primary">  

        <div class="page-header  text-center">
           <h1>
           <i class="fa fa-user-secret"style="color:green"></i>
              DETALLES DEL ORDEN DE TRABAJO <small></small>
          </h1>
        </div><!-- /.box-header -->             
    <div class="page">
        
        @if (count($errors) > 0)
            @include('admin.partials.errors')
        @endif
        {!! Form::model($solicitante, array('route' => array('solicitante.update', $solicitante))) !!}

       

            <input type="hidden" name="_method" value="PUT">
             
        
            <div class="form-group col-xs-6">
              <label for="nombre">Nombre:</label>
              <h2>{{ $solicitante->nombre }}</h2>
          </div>
          <div class="form-group col-xs-6">
              <label for="apellido">Apellido:</label>
                <h2>{{ $solicitante->apellido }}</h2>
          </div>
          <div class="form-group col-xs-6">
                <label for="ci">C.I.:</label>
                <h2>{{ $solicitante->id }}</h2>
            </div>
          <div class="form-group col-xs-6">
              <label for="telefono">Telefono:</label>
              <h2>{{ $solicitante->telefono }}</h2>
          </div>
      
          <div class="form-group col-xs-6">
              <label for="lat">Lat:</label>
              <h2>{{ $solicitante->lat }}</h2>
          </div>
          <div class="form-group col-xs-6">
              <label for="Lon">Lon:</label>
              <h2>{{ $solicitante->lon }}</h2>
          </div>
          <div class="form-group col-xs-6">
              <label for="lat">GPS LACTIUD Y LONGITUD ACtUAL:</label>
              <h2>{{ $solicitante->lat }} , {{ $solicitante->lon }}</h2>
          </div>
          <div class="form-group col-xs-6">
              <label for="direccion">Direccion:</label>
              <h2>{{ $solicitante->direccion }}</h2>
          </div>
     
       
          <div class="box-body col-xs-12">
              <label for="email">Email:</label>
              <h2>{{ $solicitante->email }}</h2>
          </div>
       

            <div class="box-body col-xs-12">
                {!! Form::submit('Actualizar', array('class'=>'btn btn-primary')) !!}
                <a href="{{ $urlmaps }}" target="_blank" class="btn btn-warning">VER MAPA</a>
            </div>
        
        {!! Form::close() !!}
        
    </div>  
  </div>

@stop