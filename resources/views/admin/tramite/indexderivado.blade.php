@extends('admin.template')

@section('content')
<div class="box box-primary">
<div class="page-header text-center">
    <h1>Orden de trabajo

    </h1>
</div>
<div class="box-body">              
<table class="table table-bordered table-hover"  id="dataTable_tramites">
        <thead>
            <tr>
                <th>Estado</th>
                <th>Fecha de recepcion</th>
                <th>Nro.Oficio</th>
                <th>Referencia</th>  
                <th>Tipo recepcion</th>
                <th>Atendido</th>
                <th text-center style="width: 120px;">Acciones </th>
            </tr>
        </thead>         
   <tbody>
    @foreach($tramites4 as $tramite)
         <tr>
            <th>
            <span class="label label-info">Recibido</span>
                

             </th>    
             <td>{{ $tramite->created_at}}</td>
             <td>{{ $tramite->nroficio }}</td> 
             <td>{{ $tramite->referencia }}</td>
             <td>{{ $tramite->tipo }}</td>
             <td>{{ $tramite->user_id}}</td>    
           
    
            <td>
            
                </a>
                @can('tramite.cierredeestados')
                <a href="{{ route('tramite.edit', $tramite) }}" class="btn btn-sm btn-pl">
                    <i class="fa fa-pencil-square" style="color:white;"></i>
                </a>
               @endcan
                
                
                @can('tramite.edit')
                <a href="{{ route('tramite.edit', $tramite) }}" class="btn btn-sm btn-primary">
                    <i class="fa fa-pencil-square"></i>
                </a>
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
            $('#dataTable_tramites').DataTable({
                //responsive: true,
                //scrollX: true,
                pageLength: 10,
                order: [[ 0, "desc" ]],
                lengthMenu: [ 2, 4, 10, 20, 50 ],
                columnDefs: [
                    { "orderable": false, "targets": 6 }
                ]
            });
        });
    </script>
 @endsection