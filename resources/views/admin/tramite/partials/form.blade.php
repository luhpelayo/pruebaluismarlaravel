                <div class="form-group">
                  <label class="control-label" for="tipo">Tipo Recepcion:</label>
                    {!! Form:: select(
                             'tipo',
                                [
                                  ''=>'Seleccione tipo de recepción',
                                  'Recibido' => 'Recepción',
                                  'Despacho'=>'Despacho'
                                ],
                                null,
                                   ['
                                     class'=>'form-control','id'=>'SelectRecep'
                                   ]
                              )
                     !!}
                </div>
                <div class="form-group" id="nro_oficio" style="display: block;">
                    <label for="nroficio">Area:</label>
                    {!! Form:: select(
                             'nroficio',
                                [
                                  ''=>'Seleccione opción',
                                  'Salon1' => 'Salon1',
                                  'Salon2' => 'Salon2',
                                  'Salon3' => 'Salon3',
                                  'Salon4' => 'Salon4',
                                  'Salon5' => 'Salon5'
                               
                                ],
                                null,
                                 
                              )
                     !!}
                </div>
             


                <div class="form-group" id="remitente" style="display: block;">
                      
                      <label class="control-label" for="solicitante_id">Remitente C.I:</label>
 

                      {!! Form::select('solicitante_id', $solicitantes, null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group" id="procedencia" style="display: block;">
                  <label for="procedencia">Procedencia:</label>
                  {!! 
                      Form::text(
                          'procedencia', 
                          null, 
                          array(
                              'class'=>'form-control',
                              'placeholder' => 'Ingrese procedencia...',
                                            'autofocus' => 'autofocus'
                          )
                      ) 
                  !!}
                </div>
                <div class="form-group" id="referencia" style="display: block;">
                  <label for="referencia">Referencia:</label>
                  {!! 
                      Form::text(
                          'referencia', 
                          null, 
                          array(
                              'class'=>'form-control',
                              'placeholder' => 'Ingrese referencia...',
                                            'autofocus' => 'autofocus'
                          )
                      ) 
                  !!}
                </div>
                <div class="form-group" id="destinatario" style="display: none;">
                  <label for="destinatario">Destinatario:</label>
                  {!! 
                      Form::text(
                          'destinatario', 
                          null, 
                          array(
                              'class'=>'form-control',
                              'placeholder' => 'Ingrese destinatario...',
                                            'autofocus' => 'autofocus'
                          )
                      ) 
                  !!}
                </div>
                <div class="form-group" id="responsable" style="display: none;">
                  <label for="reponsable">Reponsable:</label>
                  {!! 
                      Form::text(
                          'reponsable', 
                          null, 
                          array(
                              'class'=>'form-control',
                              'placeholder' => 'Ingrese reponsable...',
                                            'autofocus' => 'autofocus'
                          )
                      ) 
                  !!}
                </div>
                <div class="form-group" id="proc" style="display: block;">
                      <label class="control-label" for="process_id">formulario:</label>
                      {!! Form::select('process_id', $process, null, ['class' => 'form-control','id'=>'proces']) !!}
                </div>

              <div class="form-group" id="demos" style="display: none;">

                   <ul class="list-unstyled">
                     <li>
                      
                           <input type="checkbox" name="cuadro" value=" " > <br><br>
                      
                      </li>
                  </ul>
               </div>  
              <br> 

          <div class="form-group">
              {!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
              <a href="{{ route('tramite.index') }}" class="btn btn-warning">Cancelar</a>
          </div>