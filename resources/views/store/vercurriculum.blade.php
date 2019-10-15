@extends('store.templatePublic')

@section('content')

<div style="background-color: #ffffff">
	<div class="container" style="-webkit-box-shadow: 0px 0px 32px -2px rgba(0,0,0,0.08);
-moz-box-shadow: 0px 0px 32px -2px rgba(0,0,0,0.08);
box-shadow: 0px 0px 32px -2px rgba(0,0,0,0.08); background-color: #FFF">
	<div class="row">
		<div class="col-xs-12">
		
			<div class="divider-md pull-left"></div>
		</div>
	</div>
	<br>
	<div class="row">
		<div id="col-container-noticias" class="col-xs-12">
			
			<div class="col-xs-12 col-sm-12">
            
				<div class="panel panel-default resizable-col-events">
                
				  	<div class="panel-body resizable-panel">
				
                        <h3>POSTULANTE</h3>
				    
						<h3>{{ $bolsa_de_empleo->nombre }}</h3>
                      
				    	<div class="divider-sm-color pull-left"></div>
				    	<br>
						<strong>Genero:</strong> 
					  	<p class="text-justify">
							{!! $bolsa_de_empleo->genero !!}
					    </p>
						<strong>Año de Graduacion:</strong> 
                        <p class="text-justify">
							{!! $bolsa_de_empleo->anho_de_graduacion !!}
					    </p>
					
						<strong>Años de experiencia:</strong> 
					  	<p class="text-justify">
							{!! $bolsa_de_empleo->anhos_de_experiencia !!}
					    </p>
						<strong>Paquetes Informaticos:</strong> 
					  	<p class="text-justify">
							{!! $bolsa_de_empleo->paquetes_informaticos !!}
					    </p>
						<strong>Ingles:</strong> 
					  	<p class="text-justify">
							{!! $bolsa_de_empleo->ingles !!}
					    </p><strong>Maestrias:</strong> 
					  	<p class="text-justify">
							{!! $bolsa_de_empleo->maestrias !!}
					    </p>
						<strong>Postgrado:</strong> 
					  	<p class="text-justify">
							{!! $bolsa_de_empleo->postgrado !!}
					    </p>
						<strong>Email:</strong> 
					  	<p class="text-justify">
							{!! $bolsa_de_empleo->email !!}
					    </p>
						<strong>Telefono:</strong> 
					  	<p class="text-justify">
							{!! $bolsa_de_empleo->telefono !!}
					    </p>

                        <td>
            
                <a class="btn btn-primary" class="download_file" href="{{ asset('/file/getBolsa_de_trabajo/'.$bolsa_de_empleo->curriculum) }}" target="_blank"><i class="fa fa-download" aria-hidden="true"></i><span>&nbsp;</span>Curriculum
                    <i ></i>
                </a>
            </td>

	
						<br>
						<a href="{{ route('bolsa_de_trabajos') }}">VOLVER A LA PAGINA ANTERIOR</a>
						<br>
				  	</div>
				</div>
				<a class="show-more-link col-xs-12 hide" data-active="false"><h6 >Mostrar más <i class="fa fa-angle-double-down" aria-hidden="true"></i></h6></a>
			</div>	
					
		</div>
	</div>
	<br><br>
	<br><br>
	<br><br>
	</div>
</div>

@stop
