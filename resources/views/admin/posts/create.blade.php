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
			        		<textarea name="body" class="form-control" id="editor" placeholder="Ingresa el contenido completo de la publicación" rows="10"></textarea>
			        	</div>
			        </div>	
				</div>
			</div>
			<div class="col-md-4">
				<div class="card card-primary">
					<div class="card-body">
						<div class="form-group">
	                  		<label>Fecha de publicación:</label>

	                  		<div class="input-group date" id="reservationdate" data-target-input="nearest">
                        		<input name="published_at" type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
	                        	<div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
	                            	<div class="input-group-text"><i class="fa fa-calendar"></i></div>
	                        	</div>
                    		</div>
	                	</div>
	                	<div class="form-group">
	                		<label>Categoría</label>
	                		<select class="form-control">
	                			<option value="">Selecciona una categoría</option>
	                			@foreach ($categories as $category)
	                			<option value="{{ $category->id }}">{{ $category->name }}</option>
	                			@endforeach
	                		</select>
	                	</div>
	                	<div class="form-group">
							<label>Etiquetas</label>
							<select class="select2" 
									multiple="multiple" 
									data-placeholder="Selecciona una o más etiquetas" 
									style="width: 100%;">
								@foreach ($tags as $tag)
								<option value="{{ $tag->id }}">{{ $tag->name }}</option>
								@endforeach
							</select>
		                </div>
						<div class="form-group">
	        				<label>Extracto de la publicación</label>
	        				<textarea name="excerpt" class="form-control" placeholder="Ingresa un extracto de la publicación"></textarea>
	        			</div>
	        			<div class="form-group">
	        				<button type="submit" class="btn btn-primary btn-block">Guardar Publicación</button>
	        			</div>
					</div>
				</div>
			</div>
		</div>
	</form>
@stop

@push('styles')
	<!-- Tempusdominus Bootstrap 4 -->
  	<link rel="stylesheet" href="/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  	<!-- summernote -->
 	<link rel="stylesheet" href="/adminlte/plugins/summernote/summernote-bs4.min.css">
 	<!-- Select2 -->
	<link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endpush

@push('scripts')
	<!-- Summernote -->
	<script src="/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
	<!-- Select2 -->
	<script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>
	<!-- InputMask -->
	<script src="/adminlte/plugins/moment/moment.min.js"></script>
	<!-- Tempusdominus Bootstrap 4 -->
	<script src="/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
	<script>
    	//Date picker
	    $('#reservationdate').datetimepicker({
	        format: 'L'
	    });

	    //Initialize Select2 Elements
    	$('.select2').select2()

	    // Summernote
    	$('#editor').summernote()
	</script>
@endpush