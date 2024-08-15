

<?php $__env->startSection('title', 'Detalle del Producto'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <br>
    <h1>Detalle del Producto</h1>

    <div class="card">
        <div class="card-body">
            <h2 class="card-title"><?php echo e($producto->nombre); ?></h2>
            <p><strong>ID:</strong> <?php echo e($producto->id_producto); ?></p>
            <p><strong>Categoría:</strong> <?php echo e($producto->categoria->nombre); ?></p>
            <p><strong>Fecha de Compra:</strong> <?php echo e($producto->fecha_compra); ?></p>
            <p><strong>Color:</strong> <?php echo e($producto->colore); ?></p>
            <p><strong>Descripción Corta:</strong> <?php echo e($producto->descripcion_corta); ?></p>
            <p><strong>Descripción Larga:</strong> <?php echo e($producto->descripcion_larga); ?></p>
            <p><strong>Existencia:</strong> <?php echo e($producto->existencia); ?></p>
            <p><strong>Precio de Compra:</strong> $<?php echo e(number_format($producto->pc, 2)); ?></p>
            <p><strong>Precio de Venta:</strong> $<?php echo e(number_format($producto->pv, 2)); ?></p>

            <?php if($producto->img): ?>
                <div class="mb-3">
                    <img src="<?php echo e(asset('storage/' . $producto->img)); ?>" alt="Imagen del Producto" style="max-width: 300px;">
                </div>
            <?php else: ?>
                <p>No hay imagen disponible.</p>
            <?php endif; ?>

            <a href="<?php echo e(route('productos.index')); ?>" class="btn btn-primary">Volver</a>
            <a href="<?php echo e(route('productos.edit', $producto->id_producto)); ?>" class="btn btn-warning">Editar</a>
            <form action="<?php echo e(route('productos.destroy', $producto->id_producto)); ?>" method="POST" style="display:inline-block;">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
    <br>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jp23\Desktop\poso\resources\views/productos/show.blade.php ENDPATH**/ ?>