

<?php $__env->startSection('content'); ?>
    <h1>Create Inventario</h1>
    <form action="<?php echo e(route('inventarios.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div>
            <label>Producto:</label>
            <select name="id_producto">
                <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($producto->id); ?>"><?php echo e($producto->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div>
            <label>Categoria:</label>
            <select name="id_cat">
                <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($categoria->id); ?>"><?php echo e($categoria->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div>
            <label>Fecha Entrada:</label>
            <input type="date" name="fecha_entrada">
        </div>
        <div>
            <label>Fecha Salida:</label>
            <input type="date" name="fecha_salida">
        </div>
        <div>
            <label>Movimiento:</label>
            <input type="number" name="movimiento">
        </div>
        <div>
            <label>Motivo:</label>
            <textarea name="motivo"></textarea>
        </div>
        <div>
            <label>Cantidad:</label>
            <input type="number" name="cantidad">
        </div>
        <button type="submit">Create</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jp23\Downloads\poso\resources\views/inventarios/create.blade.php ENDPATH**/ ?>