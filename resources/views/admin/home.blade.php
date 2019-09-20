@extends('admin.template')
@section('content')
<div class="container box box-primary">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>{{ $recibido_count }}</h3>
                <h4>Doc. Recibidos</h4>
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
                <h3>{{$derivado_count}}</h3>
                <h4>Doc. Derivados</h4>
            </div>
            <div class="icon">
                <i class="fa fa-file-text-o"></i>
            </div>
            <!-- <a href="{{route('tramite.index')}}" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a> -->
        </div>
    </div><!-- ./col -->


    <div class="col-md-12">
        <div class="panel panel-danger">
            <h3>Misión</h3>
            <div class="panel-body">Nuestra misión es comercializar productos de calidad para fabricantes de calzado en la ciudad de Trujillo. Contando con un grupo humano competente y capacitado enfocados en satisfacer a nuestros clientes.</div>
        </div>

        <div class="panel panel-default">
            <h3>Visión</h3>
            <div class="panel-body">
                En el año 2020, buscamos ser reconocidos en el ámbito regional como una empresa líder en la comercialización de productos para la fabricación de calzado dentro de un entorno económico rentable.
            </div>
        </div>
        
    </div>
    
    
</div><!-- /.row -->

@endsection
