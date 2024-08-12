<?php $__env->startSection('content'); ?>
<div class="container">
    <br>
    <h1>Venta Details</h1>
    <p><strong>ID:</strong> <?php echo e($venta->id); ?></p>
    <p><strong>Cliente:</strong> <?php echo e($venta->cliente->nombre); ?></p>
    <p><strong>Fecha Venta:</strong> <?php echo e($venta->fecha_venta); ?></p>
    <p><strong>Neto(sin IVA):</strong> $<?php echo e($venta->total); ?></p>
    <p><strong>Total:</strong> $<?php echo e($venta->total*1.16); ?></p>

    <h3>Productos</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $venta->productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($producto->nombre); ?></td>
                    <td><?php echo e($producto->pivot->cantidad); ?></td>
                    <td><?php echo e($producto->pivot->precio); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <a href="<?php echo e(route('ventas.index')); ?>" class="btn btn-primary">Volver</a>
    <form action="<?php echo e(route('ventas.destroy', $venta->id)); ?>" method="POST" style="display:inline-block;">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </form>
    <br>
    <br>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jp23\Desktop\poso\resources\views/ventas/show.blade.php ENDPATH**/ ?>