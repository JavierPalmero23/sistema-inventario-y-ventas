


<?php $__env->startSection('title', 'Clientes'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
<br>
    <h1>Clientes</h1>
    <a href="<?php echo e(route('clientes.create')); ?>" class="btn btn-primary">Crear Cliente</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>RFC</th>
                <th>Razón Social</th>
                <th>Código Postal</th>
                <th>Regimen Fiscal</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($cliente->id_cliente); ?></td>
                <td><?php echo e($cliente->nombre); ?></td>
                <td><?php echo e($cliente->correo); ?></td>
                <td><?php echo e($cliente->telefono); ?></td>
                <td><?php echo e($cliente->direccion); ?></td>
                <td><?php echo e($cliente->rfc); ?></td>
                <td><?php echo e($cliente->razon_social); ?></td>
                <td><?php echo e($cliente->codigo_postal); ?></td>
                <td><?php echo e($cliente->regimen_fiscal); ?></td>
                <td>
                    <!--aunno<a href="<?php echo e(route('clientes.show', $cliente->id_cliente)); ?>" class="btn btn-info">Ver</a>-->
                    <a href="<?php echo e(route('clientes.edit', $cliente->id_cliente)); ?>" class="btn btn-warning">Editar</a>
                    <form action="<?php echo e(route('clientes.destroy', $cliente->id_cliente)); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <br>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jp23\Downloads\poso\resources\views/clientes/index.blade.php ENDPATH**/ ?>