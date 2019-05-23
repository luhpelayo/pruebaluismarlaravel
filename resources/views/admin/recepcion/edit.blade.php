@extends('store.template')

@section('content')

<div class="row">  
  <div class="box box-primary col-xs-12">

        <div class="page-header  text-center">
           <h1>
             <i class="fa fa-folder-open-o"style="color:green"></i>
              RECEPCIÓN <small>[Editar Recepción]</small>
          </h1>
        </div><!-- /.box-header -->             
    <div class="page">
        
        @if (count($errors) > 0)
            @include('admin.partials.errors')
        @endif
        
        {!! Form::model($recepcion, array('route' => array('recepcion.update', $recepcion))) !!}

            <input type="hidden" name="_method" value="PUT">
             
            <div class="box-body col-xs-12">
                <label for="description">Descripción:</label>
                
                {!! 
                    Form::text(
                        'descripcion', 
                        null, 
                        array(
                            'class'=>'form-control'
                        )
                    ) 
                !!}
            </div>
            
            <div class="box-body col-xs-12">
                {!! Form::submit('Actualizar', array('class'=>'btn btn-primary')) !!}
                <a href="{{ route('recepcion.index') }}" class="btn btn-warning">Cancelar</a>
            </div>
        
        {!! Form::close() !!}
        
    </div>  
  </div>
</div> <!-- end row -->
@stop