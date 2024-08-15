<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Movimientos de Inventario</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Categoría</th>
                <th>Fecha Entrada</th>
                <th>Fecha Salida</th>
                <th>Movimiento</th>
                <th>Motivo</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $inventarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inventario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($inventario->producto->nombre); ?></td>
                    <td><?php echo e($inventario->categoria->nombre); ?></td>
                    <td><?php echo e($inventario->fecha_entrada); ?></td>
                    <td><?php echo e($inventario->fecha_salida); ?></td>
                    <td><?php echo e($inventario->movimiento); ?></td>
                    <td><?php echo e($inventario->motivo); ?></td>
                    <td><?php echo e($inventario->cantidad); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jp23\Desktop\poso\resources\views/inventarios/index.blade.php ENDPATH**/ ?>