<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'POS System'); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper {
            display: flex;
            width: 100%;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background: #343a40;
            color: #fff;
        }
        .sidebar a {
            color: #fff;
            padding: 15px;
            text-decoration: none;
            display: block;
        }
        .sidebar a:hover {
            background: #495057;
        }
        .content {
            flex: 1;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <nav class="sidebar">
            <h2 class="text-center">Sistema POSo</h2>
            <a href="<?php echo e(route('categorias.index')); ?>">Categorías</a>
            <a href="<?php echo e(route('clientes.index')); ?>">Clientes</a>
            <a href="<?php echo e(route('compras.index')); ?>">Compras</a>
            <a href="<?php echo e(route('cotizaciones.index')); ?>">Cotizaciones</a>
            <a href="<?php echo e(route('formas-pago.index')); ?>">Formas de Pago</a>
            <a href="<?php echo e(route('productos.index')); ?>">Productos</a>
            <a href="<?php echo e(route('proveedores.index')); ?>">Proveedores</a>
            <a href="<?php echo e(route('vendedores.index')); ?>">Vendedores</a>
            <a href="<?php echo e(route('ventas.index')); ?>">Ventas</a>
        </nav>
        <div class="content">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php /**PATH C:\Users\jp23\Downloads\poso\resources\views\layouts\app.blade.php ENDPATH**/ ?>