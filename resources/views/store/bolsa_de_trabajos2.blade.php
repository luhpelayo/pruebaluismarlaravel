@extends('store.templatePublic')
@section('content')
@include('store.informativa.layouts.headContentEventos')


		<div style="background-color: #FFFFFF">

		



			<div class="container" style="-webkit-box-shadow: 0px 0px 32px -2px rgba(0,0,0,0.08); -moz-box-shadow: 0px 0px 32px -2px rgba(0,0,0,0.08); box-shadow: 0px 0px 32px -2px rgba(0,0,0,0.08); background-color: #FFF">
				





			<div class="box box-primary">
<div class="page-header text-center">
    <h1>
        {{--<i class="fa fa-newspaper-o"style="color:green"></i>--}}
        BOLSA DE EMPLEO <a href="{{ route('crearcurriculum') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Enviar</a>
    </h1>
</div>
    <div class="fb-share-button" data-href="http://financiera.test:81/eventos" data-layout="button_count" data-size="small">
      
    </div>
<div class="box-body">              
@if(isset($bolsa_de_trabajos) && count($bolsa_de_trabajos) > 0)
 <table class="table table-bordered table-hover"  id="dataTable_bolsa_de_trabajos">

        <thead>
            <tr>
                <th>Nombre</th>
                <th>Año de Graduacion</th>
                <th>genero</th>  
                <th>anhos_de_experiencia</th>  
                <th>paquetes_informaticos</th>  
                <th>ingles</th>  
                <th>maestrias</th>  
                <th>postgrado</th>  
                <th>Email</th>          
                <th>Telefono</th>
                <th>Fecha</th>        
                <th width="10%">Acciónes </th>
            </tr>
        </thead>         
   <tbody>
   

   
    @foreach($bolsa_de_trabajos as $bolsa_de_trabajo)
         <tr>  
             <td>{{ $bolsa_de_trabajo->nombre }}</td>
           
          
             <td>{{ $bolsa_de_trabajo->anho_de_graduacion }}</td>
             <td>{{ $bolsa_de_trabajo->genero }}</td>
             <td>{{ $bolsa_de_trabajo->anhos_de_experiencia }}</td>
             <td>{{ $bolsa_de_trabajo->paquetes_informaticos }}</td>
             <td>{{ $bolsa_de_trabajo->ingles }}</td>
             <td>{{ $bolsa_de_trabajo->maestrias }}</td>
             <td>{{ $bolsa_de_trabajo->postgrado }}</td>

             
             <td>{{ $bolsa_de_trabajo->email }}</td>
             <td>{{ $bolsa_de_trabajo->telefono }}</td>
             <td>{{ $bolsa_de_trabajo->event_date }}</td>
             <td>
             <a class="btn btn-primary" class="download_file" href="{{ route('bolsa_de_trabajo',$bolsa_de_trabajo->id)}}"  target="_blank"><span>&nbsp;</span>Ver
                    <i class="fa fa-pencil-square"></i>
                </a>
                <a class="btn btn-primary" class="download_file" href="{{ asset('/file/getBolsa_de_trabajo/'.$bolsa_de_trabajo->curriculum) }}" target="_blank"><i class="fa fa-download" aria-hidden="true"></i><span>&nbsp;</span>Descargar
                    <i class="fa fa-pencil-square"></i>
                </a>
            </td>


        </tr>
      @endforeach
      @else
								<h1 class="text-center" >No hay Postulantes </h1>
						
						@endif
    </tbody>
   </table>
   
</div> 
</div>    









				<br><br>
				<br><br>
				<br><br>
			</div>
		</div>
		

		

                                 
        
		<script type="text/javascript">
			loadEvents(<?php echo json_encode($bolsa_de_trabajosAll); ?>);
		</script>		
@stop
@section('js')
     <script>
        // dataTable
        $(document).ready(function() {
            $('#dataTable_bolsa_de_trabajos').DataTable({
                //responsive: true,
                //scrollX: true,
                pageLength: 10,
                order: [[ 0, "desc" ]],
                lengthMenu: [ 2, 4, 10, 20, 50 ],
                columnDefs: [
                    { "orderable": false, "targets": 6 }
                ]
            });
        });
    </script>
 @endsection