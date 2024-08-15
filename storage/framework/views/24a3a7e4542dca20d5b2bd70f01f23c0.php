

<?php $__env->startSection('content'); ?>
<div class="container">
    <br>
    <h1>Detalles de la Cotización</h1>
    <p><strong>ID:</strong> <?php echo e($cotizacion->id); ?></p>
    <p><strong>Cliente:</strong> <?php echo e($cotizacion->cliente ? $cotizacion->cliente->nombre : 'No especificado'); ?></p>
    <p><strong>Fecha de Cotización:</strong> <?php echo e($cotizacion->fecha_cot); ?></p>
    <p><strong>Vigencia:</strong> <?php echo e($cotizacion->vigencia); ?></p>
    <p><strong>Total:</strong> $<?php echo e($cotizacion->total); ?></p>
    <p><strong>Comentarios:</strong> <?php echo e($cotizacion->comentarios); ?></p>

    <h3>Productos</h3>
    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $cotizacion->detalles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detalle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                <td>
                    <?php if($detalle->producto->img): ?>
                    <img src="<?php echo e(asset('storage/' . $detalle->producto->img)); ?>" alt="Producto Imagen" width="50px">

                    <?php else: ?>
                        Sin Imagen
                    <?php endif; ?>
                </td>
                    <td><?php echo e($detalle->producto ? $detalle->producto->nombre : 'No especificado'); ?></td>
                    <td><?php echo e($detalle->cantidad); ?></td>
                    <td>$<?php echo e($detalle->precio); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <a href="<?php echo e(route('cotizaciones.index')); ?>" class="btn btn-primary">Volver</a>
    <form action="<?php echo e(route('cotizaciones.destroy', $cotizacion->id)); ?>" method="POST" style="display:inline-block;">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </form>
    <br>
    <br>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jp23\Desktop\poso\resources\views/cotizaciones/show.blade.php ENDPATH**/ ?>