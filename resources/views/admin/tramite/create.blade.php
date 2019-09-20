@extends('admin.template')

@section('content')



<div class="container box box-primary">

      <div class="page-header  text-center">
        <h1>
          <i class="fa fa-book"style="color:green"></i>
          TRAMITES <small>[Agregar Tramite]</small>
        </h1>
      </div>

   <div class="col-xs-12 col-md-8 col-md-offset-2 col-xl-6 col-xl-offset-3">
        @if (count($errors) > 0)
            @include('admin.partials.errors')
        @endif

      {!! Form::open(['route'=>'tramite.store','name'=>'tram']) !!}                 
      
          @include('admin.tramite.partials.form')

       {!! Form::close() !!}
    </div>
 </div>
@endsection
@section('js')
<script type="text/javascript">
  $(document).ready(function(){
   
    $("#proces").change(function(){
      var proceso = $(this).val();
      var req = document.getElementById('demos');
      $.get('requisito/'+proceso, function(data){

           $('#demos').empty();
           $.each(data,function(i, subcatlist){
           
              $('#demos').append('<input value="' + data[i].id + '" type="checkbox" required="required">' + data[i].descripcion + '&nbsp;</input>');
                req.style.display = 'block'; 
            });
           

      });
    });
    $("#SelectRecep").change(function(){
      var SelectRecep = $(this).val();
      var nro_oficio = document.getElementById('nro_oficio');
      var remitente = document.getElementById('remitente');
      var procedencia = document.getElementById('procedencia');
      var referencia = document.getElementById('referencia');
      var destinatario = document.getElementById('destinatario');
      var responsable = document.getElementById('responsable');
      var proc = document.getElementById('proc');
      var req = document.getElementById('demos');
      if(SelectRecep== 'Recibido'){
        
         nro_oficio.style.display = 'block';
         remitente.style.display = 'block';
         procedencia.style.display = 'block';
         referencia.style.display = 'block';
         destinatario.style.display = 'none';
         responsable.style.display = 'none';
         proc.style.display = 'block';
        
            
      }else if(SelectRecep == 'Despacho'){
    
         nro_oficio.style.display = 'block';
         remitente.style.display = 'none';
         procedencia.style.display = 'none';
         referencia.style.display = 'block';
         destinatario.style.display = 'block';
         responsable.style.display = 'block';
         proc.style.display = 'none';
         req.style.display = 'none'; 
      }
    });

  });
</script>
 @endsection

