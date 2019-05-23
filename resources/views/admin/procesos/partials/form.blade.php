<div class="form-group">
	{{ Form::label('descripcion', 'Descripcion') }}
	{{ Form::text('descripcion', null, ['class' => 'form-control','placeholder'=>'Ingrese el nombre']) }}
</div>
<div class="form-group">
	{{ Form::label('tiempo', 'Plazo') }}
	{{ Form::number('tiempo', null, ['class' => 'form-control','placeholder'=>'Plazo en horas']) }}
</div>
<h3>Lista de permisos</h3>
<div class="form-group">
	<ul class="list-unstyled">
		@foreach($requirements as $requirement)
	    <li>
	        <label>
	        {{ Form::checkbox('requirements[]', $requirement->id, null) }}
	        {{ $requirement->descripcion }}
	        <em>({{ $requirement->descripcion ?: 'Sin descripción'}})</em>
	        </label>
	    </li>
	    @endforeach
    </ul>
</div>

<div class="form-group">
	{!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
	<a href="{{ route('processes.index') }}" class="btn btn-warning">Cancelar</a>
</div>

