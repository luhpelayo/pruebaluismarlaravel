@extends('store.templatePublic')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <section class="our_services_area" style="padding-top: 10px; padding-bottom: 10px; background: rgba(255,255,255,.9);">
        <div class="container">
            <div class="row" style="background-color: rgba(255,255,255,1);">

                <div class="col-md-6 col-sm-6">
                    <h2 style="padding-bottom: 10px; padding-top: 20px;font-size: 1.5em;">Normas de la Carrera</h2>
                    @foreach ($normas as $norma)
                    <ul class="text-blue">
                       <li style="list-style: none"><a href="{{ asset('/file/getNorma/'.$norma->url_document)}}"><i class="fa fa-chevron-right"></i> <b> {{ $norma->nombre }}</b></a></li>
                       {{--<li style="list-style: none"><a  href="https://www.uagrm.edu.bo/carrera.php?codigo=64" target="_blank"><i class="fa fa-chevron-right"></i> <b> {{ $norma->nombre }}</b></a></li>--}}
                    </ul>
                    @endforeach
                </div>
                <div class="col-md-9 col-sm-9">
                    <h2 style="padding-bottom: 10px; font-size: 1.5em;" class="text-capitalize">Normas de la Universidad</h2>
                     @foreach ($extermas as $norm)
                    <ul class="text-capitalize">
                       <li style="list-style: none" ><a href="{{ asset('/file/getNorma/'.$norm->url_document)}}"><i class="fa fa-chevron-right"></i> <b> {{ $norm->nombre }}</b> </a></li>
                        {{--<li style="list-style: none"><a  href="https://www.uagrm.edu.bo/info/legislacion.php" target="_blank"><i class="fa fa-chevron-right"></i> <b> {{ $norm->nombre }} </b></a></li>--}}
                    </ul>
                    @endforeach
                </div>

            </div>
        </div>

    </section>
@stop