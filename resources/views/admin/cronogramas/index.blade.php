@extends('admin.template')

@section('content')

<div class="box box-primary">
<div class="page-header text-center">
    <h1>
        {{--<i class="fa fa-calendar"style="color:green"></i>--}}
        CRONOGRAMAS <a href="{{ route('cronogramas.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Nuevo</a>
    </h1>
</div>
    <div class="fb-share-button" data-href="http://financiera.test:81/eventos" data-layout="button_count" data-size="small">
        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Ffinanciera.test%3A81%2Feventos&amp;src=sdkpreparse"
           class="fb-xfbml-parse-ignore">Compartir</a>
    </div>
<div class="box-body">              

 <table class="table table-bordered table-hover"  id="dataTable_cronogramas">

        <thead>
            <tr>
                <th>Titulo</th> 
                <th>Fecha</th>          
                <th>Tipo de Archivo</th>
                <th>Responsable</th>
                <th>Imagen</th>
                <th width="10%">Acciónes </th>
            </tr>
        </thead>         
   <tbody>
    @foreach($cronograma as $cronog)
         <tr>  
             <td>{{ $cronog->title }}</td>       
             <td>{{ $cronog->cronog_date }}</td>
             <td>{{ $cronog->lugar }}</td>
             <td>{{ $cronog->user->name}}</td>
              @if ($cronog->url_img)
               <td><img src="{{ asset('images/cronogramas/'.$cronog->url_img) }}" height="40" width="120" /></td>

              @else
                  <td>No image</td>
              @endif
             <td>
                <a href="{{ route('cronogramas.edit', $cronog) }}" class="btn btn-primary">
                    <i class="fa fa-pencil-square"></i>
                </a>
                {!! Form::open(['route' => ['cronogramas.destroy', $cronog],'style'=>'display:inline']) !!}
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