<!DOCTYPE html>
<html>
<head>
    <title>Crear Categoría</title>
    <link 
        rel="stylesheet" 
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    >
</head>
<body style="background-color: #f8f9fa;">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-body p-4">

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2 class="text-primary font-weight-bold mb-0">Crear Nueva Categoría</h2>
                            <a class="btn btn-secondary btn-sm" href="{{ route('categorias.index') }}">Atrás</a>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>¡Ups!</strong> Hay algunos problemas con tu entrada.<br><br>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('categorias.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold text-secondary">Nombre:</label>
                                <input 
                                    type="text" 
                                    name="nombre" 
                                    class="form-control" 
                                    placeholder="Nombre">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold text-secondary">Descripción:</label>
                                <textarea 
                                    class="form-control" 
                                    name="descripcion" 
                                    placeholder="Descripción"
                                    rows="3"></textarea>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success px-4">Guardar</button>
                                <a href="{{ route('categorias.index') }}" class="btn btn-outline-secondary px-4 ml-2">Cancelar</a>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
