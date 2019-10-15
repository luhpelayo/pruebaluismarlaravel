@extends('store.templatePublic')
@section('content')
@include('store.informativa.layouts.headContentEventos')

<div style="background-color: #FFFFFF">

		



			<div class="container" style="-webkit-box-shadow: 0px 0px 32px -2px rgba(0,0,0,0.08); -moz-box-shadow: 0px 0px 32px -2px rgba(0,0,0,0.08); box-shadow: 0px 0px 32px -2px rgba(0,0,0,0.08); background-color: #FFF">





<div class="page-header  text-center" class="row" id="allEvents"> 

<td>Modelo de Curriculum</td>
											<p>
												<a class="download_file" href="{{ asset('/file/getCronograma/') }}" target="_blank"><i class="fa fa-download" aria-hidden="true"></i><span>  modelo</span></a>
												
											</p>
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
                          'placeholder' => '',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>
          <div class="form-group">
                  <label class="control-label" for="anho_de_graduacion">Año de Graduación:</label>
                    {!! Form:: select(
                             'anho_de_graduacion',
                                [
                                  ''=>'Seleccione opción',
                                  '2019' => '2019',
                                  '2018' => '2018',
                                  '2017' => '2017',
                                  '2016' => '2016',
                                  '2015' => '2015',
                                  '2014' => '2014',
                                  '2013' => '2013',
                                  '2012' => '2012',
                                  '2011' => '2011',
                                  '2010' => '2010',
                                  '2009' => '2009'
                                ],
                                null,
                                 
                              )
                     !!}
                </div>

                <div class="form-group">
                  <label class="control-label" for="genero">Genero:</label>
                    {!! Form:: select(
                             'genero',
                                [
                                  ''=>'Seleccione opción',
                                  'Masculino' => 'Masculino',
                                  'Femenino' => 'Femenino',
                                  'Prefiero no decir' => 'Prefiero no decirlo'
                                ],
                                null,
                                 
                              )
                     !!}
                </div>
                <div class="form-group">
                  <label class="control-label" for="anhos_de_experiencia">Años de experiencia:</label>
                    {!! Form:: select(
                             'anhos_de_experiencia',
                                [
                                  ''=>'Seleccione opción',
                                  '0' => '0',
                                  '1' => '1',
                                  '2' => '2',
                                  '3' => '3',
                                  '4' => '4',
                                  '5' => '5',
                                  '6' => '6',
                                  '7' => '7',
                                  '8' => '8',
                                  '9' => '9',
                                  '10' => '10'
                                ],
                                null,
                                 
                              )
                     !!}
                </div>

                <div class="form-group">
                  <label class="control-label" for="paquetes_informaticos">Paquetes Informaticos:</label>
                    {!! Form:: select(
                             'paquetes_informaticos',
                                [
                                  ''=>'Seleccione opción',
                                  'Basico' => 'Basico',
                                  'Intermedio' => 'Intermedio',
                                  'Avanzado' => 'Avanzado'
                                ],
                                null,
                                 
                              )
                     !!}
                </div>

                <div class="form-group">
                  <label class="control-label" for="ingles">Ingles:</label>
                    {!! Form:: select(
                             'ingles',
                                [
                                  ''=>'Seleccione opción',
                                  'Basico' => 'Basico',
                                  'Intermedio' => 'Intermedio',
                                  'Avanzado' => 'Avanzado'
                                ],
                                null,
                                 
                              )
                     !!}
                </div>
                <div class="form-group">
                  <label class="control-label" for="maestrias">Maestrias:</label>
                    {!! Form:: select(
                             'maestrias',
                                [
                                  ''=>'Seleccione opción',
                                  'Si' => 'Si',
                                  'No' => 'No'
                                ],
                                null,
                                 
                              )
                     !!}
                </div>
                <div class="form-group">
                  <label class="control-label" for="postgrado">Postgrado:</label>
                    {!! Form:: select(
                             'postgrado',
                                [
                                  ''=>'Seleccione opción',
                                  'Si' => 'Si',
                                  'No' => 'No'
                                ],
                                null,
                                 
                              )
                     !!}
                </div>

          <!-- <div class="form-group">
              <label for="nroregistro">Año de Graduacion:</label>
              {!! 
                  Form::text(
                      'anho_de_graduacion', 
                      null, 
                      array(
                         
                          'class'=>'form-control',
                          'placeholder' => 'anho_de_graduacion de la bolsa_de_trabajo...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div> -->
          <!-- <div class="form-group">
              <label for="nroregistro">Genero:</label>
              {!! 
                  Form::text(
                      'genero', 
                      null, 
                      array(
                         
                          'class'=>'form-control',
                          'placeholder' => 'genero de la bolsa_de_trabajo...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div> -->

          <!-- <div class="form-group">
              <label for="nroregistro">Años de experiencia:</label>
              {!! 
                  Form::text(
                      'anhos_de_experiencia', 
                      null, 
                      array(
                         
                          'class'=>'form-control',
                          'placeholder' => 'anhos_de_experiencia de la bolsa_de_trabajo...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div> -->

          <!-- <div class="form-group">
              <label for="nroregistro">Paquetes informaticos:</label>
              {!! 
                  Form::text(
                      'paquetes_informaticos', 
                      null, 
                      array(
                         
                          'class'=>'form-control',
                          'placeholder' => 'paquetes_informaticos de la bolsa_de_trabajo...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div> -->

          <!-- <div class="form-group">
              <label for="nroregistro">Ingles:</label>
              {!! 
                  Form::text(
                      'ingles', 
                      null, 
                      array(
                         
                          'class'=>'form-control',
                          'placeholder' => 'ingles de la bolsa_de_trabajo...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div> -->

          <!-- <div class="form-group">
              <label for="nroregistro">Maestrias:</label>
              {!! 
                  Form::text(
                      'maestrias', 
                      null, 
                      array(
                         
                          'class'=>'form-control',
                          'placeholder' => 'maestrias de la bolsa_de_trabajo...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div> -->

          <!-- <div class="form-group">
              <label for="nroregistro">Postgrado:</label>
              {!! 
                  Form::text(
                      'postgrado', 
                      null, 
                      array(
                         
                          'class'=>'form-control',
                          'placeholder' => 'postgrado de la bolsa_de_trabajo...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div> -->



          <div class="form-group">
              <label for="email">Email:</label>
              {!! 
                  Form::text(
                      'email', 
                      null, 
                      array(
                         
                          'class'=>'form-control',
                          'placeholder' => '',
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
                          'placeholder' => '',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>

       
<!-- 
          <div class="form-group">
          {!! Form::label('file','Carta de presentacion') !!}
          {!! Form::file('file')!!}
         </div> -->
         
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
              <a href="{{ route('bolsa_de_trabajos') }}" class="btn btn-warning">Cancelar</a>
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