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
                     <img id="img-logo-ucr" class="img-responsive center-block" src="{{ asset('images/img_include/portada1.png')}}">
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
                <div class="col-sm-7 constructing_laft">
                    <h2>PERFIL DEL POSTULANTE</h2>

                    <p>Es deseable que quienes ingresen a esta carrera posean capacidad de razonamiento, habilidad de análisis, síntesis y capacidad para solución de problemas. La Ingeniería Financiera busca ir más allá de los contenidos tradicionales de enseñanza impartidos en nuestro medio académico, buscando formar profesionales con conocimientos sólidos en lo científico y técnico, innovadores, con capacidad para la toma de decisiones y dar soluciones a los problemas de su entorno. El Estudiante deberá tener las siguientes actitudes en:</p>
                    <div class="col-md-6 ipsum">
                        <ul class="excavator">
                            <li><i class="fa fa-chevron-circle-right"></i>Predisposición para el estudio.</li>
                            <li><i class="fa fa-chevron-circle-right"></i>Habilidad numérica.</li>
                            <li><i class="fa fa-chevron-circle-right"></i>Disposición al trabajo en grupo.</li>
                            <li><i class="fa fa-chevron-circle-right"></i>Capacidad de análisis y síntesis.</li>
                            <li><i class="fa fa-chevron-circle-right"></i>Buena memoria.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5 constructing_right">
                    <img src="{{ asset('images/images/estudiante2.png')}}" alt="">
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
                <h4>Es un profesional de espíritu creativo e innovador que posee una gran capacidad técnica científica de gestión financiera. Su conocimiento financiero de mercado nacional e internacional, su capacidad y liderazgo para guiar a otros e interectuar con quienes forman parte de las organizaciones en que participa.</h4>
            </div>
            <div class="feature_row row">
                <div class="col-md-6 feature_img">
                    <img src="{{ asset('images/images/feature-man.png')}}" alt="">
                </div>
                <div class="col-md-6 feature_content">
                    <div class="subtittle">
                        <h3>El Ingeniero Financiero:</h3>
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
                <h4>El ingeniero financiero es un profesional con elevada formación práctica en el área de las finanzas, con espíritu crítico, ética profecinal y conciencia de la realiadad nacional, capaz de  promover y conducir el desarrollo empresarial.</h4>
            </div>
            <div class="feature_row row">

                <div class="col-md-6 feature_content">
                    <div class="subtittle">
                        <h3>El Ingeniero en Financiero puede trabajar en:</h3>
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
                    <img src="{{ asset('images/images/dondetrabaja.jpg')}}" alt="">
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
                        <img src="{{ asset('images/images/mision.jpg')}}" alt="">
                   </div>
                   <div class="cns-content">
                        <i class="fa fa-bar-chart" aria-hidden="true"></i>
                        <a href="#">MISIÓN</a>
                        <p>Formar ingenieros financieros de éxito, que logren su desarrollo pleno en la sociedad, con cualidades de líderes, practicantes de valores éticos y morales, poseedores de competencias propias de las finanzas. </p>

                   </div>
                </div>
                <div class="col-md-4 col-sm-6 construction">
                   <div class="cns-img">
                        <img src="{{ asset('images/images/vision.jpg')}}" alt="">
                   </div>
                   <div class="cns-content">
                        <i class="fa fa-university" aria-hidden="true"></i>
                        <a href="#">VISIÓN</a>
                        <p >Somos un centro de formación profesional que desarrolla sus actividades académicas con calidad y pertenencia acreditada y la competitividad de sus profesionales tiene el reconocimiento público en la sociedad y el mercado; sus docentes y administrativos son parte imprescindible del éxito profesional. </p>
                   </div>
                </div>

                <div class="col-md-4 col-sm-6 construction">
                   <div class="cns-img">
                        <img src="{{ asset('images/images/principios.jpg')}}" alt="">
                   </div>
                   <div class="cns-content">
                        <i class="fa fa-life-ring" aria-hidden="true"></i>
                        <a href="#">PRINCIPIOS</a>
                        <p align="left">- Búsqueda de la excelencia.<br/>
                           - Trabajo en equipo<br/>
                           - Desarrollo de las capacidades humanas.<br/>
                           <br/>
                           
                         </p>
                   </div>
                </div>
             </div>

            <div class="row construction_iner">
                <div class="col-md-4 col-sm-6 construction">
                   <div class="cns-img">
                        <img src="{{ asset('images/images/valores.jpg')}}" alt="">
                   </div>
                   <div class="cns-content">
                        <i class="fa fa-gavel" aria-hidden="true"></i>
                        <a href="#">VALORES</a>
                        <p align="left">- Integridad<br/>
                           - Disciplina<br/>
                           - Compromiso<br/>
                           - Respeto<br/>
                           - Responsabilidad con la sociedad y el medio ambiente<br/>
                           - Pensamiento Proactivo<br/>
                           - Honestidad<br/>
                           - Eficiencia y Eficacia
                         </p>
                   </div>
                </div>
                <div class="col-md-4 col-sm-6 construction">
                   <div class="cns-img">
                        <img src="<?php echo e(asset('images/images/objetivo.jpg')); ?>" alt="">
                   </div>
                   <div class="cns-content">
                        <i class="fa fa-hourglass-end" aria-hidden="true"></i>
                        <a href="#">OBJETIVOS</a>
                        <p align="left"><br/>
                           <br/>
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
