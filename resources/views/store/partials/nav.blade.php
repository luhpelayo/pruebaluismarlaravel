
 <nav class="navbar navbar-default header_aera" id="main_navbar">
        <div class="container">
            <!-- searchForm -->
            <!-- End searchForm -->
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="col-md-2 p0">
                <div class="navbar-header">
                           <!-- <a class="navbar-brand"  href="{{route('/')}}">UÑASOFT</a></li> -->
               <a class="navbar-brand" href="{{route('/')}}"><img src="{{ asset('images/images/logo1.png')}}" class="img-responsive"></a> 
            
                    <button type="button" class="navbar-toggle collapsed" style="margin-top: 0px;border-color: #ffffff;" data-toggle="collapse" data-target="#min_navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>

                </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="col-md-10 p0">
                <div class="collapse navbar-collapse" id="min_navbar">
                    <ul class="nav navbar-nav navbar-right">
                 
                        <li><a href="{{route('gallery')}}">Publicaciones</a></li>
                        <li><a href="{{route('/')}}">Registrarse</a></li>
                        <li><a href="{{route('home')}}">Login</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </div><!-- /.container -->
    </nav>



    <style>


.navbar-default .navbar-brand{
color: #f8b81d;
} 

</style>