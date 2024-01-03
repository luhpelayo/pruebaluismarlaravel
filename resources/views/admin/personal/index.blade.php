@extends('admin.template')

@section('content')
<div class="box box-primary">
<div class="page-header text-center">
    <h1>
        <i class="fa fa-user"style="color:green"></i>
        PERSONAL
        @can('personal.create') 
        <a href="{{ route('personal.create') }}" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Registrar</a>
        @endcan
    </h1>
</div>
<div class="panel-body">
        
           {{ Form::open(['route' =>'personal.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right','role'=>'search']) }}
                <div class="form-group">
                   
                    {{ Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Search personal']) }}

                </div>
                <button type="submit" class="btn btn-info btn-flat">Buscar</button>
           {{ Form::close() }}    

</div>
<div class="box-body">              
<table class="display table table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
             <th style="width:20px">Codigo</th>
                <th>Imagen</th>
                <th>Nombre</th>          
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Telefono</th>
                <th>ci</th>
           
                <th width="10%">Acciónes </th>
            </tr>
        </thead>         
   <tbody>
    @foreach($personal as $per)
         <tr>  
             <td>{{ $per->id }}</td>
             @if ($per->url_img)
              <td><img src="{{asset($per->url_img)}}" height="130" width="130" /></td>

              @else
                  <td>No image</td>
              @endif 
             
             <td>{{ $per->nombre }}</td> 
             <td>{{ $per->apellido_paterno }}</td>  
             <td>{{ $per->apellido_materno }}</td>   
             <td>{{ $per->telefono }}</td> 
             <td>{{ $per->ci }}</td> 

             @can('personal.edit') 
             <td>
                <a href="{{ route('personal.edit', $per->id) }}" class="btn btn-primary">
                    <i class="fa fa-pencil-squper"></i>
                </a>
            </td>
             @endcan
             @can('personal.destroy') 
            <td>
              {!! Form::open(['route' => ['personal.destroy', $per]]) !!}
                        <input type="hidden" name="_method" value="DELETE">
                        <button onClick="return confirm('Eliminar registro?')" class="btn btn-danger">
                          <i class="fa fa-trash-o"></i>
                        </button>
              {!! Form::close() !!}  
            </td> 
            @endcan
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
            $('#dataTable_personals').DataTable({
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

     <script>(function(d, s, id) {
             var js, fjs = d.getElementsByTagName(s)[0];
             if (d.getElementById(id)) return;
             js = d.createElement(s); js.id = id;
             js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
             fjs.parentNode.insertBefore(js, fjs);
         }(document, 'script', 'facebook-jssdk'));
     </script>
     <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v3.3"></script>
 @endsection  