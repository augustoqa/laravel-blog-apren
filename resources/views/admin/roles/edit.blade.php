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
                    {{ method_field('PUT') }}

                    @include('admin.roles.form')

                    <button class="btn btn-primary btn-block mt-3">Editar role</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection