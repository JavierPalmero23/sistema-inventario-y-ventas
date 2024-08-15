

<?php $__env->startSection('title', 'Detalle del Cliente'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <br>
    <h1>Detalle del Cliente</h1>

    <div class="card">
        <div class="card-body">
            <h2 class="card-title"><?php echo e($cliente->nombre); ?></h2>
            <p><strong>ID:</strong> <?php echo e($cliente->id_cliente); ?></p>
            <p><strong>Nombre:</strong> <?php echo e($cliente->nombre); ?></p>
            <p><strong>Email:</strong> <?php echo e($cliente->correo); ?></p>
            <p><strong>Teléfono:</strong> <?php echo e($cliente->telefono); ?></p>
            <p><strong>Dirección:</strong> <?php echo e($cliente->direccion); ?></p>
            <p><strong>Codigo Postal:</strong> <?php echo e($cliente->codigo_postal); ?></p>
            <p><strong>Regimen Fiscal:</strong> <?php echo e($cliente->regimen_fiscal); ?></p>
            <p><strong>Razon Social:</strong> <?php echo e($cliente->razon_social); ?></p>
            <p><strong>Fecha de Registro:</strong> <?php echo e($cliente->created_at->format('d/m/Y')); ?></p>

            <a href="<?php echo e(route('clientes.index')); ?>" class="btn btn-primary">Volver</a>
            <a href="<?php echo e(route('clientes.edit', $cliente->id_cliente)); ?>" class="btn btn-warning">Editar</a>
            <form action="<?php echo e(route('clientes.destroy', $cliente->id_cliente)); ?>" method="POST" style="display:inline-block;">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
    <br>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jp23\Desktop\poso\resources\views/clientes/show.blade.php ENDPATH**/ ?>