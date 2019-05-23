<div class="form-group">
	{{ Form::label('name', 'Nombre') }}
	{{ Form::text('name', null, ['class' => 'form-control' ,'placeholder'=>'Ingrese el nombre']) }}
</div>
<div class="form-group">
	{{ Form::label('slug', 'URL Amigable') }}
	{{ Form::text('slug', null, ['class' => 'form-control','placeholder'=>'Ingrese la URL']) }}
</div>
<div class="form-group">
	{{ Form::label('description', 'Descripción') }}
	{{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder'=>'Descripción']) }}
</div>

<div class="form-group">
	{!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
	<a href="{{ route('permissions.index') }}" class="btn btn-warning">Cancelar</a>
</div>

