<!DOCTYPE html>
<html>
<head>
    <title>Categorías</title>
    <link 
        rel="stylesheet" 
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    >
</head>
<body style="background-color: #f8f9fa;">

    <div class="container mt-5">
        <div class="card shadow-lg border-0 rounded-lg">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="text-primary font-weight-bold mb-0">Lista de Categorías</h2>
                    <a class="btn btn-success" href="{{ route('categorias.create') }}">
                        + Crear Categoría
                    </a>
                </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Éxito:</strong> {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <table class="table table-hover table-bordered text-center align-middle">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" style="width: 70px;">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col" style="width: 220px;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorias as $categoria)
                            <tr>
                                <td>{{ $categoria->id }}</td>
                                <td class="font-weight-bold text-secondary">{{ $categoria->nombre }}</td>
                                <td>{{ $categoria->descripcion }}</td>
                                <td>
                                    <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta categoría?');">
                                        <a class="btn btn-sm btn-primary" href="{{ route('categorias.edit', $categoria->id) }}">
                                            ✏️ Editar
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            🗑️ Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if ($categorias->isEmpty())
                    <div class="text-center text-muted mt-3">
                        <em>No hay categorías registradas aún.</em>
                    </div>
                @endif

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
