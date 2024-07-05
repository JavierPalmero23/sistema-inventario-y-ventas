<!-- resources/views/ventas/show.blade.php -->



<?php $__env->startSection('title', 'Detalle de Venta'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Detalle de Venta</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Venta ID: <?php echo e($venta->id); ?></h5>
                <p class="card-text"><strong>Vendedor:</strong> <?php echo e($venta->vendedor->nombre); ?></p>
                <p class="card-text"><strong>Producto:</strong> <?php echo e($venta->producto->nombre); ?></p>
                <p class="card-text"><strong>Categoría:</strong> <?php echo e($venta->categoria->nombre); ?></p>
                <p class="card-text"><strong>Cliente:</strong> <?php echo e($venta->cliente->nombre); ?></p>
                <p class="card-text"><strong>Forma de Pago:</strong> <?php echo e($venta->formaPago->tipo); ?></p>
                <p class="card-text"><strong>Fecha de Venta:</strong> <?php echo e($venta->fecha_venta); ?></p>
                <p class="card-text"><strong>Cambio:</strong> <?php echo e($venta->cambio); ?></p>
                <p class="card-text"><strong>Subtotal:</strong> <?php echo e($venta->subtotal); ?></p>
                <p class="card-text"><strong>IVA:</strong> <?php echo e($venta->iva); ?></p>
                <p class="card-text"><strong>Total:</strong> <?php echo e($venta->total); ?></p>
                <a href="<?php echo e(route('ventas.index')); ?>" class="btn btn-primary">Volver</a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jp23\Downloads\poso\resources\views\ventas\show.blade.php ENDPATH**/ ?>