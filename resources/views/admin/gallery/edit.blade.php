@extends('admin.template')

@section('content')
  @section('css')
    <link  rel="stylesheet" href="{{asset('dropzone/css/basic.css')}}">
    <link  rel="stylesheet" href="{{asset('dropzone/css/dropzone.css')}}">
   
   @stop

<div class="container box box-primary">
  
        <div class="page-header  text-center">
           <h1>GALERIA
            {{--<i class="fa fa-file-image-o"style="color:green"></i>--}}
               {{--<small>[Agregar Galeria]</small>--}}
          </h1>
        </div><!-- /.box-header -->             
    <div class="col-xs-12 col-md-8 col-md-offset-2 col-xl-6 col-xl-offset-3">

        
        @if (count($errors) > 0)
            @include('admin.partials.errors')
        @endif
        
    <!-- Dropzone -->
    <label class="control-label" for="title">Imagenes</label>

    <div style="width: 675px; min-height: 300px; height: auto; border:1px solid slategray;" id="dropzone">
       

        {!! Form::model($gallery, array('route' => array('galleries.photo', $gallery->id),'class'=>'dropzone', 'id'=>'my-dropzone')) !!}

        <div class="fallback">
            <input name="file" type="file" multiple/>
        </div>
        <br>
        <br>
        {!! Form::close() !!}
    </div>   

         <!-- Gallery -->
        {!! Form::model($gallery, array('route' => array('galleries.update', $gallery),'files' => true)) !!}

            <input type="hidden" name="_method" value="PUT">
             
              <div class="form-group">
              <label for="title">Titulo:</label>
              {!! 
                  Form::text(
                      'title', 
                      null, 
                      array(
                         
                          'class'=>'form-control',
                          'placeholder' => 'Nombre del galleries...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>


         <div class="form-group">
           <label for="content">Contenido:</label>
              {!! 
                  Form::textarea(
                      'content', 
                      null, 
                      array(
                          'class'=>'form-control textarea-content',
                          'placeholder' => 'Contenido del artículo...',
                                        'autofocus' => 'autofocus'
                      )
                  ) 
              !!}
          </div>
         <h3>Permiso especial</h3>
         <div class="form-group">
            <label>{{Form::radio('status','PUBLISHED')}} Publicado</label>
            <label>{{Form::radio('status','DRAFT')}} Borrador</label>
         </div>
        
         <div class="form-group">
              
              {!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
              <a href="{{ route('galleries.index') }}" class="btn btn-warning">Cancelar</a>
          </div>

        
        
        {!! Form::close() !!}
        
  </div>
</div>
@endsection
@section('js')   
  <script src="{{asset('dropzone/dropzone.js')}}"></script>


    <script type="text/javascript">

        $(document).ready(function () {

                      Dropzone.options.myDropzone = {
                init: function () {
                    this.on("addedfile", function (file) {

                        var removeButton = Dropzone.createElement('<a class="dz-remove">Remover imagen</a>');
                        var _this = this;

                        removeButton.addEventListener("click", function (e) {
                            e.preventDefault();
                            e.stopPropagation();

                            var fileInfo = new Array();
                            fileInfo['name'] = file.name;

                            $.ajax({
                                type: "GET",
                               url: "{!! url('/galleries/delete/fhoto') !!}",
                                headers: {
                                    'X-CSRF-Token': $('meta[name="_token"]')
                                },
                                data: {file: file.name},
                                success: function (response) {

                                    if (response == 'success') {

                                        //alert('deleted');
                                    }
                                },
                                error: function () {
                                    alert("error");
                                }
                               
                            });

                            _this.removeFile(file);

                            
                        });

                       
                        file.previewElement.appendChild(removeButton);
                    });
                }
            };  


            var myDropzone = new Dropzone("#dropzone .dropzone");
            Dropzone.options.myDropzone = false;
            @foreach($gallery->photos as $photo)
          
            // Create the mock file:
            var mockFile = { name: "{!! $photo->file_name !!}", size: "{!! $photo->file_size !!}" };

            // Call the default addedfile event handler
            myDropzone.emit("addedfile", mockFile);

            // And optionally show the thumbnail of the file:
 
            myDropzone.emit("thumbnail", mockFile, "{!! url($photo->path) !!}");
         
            @endforeach
        });
    </script>
 @endsection        

 