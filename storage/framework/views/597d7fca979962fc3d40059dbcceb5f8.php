

<?php $__env->startSection('content'); ?>
    <h1>Crear Cotización</h1>
    <form action="<?php echo e(route('cotizaciones.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div>
            <label>Cliente:</label>
            <select name="id_cliente" class="form-control">
                <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($cliente->id_cliente); ?>"><?php echo e($cliente->nombre); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div>
            <label>Fecha de Cotización:</label>
            <input type="date" name="fecha_cot" class="form-control">
        </div>
        <div>
            <label>Vigencia:</label>
            <input type="date" name="vigencia" class="form-control">
        </div>
        <div>
            <label>Comentarios:</label>
            <textarea name="comentarios" class="form-control"></textarea>
        </div>
        <div>
            <h3>Productos</h3>
            <div id="productos">
                <div class="producto">
                    <select name="productos[0][id_producto]" class="form-control">
                        <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($producto->id_producto); ?>"><?php echo e($producto->nombre); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <input type="number" name="productos[0][cantidad]" placeholder="Cantidad" class="form-control">
                    <input type="number" name="productos[0][precio]" placeholder="Precio" class="form-control">
                </div>
            </div>
            <button type="button" id="addProduct" class="btn btn-secondary">Agregar Producto</button>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="<?php echo e(route('cotizaciones.index')); ?>" class="btn btn-dark">Volver</a>
    </form>

    <script>
        let productIndex = 1;
        document.getElementById('addProduct').addEventListener('click', function() {
            let productosDiv = document.getElementById('productos');
            let newProductDiv = document.createElement('div');
            newProductDiv.classList.add('producto');
            newProductDiv.innerHTML = `
                <select name="productos[${productIndex}][id_producto]" class="form-control">
                    <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($producto->id_producto); ?>"><?php echo e($producto->nombre); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <input type="number" name="productos[${productIndex}][cantidad]" placeholder="Cantidad" class="form-control">
                <input type="number" name="productos[${productIndex}][precio]" placeholder="Precio" class="form-control">
            `;
            productosDiv.appendChild(newProductDiv);
            productIndex++;
        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jp23\Downloads\poso\resources\views/cotizaciones/create.blade.php ENDPATH**/ ?>