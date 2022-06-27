@extends('admin.template')

@section('content')

<div class="container box box-primary">  
 
        <div class="page-header  text-center">
           <h1>
            <i class="fa fa-university"style="color:green"></i>
              AERAS DE DESAPARECIDOS<small>[Editar]</small>
          </h1>
        </div><!-- /.box-header -->             
    <div class="col-xs-12 col-md-8 col-md-offset-2 col-xl-6 col-xl-offset-3">
        
        @if (count($errors) > 0)
            @include('admin.partials.errors')
        @endif
        {!! Form::model($area, array('route' => array('area.update', $area),'files' => true)) !!}
       
       
            <input type="hidden" name="_method" value="PUT">
             
            <div class="form-group">
                <label for="descripcion">Nombre:</label>
                
                {!! 
                    Form::text(
                        'descripcion', 
                        null, 
                        array(
                            'class'=>'form-control',
                            'placeholder' => 'nombre...',
                            'autofocus' => 'autofocus'
                        )
                    ) 
                !!}
            </div>
            <div class="form-group">
              <label for="direccion">Detalles:</label>
              {!! 
                  Form::text(
                      'direccion', 
                      null, 
                      array(
                         
                          'class'=>'form-control',
                          'placeholder' => 'Detalles...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>
          <div class="form-group">
              <label for="lat">Latitud:</label>
              {!! 
                  Form::text(
                      'lat', 
                      null, 
                      array(
                         
                          'class'=>'form-control',
                          'value' => 'lat',
                          'id' => 'latitud',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>
          <div class="form-group">
              <label for="lon">Longitud:</label>
              {!! 
                  Form::text(
                      'lon', 
                      null, 
                      array(
                         
                          'class'=>'form-control',
                          'value' => 'lon',
                          'id' => 'longitud',
                         
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>


          <div class="form-group">
          {!! Form::label('img','Agregar una imagen') !!}
              @if (isset($area->url_img))
                 <a class="" href="{{ $area->url_img }}">
                  <img src="{{ asset($area->url_img) }}" class="img-responsive" alt="" height="120" width="120" />
                  </a><br/>
                @else
                  <p>No image</p>
                @endif

         {!! Form::file('img')!!}
         </div>
         <div class="row">
   <div class="col-md-12">
       <div id="mapa" style="width: 100%; height: 580px;"></div>
       </div>
</div>




<script>







   function iniciarMapa(){
       var latitud=-17.8821637;
       var longitud=-63.0916493;
coordenadas = {
    lng: longitud,
    lat: latitud
}
generarMapa(coordenadas);
}

function generarMapa(coordenadas){
    var mapa=new google.maps.Map(document.getElementById('mapa'),
{
        zoom: 17,
        center: new google.maps.LatLng(coordenadas.lat, coordenadas.lng)
    });

marcador= new google.maps.Marker({
  
    map : mapa ,
    draggable: true,
    position: new google.maps.LatLng(coordenadas.lat, coordenadas.lng)
});
  marcador.addListener('dragend', function(event){
      document.getElementById("latitud").value= this.getPosition().lat();
      document.getElementById("longitud").value= this.getPosition().lng();

  })
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjumTanlDl4uX5ZwPT_qbB11NoFjRcZCY&callback=iniciarMapa"></script>
</html>
      


            <div class="box-body col-xs-12">
                {!! Form::submit('Actualizar', array('class'=>'btn btn-primary')) !!}
                <a href="{{ route('area.index') }}" class="btn btn-warning">Cancelar</a>
            </div>
        
        {!! Form::close() !!}
        
    </div>  
  </div>
 
@stop
@section('js')

  <script>
    $('.textarea-content').trumbowyg();

  </script>
@endsection
