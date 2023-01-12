<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="{{ route('admin.posts.store', '#create') }}">
        {{ csrf_field() }}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agrega el título de tu nueva publicación</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {{-- <label>Título de la publicación</label> --}}
                        <input id="post-title" name="title" 
                            type="text" 
                            class="form-control {{ $errors->has('title') ?  'is-invalid' : '' }}"
                            value="{{ old('title') }}" 
                            placeholder="Ingresa aquí el título de la publicación" autofocus required>
                        {!! $errors->first('title', '<span class="error invalid-feedback">:message</span>') !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Crear publicación</button>
                </div>
            </div>
        </div>
    </form>
</div>

@push('scripts')
    <script>
        if (window.location.hash === '#create') {
            $('#exampleModal').modal('show')
        }

        $('#exampleModal').on('hide.bs.modal', function () {
            window.location.hash = '#'
        })

        $('#exampleModal').on('shown.bs.modal', function () {
            $('#post-title').focus()
            window.location.hash = '#create'
        })
    </script>
@endpush