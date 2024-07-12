

<?php $__env->startSection('title', 'Inventario'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Inventarios</h1>
    <a href="<?php echo e(route('inventarios.create')); ?>" class="btn btn-primary">Add New Inventario</a>
    <table class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Categoria</th>
                <th>Fecha Entrada</th>
                <th>Fecha Salida</th>
                <th>Movimiento</th>
                <th>Motivo</th>
                <th>Cantidad</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $inventarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inventario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($inventario->producto->name); ?></td>
                    <td><?php echo e($inventario->categoria->name); ?></td>
                    <td><?php echo e($inventario->fecha_entrada); ?></td>
                    <td><?php echo e($inventario->fecha_salida); ?></td>
                    <td><?php echo e($inventario->movimiento); ?></td>
                    <td><?php echo e($inventario->motivo); ?></td>
                    <td><?php echo e($inventario->cantidad); ?></td>
                    <td>
                        <a href="<?php echo e(route('inventarios.show', $inventario->id)); ?>" class="btn btn-info">Ver</a>
                        <a href="<?php echo e(route('inventarios.edit', $inventario->id)); ?>"class="btn btn-warning">Editar</a>
                        <form action="<?php echo e(route('inventarios.destroy', $inventario->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jp23\Downloads\poso\resources\views/inventarios/index.blade.php ENDPATH**/ ?>