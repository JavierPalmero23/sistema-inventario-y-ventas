


<?php $__env->startSection('title', 'Inventario'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
<br>
    <h1>Inventario</h1>

    <a href="<?php echo e(route('inventarios.create')); ?>" class="btn btn-primary mb-2">Crear Inventario</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Categoría</th>
                <th>Fecha Entrada</th>
                <th>Fecha Salida</th>
                <th>Movimiento</th>
                <th>Motivo</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $inventarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inventario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($inventario->id); ?></td>
                <td><?php echo e($inventario->producto->nombre); ?></td>
                <td><?php echo e($inventario->categoria->nombre); ?></td>
                <td><?php echo e($inventario->fecha_entrada); ?></td>
                <td><?php echo e($inventario->fecha_salida); ?></td>
                <td><?php echo e($inventario->movimiento); ?></td>
                <td><?php echo e($inventario->motivo); ?></td>
                <td><?php echo e($inventario->cantidad); ?></td>
                <td>
                    <!--<a href="<?php echo e(route('inventarios.show', $inventario->id)); ?>" class="btn btn-info btn-sm">Ver</a>-->
                    <a href="<?php echo e(route('inventarios.edit', $inventario->id)); ?>" class="btn btn-primary btn-sm">Editar</a>
                    <form action="<?php echo e(route('inventarios.destroy', $inventario->id)); ?>" method="POST" style="display: inline-block;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <br>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jp23\Downloads\poso\resources\views/inventarios/index.blade.php ENDPATH**/ ?>