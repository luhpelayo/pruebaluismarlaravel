@extends('admin.template')

@section('content')

<div class="container box box-primary">
  
        <div class="page-header  text-center">
           <h1>
            <i class="fa fa-toggle-on"style="color:green"></i>
              ROLES <small>[Editar Rol]</small>
          </h1>
        </div><!-- /.box-header -->             
    <div class="col-xs-12 col-md-8 col-md-offset-2 col-xl-6 col-xl-offset-3">
        
        @if (count($errors) > 0)
            @include('admin.partials.errors')
        @endif
        
        {!! Form::model($role, array('route' => array('roles.update', $role))) !!}

            <input type="hidden" name="_method" value="PUT">
             
         @include('admin.roles.partials.form')
        
        
        {!! Form::close() !!}
        
    </div>  

</div> <!-- end row -->
@stop