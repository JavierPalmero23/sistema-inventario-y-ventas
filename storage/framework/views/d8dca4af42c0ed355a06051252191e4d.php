<?php $__env->startSection('content'); ?>
    <h1>Edit Venta</h1>
    <form action="<?php echo e(route('ventas.update', $venta->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div>
            <label>Cliente:</label>
            <select name="cliente_id" class="form-control">
                <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($cliente->id); ?>" <?php echo e($venta->cliente_id == $cliente->id ? 'selected' : ''); ?>>
                        <?php echo e($cliente->nombre); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div>
            <label>Fecha Venta:</label>
            <input type="date" name="fecha_venta" class="form-control" value="<?php echo e($venta->fecha_venta); ?>" max="<?php echo e(date('Y-m-d')); ?>">
        </div>
        <div>
            <label>Productos:</label>
            <div id="productos-container">
                <?php $__currentLoopData = $venta->productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="producto">
                        <select name="productos[<?php echo e($key); ?>][id]" class="form-control">
                            <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($p->id); ?>" <?php echo e($producto->pivot->producto_id == $p->id ? 'selected' : ''); ?>>
                                    <?php echo e($p->nombre); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <input type="number" name="productos[<?php echo e($key); ?>][cantidad]" class="form-control" placeholder="Cantidad" value="<?php echo e($producto->pivot->cantidad); ?>">
                        <input type="number" name="productos[<?php echo e($key); ?>][precio]" class="form-control" placeholder="Precio" value="<?php echo e($producto->pivot->precio); ?>">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <button type="button" onclick="addProducto()">Add Producto</button>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

    <script>
        let productoIndex = <?php echo e($venta->productos->count()); ?>;

        function addProducto() {
            const container = document.getElementById('productos-container');
            const newProducto = document.createElement('div');
            newProducto.classList.add('producto');
            newProducto.innerHTML = `
                <select name="productos[${productoIndex}][id]" class="form-control">
                    <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($producto->id); ?>"><?php echo e($producto->nombre); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <input type="number" name="productos[${productoIndex}][cantidad]" class="form-control" placeholder="Cantidad">
                <input type="number" name="productos[${productoIndex}][precio]" class="form-control" placeholder="Precio">
            `;
            container.appendChild(newProducto);
            productoIndex++;
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jp23\Desktop\poso\resources\views/ventas/edit.blade.php ENDPATH**/ ?>