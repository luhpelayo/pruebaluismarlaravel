@extends('store.templatePublic')

@section('content')


<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <!-- Our Services Area -->
    <section class="our_services_area">
        <div class="container">
            @if(  (isset($galleries)) )
                <div class=" text-inverse portfolio_inner_area col-md-12">
                    <div class="portfolio_filter" >
                        <div class="row">
                            @foreach ($galleries as $gallery)
                                <div class="col-sm-4 col-xs-12 col-sm-4 zoom">
                                    <img style="padding: 10px;" height="250" src="{{ asset( ($gallery->photos)[0]->path )  }}" alt="" >
                                    <p class="text-center text-black">
                                        <i class="fa fa-folder-open" aria-hidden="true"></i>
                                        <a href="{{route('gallery/photo',$gallery->id)}}" style="color: #222222"><b>{{ $gallery->title }} </b> </a>
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @if($pho ==1)
                        <div class="row">
                            <div class="tittle wow fadeInUp" >
                                <h2> {{$galerias->title}}</h2>
                                <h5>{{ $galerias->content }}</h5>
                            </div>
                            <br>
                            <div class="portfolio_item">
                                <div class="grid-sizer"></div>
                                @foreach ($galerias->photos as $phot)
                                    <div class="single_facilities col-md-4 col-xs-12 p0 adversting webdesign adversting">
                                        <div class="single_facilities_inner">
                                            <img style="padding: 10px;" src="{{ asset($phot->path) }}" alt="" height="400" width="400" >
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                 </div>
            @endif
                @if( !isset($galleries))
                <div class="row" style="padding-top: 50px">
                    <span> <b> -- No hay Elementos en La Galería</b></span>
                </div>
                @endif
        </div>


    </section>
    <!-- End Our Services Area -->
    @stop