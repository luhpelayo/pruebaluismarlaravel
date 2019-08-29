@extends('store.templatePublic')

@section('content')


<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <!-- Our Services Area -->
    <section class="our_services_area">
        <div class="container">
            <div class=" text-inverse portfolio_inner_area col-md-12">
                    <div class="portfolio_filter " >
                        <ul>
                          @foreach ($galleries as $gallery)      
                                              
                             <li data-filter=".adversting"> 
                                 <div class="zoom">
                                     <img style="padding: 10px;" src="{{ asset( ($gallery->photos)[0]->path ) }}" alt="" height="50" width="50" > 
                                 <i class="fa fa-folder-open" aria-hidden="true"></i> 
                              <a href="{{route('gallery/photo',$gallery->id)}}">{{ $gallery->title }}</a>
                                 </div>
                             
                            
                            </li>  
                          @endforeach
                        </ul>
                    </div>
                @if($pho ==1)
                <div class="tittle wow fadeInUp" >            
                   <h4>{{ $galerias->content }}</h4>
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
            @endif
            </div>
        </div>
    </section>
    <!-- End Our Services Area -->
    @stop