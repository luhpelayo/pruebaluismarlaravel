@extends('admin.template')

@section('content')

<div class="box box-primary">
<div class="page-header text-center">
    <h1>
        <i class="fa fa-file-text-o"style="color:green"></i>
        NORMAS <a href="{{ route('normas.create') }}" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Norma</a>
    </h1>
</div>

<div class="box-body">              

 <table class="table table-bordered table-hover"  id="dataTable_normas">

        <thead>
            <tr>
                <th>Codigo</th>
                <th>Tipo norma</th>
                <th>Nombre</th>  
                <th>Acciónes </th>
            </tr>
        </thead>         
   <tbody>
    @foreach($normas as $norma)
         <tr>  
             <td>{{ $norma->id }}</td>
             <td>{{ $norma->tipo_norma }}</td>
             <td>{{ $norma->nombre }}</td>
             
             <td>
                <a href="{{ route('normas.edit', $norma) }}" class="btn btn-primary">
                    <i class="fa fa-pencil-square"></i>
                </a>
              {!! Form::open(['route' => ['normas.destroy', $norma],'style'=>'display:inline']) !!}
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
            $('#dataTable_normas').DataTable({
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
 