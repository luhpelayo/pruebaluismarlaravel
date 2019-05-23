<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ING. FINANCIERA</title>

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



</head>
<body>
    <!-- Preloader -->
  

  <!-- Top Header_Area -->
 <section class="top_header_area">
          <div class="container">
            <div class="row">
                <div class="col-xs-12 ">
                    
                     <img id="img-logo-ucr" class="img-responsive center-block" src="{{ asset('images/img_include/portada.png')}}">
                    
                </div>
            </div>
        </div>

</section>


  <!-- End Top Header_Area -->

  <!-- Header_Area -->

   @include('store.partials.nav')

  <!-- End Header_Area -->
    @yield('content')
    <!-- Slider area -->
 
    <!-- End Slider area -->
        <!-- Building Construction Area -->
    <section class="building_construction_area">
        <div class="container">
            <div class="row building_construction_row">
                <div class="col-sm-8 constructing_laft">
                    <h2>PERFIL DEL POSTULANTE</h2>

                    <p>Es deseable que quienes ingresen a esta carrera posean capacidad de razonamiento, habilidad de análisis, síntesis y capacidad para solución de problemas. La Ingenieria Financiera busca ir mas allá de los contenidos tradicionales de enseñanza impartados en nustro medio académico,buscando formar profesionales con conocimientos sólidos en lo científico y técnico, innovadores, con capacidad para la toma de decisiones y dar soluciones a los problemas de su entorno. El Estudiante deberá tener las siguientes actitudes en:</p>
                    <div class="col-md-6 ipsum">
       
                        <ul class="excavator">
                            <li><i class="fa fa-chevron-circle-right"></i>Predisposición para estudiar.</li>
                            <li><i class="fa fa-chevron-circle-right"></i>Habilidad numérica.</li>
                            <li><i class="fa fa-chevron-circle-right"></i>Disposición al trabajo en grupo.</li>
                            <li><i class="fa fa-chevron-circle-right"></i>Capacidad de análisis y síntesis.</li>
                            <li><i class="fa fa-chevron-circle-right"></i>Buena memoria.</li>
                        </ul>
                    </div>
                    

                </div>
                <div class="col-sm-4 constructing_right">
                    
                    
                   
                    <img src="{{ asset('images/images/PERFIL 3.PNG')}}" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- End Building Construction Area -->

    <!-- About Us Area -->

    <!-- End About Us Area -->


    <!-- Our Features Area -->
    <section class="our_feature_area">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>Nuestras caracteristicas</h2>
                <h4>Es un profesional de espíritu creativo e innovador que posee una gran capacidad técnica científica gestión financiera. Su conocimiento financiero de mercado nacional e internacional, su capacidad y liderazgo para guiar a otros e interactuar con quienes forman perte de las organizaciones en que participa.</h4>
            </div>
            <div class="feature_row row">
                <div class="col-md-6 feature_img">
                    <img src="{{ asset('images/images/feature-man.png')}}" alt="">
                </div>
                <div class="col-md-6 feature_content">
                    <div class="subtittle">
                        <h2>EL Ingeniero en Finanzas:</h2>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <i class="fa fa-handshake-o" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="media-body">
                            <a href="#">Sobre la Inversión</a>
                            <p>Analiza, proyecta, ejecuta y evalua procesos de inversión de de empresas públicas y privadas, asi como en sectores economicos.</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <i class="fa fa-money" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="media-body">
                            <a href="#">Financiamiento</a>
                            <p>Estudia, analiza y decide sobre fuentes y alternativas  de financiamiento para la empresa y para proyectos públicos y privados.</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <i class="fa fa-line-chart" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="media-body">
                            <a href="#">Evaluacion</a>
                            <p>Planifica, evalua y decide sobre los resultados de las inversiones y capitales, buscando optimizar la creación del valor.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Features Area -->
    
    <!-- Our Labor Area -->
    <section class="our_feature_area">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>Donde Trabaja</h2>
                <h4>El ingeniero financiero es un profecinal con elevada formación práctica en el área de las finanzas, con esperitu crítico, ética profecinal y conciencia de la realiadad nacional, capaz de  promover y conducir el desarrollo empresarial.</h4>
            </div>
            <div class="feature_row row">

                <div class="col-md-6 feature_content">
                    <div class="subtittle">
                        <h2>EL Ingeniero en Financiero puede trabajar en:</h2>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <i class="fa fa-handshake-o" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="media-body">
                            <a href="#">Sobre la Inversión</a>
                            <p>Bancos, Cooperativas, Mutuales y fondo Finan Privados.</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <i class="fa fa-money" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="media-body">
                            <a href="#">Financiamiento</a>
                            <p>Organizaciones No Gubernamentales, Bolsa de valores.</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <i class="fa fa-line-chart" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="media-body">
                            <a href="#">Evaluacion</a>
                            <p>Empresas de Titulación, Calificadora de Riesgo, Warrant, Corredores de bolsa y Leasing Financiero.</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <i class="fa fa-line-chart" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="media-body">
                            <a href="#">Evaluacion</a>
                            <p>Empresas privadas, industreas, comerciales y de servicios en el área de gestión financiera.</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <i class="fa fa-line-chart" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="media-body">
                            <a href="#">Evaluacion</a>
                            <p>Docente e investigador académico en el área financiera.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 feature_img">
                    <img src="{{ asset('images/images/PERFIL 4.png')}}" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Labor Area -->

    <!-- What ew offer Area -->
    <section class="what_we_area row">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>Ingeniería Financiera</h2>
                <h4>La carrera Ingeniería Financiera es una de las Carreras Universitarias de Matemática, Economía y Finanzas que dicta la Universidad Autónoma Gabriel René Moreno.</h4>
            </div>
            <div class="row construction_iner">
                <div class="col-md-4 col-sm-6 construction">
                   <div class="cns-img">
                        <img src="{{ asset('images/images/cns-1.jpg')}}" alt="">
                   </div>
                   <div class="cns-content">
                        <i class="fa fa-bar-chart" aria-hidden="true"></i>
                        <a href="#">MISIÓN</a>
                        <p>FORMAR INGENIEROS FINANCIEROS DE ÉXITO, que logren su desarrollo pleno en la sociedad, con cualidades de lideres, practicantes de valores éticos y morales,poseedores de competencias propias de las finanzas. </p>
                   </div>
                </div>
                <div class="col-md-4 col-sm-6 construction">
                   <div class="cns-img">
                        <img src="{{ asset('images/images/cns-2.jpg')}}" alt="">
                   </div>
                   <div class="cns-content">
                        <i class="fa fa-keyboard-o" aria-hidden="true"></i>
                        <a href="#">VISIÓN</a>
                        <p >Somos un centro de formación profesional que desarrolla sus actividades académicas con calidad y pertenencia acreditada y la competitividad de sus profesionales tiene el recocimiento publico en la sociedad y el mercado sus docentes y administrativos son parte imprescindible del éxito profesional. </p>
                   </div>
                </div>
                <div class="col-md-4 col-sm-6 construction">
                   <div class="cns-img">
                        <img src="{{ asset('images/images/cns-3.jpg')}}" alt="">
                   </div>
                   <div class="cns-content">
                        <i class="fa fa-gavel" aria-hidden="true"></i>
                        <a href="#">VALORES</a>
                        <p align="left">- Integridad<br/>
                           - Disciplina<br/>
                           - Compromiso<br/>
                           - Respeto<br/>
                           - Responsabilidad<br/>
                           - Pensamiento Proactivo<br/>
                           - Honestidad<br/>
                           - Eficiencia y Eficacia
                         </p>
                   </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End What ew offer Area -->
    <!-- Our Team Area -->

    <!-- End Our Team Area -->

    <!-- Our Achievments Area -->

    <!-- End Our Achievments Area -->

    <!-- Our Featured Works Area -->

    <!-- End Our Featured Works Area -->


    <!-- Our Partners Area -->

    <!-- End Our Partners Area -->

    <!-- Footer Area -->
     @include('store.partials.footer')
    <!-- End Footer Area -->

    <!-- jQuery JS -->
    
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
