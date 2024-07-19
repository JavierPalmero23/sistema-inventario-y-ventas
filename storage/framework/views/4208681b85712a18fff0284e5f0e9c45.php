<?php $__env->startSection('title', 'Editar Forma de Pago'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
<br>
    <h1>Editar Forma de Pago</h1>
    <form action="<?php echo e(route('formas-pago.update', $formaPago->id_pago)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="form-group">
            <label for="tipo">Tipo</label>
            <input type="text" name="tipo" class="form-control" id="tipo" value="<?php echo e($formaPago->tipo); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
    <br>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jp23\Desktop\poso\resources\views/formas-pago/edit.blade.php ENDPATH**/ ?>