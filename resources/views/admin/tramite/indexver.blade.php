@extends('admin.template')

@section('content')

<div class="container box box-primary">

        <div class="page-header  text-center">
           <h1>
           <i class="fa fa-user-secret"style="color:green"></i>
              Orden de trabajo en Proceso <small>[Editar Orden de Trabajo]</small>
          </h1>
        </div><!-- /.box-header -->             
    <div class="col-xs-12 col-md-8 col-md-offset-2 col-xl-6 col-xl-offset-3">
        
        @if (count($errors) > 0)
            @include('admin.partials.errors')
        @endif
        
        {!! Form::model($tramite, array('route' => array('tramite.update', $tramite))) !!}

            <input type="hidden" name="_method" value="PUT">
             
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
                    <label for="nroficio">Nro. Oficio:</label>
                    {!! 
                        Form::text(
                            'nroficio', 
                            null, 
                            array(
                                'class'=>'form-control',
                                'placeholder' => 'Ingrese numero oficio...',
                                              'autofocus' => 'autofocus'
                            )
                        ) 
                    !!}


                    
                </div>
                <div class="form-group" id="remitente" style="display: block;">
                      
                      <label class="control-label" for="solicitante_id">Remitente C.I:</label>
 

                      {!! Form::select('solicitante_id', $solicitantes, null, ['class' => 'form-control']) !!}
                </div>
                <h2>{{ $procedencia }}</h2>
                <div class="form-group" id="recepcion" style="display: block;">
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
                      <label class="control-label" for="process_id">Proceso:</label>
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




        
        {!! Form::close() !!}
        
    </div>  
  </div>

@stop