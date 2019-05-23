@extends('admin.template')
@section('content')
    @section('css')
    <link  rel="stylesheet" href="{{asset('dropzone/css/basic.css')}}">
    <link  rel="stylesheet" href="{{asset('dropzone/css/dropzone.css')}}">
   
    @stop
<div class="container box box-primary">
    <!-- Dropzone -->
 <div class="col-xs-12 col-md-8 col-md-offset-2 col-xl-6 col-xl-offset-3">
    <label class="control-label" for="title">ANEXAR ARCHIVOS</label>

    <div style="width: 700px; min-height: 300px; height: auto; border:1px solid slategray;" id="dropzone">
       

        {!! Form::model($tramite, array('route' => array('upload.archivo', $tramite->id),'class'=>'dropzone', 'id'=>'my-dropzone')) !!}


        <!-- Single file upload
        <div class="dz-default dz-message"><span>Drop files here to upload</span></div>
        -->
        <!-- Multiple file upload-->
        <div class="fallback">
            <input name="file" type="file" multiple/>
        </div>
        <br>
        <br>

        {!! Form::close() !!}

    </div>
    <br>
    <div class="form-group">
          
          <a href="{{ route('tramite.index') }}" class="btn btn-warning">Regresar</a>
    </div>
 @section('js')   
  <script src="{{asset('dropzone/dropzone.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {

                      Dropzone.options.myDropzone = {
                init: function () {
                    this.on("addedfile", function (file) {

                        var removeButton = Dropzone.createElement('<a class="dz-remove">Remove file</a>');
                        var _this = this;

                        removeButton.addEventListener("click", function (e) {
                            e.preventDefault();
                            e.stopPropagation();

                            var fileInfo = new Array();
                            fileInfo['name'] = file.name;

                            $.ajax({
                                type: "GET",
                               url: "{!! url('/archivo/delete') !!}",
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
            @foreach($tramite->archivos as $arch)
          
            // Create the mock file:
            var mockFile = { name: "{!! $arch->file_name !!}", size: "{!! $arch->file_size !!}" };

            // Call the default addedfile event handler
            myDropzone.emit("addedfile", mockFile);

            // And optionally show the thumbnail of the file:
 
            myDropzone.emit("thumbnail", mockFile, "{!! url($arch->path) !!}");
         
            @endforeach
        });
    </script>
 @endsection 
</div>
</div>

@stop