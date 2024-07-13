<!-- resources\views\vendedores\create.blade.php -->



<?php $__env->startSection('title', 'Crear Vendedor'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Crear Vendedor</h1>
        <form action="<?php echo e(route('vendedores.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="nombre" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo</label>
                <input type="email" name="correo" class="form-control" id="correo" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" class="form-control" id="telefono" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="<?php echo e(route('vendedores.index')); ?>" class="btn btn-dark">Volver</a>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jp23\Downloads\poso\resources\views/vendedores/create.blade.php ENDPATH**/ ?>