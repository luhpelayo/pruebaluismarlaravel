@extends('admin.template')

@section('content')
<div class="container box box-primary">
<div class="page-header text-center">
    <h1>
        <i class="fa fa-book"style="color:green"></i>
        TIPO DOCUMENTOS <a href="{{ route('tipo.create') }}" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Tipo</a>
    </h1>
</div>
<div class="panel-body">
        
           {{ Form::open(['route' =>'tipo.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right','role'=>'search']) }}
                <div class="form-group">
                   
                    {{ Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Search tipo']) }}

                </div>
                <button type="submit" class="btn btn-info btn-flat">Buscar</button>
           {{ Form::close() }}    

</div>
<div class="box-body">              
<table class="display table table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
             <th style="width:20px">Codigo</th>
                <th>Descripcion</th>          

                <th text-center style="width: 20px;">Acciónes </th>
            </tr>
        </thead>         
   <tbody>
    @foreach($tipos as $tipo)
         <tr>  
             <td>{{ $tipo->id }}</td>
             <td>{{ $tipo->nombre }}</td> 
             <td>
                <a href="{{ route('tipo.edit', $tipo) }}" class="btn btn-primary">
                    <i class="fa fa-pencil-square"></i>
                </a>
            </td>
            <td>
              {!! Form::open(['route' => ['tipo.destroy', $tipo]]) !!}
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
    {{ $tipos->render() }}
</div> 
</div>    
@stop