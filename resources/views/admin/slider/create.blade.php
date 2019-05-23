@extends('admin.template')

@section('content')

 
  <div class="container box box-primary ">
  

    <div class="page-header  text-center">
      <h1>
       <i class="fa fa-file-image-o"style="color:green"></i>
        SLIDER <small>[Agregar Slider]</small>
      </h1>
    </div>
  <div class="col-xs-12 col-md-8 col-md-offset-2 col-xl-6 col-xl-offset-3">
    @if (count($errors) > 0)
        @include('admin.partials.errors')
    @endif


     {!! Form::open(['route'=>'sliders.store','method' => 'POST','files' => true]) !!}

          <div class="form-group">
          {!! Form::label('img','Agregar una imagen') !!}
          {!! Form::file('img')!!}
         </div>

         <div class="form-group">
              
              {!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
              <a href="{{ route('sliders.index') }}" class="btn btn-warning">Cancelar</a>
          </div>
      
      {!! Form::close() !!}
 </div>
</div>

@endsection
