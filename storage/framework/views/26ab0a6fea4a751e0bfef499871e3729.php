<?php $__env->startSection('title', 'Crear Forma de Pago'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
<br>
    <h1>Crear Forma de Pago</h1>
    <form action="<?php echo e(route('formas-pago.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="tipo">Tipo</label>
            <input type="text" name="tipo" class="form-control" id="tipo" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="<?php echo e(route('formas-pago.index')); ?>" class="btn btn-dark">Volver</a>
    </form>
    <br>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jp23\Desktop\poso\resources\views/formas-pago/create.blade.php ENDPATH**/ ?>