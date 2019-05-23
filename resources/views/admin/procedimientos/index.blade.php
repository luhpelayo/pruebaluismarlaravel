@extends('admin.template')

@section('content')

<div class="box box-primary">
<div class="page-header text-center">
    <h1>
        <i class="fa fa-recycle"style="color:green"></i>
        PROCEDIMIENTOS <a href="{{ route('procedimientos.create') }}" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Procedimientos</a>
    </h1>
</div>

<div class="box-body">              

 <table class="table table-bordered table-hover"  id="dataTable_procedimientos">

        <thead>
            <tr>
                <th>Nombre</th>
                <th>Contenido</th>  
                <th>Fecha</th>    
                <th>Imagen</th>      
                <th>Acciónes </th>
            </tr>
        </thead>         
   <tbody>
    @foreach($procedimientos as $proc)
         <tr>  
             <td>{{ $proc->nombre }}</td>
             <td>{{ substr($proc->content, 0, 50) }} [...]</td>
             <td>{{ $proc->created_at }}</td>
             @if ($proc->url_img)
               <td><img src="{{ asset('images/procedimientos/'.$proc->url_img) }}" height="40" width="120" /></td>

              @else
                  <td>No image</td>
              @endif
             <td>
                <a href="{{ route('procedimientos.edit', $proc) }}" class="btn btn-primary">
                    <i class="fa fa-pencil-square"></i>
                </a>
                {!! Form::open(['route' => ['procedimientos.destroy', $proc],'style'=>'display:inline']) !!}
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
   
</div> 
</div>    
@endsection

@section('js')
  
     <script>
        // dataTable
        $(document).ready(function() {
            $('#dataTable_procedimientos').DataTable({
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
 