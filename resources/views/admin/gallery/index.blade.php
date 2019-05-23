@extends('admin.template')

@section('content')
<div class="box box-primary">
<div class="page-header text-center">
    <h1>
        <i class="fa fa-file-image-o"style="color:green"></i>
        GALLEREIS <a href="{{ route('galleries.create') }}" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Gallery</a>
    </h1>
</div>
<div class="box-body">              
 <table class="table table-bordered table-hover"  id="dataTable_gallery">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Titulo</th>
                <th >Fecha de recepcion</th>
                <th >Fecha de modeficaón</th>
                <th >Estado</th>
                <th text-center style="width: 50px;">Acciones </th>
            </tr>
        </thead>         
   <tbody>
    @foreach($galleries as $gallery)
         <tr>    
             <td>{{ $gallery->id }}</td>
             <td>{{ $gallery->title }}</td>
             <td>{{ $gallery->created_at}}</td>  
             <td>{{ $gallery->updated_at}}</td>   
             <td>{{ $gallery->status}}</td>   
           
             <td>
                <a href="{{ route('galleries.edit', $gallery) }}" class="btn btn-sm btn-primary">
                    <i class="fa fa-pencil-square"></i>
                </a>

              {!! Form::open(['route' => ['galleries.destroy', $gallery],'style'=>'display:inline']) !!}
                        <input type="hidden" name="_method" value="DELETE">
                        <button onClick="return confirm('Eliminar registro?')" class="btn btn-sm btn-danger">
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
            $('#dataTable_gallery').DataTable({
                //responsive: true,
                //scrollX: true,
                pageLength: 10,
                order: [[ 0, "desc" ]],
                lengthMenu: [ 2, 4, 10, 20, 50 ],
                columnDefs: [
                    { "orderable": false, "targets": 5}
                ]
            });
        });
    </script>
 @endsection  