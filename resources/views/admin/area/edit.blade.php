@extends('admin.template')

@section('content')

<div class="container box box-primary">  
 
        <div class="page-header  text-center">
           <h1>
            <i class="fa fa-university"style="color:green"></i>
              AERAS <small>[Editar Area]</small>
          </h1>
        </div><!-- /.box-header -->             
    <div class="col-xs-12 col-md-8 col-md-offset-2 col-xl-6 col-xl-offset-3">
        
        @if (count($errors) > 0)
            @include('admin.partials.errors')
        @endif
        
        {!! Form::model($area, array('route' => array('area.update', $area->id))) !!}
       
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
                <a href="{{ route('area.index') }}" class="btn btn-warning">Cancelar</a>
            </div>
        
        {!! Form::close() !!}
        
    </div>  
  </div>
@stop