


<?php $__env->startSection('title', 'Crear Categoría'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <br>
    <h1>Crear Categoría</h1>
    <br>
    <form action="<?php echo e(route('categorias.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="nombre" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="<?php echo e(route('categorias.index')); ?>" class="btn btn-dark">Volver</a>
    </form>
    <br>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jp23\Downloads\poso\resources\views/categorias/create.blade.php ENDPATH**/ ?>