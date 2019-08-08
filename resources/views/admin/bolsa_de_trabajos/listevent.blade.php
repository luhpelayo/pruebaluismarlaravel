
<table class="display table table-hover" cellspacing="0" width="100%" id="dataTable_eventos">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Nroregistro</th>  
                <th>Email</th>          
                <th>Telefono</th>
                <th>Fecha</th>   
                <th text-center style="width: 100px;">Acciones </th>
            </tr>
        </thead>         
   <tbody>
   @foreach($bolsa_de_trabajo as $bolsa_de_trabaj)
         <tr>  
             <td>{{ $bolsa_de_trabaj->nombre }}</td>
           
          
             <td>{{ $bolsa_de_trabaj->nroregistro }}</td>
             <td>{{ $bolsa_de_trabaj->email }}</td>
             <td>{{ $bolsa_de_trabaj->telefono }}</td>
             <td>{{ $bolsa_de_trabajo->event_date }}</td>
             <td>
                <a href="{{ route('bolsa_de_trabajos.edit', $bolsa_de_trabajos) }}" class="btn btn-primary">
                    <i class="fa fa-pencil-square"></i>
                </a>
            </td>
            <td>
              {!! Form::open(['route' => ['bolsa_de_trabajos.destroy', $bolsa_de_trabajos]]) !!}
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
    {!!$bolsa_de_trabajos->links()!!}
</div>
@section('js')
    <script>
        // dataTable
        $(document).ready(function() {
            $('#dataTable_bolsa_de_trabajos').DataTable({
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