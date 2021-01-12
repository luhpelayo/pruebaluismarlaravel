@extends('admin.template')
@section('content')
<div class="container box box-primary">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>{{ $recibido_count }}</h3>
                <h4>Solicitudes Recibidos</h4>
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
                <h4>Solicitudes Terminados</h4>
            </div>
            <div class="icon">
                <i class="fa fa-file-text-o"></i>
            </div>
            <!-- <a href="{{route('tramite.index')}}" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a> -->
        </div>
    </div><!-- ./col -->

    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{ $noterminado_count }}</h3>
                <h4>Solicitudes No Terminados</h4>
            </div>
            <div class="icon">
                <i class="fa fa-file-text-o"></i>
            </div>
            <!-- <a href="{{route('tramite.index')}}" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a> -->
        </div>
    </div><!-- ./col -->



    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-orange">
            <div class="inner">
                <h3>{{$derivado_count}}</h3>
                <h4>Sol. Derivados En Proceso</h4>
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
            <div class="panel-body">Ofrecer soporte técnico gratuito con excelencia a toda la comunidad educativa vinculada a este proyecto. Orientados a la satisfacción del usuario, abiertos siempre al cambio, conscientes de la mejora continua, enfocados a la solución de problemas. Al mismo tiempo proporcionarles una oportunidad de aprendizaje práctico a todos los miembros del equipo</div>
        </div>

        <div class="panel panel-default">
            <h3>Visión</h3>
            <div class="panel-body">
            Ofrecer soporte técnico al 70% de las escuelas adscritas a las instituciones educativas vinculadas, aumentando progresivamente durante los tres primeros meses de ejecución de este proyecto. Además de formar diez y seis técnicos en sistemas que puedan desenvolverse en el ámbito productivo con eficiencia y calidad, además de contar con valores éticos y un alto grado de responsabilidad.  
            </div>
        </div>
        
    </div>
    
    
</div><!-- /.row -->

@endsection
