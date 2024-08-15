<?php $__env->startSection('title', 'Editar Cotización'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
<br>
    <h1>Editar Cotización</h1>
    <form action="<?php echo e(route('cotizaciones.update', $cotizacion->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="form-group">
            <label for="id_cliente">Cliente</label>
            <select name="id_cliente" class="form-control" id="id_cliente" required>
                <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($cliente->id_cliente); ?>" <?php echo e($cotizacion->id_cliente == $cliente->id_cliente ? 'selected' : ''); ?>><?php echo e($cliente->nombre); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="form-group">
            <label for="fecha_cot">Fecha de Cotización</label>
            <input type="date" name="fecha_cot" class="form-control" id="fecha_cot" value="<?php echo e($cotizacion->fecha_cot); ?>" max="<?php echo e(date('Y-m-d')); ?>" required>
        </div>
        <div class="form-group">
            <label for="vigencia">Vigencia</label>
            <input type="date" name="vigencia" class="form-control" id="vigencia" value="<?php echo e($cotizacion->vigencia); ?>" min="<?php echo e(date('Y-m-d')); ?>" required>
        </div>
        <div class="form-group">
            <label for="comentarios">Comentarios</label>
            <textarea name="comentarios" class="form-control" id="comentarios"><?php echo e($cotizacion->comentarios); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
    <br>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jp23\Desktop\poso\resources\views/cotizaciones/edit.blade.php ENDPATH**/ ?>