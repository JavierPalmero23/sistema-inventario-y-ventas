<?php $__env->startSection('title', 'Editar Cliente'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <br>
    <h1>Editar Cliente</h1>
    <form action="<?php echo e(route('clientes.update', $cliente->id_cliente)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="nombre" value="<?php echo e($cliente->nombre); ?>" required>
        </div>
        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" name="correo" class="form-control" id="correo" value="<?php echo e($cliente->correo); ?>">
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="tel" name="telefono" class="form-control" id="telefono" value="<?php echo e($cliente->telefono); ?>">
        </div>
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" name="direccion" class="form-control" id="direccion" value="<?php echo e($cliente->direccion); ?>">
        </div>
        <div class="form-group">
            <label for="rfc">RFC</label>
            <input type="text" name="rfc" class="form-control" id="rfc" value="<?php echo e($cliente->rfc); ?>">
        </div>
        <div class="form-group">
            <label for="razon_social">Razón Social</label>
            <input type="text" name="razon_social" class="form-control" id="razon_social" value="<?php echo e($cliente->razon_social); ?>">
        </div>
        <div class="form-group">
            <label for="codigo_postal">Código Postal</label>
            <input type="text" name="codigo_postal" class="form-control" id="codigo_postal" value="<?php echo e($cliente->codigo_postal); ?>">
        </div>
        <div class="form-group">
            <label for="regimen_fiscal">Regimen Fiscal</label>
            <select name="regimen_fiscal" id="regimen_fiscal" class="form-control">
                <option value="Actividad Empresarial" <?php echo e($cliente->regimen_fiscal == 'Actividad Empresarial' ? 'selected' : ''); ?>>Actividad Empresarial</option>
                <option value="Arrendamiento" <?php echo e($cliente->regimen_fiscal == 'Arrendamiento' ? 'selected' : ''); ?>>Arrendamiento</option>
                <option value="Asalariado" <?php echo e($cliente->regimen_fiscal == 'Asalariado' ? 'selected' : ''); ?>>Asalariado</option>
                <option value="Intereses" <?php echo e($cliente->regimen_fiscal == 'Intereses' ? 'selected' : ''); ?>>Intereses</option>
                <option value="Servicios Profesionales" <?php echo e($cliente->regimen_fiscal == 'Servicios Profesionales' ? 'selected' : ''); ?>>Servicios Profesionales</option>
                <option value="Sin Fines Licrativos" <?php echo e($cliente->regimen_fiscal == 'Sin Fines Licrativos' ? 'selected' : ''); ?>>Sin Fines Licrativos</option>
                <option value="Incorporacion Fiscal" <?php echo e($cliente->regimen_fiscal == 'Incorporacion Fiscal' ? 'selected' : ''); ?>>Incorporacion Fiscal</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
    <br>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jp23\Desktop\poso\resources\views/clientes/edit.blade.php ENDPATH**/ ?>