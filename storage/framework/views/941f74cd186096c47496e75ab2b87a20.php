<?php $__env->startSection('title', 'Editar Inventario'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
<br>
    <h1>Editar Inventario</h1>
    <form action="<?php echo e(route('inventarios.update', $inventario->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div>
            <label>Producto:</label>
            <select name="id_producto" class="form-control">
                <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($producto->id); ?>" <?php echo e($inventario->id_producto == $producto->id ? 'selected' : ''); ?>><?php echo e($producto->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div>
            <label>Categoria:</label>
            <select name="id_cat" class="form-control">
                <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($categoria->id); ?>" <?php echo e($inventario->id_cat == $categoria->id ? 'selected' : ''); ?>><?php echo e($categoria->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div>
            <label>Fecha Entrada:</label>
            <input type="date" name="fecha_entrada" value="<?php echo e($inventario->fecha_entrada); ?>" max="<?php echo e(date('Y-m-d')); ?>" class="form-control">
        </div>
        <div>
            <label>Fecha Salida:</label>
            <input type="date" name="fecha_salida" value="<?php echo e($inventario->fecha_salida); ?>" max="<?php echo e(date('Y-m-d')); ?>" class="form-control">
        </div>
        <div>
            <label>Movimiento:</label>
            <input type="number" name="movimiento" value="<?php echo e($inventario->movimiento); ?>" class="form-control">
        </div>
        <div>
            <label>Motivo:</label>
            <textarea name="motivo" class="form-control"><?php echo e($inventario->motivo); ?></textarea>
        </div>
        <div>
            <label>Cantidad:</label>
            <input type="number" name="cantidad" value="<?php echo e($inventario->cantidad); ?>" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="<?php echo e(route('inventarios.index')); ?>" class="btn btn-dark">Volver</a>
    </form>
    <br>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jp23\Desktop\poso\resources\views/inventarios/edit.blade.php ENDPATH**/ ?>