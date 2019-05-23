<div class="form-group">
	{{ Form::label('name', 'Nombre') }}
	{{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>

  <div class="form-group">
      <label class="control-label" for="area_id">Oficinas</label>
      {!! Form::select('area_id', $areas, null, ['class' => 'form-control']) !!}
  </div>
<hr>
 <h3>Lista de roles</h3>
<div class="form-group">
	<ul class="list-unstyled">
		@foreach($roles as $role)
	    <li>
	        <label>
	        {{ Form::checkbox('roles[]', $role->id, null) }}
	        {{ $role->name }}
	        <em>({{ $role->description ?: 'Sin descripción'}})</em>
	        </label>
	    </li>
	    @endforeach
    </ul>
</div>
<hr>
<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}
	<a href="{{ route('users.index') }}" class="btn btn-warning">Cancelar</a>
</div>

