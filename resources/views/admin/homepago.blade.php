@extends('admin.template')
@section('content')
<div class="container box box-primary">
<div class="flex flex-wrap my-5 mx-5 sm:mx-20 border-2 rounded-leg bg-white text-blue-800">
  <div class=" w-full px-8">
     <div class="lg:flex justify-between">
        <h2 class="font-bold text-xl md:text-2xl my-5">Solo un paso para hacer parte de esta familia, por favor verifique tu metodo de pago.</h2>
	<h2 class="font-bold text-xl md:text-2xl lg:ml-10 my-5">Importe por suscripcion: $ 20.99</h2>
	</div>
	<ul class="flex border-b lg:mx-56">
	<li class="-mb-px mr-1">
		<a class="bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-blue-700 font-semibold" href="#">
			terjeta de credito y/o debito
		</a>
	</li>
	<li class="mr-1">
		<a class="bg-white inline-block py=2 px-4 text-blue-500 hover:text-blue-800 font-semibold" href="{{ url('/paypal/pay')}}">
PayPal
</a>

	</li>
</ul>
<div class="flex my-5">
<div class="m-auto flex flex-wrap">
<img src="{{asset('images/images/pagos.png')}}" class="h-12">
</div>
</div>
    
    
</div><!-- /.row -->

@endsection
