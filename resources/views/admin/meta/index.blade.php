@extends('admin.template')

@section('content')
<div class="container box box-primary">
<div c  lass="page-header text-center">
    <h1>
        <i class="fa fa-toggle-on"style="color:green"></i>
        METAs <a href="{{ route('meta.create') }}" class="btn btn-warning"><i class="fa fa-plus-circle"></i> New Meta</a>
    </h1>
</div>

<div class="box-body">              
<table class="display table table-hover">

        <thead>
            <tr>
             <th style="width:20px">Codigo</th>
                <th>Nombre</th>          

                <th text-center style="width: 20px;">Descripcion </th>
            </tr>
        </thead>         
   <tbody>
    @foreach($metas as $mt)
         <tr>
             <td>{{ $mt->id }}</td>
             <td>{{ $mt->description }}</td> 
             <td>
                <a href="{{ route('meta.edit', $mt) }}" class="btn btn-primary">
                    <i class="fa fa-pencil-square"></i>
                </a>
            </td>
            <td>
              {!! Form::open(['route' => ['estado.destroy', $estado]]) !!}
                        <input type="hidden" name="_method" value="DELETE">
                        <button onClick="return confirm('Eliminar registro?')" class="btn btn-danger">
                          <i class="fa fa-trash-o"></i>
                        </button>
              {!! Form::close() !!}  
            </td> 
        </tr>
    @endforeach

    </tbody>
   </table>
 
</div> 
</div>    
@stop
 