<?php $__env->startSection('title', 'Crear Compra'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
<br>
    <h1>Crear Compra</h1>
    <form action="<?php echo e(route('compras.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="id_proveedor">Proveedor</label>
            <select name="id_proveedor" class="form-control" id="id_proveedor" required>
                <?php $__currentLoopData = $proveedores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proveedor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($proveedor->id_proveedor); ?>"><?php echo e($proveedor->nombre); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="form-group">
            <label for="id_producto">Producto</label>
            <select name="id_producto" class="form-control" id="id_producto" required>
                <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($producto->id_producto); ?>"><?php echo e($producto->nombre); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" class="form-control" id="cantidad" required>
        </div>
        <div class="form-group">
            <label for="pc">Precio de Compra</label>
            <input type="number" step="0.01" name="pc" class="form-control" id="pc" required>
        </div>
        <div class="form-group">
            <label for="pv">Precio de Venta</label>
            <input type="number" step="0.01" name="pv" class="form-control" id="pv" required>
        </div>
        <div class="form-group">
            <label for="fecha_compra">Fecha de Compra</label>
            <input type="date" name="fecha_compra" class="form-control" id="fecha_compra" max="<?php echo e(date('Y-m-d')); ?>" required>
        </div>
        <div class="form-group">
            <label for="descuento">Descuento</label>
            <input type="number" step="0.01" name="descuento" class="form-control" id="descuento">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    <br>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jp23\Desktop\poso\resources\views/compras/create.blade.php ENDPATH**/ ?>