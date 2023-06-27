@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header with-border">
                <h3 class="card-title">Crear Role</h3>
            </div>
            <div class="card-body">
            	@include('partials.error-messages')
                <form action="{{ route('admin.roles.update', $role) }}" method="post">
                    {{ csrf_field() }} {{ method_field('PUT') }}
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" name="name" value="{{ old('name', $role->name) }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="guard_name">Guard:</label>
                        <select name="guard_name" class="form-control" id="guard_name">
                    	@foreach (config('auth.guards') as $guardName => $guard)
                    		<option {{ old('guard_name', $role->guard_name) === $guardName ? 'selected' : '' }} 
                    			value="{{ $guardName }}"
                    		>
                    			{{ $guardName }}
                    		</option>
                    	@endforeach
                        </select>
                    </div>
                    
                    <div class="">
                    	<label>Permisos</label>
                    	@include('admin.permissions.checkboxes', ['model' => $role])
                    </div>
                    <button class="btn btn-primary btn-block mt-3">Crear role</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection