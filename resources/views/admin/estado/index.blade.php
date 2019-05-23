@extends('admin.template')

@section('content')
<div class="container box box-primary">
<div class="page-header text-center">
    <h1>
        <i class="fa fa-toggle-on"style="color:green"></i>
        ESTADOS <a href="{{ route('estado.create') }}" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Estado</a>
    </h1>
</div>

<div class="box-body">              
<table class="display table table-hover">

        <thead>
            <tr>
             <th style="width:20px">Codigo</th>
                <th>Descripcion</th>          

                <th text-center style="width: 20px;">Acciónes </th>
            </tr>
        </thead>         
   <tbody>
    @foreach($estados as $estado)
         <tr>  
             <td>{{ $estado->id }}</td>
             <td>{{ $estado->estado }}</td> 
             <td>
                <a href="{{ route('estado.edit', $estado) }}" class="btn btn-primary">
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
 