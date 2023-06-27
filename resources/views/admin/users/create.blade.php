@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header with-border">
                <h3 class="card-title">Datos personales</h3>
            </div>
            <div class="card-body">
                @include('partials.error-messages')
                <form action="{{ route('admin.users.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                    </div>
                    
                    <div class="d-flex justify-content-around">
	                    <div class="">
	                    	<label>Roles</label>
	                    	@include('admin.roles.checkboxes')
	                    </div>

	                    <div class="">
	                    	<label>Permisos</label>
	                    	@include('admin.permissions.checkboxes', ['model' => $user])
	                    </div>
                	</div>
                	<span class="text-secondary">La contraseña será generada y enviada al nuevo usuario vía email</span>
                    <button class="btn btn-primary btn-block mt-3">Crear usuario</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection