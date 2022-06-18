@extends('admin.template')

@section('content')
<div class="container box box-primary">
     <div class="page-header  text-center">
      <h1>
        <i class="fa fa-map-marker"style="color:green"></i>
       REGISTRA EL DESAPARECIDO<small></small>
      </h1>
    </div>
  <div class="col-xs-12 col-md-8 col-md-offset-2 col-xl-6 col-xl-offset-3">
    @if (count($errors) > 0)
        @include('admin.partials.errors')
    @endif

    {!! Form::open(['route'=>'area.store','method' => 'POST','files' => true]) !!}
          
          <div class="form-group">
              <label for="description">Nombre:</label>
              {!! 
                  Form::text(
                      'descripcion', 
                      null, 
                      array(
                          'class'=>'form-control',
                          'placeholder' => 'Ingrese nombre...',
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
                          'placeholder' => 'Detalles del desaparecimiento...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>



          <div class="form-group"  id="lat">
              <label  for="lat">Latitud:</label>
             
              {!! 
                  Form::text(
                      'lat', 
                      null, 
                      array(
                         
                          'class'=>'form-control',
                          'placeholder' => 'Lat del ...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>
          <div>
  
          <div  class="form-group" id="lon">
              <label  for="lon">Longitud:</label>
             
              {!! 
                  Form::text(
                      'lon', 
                     null, 
                      array(
                         
                          'class'=>'form-control',
                          'placeholder' => 'Lon del ...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
              </div>

          
              <div class="form-group">
          {!! Form::label('img','Agregar una imagen') !!}
          {!! Form::file('img')!!}
         </div>
 <div class="row">
    <div class="form-group col-md-4"> lat
        <input type="text" id="latitud" class="form-control" value="lat"  >    
        </div>
        
        <div class="form-group col-md-4">lon
        <input type="text" id="longitud" class="form-control"  value="lon"  >     
        </div>
    </div>
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
         
              {!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
              <a href="{{ route('area.index') }}" class="btn btn-warning">Cancelar</a>
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