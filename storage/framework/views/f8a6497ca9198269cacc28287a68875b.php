<!-- resources/views/formas-pago/index.blade.php -->



<?php $__env->startSection('title', 'Formas de Pago'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Formas de Pago</h1>
        <a href="<?php echo e(route('formas-pago.create')); ?>" class="btn btn-primary">Crear Forma de Pago</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $formasPago; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formaPago): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($formaPago->id_pago); ?></td>
                        <td><?php echo e($formaPago->tipo); ?></td>
                        <td>
                            <a href="<?php echo e(route('formas-pago.show', $formaPago->id_pago)); ?>" class="btn btn-info">Ver</a>
                            <a href="<?php echo e(route('formas-pago.edit', $formaPago->id_pago)); ?>" class="btn btn-warning">Editar</a>
                            <form action="<?php echo e(route('formas-pago.destroy', $formaPago->id_pago)); ?>" method="POST" style="display:inline;">
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jp23\Downloads\poso\resources\views/formas-pago/index.blade.php ENDPATH**/ ?>