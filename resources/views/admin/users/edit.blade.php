@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header with-border">
                    <h3 class="card-title">Datos personales</h3>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <ul class="list-group">
                            @foreach($errors->all() as $error)
                                <li class="list-group-item list-group-item-danger">
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    <form action="{{ route('admin.users.update', $user) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña:</label>
                            <input type="password" name="password" class="form-control" placeholder="Contraseña">
                            <span class="help-block">Dejar en blanco para no cambiar la contraseña</span>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Repite la contraseña:</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Repite la contraseña">

                        </div>
                        <button class="btn btn-primary btn-block">Actualizar usuario</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Roles</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.users.roles.update', $user) }}">
                    {{ csrf_field() }} {{ method_field('PUT') }}
                    @foreach($roles as $id => $name)
                        <div class="checkbox">
                            <label>
                                <input
                                    name="roles[]"
                                    type="checkbox"
                                    value="{{ $id }}"
                                    {{ $user->roles->contains($id) ? 'checked': '' }}>
                                {{ $name }}
                            </label>
                        </div>
                    @endforeach
                        <button class="btn btn-primary btn-block">Actualizar roles</button>
                    </form>
                </div>
            </div>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Permisos</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.users.permissions.update', $user) }}">
                        {{ csrf_field() }} {{ method_field('PUT') }}
                        @foreach($permissions as $id => $name)
                            <div class="checkbox">
                                <label>
                                    <input
                                        name="permissions[]"
                                        type="checkbox"
                                        value="{{ $id }}"
                                        {{ $user->permissions->contains($id) ? 'checked': '' }}>
                                    {{ $name }}
                                </label>
                            </div>
                        @endforeach
                        <button class="btn btn-primary btn-block">Actualizar permisos</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
