@section('content')
<div class="box box-primary">
<div class="page-header text-center"> 
    <h1>Orden de Trabajo no Terminados
      
    </h1>
</div>
<div class="box-body">              
<table class="table table-bordered table-hover"  id="dataTable_tramites">
        <thead>
            <tr>
                <th>Estado</th>
                <th>Fecha de recepcion</th>
                <th>Proceso</th>
                <th>Referencia</th>  
            
                <th>Atendido</th>
                <th>Nro. Solicitud</th>
       
            </tr>
        </thead>         
   <tbody>
 
    @foreach($tramites as $tramite)
         <tr>
            <th>
            @if($tramite->estado_id == '5')
                    <span class="label label-info">No Terminado</span>
                @else
                    <span class="label label-danger">Derivado</span>
                @endif

                @extends('admin.template')

             </th>    
             <td>{{ $tramite->created_at}}</td>
             <td>{{ $tramite->nroficio }}</td> 
             <td>{{ $tramite->referencia }}</td>
      
             <td>{{ $tramite->user_id}}</td>   
             <td>{{ $tramite->id}}</td>    
           
    
            <td>
            
            
            <a href="{{ route('derivacion', $tramite->id) }}" class="btn btn-sm btn-info">
                    <i class="fa fa-send"></i>
                </a>
             
        
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