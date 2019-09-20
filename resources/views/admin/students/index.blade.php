@extends('admin.template')

@section('content')

<div class="box box-primary">
<div class="page-header text-center">
    <h1>
        {{--<i class="fa fa-calendar"style="color:green"></i>--}}
        ESTUDIANTES <a href="{{ route('students.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Nuevo</a>
    </h1>
</div>
<div class="box-body">              

 <table class="table table-bordered table-hover"  id="dataTable_students">

        <thead>
            <tr>
                <th>Año</th>
                <th>Total Estudiantes</th>
                <th>Ingreso</th>
                <th>Egreso</th>
                <th>Activos</th>
                <th>Inactivos</th>
                <th width="10%">Acciónes </th>
            </tr>
        </thead>         
   <tbody>
    @foreach($students as $student)
         <tr>  
             <td>{{ $student->dateReport }}</td>
             <td>{{ $student->total }}</td>

             <td>{{ $student->in }}</td>
             <td>{{ $student->out }}</td>
             <td>{{ $student->active }}</td>
             <td>{{ $student->inactive }}</td>
             <td>
                <a href="{{ route('students.edit', $student) }}" class="btn btn-primary">
                    <i class="fa fa-pencil-square"></i>
                </a>
                {!! Form::open(['route' => ['students.destroy', $student],'style'=>'display:inline']) !!}
                        <input type="hidden" name="_method" value="DELETE">
                        <button onClick="return confirm('Eliminar registro ? ')" class="btn btn-danger">
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
            $('#dataTable_students').DataTable({
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