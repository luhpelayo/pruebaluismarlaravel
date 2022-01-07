@section('content')
<div class="box box-primary">
<div class="page-header text-center">
    <h1> Orden de trabajo
        @can('tramite.create') 
        <a href="{{ route('tramite.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Nuevo</a>
        @endcan
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
                <th>Tipo recepcion</th>
                <th>Atendido</th>
                <th>Nro. Solicitud</th>
              
              
                <th text-center style="width: 120px;">Acciones </th>
            </tr>
        </thead>         
   <tbody>
 
    @foreach($tramites as $tramite)
         <tr>
            <th>
            @if($tramite->estado_id == '1')
                    <span class="label label-info">Recibido</span>
                @else
                    <span class="label label-danger">Derivado</span>
                @endif

                @extends('admin.template')

             </th>    
             <td>{{ $tramite->created_at}}</td>
             <td>{{ $tramite->nroficio }}</td> 
             <td>{{ $tramite->referencia }}</td>
             <td>{{ $tramite->tipo }}</td>
             <td>{{ $tramite->user_id}}</td>    
             <td>{{ $tramite->id}}</td>   
           
            <td>
             
 
             
                <a href="{{ route('derivacion', $tramite->id) }}" class="btn btn-sm btn-info">
                    <i class="fa fa-send"></i>
                </a>
             
        
            
                
                
                @can('tramite.edit')
                <a href="{{ route('tramite.edit', $tramite->id) }}" class="btn btn-sm btn-primary">
                    <i class="fa fa-pencil-square"></i>
                </a>
                @endcan

               @can('roles.destroy')
              {!! Form::open(['route' => ['tramite.destroy', $tramite],'style'=>'display:inline']) !!}
                        <input type="hidden" name="_method" value="DELETE">
                        <button onClick="return confirm('Eliminar registro?')" class="btn btn-sm btn-danger">
                          <i class="fa fa-trash-o"></i>
                        </button>
              {!! Form::close() !!}  
              @endcan 
              
              <a href="{{ route('tramite.indexsoli', $tramite->id) }}" class="btn btn-primary">
                    <i class="fa fa-pencil-square"></i> Detalle
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