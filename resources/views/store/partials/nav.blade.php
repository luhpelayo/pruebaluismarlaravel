
 <nav class="navbar navbar-default header_aera" id="main_navbar">
        <div class="container">
            <!-- searchForm -->
            <!-- End searchForm -->
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="col-md-2 p0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#min_navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{route('home')}}"><img src="{{ asset('images/images/logo1.png')}}" class="img-responsive"></a>

                </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="col-md-10 p0">
                <div class="collapse navbar-collapse" id="min_navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Legal</a>
                            <ul class="dropdown-menu">
                                
                                <li><a href="{{route('normas')}}">Reglamentos</a></li>
                                <li><a href="{{route('procedimientos')}}">Procedimientos</a></li>
                            </ul>
                        </li>
                        <li class="dropdown submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Servicios</a>
                            <ul class="dropdown-menu other_dropdwn">
                                
                                <li class="@if(isset($noticiasActive))  {{ 'active' }}  @endif"><a href="{{ route('noticias') }}">Noticias</a></li>

                                 <li class="@if(isset($eventosActive))  {{ 'active' }}  @endif"><a href="{{ route('eventos') }}">Eventos</a></li>
                               
                            </ul>
                        </li>

                        <li><a href="{{route('contacto')}}">Contacto</a></li>
                        <li><a href="{{route('gallery')}}">Galeria</a></li>
                       
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </div><!-- /.container -->
    </nav>
