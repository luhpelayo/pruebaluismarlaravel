<div class="form-group">
	{{ Form::label('module', 'Modulo') }}
	{{ Form::text('module', null, ['class' => 'form-control' ,'placeholder'=>'Ej.si la ruta es:users.create entonces: users']) }}
</div>
<div class="form-group">
	{{ Form::label('name', 'Nombre') }}
	{{ Form::text('name', null, ['class' => 'form-control' ,'placeholder'=>'Ingrese el nombre']) }}
</div>
<div class="form-group">
	{{ Form::label('slug', 'URL Amigable') }}
	{{ Form::text('slug', null, ['class' => 'form-control','placeholder'=>'Ej: users.create']) }}
</div>
<div class="form-group">
	{{ Form::label('description', 'Descripción') }}
	{{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder'=>'Descripción']) }}
</div>

<div class="form-group">
	{!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
	<a href="{{ route('permissions.index') }}" class="btn btn-warning">Cancelar</a>
</div>

