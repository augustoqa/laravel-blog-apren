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
                        <button class="btn btn-primary btn-block">Actualizar usuario</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
