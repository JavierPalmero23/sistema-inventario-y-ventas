<?php $__env->startSection('content'); ?>
<div class="container">
    <br>
    <h1>Create Venta</h1>
    <form action="<?php echo e(route('ventas.store')); ?>" method="POST">
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
            <label>Fecha Venta:</label>
            <input type="date" name="fecha_venta" class="form-control" max="<?php echo e(date('Y-m-d')); ?>" value="<?php echo e(date('Y-m-d')); ?>" required>
        </div>
        <div>
            <label>Productos:</label>
            <div id="productos-container">
                <div class="producto">
                    <select name="productos[0][id_producto]" class="form-control" onchange="updatePrecio(this)">
                        <option value="" disabled selected>Seleccione un producto</option>
                        <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($producto->id_producto); ?>" data-precio="<?php echo e($producto->pv); ?>"><?php echo e($producto->nombre); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <input type="number" name="productos[0][cantidad]" class="form-control" placeholder="Cantidad" min="0" required>
                    <input type="number" name="productos[0][precio]" class="form-control" placeholder="Precio" readonly>
                </div>
            </div>
            <button type="button" onclick="addProducto()" class="btn btn-secondary">Agregar Producto</button>
        </div>
        <br>
        <div class="form-group">
            <label for="id_pago">Forma de Pago</label>
            <select name="id_pago" class="form-control" id="id_pago" required>
                <?php $__currentLoopData = $formasPago; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formaPago): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($formaPago->id_pago); ?>"><?php echo e($formaPago->tipo); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <br>
        <a href="<?php echo e(route('ventas.index')); ?>" class="btn btn-secondary">Volver</a>
        <button type="submit" class="btn btn-primary">Vender</button>
    </form>

    <script>
        let productoIndex = 1;

        function addProducto() {
            const container = document.getElementById('productos-container');
            const newProducto = document.createElement('div');
            newProducto.classList.add('producto');
            newProducto.innerHTML = `
                <select name="productos[${productoIndex}][id_producto]" class="form-control" onchange="updatePrecio(this)">
                    <option value="" disabled selected>Seleccione un producto</option>
                    <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($producto->id_producto); ?>" data-precio="<?php echo e($producto->pv); ?>"><?php echo e($producto->nombre); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <input type="number" name="productos[${productoIndex}][cantidad]" class="form-control" placeholder="Cantidad" min="0" required>
                <input type="number" name="productos[${productoIndex}][precio]" class="form-control" placeholder="Precio" readonly>
            `;
            container.appendChild(newProducto);
            productoIndex++;
        }

        function updatePrecio(select) {
            const precioInput = select.closest('.producto').querySelector('input[name$="[precio]"]');
            const selectedOption = select.options[select.selectedIndex];
            const precio = selectedOption.getAttribute('data-precio');
            precioInput.value = precio;
        }
    </script>
    <br>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jp23\Desktop\poso\resources\views/ventas/create.blade.php ENDPATH**/ ?>