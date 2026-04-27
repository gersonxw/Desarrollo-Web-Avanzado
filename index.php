<?php
require_once 'controllers/ProductoController.php';

$controller = new ProductoController();

// Lógica de acciones (crear, actualizar, eliminar)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['guardar'])) {
        $producto = new Producto(
            $_POST['nombre'],
            $_POST['descripcion'],
            $_POST['existencia'],
            $_POST['precio']
        );
        if (!empty($_POST['id'])) {
            $producto->setId($_POST['id']);
            $controller->actualizar($producto);
        } else {
            $controller->crear($producto);
        }
        header("Location: index.php");
        exit;
    }
}

if (isset($_GET['eliminar'])) {
    $controller->eliminar($_GET['eliminar']);
    header("Location: index.php");
    exit;
}

// Obtener producto para edición
$productoEditor = null;
if (isset($_GET['editar'])) {
    $productoEditor = $controller->obtenerPorId($_GET['editar']);
}

// Búsqueda o listado normal
$terminoBusqueda = isset($_GET['buscar']) ? trim($_GET['buscar']) : '';
if ($terminoBusqueda !== '') {
    $productos = $controller->buscar($terminoBusqueda);
} else {
    $productos = $controller->listar();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <h1 class="text-center mb-4">Gestión de Productos</h1>

    <!-- Formulario para crear/editar -->
    <div class="card mb-4">
        <div class="card-header">
            <?php echo $productoEditor ? 'Editar Producto' : 'Nuevo Producto'; ?>
        </div>
        <div class="card-body">
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $productoEditor['id'] ?? ''; ?>">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre" required value="<?php echo $productoEditor['nombre'] ?? ''; ?>">
                    </div>
                    <div class="col-md-6 mb-2">
                        <input type="text" name="descripcion" class="form-control" placeholder="Descripción" required value="<?php echo $productoEditor['descripcion'] ?? ''; ?>">
                    </div>
                    <div class="col-md-3 mb-2">
                        <input type="number" name="existencia" class="form-control" placeholder="Existencia" required value="<?php echo $productoEditor['existencia'] ?? ''; ?>">
                    </div>
                    <div class="col-md-3 mb-2">
                        <input type="number" step="0.01" name="precio" class="form-control" placeholder="Precio" required value="<?php echo $productoEditor['precio'] ?? ''; ?>">
                    </div>
                    <div class="col-md-2 mb-2">
                        <button type="submit" name="guardar" class="btn btn-primary w-100"><?php echo $productoEditor ? 'Actualizar' : 'Guardar'; ?></button>
                    </div>
                    <?php if ($productoEditor): ?>
                    <div class="col-md-2 mb-2">
                        <a href="index.php" class="btn btn-secondary w-100">Cancelar</a>
                    </div>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>

    <!-- Buscador -->
    <form method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="buscar" class="form-control" placeholder="Buscar por nombre o descripción..." value="<?php echo htmlspecialchars($terminoBusqueda); ?>">
            <button type="submit" class="btn btn-outline-primary">Buscar</button>
            <?php if ($terminoBusqueda !== ''): ?>
                <a href="index.php" class="btn btn-outline-secondary">Limpiar</a>
            <?php endif; ?>
        </div>
    </form>

    <!-- Tabla de productos -->
    <div class="card">
        <div class="card-header">Lista de productos</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th><th>Nombre</th><th>Descripción</th><th>Existencia</th><th>Precio</th><th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($productos) > 0): ?>
                        <?php foreach ($productos as $producto): ?>
                            <tr>
                                <td><?php echo $producto['id']; ?></td>
                                <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
                                <td><?php echo htmlspecialchars($producto['descripcion']); ?></td>
                                <td><?php echo $producto['existencia']; ?></td>
                                <td>$<?php echo number_format($producto['precio'], 2); ?></td>
                                <td>
                                    <a href="index.php?editar=<?php echo $producto['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                                    <a href="index.php?eliminar=<?php echo $producto['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este producto?');">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="6" class="text-center">No hay productos registrados.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>