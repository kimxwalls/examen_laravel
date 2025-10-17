<!DOCTYPE html> 
<html> 
<head> 
    <title>Editar Producto</title> 
    <link 
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
        rel="stylesheet"
    > 
</head> 
<body> 
    <div class="container mt-5"> 
        <div class="card shadow-sm"> 
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center"> 
                <h4 class="mb-0">Editar Producto</h4> 
                <a class="btn btn-light btn-sm" href="{{ route('productos.index') }}">Atrás</a> 
            </div> 

            <div class="card-body"> 
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

                <form action="{{ route('productos.update',$producto->id) }}" method="POST"> 
                    @csrf 
                    @method('PUT') 
                    <div class="form-group mb-3"> 
                        <label><strong>Nombre:</strong></label> 
                        <input type="text" name="nombre" value="{{ $producto->nombre }}" class="form-control" placeholder="Nombre"> 
                    </div> 

                    <div class="form-group mb-3"> 
                        <label><strong>Descripción:</strong></label> 
                        <textarea class="form-control" name="descripcion" placeholder="Descripción">{{ $producto->descripcion }}</textarea> 
                    </div> 

                    <div class="form-row">
                        <div class="form-group col-md-6"> 
                            <label><strong>Precio:</strong></label> 
                            <input type="number" name="precio" value="{{ $producto->precio }}" class="form-control" placeholder="Precio" step="0.01"> 
                        </div> 

                        <div class="form-group col-md-6"> 
                            <label><strong>Stock:</strong></label> 
                            <input type="number" name="stock" value="{{ $producto->stock }}" class="form-control" placeholder="Stock"> 
                        </div> 
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6"> 
                            <label><strong>ID de Categoría:</strong></label> 
                            <input type="text" name="categoria_id" value="{{ $producto->categoria_id }}" class="form-control" placeholder="ID Categoría"> 
                        </div> 

                        <div class="form-group col-md-6"> 
                            <label><strong>Código de Barras:</strong></label> 
                            <input type="text" name="codigo_barras" value="{{ $producto->codigo_barras }}" class="form-control" placeholder="Código de Barras"> 
                        </div> 
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6"> 
                            <label><strong>Imagen:</strong></label> 
                            <input type="text" name="imagen" value="{{ $producto->imagen }}" class="form-control" placeholder="Imagen"> 
                        </div> 

                        <div class="form-group col-md-6"> 
                            <label><strong>Activo:</strong></label> 
                            <input type="number" name="activo" value="{{ $producto->activo }}" class="form-control" placeholder="Activo"> 
                        </div> 
                    </div>

                    <div class="text-center mt-4"> 
                        <button type="submit" class="btn btn-success px-4">Actualizar</button> 
                    </div> 
                </form> 
            </div> 
        </div> 
    </div> 

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script> 
</body> 
</html>
