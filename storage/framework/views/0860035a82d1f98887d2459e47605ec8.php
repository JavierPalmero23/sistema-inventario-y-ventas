<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Ventas</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Reporte de Ventas</h1>
    <p>Desde: <?php echo e($desde); ?></p>
    <p>Hasta: <?php echo e($hasta); ?></p>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $venta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($venta->id); ?></td>
                    <td><?php echo e($venta->fecha_venta); ?></td>
                    <td><?php echo e($venta->cliente->nombre); ?></td>
                    <td><?php echo e($venta->total); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>
</html>
<?php /**PATH C:\Users\jp23\Desktop\poso\resources\views/reportes/ventas_pdf.blade.php ENDPATH**/ ?>