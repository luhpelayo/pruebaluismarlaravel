<div class="form-group">
	{{ Form::label('name', 'Nombre') }}
	{{ Form::text('name', null, ['class' => 'form-control','placeholder'=>'Ingrese el nombre']) }}
</div>

<div class="form-group">
	{{ Form::label('description', 'Descripción') }}
	{{ Form::textarea('description', null, ['class' => 'form-control']) }}
</div>
<hr>
 <h3>Permiso especial</h3>
 <div class="form-group">
 	<label>{{Form::radio('special','all-access')}} Acceso total</label>
 	<label>{{Form::radio('special','no-access')}} Ningun acceso</label>
 </div>

<h3>Usuario</h3>
<div class="form-group">
	<ul class="list-unstyled">
	 @foreach($permissions as $permiso)
	 @if($permiso->module == 'users')
	    <li>
	        <label>
	        {{ Form::checkbox('permissions[]', $permiso->id, null) }}
	        {{ $permiso->name }}
	        <em>({{ $permiso->description ?: 'Sin descripción'}})</em>
	        </label>
	    </li>
    @endif
    @endforeach
    </ul>
</div>
<h3>Rool</h3>
<div class="form-group">
	<ul class="list-unstyled">
		@foreach($permissions as $permiso)
		 @if($permiso->module == 'roles')
	    <li>
	        <label>
	        {{ Form::checkbox('permissions[]', $permiso->id, null) }}
	        {{ $permiso->name }}
	        <em>({{ $permiso->description ?: 'Sin descripción'}})</em>
	        </label>
	    </li>
	     @endif
	    @endforeach
    </ul>
</div>
<h3>Área</h3>
<div class="form-group">
	<ul class="list-unstyled">
		@foreach($permissions as $permiso)
		 @if($permiso->module == 'area')
	    <li>
	        <label>
	        {{ Form::checkbox('permissions[]', $permiso->id, null) }}
	        {{ $permiso->name }}
	        <em>({{ $permiso->description ?: 'Sin descripción'}})</em>
	        </label>
	    </li>
	     @endif
	    @endforeach
    </ul>
</div>
<h3>Procesos</h3>
<div class="form-group">
	<ul class="list-unstyled">
		@foreach($permissions as $permiso)
		 @if($permiso->module == 'processes')
	    <li>
	        <label>
	        {{ Form::checkbox('permissions[]', $permiso->id, null) }}
	        {{ $permiso->name }}
	        <em>({{ $permiso->description ?: 'Sin descripción'}})</em>
	        </label>
	    </li>
	     @endif
	    @endforeach
    </ul>
</div>
<h3>Tramite</h3>
<div class="form-group">
	<ul class="list-unstyled">
		@foreach($permissions as $permiso)
		 @if($permiso->module == 'tramite')
	    <li>
	        <label>
	        {{ Form::checkbox('permissions[]', $permiso->id, null) }}
	        {{ $permiso->name }}
	        <em>({{ $permiso->description ?: 'Sin descripción'}})</em>
	        </label>
	    </li>
	     @endif
	    @endforeach
    </ul>
</div>
<h3>Requisitos</h3>
<div class="form-group">
	<ul class="list-unstyled">
		@foreach($permissions as $permiso)
		 @if($permiso->module == 'requirements')
	    <li>
	        <label>
	        {{ Form::checkbox('permissions[]', $permiso->id, null) }}
	        {{ $permiso->name }}
	        <em>({{ $permiso->description ?: 'Sin descripción'}})</em>
	        </label>
	    </li>
	     @endif
	    @endforeach
    </ul>
</div>
<h3>Sliders</h3>
<div class="form-group">
	<ul class="list-unstyled">
	 @foreach($permissions as $permiso)
	 @if($permiso->module == 'sliders')
	    <li>
	        <label>
	        {{ Form::checkbox('permissions[]', $permiso->id, null) }}
	        {{ $permiso->name }}
	        <em>({{ $permiso->description ?: 'Sin descripción'}})</em>
	        </label>
	    </li>
    @endif
    @endforeach
    </ul>
</div>
<hr>
<div class="form-group">
	{!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
	<a href="{{ route('roles.index') }}" class="btn btn-warning">Cancelar</a>
</div>

