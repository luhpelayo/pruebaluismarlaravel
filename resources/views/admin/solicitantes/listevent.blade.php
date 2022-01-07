
<table class="display table table-hover" cellspacing="0" width="100%" id="dataTable_cronogramas">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>          
                <th>CI</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th>Lat</th>
                <th>Lon</th>
                <th>Email</th>
                <th>Precio</th>
                <th text-center style="width: 100px;">Acciones </th>
            </tr>
        </thead>         
   <tbody>
    @foreach($solicitantes as $solicitante)
         <tr>  
             <td>{{ $solicitante->nombre }}</td>
             <td>{{ $solicitante->apellido }}</td>
             <td>{{ $solicitante->ci }}</td>
             <td>{{ $solicitante->telefono}}</td>
             <td>{{ $solicitante->direccion}}</td>
             <td>{{ $solicitante->lat}}</td>
             <td>{{ $solicitante->lon}}</td>
             <td>{{ $solicitante->email}}</td>
             <td>{{ $solicitante->precio}}</td>
             <td>
                <a href="{{ route('solicitantes.edit', $solicitantes) }}" class="btn btn-primary">
                    <i class="fa fa-pencil-square"></i>
                </a>
            </td>
            <td>
              {!! Form::open(['route' => ['solicitantes.destroy', $solicitantes]]) !!}
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
<div class="text-center">
    {!!$solicitantes->links()!!}
</div>
@section('js')
    <script>
        // dataTable
        $(document).ready(function() {
            $('#dataTable_cronogramas').DataTable({
                //responsive: true,
                //scrollX: true,
                pageLength: 10,
                order: [[ 0, "desc" ]],
                lengthMenu: [ 2, 4, 10, 20, 50 ],
                columnDefs: [
                    { "orderable": false, "targets": 7 }
                ]
            });
        });
    </script>
 @endsection   