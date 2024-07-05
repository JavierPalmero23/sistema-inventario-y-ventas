<!-- resources/views/categorias/edit.blade.php -->



<?php $__env->startSection('title', 'Editar Categoría'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Editar Categoría</h1>
        <form action="<?php echo e(route('categorias.update', $categoria->id_cat)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="nombre" value="<?php echo e($categoria->nombre); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jp23\Downloads\poso\resources\views/categorias/edit.blade.php ENDPATH**/ ?>