    <section class="slider_area row m0">
        <div class="slider_inner">
       
        @if(isset($slideImages))
            @foreach($slideImages as $i)
            
            <div data-thumb="images/slideImages/{{ $i->url }}"  data-src="images/slideImages/{{ $i->url }}">
                <div class="camera_caption">
                   <div class="container">
                        <h5 class=" wow fadeInUp animated">Bienvenido a nuestra</h5>
                        <h3 class=" wow fadeInUp animated" data-wow-delay="0.5s">Empresa de UÑASOFT</h3>
                        <h4 class=" wow fadeInUp animated" data-wow-delay="0.8s"></h4>
                        <a class=" wow fadeInUp animated" data-wow-delay="1s" href="#"></a>
               
                   </div>
                </div>
                
            </div>
            
            @endforeach

        @else
            <!-- agregar imagen por default -->
        @endif
         
        </div>  
        <br>



        


    </section>









    <!-- <!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<title>Dev Space</title>
<link href='https://fonts.googleapis.com/css?family=lato' rel='stylesheet' type='text/css'>
<link  rel="stylesheet"  href="{{asset('store/css/style1.css')}}">

</head>
<body>
<a href="" class="titulo">Ultimas Noticias</a>
<div id="box">
<ul  class="estilizacao">
    <li>
         <img src="images/slideImages/1.png" alt="">
         <div class="conteudo">
             <p class="nome-secao">Musicas</p>
	     <p class="descricao">Melhores musicas</p>
		<a href="" class="btn-more">ver mas</a>
	</div>

     </li>
 <li>
         <img src="images/slideImages/1.png" alt="">
         <div class="conteudo">
             <p class="nome-secao">imagens</p>
	     <p class="descricao">Melhores musicas</p>
		<a href="" class="btn-more">ver mas</a>
	</div>

     </li>

 <li>
         <img src="images/slideImages/1.png" alt="">
         <div class="conteudo">
             <p class="nome-secao">Aplicaciones</p>
	     <p class="descricao">Melhores musicas</p>
		<a href="" class="btn-more">ver mas</a>
	</div>

     </li>

   <li>
         <img src="images/slideImages/1.png" alt="">
         <div class="conteudo">
             <p class="nome-secao">Esportes</p>
          <p class="descricao">Melhores musicas</p>
		<a href="" class="btn-more">ver mas</a>
	</div>

     </li>
</ul> 
</div>


</body>
</html>
     -->