@extends('admin.layout')

@section('header')
    <div class="col-sm-6">
        <h1 class="m-0">POSTS</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Posts</li>
        </ol>
    </div><!-- /.col -->
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Listado de publicaciones</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="posts-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Extracto</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
				@foreach ($posts as $post)
					<tr>
						<td>{{ $post->id }}</td>
						<td>{{ $post->title }}</td>
                        <td>{{ $post->excerpt }}</td>
                        <td>
                            <a href="" class="btn btn-xs btn-info"><i class="fas fa-pencil-alt nav-icon"></i></a>
                            <a href="" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
					</tr>
				@endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@stop
