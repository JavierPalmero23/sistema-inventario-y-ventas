<!-- resources/views/productos/edit.blade.php -->



<?php $__env->startSection('title', 'Editar Producto'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Editar Producto</h1>
        <form action="<?php echo e(route('productos.update', $producto->id_producto)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="nombre" value="<?php echo e($producto->nombre); ?>" required>
            </div>
            <div class="form-group">
                <label for="id_cat">Categoría</label>
                <select name="id_cat" class="form-control" id="id_cat" required>
                    <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($categoria->id_cat); ?>" <?php echo e($categoria->id_cat == $producto->id_cat ? 'selected' : ''); ?>><?php echo e($categoria->nombre); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                <label for="pv">Precio Venta</label>
                <input type="number" name="pv" class="form-control" id="pv" value="<?php echo e($producto->pv); ?>" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="pc">Precio Compra</label>
                <input type="number" name="pc" class="form-control" id="pc" value="<?php echo e($producto->pc); ?>" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="fecha_compra">Fecha Compra</label>
                <input type="date" name="fecha_compra" class="form-control" id="fecha_compra" value="<?php echo e($producto->fecha_compra); ?>" required>
            </div>
            <div class="form-group">
                <label for="colore">Color</label>
                <input type="text" name="colore" class="form-control" id="colore" value="<?php echo e($producto->colore); ?>" required>
            </div>
            <div class="form-group">
                <label for="descripcion_corta">Descripción Corta</label>
                <input type="text" name="descripcion_corta" class="form-control" id="descripcion_corta" value="<?php echo e($producto->descripcion_corta); ?>" required>
            </div>
            <div class="form-group">
                <label for="descripcion_larga">Descripción Larga</label>
                <textarea name="descripcion_larga" class="form-control" id="descripcion_larga" required><?php echo e($producto->descripcion_larga); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jp23\Downloads\poso\resources\views\productos\edit.blade.php ENDPATH**/ ?>