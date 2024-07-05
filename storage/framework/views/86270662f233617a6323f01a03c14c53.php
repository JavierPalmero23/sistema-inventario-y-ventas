<!-- resources/views/vendedores/edit.blade.php -->



<?php $__env->startSection('title', 'Editar Vendedor'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Editar Vendedor</h1>
        <form action="<?php echo e(route('vendedores.update', $vendedor->id_vendedor)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="nombre" value="<?php echo e($vendedor->nombre); ?>" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo</label>
                <input type="email" name="correo" class="form-control" id="correo" value="<?php echo e($vendedor->correo); ?>" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" class="form-control" id="telefono" value="<?php echo e($vendedor->telefono); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jp23\Downloads\poso\resources\views\vendedores\edit.blade.php ENDPATH**/ ?>