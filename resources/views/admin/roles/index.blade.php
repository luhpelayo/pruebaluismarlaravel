@extends('admin.template')

@section('content')
<div class="box box-primary">
<div class="page-header text-center">
    <h1>
        <i class="fa fa-toggle-on"style="color:green"></i>
        ROLES 
         @can('roles.create') 
        <a href="{{ route('roles.create') }}" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Rol</a>
         @endcan
    </h1>
</div>

<div class="box-body">              
<table class="table table-striped table-bordered table-hover" >

        <thead>
            <tr>
                <th style="width:20px">Codigo</th>
                <th>Nombre</th>
                <th>Descripcion</th>          

                <th text-center style="width: 20px;">Acciónes </th>
            </tr>
        </thead>         
   <tbody>
    @foreach($roles as $role)
         <tr>  
             <td>{{ $role->id }}</td>
             <td>{{ $role->name }}</td> 
             <td>{{ $role->description }}</td> 
              @can('roles.edit')
             <td>
                <a href="{{ route('roles.edit', $role) }}" class="btn btn-primary">
                    <i class="fa fa-pencil-square"></i>
                </a>
            </td>
            @endcan
            @can('roles.destroy')
            <td>
              {!! Form::open(['route' => ['roles.destroy', $role]]) !!}
                        <input type="hidden" name="_method" value="DELETE">
                        <button onClick="return confirm('Eliminar registro?')" class="btn btn-danger">
                          <i class="fa fa-trash-o"></i>
                        </button>
              {!! Form::close() !!}  
            </td>
            @endcan 
        </tr>
    @endforeach

    </tbody>
   </table>
 
</div> 
</div>    
@stop
 