@extends('admin.template')

@section('content')
<div class="box box-primary">
<div class="page-header text-center">
    <h1>
        <i class="fa fa-university"style="color:green"></i>
        AREAS 
        @can('area.create') 
        <a href="{{ route('area.create') }}" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Area</a>
        @endcan
    </h1>
</div>
<div class="panel-body">
        
           {{ Form::open(['route' =>'area.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right','role'=>'search']) }}
                <div class="form-group">
                   
                    {{ Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Search area']) }}

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
    @foreach($areas as $area)
         <tr>  
             <td>{{ $area->id }}</td>
             <td>{{ $area->descripcion }}</td> 
             @can('area.edit') 
             <td>
                <a href="{{ route('area.edit', $area->id) }}" class="btn btn-primary">
                    <i class="fa fa-pencil-square"></i>
                </a>
            </td>
             @endcan
             @can('area.destroy') 
            <td>
              {!! Form::open(['route' => ['area.destroy', $area]]) !!}
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
    {{ $areas->render() }}
</div> 
</div>    
@stop