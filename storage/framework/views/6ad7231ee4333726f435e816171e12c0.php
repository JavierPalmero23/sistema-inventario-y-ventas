<!-- resources/views/ventas/create.blade.php -->



<?php $__env->startSection('title', 'Crear Venta'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Crear Venta</h1>
        <form action="<?php echo e(route('ventas.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="id_vendedor">Vendedor</label>
                <select name="id_vendedor" class="form-control" id="id_vendedor" required>
                    <?php $__currentLoopData = $vendedores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendedor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($vendedor->id_vendedor); ?>"><?php echo e($vendedor->nombre); ?></option>
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
                <label for="id_cat">Categoría</label>
                <select name="id_cat" class="form-control" id="id_cat" required>
                    <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($categoria->id_cat); ?>"><?php echo e($categoria->nombre); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                <label for="id_cliente">Cliente</label>
                <select name="id_cliente" class="form-control" id="id_cliente" required>
                    <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($cliente->id_cliente); ?>"><?php echo e($cliente->nombre); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                <label for="id_pago">Forma de Pago</label>
                <select name="id_pago" class="form-control" id="id_pago" required>
                    <?php $__currentLoopData = $formasPago; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formaPago): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($formaPago->id_pago); ?>"><?php echo e($formaPago->tipo); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                <label for="fecha_venta">Fecha de Venta</label>
                <input type="date" name="fecha_venta" class="form-control" id="fecha_venta" required>
            </div>
            <div class="form-group">
                <label for="cambio">Cambio</label>
                <input type="number" name="cambio" class="form-control" id="cambio" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="subtotal">Subtotal</label>
                <input type="number" name="subtotal" class="form-control" id="subtotal" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="iva">IVA</label>
                <input type="number" name="iva" class="form-control" id="iva" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="total">Total</label>
                <input type="number" name="total" class="form-control" id="total" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jp23\Downloads\poso\resources\views\ventas\create.blade.php ENDPATH**/ ?>