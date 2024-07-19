

<?php $__env->startSection('content'); ?>
    <h1>Reporte de Compras</h1>

    <form action="<?php echo e(route('reportes.compras')); ?>" method="GET">
        <div>
            <label for="desde">Desde:</label>
            <input type="date" id="desde" name="desde" value="<?php echo e($desde ?? ''); ?>">
        </div>
        <div>
            <label for="hasta">Hasta:</label>
            <input type="date" id="hasta" name="hasta" value="<?php echo e($hasta ?? ''); ?>">
        </div>
        <button type="submit">Generar Reporte</button>
        <a href="<?php echo e(route('reportes.compras.pdf', ['desde' => $desde, 'hasta' => $hasta])); ?>">Descargar PDF</a>
    </form>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jp23\Desktop\poso\resources\views/reportes/compras.blade.php ENDPATH**/ ?>