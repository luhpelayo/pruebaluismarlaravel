@extends('admin.template')

@section('content')

<div class="row">  
  <div class="box box-primary col-xs-12">

        <div class="page-header  text-center">
           <h1>
           <i class="fa fa-user-secret"style="color:green"></i>
              USUARIO <small>[Editar Usuario]</small>
          </h1>
        </div><!-- /.box-header -->             
    <div class="col-xs-12 col-md-8 col-md-offset-2 col-xl-6 col-xl-offset-3">
        
        @if (count($errors) > 0)
            @include('admin.partials.errors')
        @endif
        
        {!! Form::model($user, array('route' => array('users.update', $user))) !!}

            <input type="hidden" name="_method" value="PUT">
             
          @include('admin.users.partials.form')
        
        {!! Form::close() !!}
        
    </div>  
  </div>


</div> <!-- end row -->
@stop