@extends('store.template')

@section('content')
@include('store.informativa.layouts.headContentEventos')
		<div style="background-color: #2e3841">
			<div class="container" style="-webkit-box-shadow: 0px 0px 32px -2px rgba(0,0,0,0.08); -moz-box-shadow: 0px 0px 32px -2px rgba(0,0,0,0.08); box-shadow: 0px 0px 32px -2px rgba(0,0,0,0.08); background-color: #FFF">
				<div class="row">

					<br><br>
					<div id="events-nav-section" events-nav-active="false" class="col-xs-12 nav-modify text-center hide">
						@if(isset($sedes))
							@foreach($sedes as $sede)
								<div class="col-xs-12 col-sm-2 col-nav-modify">
									<a href="/cronogramas/{{ $sede->id }}" class="events-link-toggle"><strong>{{$sede->name}}</strong></a>
								</div>
							@endforeach
						@endif
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-xs-12">
						<div class="col-xs-12 col-sm-5 pull-right">
							<div id='calendar' style="padding: 1em;"></div>
						</div>
						<div id="tableNextEvents" class="col-xs-12 col-sm-7">
							<div class="titleTableNextEvents">
								<h3>Próximos Cronogramas</h3>
								<div class="divider-md pull-left"></div>
							</div>
							<table class="table table-hover">
								<thead>
									<th>Título</th>
									<th>Fecha del cronograma</th>
									<th>Sede del cronograma</th>
									<th>Organizado por</th>
								</thead>
								<tbody>
									@if(isset($cronogramasNext) && count($cronogramasNext) > 0)
										@foreach($cronogramasNext as $cronograma)
											<tr>
												<td>{{ $cronograma->title }}</td>
												<td>{{ explode(" ", $cronograma->cronog_date)[0] }}</td>
                                                <td>{{ $cronograma->lugar }}</td>
												<td>{{ $cronograma->org }}</td>
											</tr>
										@endforeach
									@else
										<tr>
											<td colspan="4">No se encontraron próximos cronogramas</td>
										</tr>
									@endif
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div id="allEvents" class="row">
					<div class="col-xs-12">
						<div class="col-xs-12">
							<h3>Todos los cronogramas</h3>
							<div class="divider-md pull-left"></div>
						</div>
						<div class="bloque2"></div>
						@if(isset($cronogramas) && count($cronogramas) > 0)
							@foreach($cronogramas as $cronograma)
							<div class="col-xs-12 col-sm-6">
								<div class="panel panel-default">
									<div class="panel-body">
										<h3>{{ $cronograma->title }}</h3>
										<div class="divider-sm-color pull-left"></div>
										</h2>
										<br>
										@if(isset($cronograma->url_img))
											<img class="img-responsive" src="{{ asset('images/cronogramas/'.$cronograma->url_img) }}">
										@endif
										<br>
										<i>Fecha: {{ explode(" ", $cronograma->cronog_date)[0] }}<br>
										Sede:
											 <td>{{ $cronograma->lugar }}</td></i>
										<br>
										<p class="text-justify">
											{!! $cronograma->content !!}
										</p>
										@if(isset($cronograma->url_document))
											<br>
											<p>
												<a class="download_file" href="{{ asset('/file/getCronograma/'.$cronograma->url_document) }}" target="_blank"><i class="fa fa-download" aria-hidden="true"></i><span>&nbsp;{{ $cronograma->url_document }}</span></a>
												
											</p>
										@endif
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
							{!! $cronogramas->render() !!}
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
			loadEvents(<?php echo json_encode($cronogramasAll); ?>);
		</script>		
@stop