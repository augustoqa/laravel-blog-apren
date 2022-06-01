@extends('admin.layout')

@section('header')
    <div class="col-sm-6">
        <h1 class="m-0">Crear publicación</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="nav-icon fas fa-tachometer-alt"></i> Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}"><i class="fa fa-list"></i> Inicio</a></li>
            <li class="breadcrumb-item active">Crear</li>
        </ol>
    </div><!-- /.col -->
@stop

@section('content')
	<form>
		<div class="row">
			<div class="col-md-8">
				<div class="card card-primary">
			        <div class="card-body">
			        	<div class="form-group">
			        		<label>Título de la publicación</label>
			        		<input name="title" type="text" class="form-control" placeholder="Ingresa aquí el título de la publicación">
			        	</div>
			        	<div class="form-group">
			        		<label>Contenido publicación</label>
			        		<textarea name="body" class="form-control" placeholder="Ingresa el contenido completo de la publicación" rows="10"></textarea>
			        	</div>
			        </div>	
				</div>
			</div>
			<div class="col-md-4">
				<div class="card card-primary">
					<div class="card-body">
						<div class="form-group">
	        				<label>Extracto de la publicación</label>
	        				<textarea name="excerpt" class="form-control" placeholder="Ingresa un extracto de la publicación"></textarea>
	        			</div>
					</div>
				</div>
			</div>
		</div>
	</form>
@stop