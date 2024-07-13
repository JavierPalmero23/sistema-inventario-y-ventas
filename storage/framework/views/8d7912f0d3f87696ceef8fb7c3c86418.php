


<?php $__env->startSection('title', 'Ventas'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
    <br>
        <h1>Ventas</h1>
        <a href="<?php echo e(route('ventas.create')); ?>" class="btn btn-primary">Crear Venta</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Vendedor</th>
                    <th>Producto</th>
                    <th>Categoría</th>
                    <th>Cliente</th>
                    <th>Forma de Pago</th>
                    <th>Fecha de Venta</th>
                    <th>Cambio</th>
                    <th>Subtotal</th>
                    <th>IVA</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $ventas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $venta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($venta->id); ?></td>
                        <td><?php echo e($venta->vendedor->nombre); ?></td>
                        <td><?php echo e($venta->producto->nombre); ?></td>
                        <td><?php echo e($venta->categoria->nombre); ?></td>
                        <td><?php echo e($venta->cliente->nombre); ?></td>
                        <td><?php echo e($venta->formaPago->tipo); ?></td>
                        <td><?php echo e($venta->fecha_venta); ?></td>
                        <td><?php echo e($venta->cambio); ?></td>
                        <td><?php echo e($venta->subtotal); ?></td>
                        <td><?php echo e($venta->iva); ?></td>
                        <td><?php echo e($venta->total); ?></td>
                        <td>
                            <a href="<?php echo e(route('ventas.show', $venta->id)); ?>" class="btn btn-info">Ver</a>
                            <a href="<?php echo e(route('ventas.edit', $venta->id)); ?>" class="btn btn-warning">Editar</a>
                            <form action="<?php echo e(route('ventas.destroy', $venta->id)); ?>" method="POST" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <br>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jp23\Downloads\poso\resources\views/ventas/index.blade.php ENDPATH**/ ?>