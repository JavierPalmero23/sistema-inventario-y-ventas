<!-- resources/views/proveedores/index.blade.php -->



<?php $__env->startSection('title', 'Proveedores'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Proveedores</h1>
        <a href="<?php echo e(route('proveedores.create')); ?>" class="btn btn-primary">Crear Proveedor</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Contacto</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $proveedores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proveedores): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($proveedores->id_proveedor); ?></td>
                        <td><?php echo e($proveedores->nombre); ?></td>
                        <td><?php echo e($proveedores->nombre_contacto); ?></td>
                        <td><?php echo e($proveedores->correo); ?></td>
                        <td><?php echo e($proveedores->telefono); ?></td>
                        <td>
                            <a href="<?php echo e(route('proveedores.show', $proveedores->id_proveedor)); ?>" class="btn btn-info">Ver</a>
                            <a href="<?php echo e(route('proveedores.edit', $proveedores->id_proveedor)); ?>" class="btn btn-warning">Editar</a>
                            <form action="<?php echo e(route('proveedores.destroy', $proveedores->id_proveedor)); ?>" method="POST" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jp23\Downloads\poso\resources\views/proveedores/index.blade.php ENDPATH**/ ?>