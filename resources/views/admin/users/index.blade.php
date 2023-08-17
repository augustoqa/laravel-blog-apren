@extends('admin.layout')

@section('header')
    <div class="col-sm-6">
        <h1 class="m-0">USERS</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Users</li>
        </ol>
    </div><!-- /.col -->
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Listado de usuarios</h3>
            @can('create', $users->first())
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary float-right">
                <i class="fa fa-plus"></i>&nbsp; Crear usuario
            </a>
            @endcan
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="users-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->getRoleNames()->implode(', ') }}</td>
                        <td>
                            @can('view', $user)
                            <a href="{{ route('admin.users.show', $user) }}" class="btn btn-xs btn-default"><i class="far fa-eye nav-icon"></i></a>
                            @endcan

                            @can('update', $user)
                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-xs btn-info"><i class="fas fa-pencil-alt nav-icon"></i></a>
                            @endcan

                            @can('delete', $user)
                            <form 
                                method="POST" 
                                action="{{ route('admin.users.destroy', $user) }}" 
                                style="display: inline;"
                            >
                                {{ csrf_field() }} {{ method_field('DELETE') }}
                                <button 
                                    class="btn btn-xs btn-danger"
                                    onclick="return confirm('¿Estás seguro de querer eliminar este usuario?')" 
                                >
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                            @endcan
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

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush

@push('scripts')
    <!-- DataTables  & Plugins -->
    <script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/adminlte/plugins/jszip/jszip.min.js"></script>
    <script src="/adminlte/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/adminlte/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script>
        $(function() {
            $("#users-table").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>

    
@endpush
