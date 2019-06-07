@extends('store.template')

@section('content')
    <!-- Our Services Area -->
    <section class="our_services_area">
        <div class="container">
            <div class="portfolio_inner_area">
                    <div class="portfolio_filter">
                        <ul>
                          @foreach ($galleries as $gallery)                               
                             <li data-filter=".adversting"><a href="{{route('gallery/photo',$gallery->id)}}">{{ $gallery->title }}</a></li>  
                          @endforeach
                        </ul>
                    </div>
            @if($pho ==1)
                <div class="tittle wow fadeInUp">            
                   <h4>{{ $galerias->content }}</h4>
                </div>
                <br>


                <div class="portfolio_item">
                   <div class="grid-sizer"></div>
                    @foreach ($galerias->photos as $phot)
                    <div class="single_facilities col-xs-4 p0 adversting webdesign adversting">
                       <div class="single_facilities_inner">
                            <img src="{{ asset($phot->path) }}" alt="" height="400" width="400" >
                            {{--<div class="gallery_hover">--}}
                                {{--<h4>Construction</h4>--}}
                                {{--<ul>--}}
                                    {{--<li><a href="#"><i class="fa fa-link" aria-hidden="true"></i></a></li>--}}
                                    {{--<li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
            </div>
        </div>
    </section>
    <!-- End Our Services Area -->
    @stop