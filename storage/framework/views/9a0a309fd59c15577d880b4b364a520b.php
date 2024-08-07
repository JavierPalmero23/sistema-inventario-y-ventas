<?php $__env->startSection('title', 'Compras'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
<br>
    <h1>Compras</h1>
    <a href="<?php echo e(route('compras.create')); ?>" class="btn btn-primary">Crear Compra</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Proveedor</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio<br>Compra</th>
                <th>Precio<br>Venta</th>
                <th>Fecha<br>Compra</th>
                <th>Descuento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $compras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($compra->id); ?></td>
                <td><?php echo e($compra->proveedor->nombre); ?></td>
                <td><?php echo e($compra->producto->nombre); ?></td>
                <td><?php echo e($compra->cantidad); ?></td>
                <td><?php echo e($compra->pc); ?></td>
                <td><?php echo e($compra->pv); ?></td>
                <td><?php echo e($compra->fecha_compra); ?></td>
                <td><?php echo e($compra->descuento); ?></td>
                <td>
                    <!--aunno<a href="<?php echo e(route('compras.show', $compra->id)); ?>" class="btn btn-info">Ver</a>-->
                    <a href="<?php echo e(route('compras.edit', $compra->id)); ?>" class="btn btn-warning">Editar</a>
                    <form action="<?php echo e(route('compras.destroy', $compra->id)); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <br>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jp23\Desktop\poso\resources\views/compras/index.blade.php ENDPATH**/ ?>