@extends('store.templatePublic')

@section('content')
@include('store.informativa.layouts.headContentEventos')

		<div style="background-color: #FFFFFF">
			<div class="container" style="-webkit-box-shadow: 0px 0px 32px -2px rgba(0,0,0,0.08); -moz-box-shadow: 0px 0px 32px -2px rgba(0,0,0,0.08); box-shadow: 0px 0px 32px -2px rgba(0,0,0,0.08); background-color: #FFF">
				<div id="allEvents" class="row">
					<div class="col-xs-12">
						<div class="col-xs-12">
							<h3></h3>
							<div class="divider-md pull-left"></div>
						</div>
						<div class="bloque1"></div>
						@if(isset($solicitantes) && count($solicitantes) > 0)
							@foreach($solicitantes as $solicitante)
							<div class="col-xs-12 col-sm-12">
								<div class="panel panel-default">
									<div class="panel-body">
									
										<div class="divider-sm-color pull-left"></div>
										</h2>
										<br>
										@if ($solicitante->url_img)
              <td><img src="{{asset($solicitante->url_img)}}" height="130" width="130" /></td>

            
              @endif
										<br>
									
						
										<br>
										<i>destacado</i>
									
										
									</div>
								</div>
							</div>
							@endforeach
						@else
							<div class="panel-body">
								<h1 class="text-center">No hay cronogramas</h1>
							</div>
							<div class="bloque"></div>
						@endif
					</div>
					<div class="col-xs-12 text-center">
						<nav>
							{!! $solicitantes->render() !!}
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
									<img id="eventImg">
									<div id="blockDivider" class="bloque hidden-md hidden-lg"></div>
					        <p id="eventContent" class="text-justify"></p>
									<br>
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
		<script type="text/javascript">
			loadEvents(<?php echo json_encode($solicitantesAll); ?>);
		</script>		


@stop
