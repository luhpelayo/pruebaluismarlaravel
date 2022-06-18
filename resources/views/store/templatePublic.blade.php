<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ENCONTREMOS A NUESTROS NIÑOS</title>

    <!-- Favicon -->
    <link rel="icon" href="{{asset('images/images/finanzas.png')}}" type="image/x-icon" />
    <!-- Bootstrap CSS -->
    <link  rel="stylesheet" href="{{asset('store/css/bootstrap.min.css')}}">

    <!-- Animate CSS -->
    <link  rel="stylesheet" href="{{asset('store/vendors/animate/animate.css')}}">
    <!-- Icon CSS-->
    <link  rel="stylesheet" href="{{asset('store/vendors/font-awesome/css/font-awesome.min.css')}}">
    <!-- Camera Slider -->
    <link  rel="stylesheet" href="{{asset('store/vendors/camera-slider/camera.css')}}">

    <!-- Owlcarousel CSS-->
   <link  rel="stylesheet" type="text/css" href="{{asset('store/vendors/owl_carousel/owl.carousel.css')}}" media="all">

    <!--Theme Styles CSS-->
   <link  rel="stylesheet" type="text/css" href="{{asset('store/css/style.css')}}" media="all">
    <meta property="og:url"           content="http://financiera.test:81/eventos" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Ingenieria Financiera" />
    <meta property="og:description"   content="Ingenieria Financiera Rumbo a su acreditación" />
    <meta property="og:image"         content="https://www.your-domain.com/path/image.jpg" />


</head>

<body>
    <!-- Preloader -->
    <div id="fb-root"></div>


  <!-- Top Header_Area -->
    <section class="top_header_area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 ">
                    <a href="/"><img id="img-logo-ucr" class="img-responsive center-block" src="{{ asset('images/img_include/portada2.png')}}">  </a>
                </div>
            </div>
        </div>
    </section>


  <!-- End Top Header_Area -->

  <!-- Header_Area -->

   @include('store.partials.nav')


   

  <!-- End Header_Area -->
    @yield('content')




    <!-- Footer Area -->
     @include('store.partials.footer')
    <!-- End Footer Area -->

    <!-- jQuery JS -->
    {{--<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v3.3"></script>--}}
    {{--<script>(function(d, s, id) {--}}
            {{--var js, fjs = d.getElementsByTagName(s)[0];--}}
            {{--if (d.getElementById(id)) return;--}}
            {{--js = d.createElement(s); js.id = id;--}}
            {{--js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";--}}
            {{--fjs.parentNode.insertBefore(js, fjs);--}}
        {{--}(document, 'script', 'facebook-jssdk'));</script>--}}
    <script src="{{ asset('store/js/jquery-1.12.0.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('store/js/bootstrap.min.js') }}"></script>
    <!-- Animate JS -->
    <script src="{{ asset('store/vendors/animate/wow.min.js') }}"></script>
    <!-- Camera Slider -->
    <script src="{{ asset('store/vendors/camera-slider/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('store/vendors/camera-slider/camera.min.js') }}"></script>
    <!-- Isotope JS -->
    <script src="{{ asset('store/vendors/isotope/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('store/vendors/isotope/isotope.pkgd.min.js') }}"></script>
    
    <!-- Progress JS -->
    <script src="{{ asset('store/vendors/Counter-Up/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('store/vendors/Counter-Up/waypoints.min.js') }}"></script>
   
    <!-- Owlcarousel JS -->
    <script src="{{ asset('store/vendors/owl_carousel/owl.carousel.min.js') }}"></script>
    <!-- Stellar JS -->
    <script src="{{ asset('store/vendors/stellar/jquery.stellar.js') }}"></script>
    <!-- Theme JS -->
    <script src="{{ asset('store/js/theme.js') }}"></script>

</body>

</html>
