@extends('admin.template')

@section('content')

<div class="box box-primary">
<div class="page-header text-center">
    <h1>
        <i class="fa fa-file-image-o"style="color:green"></i>
        SLIDERS IMAGE <a href="{{ route('sliders.create') }}" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Sliders</a>
    </h1>
</div>

<div class="box-body">              

 <table class="table table-striped table-bordered table-hover"  id="dataTable_eventos">

        <thead>
            <tr>
                <th>Codigo</th>
                <th>Fecha de creación</th>
                <th>Imagen </th>
                <th>Acciónes </th>
            </tr>
        </thead>         
   <tbody>
    @foreach($slider as $slide)
         <tr>  
             <td>{{ $slide->id }}</td>
             <td>{{ $slide->created_at }}</td>
          
              @if ($slide->url)
               <td><img src="{{ asset('images/slideImages/'.$slide->url) }}" height="40" width="120" /></td>

              @else
                  <td>No image</td>
              @endif
             <td>

                {!! Form::open(['route' => ['sliders.destroy', $slide],'style'=>'display:inline']) !!}
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
            $('#dataTable_eventos').DataTable({
                //responsive: true,
                //scrollX: true,
                pageLength: 10,
                order: [[ 0, "desc" ]],
                lengthMenu: [ 2, 4, 10, 20, 50 ],
                columnDefs: [
                    { "orderable": false, "targets": 3 }
                ]
            });
        });
    </script>
 @endsection  