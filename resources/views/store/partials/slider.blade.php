    <section class="slider_area row m0">
        <div class="slider_inner">

        @if(isset($slideImages))
            @foreach($slideImages as $i)
            <div data-thumb="images/slideImages/{{ $i->url }}" data-src="images/slideImages/{{ $i->url }}">
                <div class="camera_caption">
                   <div class="container">
                        <h5 class=" wow fadeInUp animated">Bienvenido a nuestro</h5>
                        <h3 class=" wow fadeInUp animated" data-wow-delay="0.5s">Facultad de Cs. Económicas, Administrativas y Financieras</h3>
                        <p class=" wow fadeInUp animated" data-wow-delay="0.8s">Nuestro equipo de profesionales lo ayudará a convertir la casa de sus sueños o el apartamento en una realidad rápidamente. El Love Boat promete algo para todos. Ahora el mundo no se mueve al ritmo de uno solo.</p>
                        <a class=" wow fadeInUp animated" data-wow-delay="1s" href="#"></a>
                   </div>
                </div>
            </div>
            @endforeach
        @else
            <!-- agregar imagen por default -->
        @endif
            

        </div>
    </section>