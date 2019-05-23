@extends('admin.template')

@section('content')
<div class="box box-primary">
<div class="page-header text-center">
    <h1>
        <i class="fa fa-toggle-on"style="color:green"></i>
        Procesos
         @can('processes.create') 
        <a href="{{ route('processes.create') }}" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Proceso</a>
         @endcan
    </h1>
</div>

<div class="box-body">              
 <table class="table table-bordered table-hover"  id="dataTable_proceso">

        <thead>
            <tr>
                <th style="width:20px">Codigo</th>
                <th>Descripcion</th>          
                <th>Plazo[hs]</th>
                <th text-center style="width: 80px;">Acciónes </th>
            </tr>
        </thead>         
   <tbody>
    @foreach($processes as $proces)
         <tr>  
             <td>{{ $proces->id }}</td>
             <td>{{ $proces->descripcion }}</td> 
             <td>{{ $proces->tiempo }}</td>
             <td>
              @can('processes.edit')

                <a href="{{ route('processes.edit', $proces) }}" class="btn btn-sm btn-primary">
                    <i class="fa fa-pencil-square"></i>
                </a>
            @endcan
            @can('processes.destroy')
              {!! Form::open(['route' => ['processes.destroy', $proces],'style'=>'display:inline']) !!}
                        <input type="hidden" name="_method" value="DELETE">
                        <button onClick="return confirm('Eliminar registro?')" class="btn btn-sm btn-danger">
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
@endsection
@section('js')
  
     <script>
        // dataTable
        $(document).ready(function() {
            $('#dataTable_proceso').DataTable({
                //responsive: true,
                //scrollX: true,
                pageLength: 10,
                order: [[ 0, "desc" ]],
                lengthMenu: [ 2, 4, 10, 20, 50 ],
                columnDefs: [
                    { "orderable": false, "targets": 3}
                ]
            });
        });
    </script>
 @endsection
 