<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <h1>Hola <?php echo e(Auth::user()->name); ?>,</h1>
        <p>Bienvenido al Punto de Venta (POS)</p>
        <p>Desde aquí puedes acceder a todas las funcionalidades necesarias para las ventas del negocio.</p>
        <p>Asegúrate de explorar todas las secciones del sistema en la barra lateral, como las categorías, productos, ventas y más.</p>
        <div class="alert alert-info">
            <strong>Nota:</strong> Revisa regularmente las actualizaciones y mensajes importantes para mantenerte al tanto de las novedades.
        </div>
        <br>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jp23\Desktop\poso\resources\views/dashboard.blade.php ENDPATH**/ ?>