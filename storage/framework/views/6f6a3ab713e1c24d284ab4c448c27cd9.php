<!-- resources/views/proveedores/create.blade.php -->



<?php $__env->startSection('title', 'Crear Proveedor'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Crear Proveedor</h1>
        <form action="<?php echo e(route('proveedores.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="nombre" required>
            </div>
            <div class="form-group">
                <label for="nombre_contacto">Nombre de Contacto</label>
                <input type="text" name="nombre_contacto" class="form-control" id="nombre_contacto">
            </div>
            <div class="form-group">
                <label for="correo">Correo</label>
                <input type="email" name="correo" class="form-control" id="correo">
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="tel" name="telefono" class="form-control" id="telefono">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jp23\Downloads\poso\resources\views/proveedores/create.blade.php ENDPATH**/ ?>