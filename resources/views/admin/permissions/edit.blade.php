@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header with-border">
                <h3 class="card-title">Crear Permiso</h3>
            </div>
            <div class="card-body">
            	@include('partials.error-messages')
                <form action="{{ route('admin.permissions.update', $permission) }}" method="post">
                    {{ method_field('PUT') }} {{ csrf_field() }}

					<div class="form-group">
					    <label for="name">Identificador:</label>
					    <input type="text" value="{{ $permission->name }}" class="form-control" disabled>
					</div>
					<div class="form-group">
					    <label for="display_name">Nombre:</label>
					    <input type="text" name="display_name" value="{{ old('display_name', $permission->display_name) }}" class="form-control">
					</div>
                    <button class="btn btn-primary btn-block mt-3">Editar permiso</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection