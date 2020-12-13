
@extends('store.templatePublic')
@include('store.informativa.layouts.headContentEventos')

@section('content')
<div class="box box-primary">
<div class="page-header text-center">
    <h1>
        <i class="fa fa-user-o"></i>
        Bolsa de Empleo <a href="{{ route('crearcurriculum') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Nuevo</a>
    </h1>
</div>
<div class="panel-body">
        
           {{ Form::open(['route' =>'bolsa_de_trabajos', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right','role'=>'search']) }}
                <!-- <div class="form-group">Nombre:
                   
                    {{ Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => '']) }}

                </div> -->
                <div class="form-group">Año de Graduacion:
                   
                   {{ Form:: select(
                             'anho_de_graduacion',
                                [
                                  ''=>'Seleccione opción',
                                  '2019' => '2019',
                                  '2018' => '2018',
                                  '2017' => '2017',
                                  '2016' => '2016',
                                  '2015' => '2015',
                                  '2014' => '2014',
                                  '2013' => '2013',
                                  '2012' => '2012',
                                  '2011' => '2011',
                                  '2010' => '2010',
                                  '2009' => '2009'
                                ],
                                null, ['class' => 'form-control', 'placeholder' => '']) }}

               </div>
               <!-- <div class="form-group">Genero:
                   
                   {{ Form:: select(
                             'genero',
                             [
                                  ''=>'Seleccione opción',
                                  'Masculino' => 'Masculino',
                                  'Femenino' => 'Femenino',
                                  'Prefiero no decir' => 'Prefiero no decirlo'
                                ],
                                null, ['class' => 'form-control', 'placeholder' => '']) }}

               </div>
               <div class="form-group">Años de Experiencia:
                   
                   {{ Form:: select(
                             'anhos_de_experiencia',
                             [
                                  ''=>'Seleccione opción',
                                  '0' => '0',
                                  '1' => '1',
                                  '2' => '2',
                                  '3' => '3',
                                  '4' => '4',
                                  '5' => '5',
                                  '6' => '6',
                                  '7' => '7',
                                  '8' => '8',
                                  '9' => '9',
                                  '10' => '10'
                                ],
                                null, ['class' => 'form-control', 'placeholder' => '']) }}

               </div>
               <div class="form-group">Ingles:
                   
                   {{ Form:: select(
                             'ingles',
                             [
                                  ''=>'Seleccione opción',
                                  'Basico' => 'Basico',
                                  'Intermedio' => 'Intermedio',
                                  'Avanzado' => 'Avanzado'
                                ],
                                null, ['class' => 'form-control', 'placeholder' => '']) }}

               </div> -->
                <button type="submit" class="btn btn-info btn-flat">Buscar</button>
           {{ Form::close() }}    

</div>

<!-- <div class="panel-body">
        
           {{ Form::open(['route' =>'bolsa_de_trabajos', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right','role'=>'search']) }}
                <div class="form-group">
                   
                    {{ Form::text('anho_de_graduacion', null, ['class' => 'form-control', 'placeholder' => 'Search bolsa_de_trabajo']) }}

                </div>
                <button type="submit" class="btn btn-info btn-flat">Buscar</button>
           {{ Form::close() }}    

</div>
<div class="panel-body">
        
           {{ Form::open(['route' =>'bolsa_de_trabajos', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right','role'=>'search']) }}
                <div class="form-group">
                   
                    {{ Form::text('genero', null, ['class' => 'form-control', 'placeholder' => 'Search bolsa_de_trabajo']) }}

                </div>
                <button type="submit" class="btn btn-info btn-flat">Buscar</button>
           {{ Form::close() }}    

</div>
<div class="panel-body">
        
           {{ Form::open(['route' =>'bolsa_de_trabajos', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right','role'=>'search']) }}
                <div class="form-group">
                   
                    {{ Form::text('anhos_de_experiencia', null, ['class' => 'form-control', 'placeholder' => 'Search bolsa_de_trabajo']) }}

                </div>
                <button type="submit" class="btn btn-info btn-flat">Buscar</button>
           {{ Form::close() }}    

</div>
<div class="panel-body">
        
           {{ Form::open(['route' =>'bolsa_de_trabajos', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right','role'=>'search']) }}
                <div class="form-group">
                   
                    {{ Form::text('ingles', null, ['class' => 'form-control', 'placeholder' => 'Search bolsa_de_trabajo']) }}

                </div>
                <button type="submit" class="btn btn-info btn-flat">Buscar</button>
           {{ Form::close() }}    

</div>
<div class="panel-body">
        
           {{ Form::open(['route' =>'bolsa_de_trabajos', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right','role'=>'search']) }}
                <div class="form-group">
                   
                    {{ Form::text('postgrado', null, ['class' => 'form-control', 'placeholder' => 'Search bolsa_de_trabajo']) }}

                </div>
                <button type="submit" class="btn btn-info btn-flat">Buscar</button>
           {{ Form::close() }}    

</div> -->
<div class="box-body">              
<table class="display table table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
              
                <th>Nombre</th>  
                <th>Año de Graduacion</th>          
                <th>Genero</th>
                <th>Email</th>
                <th text-center style="width: 100px;">Acciónes </th>
            </tr>
        </thead>         
   <tbody>
    @foreach($bolsa_de_trabajos as $bolsa_de_trabajo)
         <tr>  
             
             <td>{{ $bolsa_de_trabajo->nombre }}</td>  
             <td>{{ $bolsa_de_trabajo->anho_de_graduacion }}</td>
             <td>{{ $bolsa_de_trabajo->genero }}</td>
             <td>{{ $bolsa_de_trabajo->email }}</td>
             <td>
             <a class="btn btn-primary" class="download_file" href="{{ route('bolsa_de_trabajo',$bolsa_de_trabajo->id)}}" ><span>&nbsp;</span>Ver
                    <i class="fa fa-pencil-square"></i>
                </a>
                <a class="btn btn-primary" class="download_file" href="{{ asset('/file/getBolsa_de_trabajo/'.$bolsa_de_trabajo->curriculum) }}" ><i class="fa fa-download" aria-hidden="true"></i><span>&nbsp;</span>Curriculum
                    <i ></i>
                </a>
            </td>
        </tr>
    @endforeach

    </tbody>
   </table>
    {{ $bolsa_de_trabajos->render() }}
</div> 
</div>    
@stop