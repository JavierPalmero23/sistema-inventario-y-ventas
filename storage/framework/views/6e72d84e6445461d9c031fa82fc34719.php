<!-- resources/views/cotizaciones/index.blade.php -->



<?php $__env->startSection('title', 'Cotizaciones'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Cotizaciones</h1>
        <a href="<?php echo e(route('cotizaciones.create')); ?>" class="btn btn-primary">Crear Cotización</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Cliente</th>
                    <th>Fecha de Cotización</th>
                    <th>Vigencia</th>
                    <th>Comentarios</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $cotizaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cotizacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($cotizacion->id); ?></td>
                        <td><?php echo e($cotizacion->producto->nombre); ?></td>
                        <td><?php echo e($cotizacion->cliente->nombre); ?></td>
                        <td><?php echo e($cotizacion->fecha_cot); ?></td>
                        <td><?php echo e($cotizacion->vigencia); ?></td>
                        <td><?php echo e($cotizacion->comentarios); ?></td>
                        <td>
                            <a href="<?php echo e(route('cotizaciones.show', $cotizacion->id)); ?>" class="btn btn-info">Ver</a>
                            <a href="<?php echo e(route('cotizaciones.edit', $cotizacion->id)); ?>" class="btn btn-warning">Editar</a>
                            <form action="<?php echo e(route('cotizaciones.destroy', $cotizacion->id)); ?>" method="POST" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jp23\Downloads\poso\resources\views/cotizaciones/index.blade.php ENDPATH**/ ?>