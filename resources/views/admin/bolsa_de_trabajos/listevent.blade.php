
<table class="display table table-hover" cellspacing="0" width="100%" id="dataTable_eventos">
        <thead>
            <tr>
                <th >Titulo</th>
                <th>Contenido</th>  
                <th>Fecha</th>          
                <th>Lugar</th>
                <th>Organizador</th>
                <th>Responsable</th>
                <th text-center style="width: 100px;">Acciones </th>
            </tr>
        </thead>         
   <tbody>
    @foreach($eventos as $evento)
         <tr>  
             <td>{{ $evento->title }}</td>
             <td>{{ $evento->content }}</td> 
             <td>{{ $evento->event_date }}</td>
             <td>{{ $evento->lugar }}</td>
             <td>{{ $evento->org }}</td>
             <td>{{ $evento->usuario}}</td>
             <td>
                <a href="{{ route('eventos.edit', $eventos) }}" class="btn btn-primary">
                    <i class="fa fa-pencil-square"></i>
                </a>
            </td>
            <td>
              {!! Form::open(['route' => ['eventos.destroy', $eventos]]) !!}
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
    {!!$eventos->links()!!}
</div>
@section('js')
    <script>
        // dataTable
        $(document).ready(function() {
            $('#dataTable_eventos').DataTable({
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