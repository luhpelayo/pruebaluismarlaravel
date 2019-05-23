
<div class="wrapper" >

      <header class="main-header">
        <!-- Logo -->
        <a href="{{route('home')}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>ING.</b>FINANCIERA</span>

        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
             
              <li class="dropdown user user-menu">

              
       <!--DESDE AQUI-->
                    <ul class="nav navbar-nav">
                    @include('admin.partials.menu-user')
                    </ul>
     <!-- HASTA AQUI -->

              </li>

            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
               <p>{{ Auth::user()->name }}</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MENU PRINCIPAL</li>
           @can('roles.index' || 'users.index' || 'permissions.index')
            <li class="treeview">
              <a href="#">
                <i class="fa fa-fw fa-users"></i>
                <span>Manage Users</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
               @can('users.index')
                <li><a href="{{route('users.index')}}"><i class="fa fa-circle-o"></i> Usuarios</a></li>
               @endcan
               @can('roles.index')
                <li><a href="{{route('roles.index')}}"><i class="fa fa-circle-o"></i> Roles</a></li>
               @endcan
               @can('permissions.index')
                <li><a href="{{route('permissions.index')}}"><i class="fa fa-circle-o"></i> Permisos</a>
                </li>
                @endcan
              </ul>
            </li>
           @endcan
           @can('sliders.index' || 'area.index' || 'requirements.index' || 'processes.index' || 'estado.index' || 'solicitante.index')
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-cog"></i> <span>Configuración</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  @can('sliders.index')
                  <li class="active"><a href="{{ route('sliders.index') }}"><i class="fa fa-circle-o"></i>Sliders</a></li>
                  @endcan
                  @can('area.index')
                  <li class="active"><a href="{{ route('area.index') }}"><i class="fa fa-circle-o"></i>Areas</a></li>
                  @endcan
                  @can('requirements.index')
                  <li><a href="{{ route('requirements.index') }}"><i class="fa fa-circle-o"></i>Requisitos</a></li>
                  @endcan
                  @can('processes.index')
                  <li><a href="{{ route('processes.index') }}"><i class="fa fa-circle-o"></i>Procesos</a></li>
                  @endcan
                  @can('estado.index')
                  <li><a href="{{ route('estado.index') }}"><i class="fa fa-circle-o"></i>Estados</a></li>
                  @endcan
                  @can('solicitante.index')
                  <li><a href="{{ route('solicitante.index') }}"><i class="fa fa-circle-o"></i>Solicitantes</a></li>
                  @endcan
              </ul>
            </li>
            @endcan
            @can('tramite.index')
            <li class="treeview">
              <a href="#">
                <i class="fa fa-file-word-o"></i><span>Documentos</span><i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                
                <li><a href="{{ route('tramite.index') }}"><i class="fa fa-circle-o"></i>En Oficina</a></li>
                 
                <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Por Llegar</a></li>
                <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Archivados</a></li>
               
              </ul>
            </li>
            @endcan
            <li class="treeview">
              <a href="#">
                <i class="fa fa-file-image-o"></i><span>Galeria</span><i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('galleries.index') }}"><i class="fa fa-circle-o"></i>Galeria de fotos</a></li>
                <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Por Llegar</a></li>
                
               
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Reportes</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
                <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
                <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
                <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Planificación</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
                <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
                <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
                <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
                <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
                <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Academico</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
                <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
                <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Publicación</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('eventos.index')}}"><i class="fa fa-circle-o"></i> Eventos</a></li>
                <li><a href="{{route('noticias.index')}}"><i class="fa fa-circle-o"></i> Noticias</a></li>
                <li><a href="{{route('procedimientos.index')}}"><i class="fa fa-circle-o"></i>Procedimientos</a></li>
                 <li><a href="{{route('normas.index')}}"><i class="fa fa-circle-o"></i>Normas</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-envelope"></i> <span>Mailbox</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('contact.index')}}"><i class="fa fa-circle-o"></i> Contactos</a></li>
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->

      <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <section class="content-header">
          
          @if(\Session::has('message'))
            @include('admin.partials.message')
          @endif
         @yield('content')


        </section>

        <!-- Main content -->

      </div><!-- /.content-wrapper -->

      
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>


      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->