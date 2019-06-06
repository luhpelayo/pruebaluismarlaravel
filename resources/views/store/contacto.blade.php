@extends('store.template')

@section('content')
    <!-- Banner area -->
    <section class="banner_area" data-stellar-background-ratio="0.5">
        <h2>CONTÁCTENOS</h2>
        <ol class="breadcrumb">
            <li><a href="{{route('/')}}">Home</a></li>
            <li><a href="{{route('contacto')}}" class="active">Contáctenos</a></li>
        </ol>
    </section>
    <!-- End Banner area -->
    <!-- Map -->
    <div class="contact_map">

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21491.82574650873!2d-63.20453795100546!3d-17.77975904742772!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93f1e7fdfa200905%3A0xc8fb7404899713c2!2sModulo+265+-+Ingenieria+Financiera+UAGRM!5e0!3m2!1ses-419!2sbo!4v1550263010916" ></iframe>
    </div>
    <!-- End Map -->
    <!-- All contact Info -->
    <section class="all_contact_info" class="footer_area">
        <div class="container">
            <div class="row contact_row">
                <div class="col-sm-6 contact_info">
                    <h2>Datos de contacto</h2>
                    <p>El Ingeniero Financiero es un profesional de espíritu creativo e innovador con capacidad para la gestión financiera e empresas privadas e instituciones del sector público.</p>
                    <p>Interpreta las connotaciones de los procesos financieros y sus efectos en el contexto de la organización y de la sociedad.</p>
                    <p>Tiene profundo conocimiento y habilidad para operar en los mercados financieros.</p>
                    <p>Contribuye a la creación y valor a partir de su liderazgo y calidad.</p>
                    <div class="location">
                        <div class="location_laft">
                            <a class="f_location" href="{{route('contacto')}}">Dirección</a>
                            <a href="#">Teléfono</a>
                            <a href="#">fax</a>
                            <a href="#">email</a>
                        </div>
                        <div class="address">
                            <a href="#">Av. Busch, Ciudad Universitaria  <br>- Modulo 265</a>
                            <a href="#">359 - 9603</a>
                            <a href="#">(591) 935-3026</a>
                            <a href="#">puntodev.com@gmail.com</a>

                        </div>
                    </div>
                </div>
                <div class="col-sm-6 contact_info send_message">
                    <h2>Mandanos un mensaje</h2>
                    <form class="contact_box" method="post" action="{{ route('contact.send') }}">
                       @csrf
                        <input name="name" type="text" class="form-control input_box" id="name" required="required" placeholder="Name">
                        <input name="email" type="email" class="form-control input_box" id="email" required="required" placeholder="Email">
                        <input name="subject" type="text" class="form-control input_box" id="subject" required="required" placeholder="Subject">
                        <textarea name="message" type="text" class="form-control input_box" id="message" rows="7" required="required" placeholder="Message"></textarea>
                        <button type="submit" class="btn btn-default">Enviar Mensaje</button>
                   
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End All contact Info -->

@stop