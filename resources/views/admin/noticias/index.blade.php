@extends('admin.template')

@section('content')
<div class="box box-primary">
<div class="page-header text-center">
    <h1>
        <i class="fa fa-newspaper-o"style="color:green"></i>
        NOTICIAS <a href="{{ route('noticias.create') }}" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Noticias</a>
    </h1>
</div>

<div class="box-body">              
 
 <table class="table table-bordered table-hover"  id="dataTable_noticias">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>PreNoticia</th> 
                <th>Noticia</th>  
                <th>Autor</th>          
                <th>Publicado por</th>
                <th>Fecha plublicacion</th>
                <th>Imagen</th>
                <th width="10%">Acciónes </th>

            </tr>
        </thead>         
   <tbody>
    @foreach($noticia as $notici)
         <tr>  
             <td>{{ $notici->title }}</td>
             <td>{{ substr($notici->precontent, 0, 50) }} [...]</td>
             <td>{{ substr($notici->content, 0, 50) }} [...]</td>
             <td>{{ $notici->auth }}</td>
             <td>{{ $notici->user->name}}</td>
             <td>{{ $notici->created_at }}</td>
            
              @if ($notici->url_img)
               <td><img src="{{ asset('images/noticias/'.$notici->url_img) }}" height="40" width="120" /></td>

              @else
                  <td>No image</td>
              @endif
             <td>
                <a href="{{ route('noticias.edit', $notici) }}" class="btn btn-primary">
                    <i class="fa fa-pencil-square"></i>
                </a>
                {!! Form::open(['route'=> ['noticias.destroy', $notici],'style'=>'display:inline']) !!}
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
            $('#dataTable_noticias').DataTable({
                //responsive: true,
                //scrollX: true,
                pageLength: 10,
                order: [[ 0, "desc" ]],
                lengthMenu: [ 2, 4, 10, 20, 50 ],
                columnDefs: [
                    { "orderable": false, "targets":6 }
                ]
            });
        });
    </script>
 @endsection  