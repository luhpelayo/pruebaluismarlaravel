@extends('store.templatePublic')

@section('content')

<div style="background-color: #ffffff">
	<div class="container" style="-webkit-box-shadow: 0px 0px 32px -2px rgba(0,0,0,0.08);
-moz-box-shadow: 0px 0px 32px -2px rgba(0,0,0,0.08);
box-shadow: 0px 0px 32px -2px rgba(0,0,0,0.08); background-color: #FFF">
	<div class="row">
		<div class="col-xs-12">
			<h3>Promo</h3>
			<div class="divider-md pull-left"></div>
		</div>
	</div>
	<br>
	<div class="row">
		<div id="col-container-noticias" class="col-xs-12">
			
			<div class="col-xs-12 col-sm-12">
				<div class="panel panel-default resizable-col-events">
				  	<div class="panel-body resizable-panel">
				
                        <br>
					    @if(isset($unanoti->url_img))
						<img class="img-responsive" src="{{ asset('images/noticias/'.$unanoti->url_img) }}">
						@endif
						<br>
				    	<h3>{{ $unanoti->title }}</h3>
                        <h2>{!! $unanoti->precontent !!}</h2>
				    	<div class="divider-sm-color pull-left"></div>
				    	<br>
					  	<p class="text-justify">
							{!! $unanoti->content !!}
					    </p>
						<div class="divider-sm-color pull-left"></div>
						    	<br>
							  
									@if(isset($unanoti->url_document))
										<p>
											<a class="download_file" href="{{ asset('/file/getNoticia/'.$unanoti->url_document)}}" target="_blank"><i class="fa fa-download" aria-hidden="true"></i><span>&nbsp;{{ $unanoti->url_document }}</span></a>
										</p>

									@endif
								
								<br><br>
						<i>Fecha {{ $unanoti->updated_at }} | Por: {{ $unanoti->auth }} </i>
						<br>
						<a href="{{ route('noticias') }}">VER PROMOS</a>
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
