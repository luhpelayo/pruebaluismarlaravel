@extends('admin.template')

@section('content')
<div class="box box-primary">

<div class="box-body">              
<table class="display table table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th >Codigo</th>
                <th>Nombre</th>  
                <th>Email</th>
                <th text-center style="width: 10px;">Acciónes </th>
            </tr>
        </thead>         
   <tbody>
    @foreach($users as $user)
         <tr>  
             <td>{{ $user->id }}</td>
             <td>{{ $user->name }}</td> 
             <td>{{ $user->email }}</td>
             @can('users.edit')
             <td>
                <a href="{{ route('users.edit', $user) }}" class="btn btn-primary">
                    <i class="fa fa-pencil-square"></i>
                </a>
            </td>
            @endcan
            @can('users.destroy')
            <td>
              {!! Form::open(['route' => ['users.destroy', $user]]) !!}
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
    {{ $users->render() }}
</div> 
</div>    
@stop