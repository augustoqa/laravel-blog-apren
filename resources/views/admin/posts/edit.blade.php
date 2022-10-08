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
	@if($post->photos->count())
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
	        	@foreach ($post->photos as $photo)
	        		<div class="col-md-2">
	        			<form method="POST" action="{{ route('admin.photos.destroy', $photo) }}">
	        				{{ method_field('DELETE') }} {{ csrf_field() }}
		        			<button class="btn btn-danger btn-xs" style="position: absolute;">
		        				<i class="fa fa-trash"></i>
		        			</button>
		        			<img src="{{ $photo->url }}" class="img-responsive" style="width: 100%;">
	        			</form>
	        		</div>
	        	@endforeach
	        	</div>
			</div>
		</div>
	</div>
	@endif
	
	<form method="POST" action="{{ route('admin.posts.update', $post) }}">
		{{ csrf_field() }} {{ method_field('PUT') }}
		<div class="row">
			<div class="col-md-8">
				<div class="card card-primary">
			        <div class="card-body">
			        	<div class="form-group">
			        		<label>Título de la publicación</label>
			        		<input name="title" 
			        			type="text" 
			        			class="form-control {{ $errors->has('title') ?  'is-invalid' : '' }}"
			        			value="{{ old('title', $post->title) }}" 
			        			placeholder="Ingresa aquí el título de la publicación">
			        		{!! $errors->first('title', '<span class="error invalid-feedback">:message</span>') !!}
			        	</div>
			        	<div class="form-group">
			        		<label>Contenido publicación</label>
			        		<textarea name="body" 
			        			class="form-control {{ $errors->has('body') ?  'is-invalid' : '' }}" 
			        			id="editor" 
			        			placeholder="Ingresa el contenido completo de la publicación" 
			        			rows="10"
			        		>{{ old('body', $post->body) }}</textarea>
			        		{!! $errors->first('body', '<span class="error invalid-feedback">:message</span>') !!}
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
                        		<input name="published_at" value="{{ old('published_at', optional($post->published_at)->format('m/d/Y')) }}" type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
	                        	<div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
	                            	<div class="input-group-text"><i class="fa fa-calendar"></i></div>
	                        	</div>
                    		</div>
	                	</div>
	                	<div class="form-group">
	                		<label>Categoría</label>
	                		<select name="category" class="form-control {{ $errors->has('category') ?  'is-invalid' : '' }}">
	                			<option value="">Selecciona una categoría</option>
	                			@foreach ($categories as $category)
	                			<option value="{{ $category->id }}" {{ old('category', $post->category_id) == $category->id ? 'selected' : '' }}>
	                				{{ $category->name }}
	                			</option>
	                			@endforeach
	                		</select>
	                		{!! $errors->first('category', '<span class="error invalid-feedback">:message</span>') !!}
	                	</div>
	                	<div class="form-group">
							<label>Etiquetas</label>
							<select name="tags[]" class="select2 {{ $errors->has('tags') ?  'is-invalid' : '' }}" 
									multiple="multiple" 
									data-placeholder="Selecciona una o más etiquetas" 
									style="width: 100%;">
								@foreach ($tags as $tag)
								<option {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }} value="{{ $tag->id }}">
									{{ $tag->name }}
								</option>
								@endforeach
							</select>
							{!! $errors->first('tags', '<span class="error invalid-feedback">:message</span>') !!}
		                </div>
						<div class="form-group">
	        				<label>Extracto de la publicación</label>
	        				<textarea name="excerpt" 
	        					class="form-control {{ $errors->has('excerpt') ?  'is-invalid' : '' }}" 
	        					placeholder="Ingresa un extracto de la publicación">{{ old('excerpt', $post->excerpt) }}
	        				</textarea>
	        				{!! $errors->first('excerpt', '<span class="error invalid-feedback">:message</span>') !!}
	        			</div>
	        			<div class="form-group">
	        				<div class="dropzone"></div>
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css" integrity="sha512-WvVX1YO12zmsvTpUQV8s7ZU98DnkaAokcciMZJfnNWyNzm7//QRV61t4aEr0WdIa4pe854QHLTV302vH92FSMw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@push('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js" integrity="sha512-oQq8uth41D+gIH/NJvSJvVB85MFk1eWpMK6glnkg6I7EdMqC1XVkW7RxLheXwmFdG03qScCM7gKS/Cx3FYt7Tg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
    	$('#editor').summernote({
    		height: 360,
    	})

    	var myDropzone = new Dropzone('.dropzone', {
    		url: '/admin/posts/{{ $post->url }}/photos',
    		paramName: 'photo',
    		acceptedFiles: 'image/*',
    		maxFilesize: 2,
    		headers: {
    			'X-CSRF-TOKEN': '{{ csrf_token() }}',
    		},
    		dictDefaultMessage: 'Arrastra las fotos aquí para subirlas',
    	})

    	myDropzone.on('error', function(file, res) {
    		var msg = res.errors.photo[0]
    		$('.dz-error-message:last > span').text(msg)
    	})

    	Dropzone.autoDiscover = false
	</script>
@endpush