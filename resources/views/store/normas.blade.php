@extends('store.template')

@section('content')
    <footer class="footer_area">
        <div class="container">
            <div class="footer_row row">

                <div class="col-md-3 col-sm-6 footer_about quick">
                    <h2>Normas de la carrera</h2>
                    @foreach ($normas as $norma)
                    <ul class="quick_link">
                       <li><a href="{{ asset('/file/getNorma/'.$norma->url_document)}}"><i class="fa fa-chevron-right"></i>{{ $norma->nombre }}</a></li>
                    </ul>
                    @endforeach
                </div>
                <div class="col-md-3 col-sm-6 footer_about">
                    <h2>Normas de la universidad</h2>
                     @foreach ($extermas as $norm)
                    <ul class="quick_link">
                       <li><a href="{{ asset('/file/getNorma/'.$norm->url_document)}}"><i class="fa fa-chevron-right"></i>{{ $norm->nombre }}</a></li>
                    </ul>
                    @endforeach
                </div>

            </div>
        </div>

    </footer>
@stop