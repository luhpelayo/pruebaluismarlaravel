@extends('admin.template')
@section('content')
<div class="container box box-primary">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>{{ $recibido_count }}</h3>
                <h4>Agenda Recibidos</h4>
            </div>
            <div class="icon">
                <i class="fa fa-file-text-o"></i>
            </div>
            <!-- <a href="{{route('tramite.index')}}" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a> -->
        </div>
    </div><!-- ./col -->
   

    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{ $terminado_count }}</h3>
                <h4>Agenda Terminadas</h4>
            </div>
            <div class="icon">
                <i class="fa fa-file-text-o"></i>
            </div>
            <!-- <a href="{{route('tramite.index')}}" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a> -->
        </div>
    </div><!-- ./col -->


    <div class="col-md-12">
        <div class="panel panel-danger">
            <h3>   Misión</h3>
            <div class="panel-body">“PLSOFT” es una empresa de desarrollo de software comprometida con la satisfacción del cliente, diseñando, fabricando y entregando software de la más alta calidad
Se establecen, controlan y alcanzan los objetivos establecidos en cada uno de los productos de software a desarrollar con el fin de encontrar o exceder las expectativas de nuestros clientes.
</div>
        </div>

        <div class="panel panel-default">
            <h3>  Visión</h3>
            <div class="panel-body">
            Ser una empresa reconocida a nivel nacional por la calidad del software que produce, comprometida con el servicio al cliente, con recursos humanos de gran formación y conocimiento tecnológico.  
            </div>
        </div>
        
    </div>
    
    
</div><!-- /.row -->

@endsection
