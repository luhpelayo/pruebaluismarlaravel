@extends('admin.template')

@section('content')
<div class="box box-primary">
<div class="page-header text-center">
    <h1>
        <i class="fa fa-building"style="color:green"></i>
        AREAS
        @can('academica.create') 
        <a href="{{ route('academica.create') }}" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Area</a>
        @endcan
    </h1>
</div>

<div class="box-body">              

<table class="table table-bordered table-hover"  id="dataTable_permiso">  

        <thead>
            <tr>
                <th style="width:20px">Codigo</th>
                <th>Nombre</th>
                <th>Descripcion</th>          

                <th text-center style="width: 20px;">Acciónes </th>
            </tr>
        </thead>         
   <tbody>
    @foreach($aeraAcademicas as $a)
         <tr>  
             <td>{{ $a->id }}</td>
             <td>{{ $a->name }}</td> 
             <td>{{ $a->description }}</td> 
             
             <td>
             @can('academica.edit')
                <a href="{{ route('academica.edit', $a->id) }}" class="btn btn-sm btn-primary">
                    <i class="fa fa-pencil-square"></i>
                </a>

            @endcan
            @can('academica.destroy')
              {!! Form::open(['route' => ['academica.destroy', $a],'style'=>'display:inline']) !!}
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
                    { "orderable": false, "targets": 3 }
                ]
            });
        });
    </script>
 @endsection
 