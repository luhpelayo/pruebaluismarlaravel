@extends('store.templatePublic')
@section('content')
@include('store.informativa.layouts.headContentEventos')


		<div style="background-color: #FFFFFF">

		



			<div class="container" style="-webkit-box-shadow: 0px 0px 32px -2px rgba(0,0,0,0.08); -moz-box-shadow: 0px 0px 32px -2px rgba(0,0,0,0.08); box-shadow: 0px 0px 32px -2px rgba(0,0,0,0.08); background-color: #FFF">
				





				<div id="allEvents" class="row">
					<div class="col-xs-12 ">
						<div class="col-xs-12 ">
							<h3>Bolsa de Empleo</h3>
							<div class="divider-md pull-left"></div>
						</div>
						<div class="bloque1"></div>
						@if(isset($bolsa_de_trabajos) && count($bolsa_de_trabajos) > 0)
							@foreach($bolsa_de_trabajos as $bolsa_de_trabajo)
							<div class="col-xs-12 col-sm-6">
								<div class="panel panel-default">
									<div class="panel-body">
                                    
										<div class="divider-sm-color pull-left"></div>
										</h2>
										<!-- <br>
										<h3>{{ $bolsa_de_trabajo->nombre }}</h3>
										<div class="divider-sm-color pull-left"></div>
										</h2>
										<br>
										<h3>{{ $bolsa_de_trabajo->nroregistro }}</h3>
										<div class="divider-sm-color pull-left"></div>
										</h2>
										<br>
                                        <h3>{{ $bolsa_de_trabajo->email }}</h3>
										<div class="divider-sm-color pull-left"></div>
										</h2>
										<br>
                                        <h3>{{ $bolsa_de_trabajo->telefono }}</h3>
										<div class="divider-sm-color pull-left"></div>
										</h2> -->
										<br>
                                        <a>{{ $bolsa_de_trabajo->email }}</a>
                                        <br>
                                        
										<i>Fecha: {{ explode(" ", $bolsa_de_trabajo->event_date)[0] }}<br>
								
											 <td></td></i>
										<br>
										@if(isset($bolsa_de_trabajo->carta_de_presentacion))
											<br>
											Carta de presentacion:
											<p>
												<a class="download_file" href="{{ asset('/file/getBolsa_de_trabajo/'.$bolsa_de_trabajo->carta_de_presentacion) }}" target="_blank"><i class="fa fa-download" aria-hidden="true"></i><span>&nbsp;{{ $bolsa_de_trabajo->carta_de_presentacion}}</span></a>
												
											</p>
										@endif
                                        @if(isset($bolsa_de_trabajo->curriculum))
											<br>
											Curriculum:
											<p>
												<a class="download_file" href="{{ asset('/file/getBolsa_de_trabajo/'.$bolsa_de_trabajo->curriculum) }}" target="_blank"><i class="fa fa-download" aria-hidden="true"></i><span>&nbsp;{{ $bolsa_de_trabajo->curriculum}}</span></a>
												
											</p>
										@endif
									</div>
								</div>
							</div>
							@endforeach
						@else
							<div class="panel-body">
								<h1 class="text-center" >No hay Postulantes </h1>
							</div>
							<div class="bloque"></div>
						@endif
					</div>
					<div class="col-xs-12 text-center">
						<nav>
							{!! $bolsa_de_trabajos->render() !!}
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






<div class="page-header  text-center" class="row" id="allEvents"> 
      <h1>
       <i class="fa fa-newspaper-o"style="color:grey"></i>
       CURRICULUM <small>[Datos Personales]</small>
      </h1>
    </div>
  <div class="col-xs-12 col-md-8 col-md-offset-2 col-xl-6 col-xl-offset-3">
    @if (count($errors) > 0)
        @include('admin.partials.errors')
    @endif


     {!! Form::open(['route'=>'bolsa_de_trabajos.store','method' => 'POST','files' => true]) !!}

          <div class="form-group">
              <label for="nombre">Nombre:</label>
              {!! 
                  Form::text(
                      'nombre', 
                      null, 
                      array(
                         
                          'class'=>'form-control',
                          'placeholder' => 'Nombre de la bolsa_de_trabajo...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>


          <div class="form-group">
              <label for="nroregistro">Nroregistro:</label>
              {!! 
                  Form::text(
                      'nroregistro', 
                      null, 
                      array(
                         
                          'class'=>'form-control',
                          'placeholder' => 'Nroregistro de la bolsa_de_trabajo...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>

          <div class="form-group">
              <label for="email">Email:</label>
              {!! 
                  Form::text(
                      'email', 
                      null, 
                      array(
                         
                          'class'=>'form-control',
                          'placeholder' => 'Email de la bolsa_de_trabajo...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>

          <div class="form-group">
              <label for="telefono">Telefono:</label>
              {!! 
                  Form::text(
                      'telefono', 
                      null, 
                      array(
                         
                          'class'=>'form-control',
                          'placeholder' => 'Telefono de la bolsa_de_trabajo...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>

       

          <div class="form-group">
          {!! Form::label('file','Carta de presentacion') !!}
          {!! Form::file('file')!!}
         </div>
         
         <div class="form-group">
          {!! Form::label('file','Curriculum') !!}
          {!! Form::file('file')!!}
         </div>

<!-- 
				 <div class="form-group">
              <label for="event_date">Fecha:</label>
              {!! 
                  Form::date(
                      'event_date', 
                      null, 
                      array(
                          'class'=>'form-control',
                          'placeholder' => 'Título del bolsa_de_trabajo...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>  -->



					
			

      

          <div class="form-group"> 
              
              {!! Form::submit('Enviar', array('class'=>'btn btn-primary')) !!}
              <a href="{{ route('/') }}" class="btn btn-warning">Cancelar</a>
          </div>
			
      {!! Form::close() !!}
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


 
 

         