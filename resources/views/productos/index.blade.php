<!DOCTYPE html> 
<html> 
<head> 
    <title>Examen Laravel</title> 
    <link 
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
        rel="stylesheet"
    > 
</head> 
<body> 
    <div class="container mt-5"> 
        <div class="card shadow-sm"> 
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center"> 
                <h4 class="mb-0">Lista de Productos</h4> 
                <a class="btn btn-light btn-sm" href="{{ route('productos.create') }}">
                    <i class="fas fa-plus"></i> Crear Producto
                </a> 
            </div> 

            <div class="card-body"> 
                @if ($message = Session::get('success')) 
                <div class="alert alert-success"> 
                    <p class="mb-0">{{ $message }}</p> 
                </div> 
                @endif 

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover mt-3 align-middle"> 
                        <thead class="thead-dark">
                            <tr class="text-center"> 
                                <th>ID</th> 
                                <th>Nombre</th> 
                                <th>Descripción</th> 
                                <th>Precio</th> 
                                <th>Stock</th> 
                                <th>Categoría</th> 
                                <th>Código de Barras</th> 
                                <th>Imagen</th> 
                                <th>Activo</th>
                                <th>Acciones</th> 
                            </tr> 
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto) 
                            <tr> 
                                <td>{{ $producto->id }}</td> 
                                <td>{{ $producto->nombre }}</td> 
                                <td>{{ $producto->descripcion }}</td> 
                                <td>S/ {{ number_format($producto->precio, 2) }}</td> 
                                <td>{{ $producto->stock }}</td> 
                                <td>{{ $producto->categoria_id }}</td> 
                                <td>{{ $producto->codigo_barras }}</td> 
                                <td>{{ $producto->imagen }}</td> 
                                <td>
                                    @if($producto->activo)
                                        <span class="badge badge-success">Activo</span>
                                    @else
                                        <span class="badge badge-secondary">Inactivo</span>
                                    @endif
                                </td> 
                                <td class="text-center"> 
                                    <form action="{{ route('productos.destroy',$producto->id) }}" method="POST" class="d-inline"> 
                                        <a class="btn btn-sm btn-warning" href="{{ route('productos.edit', $producto->id) }}">
                                            Editar
                                        </a>
                                        @csrf 
                                        @method('DELETE') 
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este producto?')">
                                            Eliminar
                                        </button> 
                                    </form> 
                                </td> 
                            </tr> 
                            @endforeach 
                        </tbody>
                    </table> 
                </div>
            </div> 
        </div> 
    </div> 

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script> 
</body> 
</html>
