@extends('store.template')

@section('content')
 
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">


<div style="background-color: #2e3841">
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
	<div class="row">
		<div id="col-container-noticias" class="col-xs-12">
			<?php $contadorNoticias= 0 ?>
			@if(isset($noticias) && count($noticias) > 0)
				@foreach ($noticias as $noticia)
					<div class="col-xs-12 col-sm-8"  >
						<div class="panel panel-default resizable-col-events">
						  	<div class="panel-body resizable-panel">
									@if(isset($noticia->url_img))
						    		<img class="img-responsive " src="images/noticias/{{$noticia->url_img}}">
									@endif
						    	<br>
						    	<h3>{{ $noticia->title }}</h3>
						    	<div class="divider-sm-color pull-left"></div>
						    	<br>
							  	<p class="text-justify">
										{!! $noticia->content !!}
									</p>
									@if(isset($noticia->url_document))
										<p>
											<a class="download_file" href="{{ asset('/file/getNoticia/'.$noticia->url_document)}}" target="_blank"><i class="fa fa-download" aria-hidden="true"></i><span>&nbsp;{{ $noticia->url_document }}</span></a>
										</p>

									@endif
								<i>Fecha {{ $noticia->updated_at }} | Por: {{ $noticia->auth }} </i>
								<br><br>
						  	</div>
						</div>
						<a class="show-more-link col-xs-12 hide" data-active="false"><h6 >Mostrar más <i class="fa fa-angle-double-down" aria-hidden="true"></i></h6></a>
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
	<br><br>
	<br><br>
	<br><br>
	</div>
</div>
@stop

  	<script src="{{ asset('js/js_resources/jquery-1.12.3.min.js') }}"></script>
	<script src="{{ asset('js/script.js') }}"></script>
