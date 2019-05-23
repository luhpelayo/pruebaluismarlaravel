@extends('admin.template')

@section('content')

<div class="container box box-primary"> 

        <div class="page-header  text-center">
           <h1>
            <i class="fa fa-book"style="color:green"></i>
              TIPO DOCUMENTOS <small>[Editar Tipo documento]</small>
          </h1>
        </div><!-- /.box-header -->             
    <div class="col-xs-12 col-md-8 col-md-offset-2 col-xl-6 col-xl-offset-3">
        
        @if (count($errors) > 0)
            @include('admin.partials.errors')
        @endif
        
        {!! Form::model($tipo, array('route' => array('tipo.update', $tipo))) !!}

            <input type="hidden" name="_method" value="PUT">
             
            <div class="box-body col-xs-12">
                <label for="nombre">Descripción:</label>
                
                {!! 
                    Form::text(
                        'nombre', 
                        null, 
                        array(
                            'class'=>'form-control'
                        )
                    ) 
                !!}
            </div>
            
            <div class="box-body col-xs-12">
                {!! Form::submit('Actualizar', array('class'=>'btn btn-primary')) !!}
                <a href="{{ route('tipo.index') }}" class="btn btn-warning">Cancelar</a>
            </div>
        
        {!! Form::close() !!}
        
    </div>  
  </div>

@stop