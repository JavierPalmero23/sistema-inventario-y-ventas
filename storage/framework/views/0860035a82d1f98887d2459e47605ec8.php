<!DOCTYPE html>
<html>

<head>
    <title>Reporte de Ventas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #004d99;
            border-bottom: 2px solid #004d99;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        h2 {
            color: #0056b3;
            border-bottom: 1px solid #0056b3;
            padding-bottom: 5px;
            margin-bottom: 15px;
        }

        p {
            font-size: 14px;
            margin: 5px 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 14px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #004d99;
            color: white;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        .details-table {
            margin-top: 20px;
            border-collapse: collapse;
        }

        .details-table th,
        .details-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .details-table th {
            background-color: #0056b3;
            color: white;
        }

        .details-table td img {
            max-width: 100px;
            height: auto;
            border: 1px solid #ddd;
        }

        .no-data {
            text-align: center;
            font-size: 16px;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Reporte de Ventas</h1>
        <p><strong>Desde:</strong> <?php echo e($desde); ?></p>
        <p><strong>Hasta:</strong> <?php echo e($hasta); ?></p>

        <?php if($data && $data->count() > 0): ?>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $venta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <h2>Venta ID: <?php echo e($venta->id); ?></h2>
                <p><strong>Fecha:</strong> <?php echo e($venta->fecha_venta); ?></p>
                <p><strong>Cliente:</strong> <?php echo e($venta->cliente->nombre); ?></p>
                <p><strong>Total Neto (sin IVA):</strong> $<?php echo e(number_format($venta->total, 2)); ?></p>
                <p><strong>Total con IVA (16%):</strong> $<?php echo e(number_format($venta->total * 1.16, 2)); ?></p>
                <p><strong>Forma de Pago:</strong> <?php echo e($venta->formaPago ? $venta->formaPago->tipo : 'No especificado'); ?></p>

                <table class="details-table">
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $venta->productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <?php if($producto->img): ?>
                                        <img src="<?php echo e(asset('storage/' . $producto->img)); ?>" alt="Imagen del Producto">
                                    <?php else: ?>
                                        Sin Imagen
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($producto->nombre); ?></td>
                                <td><?php echo e($producto->pivot->cantidad); ?></td>
                                <td>$<?php echo e(number_format($producto->pivot->precio, 2)); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <p class="no-data">No se encontraron ventas en el rango de fechas seleccionado.</p>
        <?php endif; ?>
    </div>
</body>

</html>
<?php /**PATH C:\Users\jp23\Desktop\poso\resources\views/reportes/ventas_pdf.blade.php ENDPATH**/ ?>