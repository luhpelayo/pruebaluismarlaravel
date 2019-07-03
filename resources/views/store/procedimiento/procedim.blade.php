@extends('store.template')

@section('content')
<div style="background-color: #FFFFF">
	<div class="container" style="-webkit-box-shadow: 0px 0px 32px -2px rgba(0,0,0,0.08);
-moz-box-shadow: 0px 0px 32px -2px rgba(0,0,0,0.08);
box-shadow: 0px 0px 32px -2px rgba(0,0,0,0.08); background-color: #FFF">
	<div class="row">
		<div class="col-xs-12">
			<h3>Procedimientos</h3>
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
				    	<h3>{{ $procedimientos->nombre }}</h3>
				    	<div class="divider-sm-color pull-left"></div>
				    	<br>
					  	<p class="text-justify">
							{!! $procedimientos->content !!}
							</p>
							@if(isset($procedimientos->url_document))
								<p>
									<a class="download_file" href="{{ asset('/file/getProce/'.$procedimientos->url_document)}}" target="_blank"><i class="fa fa-download" aria-hidden="true"></i><span>&nbsp;{{ $procedimientos->url_document }}</span></a>
								</p>

							@endif
						<i>Fecha {{ $procedimientos->updated_at }} | Por: {{ $procedimientos->auth }} </i>
						<br><br>
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