

<?php $__env->startSection('content'); ?>
<div class="container">
    <br>
    <h1>Generar Reporte</h1>

    <form action="<?php echo e(route('reportes.generar')); ?>" method="GET">
        <?php echo csrf_field(); ?>
        <div class="mb-4">
            <label for="tipo_reporte">Tipo de Reporte:</label>
            <select id="tipo_reporte" name="tipo_reporte" class="form-control">
                <option value="ventas" <?php echo e(old('tipo_reporte') == 'ventas' ? 'selected' : ''); ?>>Ventas</option>
                <option value="compras" <?php echo e(old('tipo_reporte') == 'compras' ? 'selected' : ''); ?>>Compras</option>
            </select>
            <?php $__errorArgs = ['tipo_reporte'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-red-500 text-xs"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-4">
            <label for="desde">Desde:</label>
            <input type="date" id="desde" name="desde" value="<?php echo e(old('desde')); ?>" max="<?php echo e(date('Y-m-d')); ?>" class="form-control">
        </div>

        <div class="mb-4">
            <label for="hasta">Hasta:</label>
            <input type="date" id="hasta" name="hasta" value="<?php echo e(old('hasta')); ?>" max="<?php echo e(date('Y-m-d')); ?>" class="form-control">
        </div>

        <button type="submit" class="btn btn-info">Generar Reporte</button>
    </form>

    <?php if(isset($data)): ?>
        <h2 class="mt-8 mb-4">Reporte de <?php echo e(ucfirst($tipo_reporte)); ?></h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <?php if($tipo_reporte == 'ventas'): ?>
                        <th>Cliente</th>
                    <?php else: ?>
                        <th>Proveedor</th>
                    <?php endif; ?>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($item->id); ?></td>
                        <td><?php echo e($item->fecha); ?></td>
                        <?php if($tipo_reporte == 'ventas'): ?>
                            <td><?php echo e($item->cliente->nombre); ?></td>
                        <?php else: ?>
                            <td><?php echo e($item->proveedor->nombre); ?></td>
                        <?php endif; ?>
                        <td><?php echo e($item->total); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <form action="<?php echo e(route('reportes.generar.pdf')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="tipo_reporte" value="<?php echo e($tipo_reporte); ?>">
            <input type="hidden" name="desde" value="<?php echo e($desde); ?>">
            <input type="hidden" name="hasta" value="<?php echo e($hasta); ?>">
            <button type="submit" class="btn btn-secondary">Descargar PDF</button>
        </form>
    <?php endif; ?>
    <br>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jp23\Desktop\poso\resources\views/reportes/index.blade.php ENDPATH**/ ?>