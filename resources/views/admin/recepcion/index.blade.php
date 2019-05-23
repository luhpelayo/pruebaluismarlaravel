@extends('store.template')

@section('content')
<div class="box box-primary">
<div class="page-header text-center">
    <h1>
        <i class="fa fa-folder-open-o"style="color:green"></i>
        RCEPCIÓN <a href="{{ route('recepcion.create') }}" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Recepción</a>
    </h1>
</div>

<div class="box-body">              
<table class="display table table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
             <th style="width:20px">Codigo</th>
                <th>Descripcion</th>          

                <th text-center style="width: 20px;">Acciones </th>
            </tr>
        </thead>         
   <tbody>
    @foreach($recepcions as $recepcion)
         <tr>  
             <td>{{ $recepcion->id }}</td>
             <td>{{ $recepcion->nombre }}</td> 
             <td>
                <a href="{{ route('recepcion.edit', $recepcion) }}" class="btn btn-primary">
                    <i class="fa fa-pencil-square"></i>
                </a>
            </td>
            <td>
              {!! Form::open(['route' => ['recepcion.destroy', $recepcion]]) !!}
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