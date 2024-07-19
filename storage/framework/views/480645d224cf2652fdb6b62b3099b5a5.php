<?php $__env->startSection('title', 'Crear Cliente'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
<br>
    <h1>Crear Cliente</h1>
    <form action="<?php echo e(route('clientes.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="nombre" required>
        </div>
        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" name="correo" class="form-control" id="correo">
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="tel" name="telefono" class="form-control" id="telefono">
        </div>
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" name="direccion" class="form-control" id="direccion">
        </div>
        <div class="form-group">
            <label for="rfc">RFC</label>
            <input type="text" name="rfc" class="form-control" id="rfc">
        </div>
        <div class="form-group">
            <label for="razon_social">Razón Social</label>
            <input type="text" name="razon_social" class="form-control" id="razon_social">
        </div>
        <div class="form-group">
            <label for="codigo_postal">Código Postal</label>
            <input type="text" name="codigo_postal" class="form-control" id="codigo_postal">
        </div>
        <div class="form-group">
            <label for="regimen_fiscal">Regimen Fiscal</label>
            <input type="text" name="regimen_fiscal" class="form-control" id="regimen_fiscal">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="<?php echo e(route('clientes.index')); ?>" class="btn btn-dark">Volver</a>
    </form>
    <br>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jp23\Desktop\poso\resources\views/clientes/create.blade.php ENDPATH**/ ?>