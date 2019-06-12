
<table class="display table table-hover" cellspacing="0" width="100%" id="dataTable_cronogramas">
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
    @foreach($cronogramas as $cronograma)
         <tr>  
             <td>{{ $cronograma->title }}</td>
             <td>{{ $cronograma->content }}</td> 
             <td>{{ $cronograma->cronog_date }}</td>
             <td>{{ $cronograma->lugar }}</td>
             <td>{{ $cronograma->org }}</td>
             <td>{{ $cronograma->usuario}}</td>
             <td>
                <a href="{{ route('cronogramas.edit', $cronogramas) }}" class="btn btn-primary">
                    <i class="fa fa-pencil-square"></i>
                </a>
            </td>
            <td>
              {!! Form::open(['route' => ['cronogramas.destroy', $cronogramas]]) !!}
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
    {!!$cronogramas->links()!!}
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