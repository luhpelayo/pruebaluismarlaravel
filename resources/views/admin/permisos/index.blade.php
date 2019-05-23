@extends('admin.template')

@section('content')
<div class="box box-primary">
<div class="page-header text-center">
    <h1>
        <i class="fa fa-toggle-on"style="color:green"></i>
        PERMISOS
        @can('permissions.create') 
        <a href="{{ route('permissions.create') }}" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Permiso</a>
        @endcan
    </h1>
</div>

<div class="box-body">              

<table class="table table-bordered table-hover"  id="dataTable_permiso">  

        <thead>
            <tr>
                <th style="width:20px">Codigo</th>
                <th>Modulo</th>
                <th>Nombre</th>
                <th>Descripcion</th>          

                <th text-center style="width: 20px;">Acciónes </th>
            </tr>
        </thead>         
   <tbody>
    @foreach($permissions as $permiso)
         <tr>  
             <td>{{ $permiso->id }}</td>
              <td>{{ $permiso->module }}</td>
             <td>{{ $permiso->name }}</td> 
             <td>{{ $permiso->description }}</td> 
             
             <td>
             @can('permissions.edit')
                <a href="{{ route('permissions.edit', $permiso) }}" class="btn btn-sm btn-primary">
                    <i class="fa fa-pencil-square"></i>
                </a>

            @endcan
            @can('permissions.destroy')
              {!! Form::open(['route' => ['permissions.destroy', $permiso],'style'=>'display:inline']) !!}
                        <input type="hidden" name="_method" value="DELETE">
                        <button onClick="return confirm('Eliminar registro?')" class="btn  btn-sm btn-danger">
                          <i class="fa fa-trash-o"></i>
                        </button>
              {!! Form::close() !!}  
              @endcan 
            </td>
            
        </tr>
    @endforeach

    </tbody>
   </table>
 
</div> 
</div>    
@stop
@section('js')
     <script>
        // dataTable
        $(document).ready(function() {
            $('#dataTable_permiso').DataTable({
                //responsive: true,
                //scrollX: true,
                pageLength: 10,
                order: [[ 0, "desc" ]],
                lengthMenu: [ 2, 4, 10, 20, 50 ],
                columnDefs: [
                    { "orderable": false, "targets": 4 }
                ]
            });
        });
    </script>
 @endsection
 