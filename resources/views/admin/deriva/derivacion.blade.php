@extends('admin.template')

@section('content')

 <div class="container box box-primary ">

        <div class="page-header  text-center">
           <h1>
           <i class="fa fa-envelope"style="color:green"></i>
              DERIVACIÓN <small>[Agregar Destinatario]</small>
          </h1>
        </div><!-- /.box-header -->             
    <div class="page">
        
        @if (count($errors) > 0)
            @include('admin.partials.errors')
        @endif
        
        {!! Form::model($tramite, array('route' => array('dericion/store', $tramite->id))) !!}
       

            <div class="form-group col-xs-12">
                    <label for="observacion">Observacion:</label>
                    {!! 
                        Form::textarea(
                            'observacion', 
                            null, 
                            array(
                                'class'=>'form-control',
                                'placeholder' => 'Ingrese numero oficio...',
                                              'autofocus' => 'autofocus'
                            )
                        ) 
                    !!}
            </div>
            <div class="form-group col-xs-12">
              <label class="control-label" for="area_id">Area:</label>
              {!! 
                Form::select(
                    'area_id',
                     $areas, 
                     null,
                      array(
                       'class' => 'form-control'
                       ) 
                    )
              !!}
            </div>
            
            <div class="form-group col-xs-12">
                {!! Form::submit('Derivar', array('class'=>'btn btn-primary')) !!}
                <a href="{{ route('tramite.index') }}" class="btn btn-warning">Cancelar</a>
            </div>
        
        {!! Form::close() !!}
        
    </div>  
  </div>


@stop