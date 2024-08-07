<?php $__env->startSection('title', 'Productos'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
<br>
    <h1>Productos</h1>
    <a href="<?php echo e(route('productos.create')); ?>" class="btn btn-primary">Crear Producto</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Existencia</th>
                <th>Categoría</th>
                <th>Fecha Compra</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($producto->id_producto); ?></td>
                <td><?php echo e($producto->nombre); ?></td>
                <td><?php echo e($producto->existencia); ?></td>
                <td><?php echo e($producto->categoria->nombre); ?></td>
                <td><?php echo e($producto->fecha_compra); ?></td>
                <td>
                    <!--aunno<a href="<?php echo e(route('productos.show', $producto->id_producto)); ?>" class="btn btn-info">Ver</a>-->
                    <a href="<?php echo e(route('productos.edit', $producto->id_producto)); ?>" class="btn btn-warning">Editar</a>
                    <form action="<?php echo e(route('productos.destroy', $producto->id_producto)); ?>" method="POST" style="display:inline;">
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jp23\Desktop\poso\resources\views/productos/index.blade.php ENDPATH**/ ?>