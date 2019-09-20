@extends('store.templatePublic')

@section('content')

    <section class="what_we_area row">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>PROCESOS</h2>
              
            </div>

        
 <div class="panel panel-default">
<div class="panel-body">



            <div class="row construction_iner">
            @if(isset($procedimientos) && count($procedimientos) > 0)
                @foreach ($procedimientos as $pro)
                <div class="col-md col-sm-12 construction pull-left">
                    
                   <div class="cns-img">
                        <img src="{{ asset('images/procedimientos/'.$pro->url_img) }}" alt="" height="195" width="360">

                   </div>
                   <div class="cns-content">
                                 
                        <i class="fa fa-bar-chart" aria-hidden="true"></i>
                        <a href="{{ route('proced',$pro->id)}}">{{ $pro->nombre }}</a>
                        
                    
                   </div>

                </div>
                  @endforeach
                  @endif


 </div>

</div>
            </div>
        </div>
    </section>
@stop