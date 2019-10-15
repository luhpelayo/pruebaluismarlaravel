@extends('admin.template')




@section('content')
<div class="box box-primary">
<div class="page-header text-center">
    <h1>
        <i class="fa fa-user-o"></i>
        Bolsa de Empleo <a href="{{ route('bolsa_de_trabajos.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Nuevo</a>
    </h1>
</div>
<div class="panel-body">
        
           {{ Form::open(['route' =>'bolsa_de_trabajos.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right','role'=>'search']) }}
                <div class="form-group">
                   
                    {{ Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Search bolsa_de_trabajo']) }}

                </div>
                <button type="submit" class="btn btn-info btn-flat">Buscar</button>
           {{ Form::close() }}    

</div>
<div class="box-body">              
<table class="display table table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
              
                <th>Nombre</th>  
                <th>Año de Graduacion</th>          
                <th>Genero</th>
                <th>Email</th>
                <th text-center style="width: 100px;">Acciónes </th>
            </tr>
        </thead>         
   <tbody>
    @foreach($bolsa_de_trabajo as $bolsa_de_trabaj)
         <tr>  
             
             <td>{{ $bolsa_de_trabaj->nombre }}</td> 
             <td>{{ $bolsa_de_trabaj->anho_de_graduacion }}</td>
             <td>{{ $bolsa_de_trabaj->genero }}</td>
             <td>{{ $bolsa_de_trabaj->email }}</td>
             <td>
             <a class="btn btn-primary" class="download_file" href="{{ route('bolsa_de_trabajo',$bolsa_de_trabaj->id)}}"  target="_blank"><span>&nbsp;</span>Ver
                    <i class="fa fa-pencil-square"></i>
                </a>
                <a class="btn btn-primary" class="download_file" href="{{ asset('/file/getBolsa_de_trabajo/'.$bolsa_de_trabaj->curriculum) }}" target="_blank"><i class="fa fa-download" aria-hidden="true"></i><span>&nbsp;</span>Descargar
                    <i class="fa fa-pencil-square"></i>
                </a>
		     {!! Form::open(['route' => ['bolsa_de_trabajos.destroy', $bolsa_de_trabaj],'style'=>'display:inline']) !!}
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
    {{ $bolsa_de_trabajo->render() }}
</div> 
</div>    
@stop