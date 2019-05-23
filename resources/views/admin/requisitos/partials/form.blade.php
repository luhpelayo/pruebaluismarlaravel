<div class="form-group">
	{{ Form::label('descripcion', 'Descripcion') }}
	{{ Form::text('descripcion', null, ['class' => 'form-control','placeholder'=>'Ingrese el nombre']) }}
</div>

<div class="form-group">
	{!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
	<a href="{{ route('requirements.index') }}" class="btn btn-warning">Cancelar</a>
</div>

