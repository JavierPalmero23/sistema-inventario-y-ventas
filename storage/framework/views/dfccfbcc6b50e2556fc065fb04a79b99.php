

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Crear Inventario</h1>
    <form action="<?php echo e(route('inventarios.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div>
            <label>Producto:</label>
            <select name="id_producto" class="form-control">
                <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($producto->id_producto); ?>"><?php echo e($producto->nombre); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div>
            <label>Categoría:</label>
            <select name="id_cat" class="form-control">
                <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($categoria->id_cat); ?>"><?php echo e($categoria->nombre); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div>
            <label>Fecha de Entrada:</label>
            <input type="date" name="fecha_entrada" class="form-control">
        </div>
        <div>
            <label>Fecha de Salida:</label>
            <input type="date" name="fecha_salida" class="form-control">
        </div>
        <div>
            <label>Movimiento:</label>
            <input type="number" name="movimiento" class="form-control">
        </div>
        <div>
            <label>Motivo:</label>
            <textarea name="motivo" class="form-control"></textarea>
        </div>
        <div>
            <label>Cantidad:</label>
            <input type="number" name="cantidad" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="<?php echo e(route('inventarios.index')); ?>" class="btn btn-dark">Volver</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jp23\Downloads\poso\resources\views/inventarios/create.blade.php ENDPATH**/ ?>