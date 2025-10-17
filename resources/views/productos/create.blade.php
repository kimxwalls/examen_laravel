<!DOCTYPE html>
<html>
<head>
    <title>Crear Producto</title>
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
                            <h2 class="text-primary font-weight-bold mb-0">Crear Nuevo Producto</h2>
                            <a class="btn btn-secondary btn-sm" href="{{ route('productos.index') }}">Atrás</a>
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

                        <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold text-secondary">Nombre:</label>
                                <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold text-secondary">Descripción:</label>
                                <textarea class="form-control" name="descripcion" placeholder="Descripción" rows="3"></textarea>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold text-secondary">Precio:</label>
                                    <input type="number" name="precio" class="form-control" placeholder="Precio" step="0.01">
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold text-secondary">Stock:</label>
                                    <input type="number" name="stock" class="form-control" placeholder="Stock">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold text-secondary">Categoría (ID):</label>
                                <input type="number" name="categoria_id" class="form-control" placeholder="ID de Categoría">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold text-secondary">Código de Barras:</label>
                                <input type="text" name="codigo_barras" class="form-control" placeholder="Código de Barras">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold text-secondary">Imagen:</label>
                                <input type="file" name="imagen" class="form-control-file">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold text-secondary">Activo:</label>
                                <select name="activo" class="form-control">
                                    <option value="1" selected>Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success px-4">Guardar</button>
                                <a href="{{ route('productos.index') }}" class="btn btn-outline-secondary px-4 ml-2">Cancelar</a>
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
