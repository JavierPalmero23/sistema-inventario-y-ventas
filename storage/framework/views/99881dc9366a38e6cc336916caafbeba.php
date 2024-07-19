<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Compras</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Reporte de Compras</h1>
    <p>Desde: <?php echo e($desde); ?></p>
    <p>Hasta: <?php echo e($hasta); ?></p>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Proveedor</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $compras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($compra->id); ?></td>
                    <td><?php echo e($compra->fecha_compra); ?></td>
                    <td><?php echo e($compra->proveedor->nombre); ?></td>
                    <td><?php echo e($compra->total); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>
</html>
<?php /**PATH C:\Users\jp23\Desktop\poso\resources\views/reportes/compras_pdf.blade.php ENDPATH**/ ?>