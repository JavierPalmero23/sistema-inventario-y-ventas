<!DOCTYPE html>
<html>

<head>
    <title>Reporte de Compras</title>
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
        <h1>Reporte de Compras</h1>
        <p><strong>Desde:</strong> <?php echo e($desde); ?></p>
        <p><strong>Hasta:</strong> <?php echo e($hasta); ?></p>

        <?php if($data && $data->count() > 0): ?>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <h2>Compra ID: <?php echo e($compra->id); ?></h2>
                <p><strong>Fecha:</strong> <?php echo e($compra->fecha_compra); ?></p>
                <p><strong>Proveedor:</strong> <?php echo e($compra->proveedor->nombre); ?></p>
                <p><strong>Total:</strong> $<?php echo e(number_format($compra->pc*$compra->cantidad, 2)); ?></p>
                <p><strong>Descuento:</strong> $<?php echo e(number_format($compra->descuento, 2)); ?></p>

                <table class="details-table">
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>ID Producto</th>
                            <th>Cantidad</th>
                            <th>Precio de Compra</th>
                            <th>Precio de Venta</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>
                                    <?php if($compra->producto->img): ?>
                                        <img src="<?php echo e(asset('storage/' . $compra->producto->img)); ?>" alt="Imagen del Producto">
                                    <?php else: ?>
                                        Sin Imagen
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($compra->producto->nombre); ?></td>
                                <td><?php echo e($compra->cantidad); ?></td>
                                <td>$<?php echo e(number_format($compra->pc, 2)); ?></td>
                                <td>$<?php echo e(number_format($compra->pv, 2)); ?></td>
                            </tr>
                    </tbody>
                </table>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <p class="no-data">No se encontraron compras en el rango de fechas seleccionado.</p>
        <?php endif; ?>
    </div>
</body>

</html>
<?php /**PATH C:\Users\jp23\Desktop\poso\resources\views/reportes/compras_pdf.blade.php ENDPATH**/ ?>