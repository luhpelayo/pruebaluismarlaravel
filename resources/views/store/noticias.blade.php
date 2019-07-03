@extends('store.template')

@section('content')

 
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">


<div style="background-color: #FFFFFF">
	<div class="container" style="-webkit-box-shadow: 0px 0px 32px -2px rgba(0,0,0,0.08);
-moz-box-shadow: 0px 0px 32px -2px rgba(0,0,0,0.08);
box-shadow: 0px 0px 32px -2px rgba(0,0,0,0.08); background-color: #FFF">
	<div class="row">
		<div class="col-xs-12">
			<h3>Noticias recientes</h3>
			<div class="divider-md pull-left"></div>
		</div>
	</div>
	<br>



	<div class="feature_row row">
		<div id="-noticias" class="col-xs-12">
			<?php $contadorNoticias= 0 ?>
			@if(isset($noticias) && count($noticias) > 0)
				@foreach ($noticias as $noticia)
					<div class="col-xs-12 col-sm-12"  >
						<div class="panel panel-default resizable-col-events">
						  	<div class="panel-body resizable-panel">
									@if(isset($noticia->url_img))
									<div class="col-md-6 feature_img">
									<div class="zoom">
						    		<img class="img-responsive " src="images/noticias/{{$noticia->url_img}}"  style="padding: 10px;"  alt="" height="400" width="400" >
									</div>
									</div>
									@endif
						    	<br>
								<div class="media-body">
						    	<a href="{{ route('noticia',$noticia->id)}}" target="_blank" >{{ $noticia->title }}</a>
								<p class="text-justify">
										{!! $noticia->precontent !!}
										<button  style="background-color: #339CFF" class="btn btn-danger">
                                     <a href="{{ route('noticia',$noticia->id)}}" target="_blank" class="blancotext">LEER MAS</a>
                                    </button>
									</p>  
								
									<i>Fecha {{ $noticia->updated_at }} | Por: {{ $noticia->auth }} </i>
								
									</div>
						    	<div class="divider-sm-color pull-left"></div>
						    	<br>
							  
									@if(isset($noticia->url_document))
										<p>
											<a class="download_file" href="{{ asset('/file/getNoticia/'.$noticia->url_document)}}" target="_blank"><i class="fa fa-download" aria-hidden="true"></i><span>&nbsp;{{ $noticia->url_document }}</span></a>
										</p>

									@endif
								
								<br><br>
						  	</div>
						</div>
				        <!-- <a class="show-more-link col-xs-12 hide" data-active="false"><h6 >Mostrar más <i class="fa fa-angle-double-down" aria-hidden="true"></i></h6></a> -->
					</div>
					<?php $contadorNoticias++ ?>
					@if(($contadorNoticias % 3) === 0)
						<div class="clearfix"></div>
					@endif
				@endforeach
			@else
				<div class="panel-body">
					<h1 class="text-center">No hay noticias</h1>
				</div>
				<div class="bloque"></div>
			@endif
		</div>
		</div>
		<div class="row">
			<div class="col-xs-12 text-center">
				<nav>
					{!! $noticias->render() !!}
				</nav>
			</div>
		</div>

		<div id="eventDetails" class="row" style="display:none;">
					<div class="col-xs-12">
					  <div class="col-xs-12">
							<div id="event_Exit">
								<p>
									<i class="fa fa-chevron-left" aria-hidden="true"></i><span>&nbsp;&nbsp;Volver</span>
								</p>
							</div>
					    <div class="panel panel-default">
					      <div class="panel-body">
					        <h3 id="eventTitle"></h3>
					        <div class="divider-sm-color pull-left"></div>
					        </h2>
					        <br>
									<i id="eventInfo"></i><br>
									<br>
							
									<p id="eventDocument">
										<a class="download_file hide" href="" target="_blank"><i class="fa fa-download" aria-hidden="true"></i><span>&nbsp;</span></a>
									</p>

                                    <p id="eventDocument">
										<a class="download_file hide" href="" target="_blank"><i class="fa fa-download" aria-hidden="true"></i><span>&nbsp;</span></a>
									</p>

					      </div>
								
					    </div>
							
					  </div>
						
					</div>
					
				</div>
	
	<br><br>
	<br><br>
	<br><br>
	</div>
</div>
		

@stop

  	<script src="{{ asset('js/js_resources/jquery-1.12.3.min.js') }}"></script>
	<script src="{{ asset('js/script.js') }}"></script>