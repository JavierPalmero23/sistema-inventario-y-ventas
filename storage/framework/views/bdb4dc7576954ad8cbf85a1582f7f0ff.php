<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title', 'POS System'); ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper {
            display: flex;
            width: 100%;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background: #343a40;
            color: #fff;
        }

        .sidebar a {
            color: #fff;
            padding: 15px;
            text-decoration: none;
            display: block;
        }

        .sidebar a:hover {
            background: #495057;
        }

        .content {
            flex: 1;
            padding: 20px;
            background: #CECECE;
        }

        .container {
            background: #FFFFFF;
            border-radius: 25px;

        }
    </style>
    </div>
    <div class="wrapper">
        <nav class="sidebar">
            <h2 class="text-center">POS System</h2>
    <a href="<?php echo e(route('categorias.index')); ?>">
        <img src="<?php echo e(asset('images/tags.png')); ?>" style="width: 20px; height: 20px; vertical-align: middle;">
        Categorías
    </a>
    <a href="<?php echo e(route('clientes.index')); ?>">
        <img src="<?php echo e(asset('images/target-audience.png')); ?>" style="width: 20px; height: 20px; vertical-align: middle;">
        Clientes
    </a>
    <a href="<?php echo e(route('compras.index')); ?>">
        <img src="<?php echo e(asset('images/shopping-cart-add.png')); ?>" style="width: 20px; height: 20px; vertical-align: middle;">
        Compras
    </a>
    <a href="<?php echo e(route('cotizaciones.index')); ?>">
        <img src="<?php echo e(asset('images/calculator-money.png')); ?>" style="width: 20px; height: 20px; vertical-align: middle;">
        Cotizaciones
    </a>
    <a href="<?php echo e(route('formas-pago.index')); ?>">
        <img src="<?php echo e(asset('images/credit-card.png')); ?>" style="width: 20px; height: 20px; vertical-align: middle;">
        Formas de Pago
    </a>
    <a href="<?php echo e(route('inventarios.index')); ?>">
        <img src="<?php echo e(asset('images/shelves.png')); ?>" style="width: 20px; height: 20px; vertical-align: middle;">
        Inventarios
    </a>
    <a href="<?php echo e(route('productos.index')); ?>">
        <img src="<?php echo e(asset('images/box-open.png')); ?>" style="width: 20px; height: 20px; vertical-align: middle;">
        Productos
    </a>
    <a href="<?php echo e(route('proveedores.index')); ?>">
        <img src="<?php echo e(asset('images/people-network-partner.png')); ?>" style="width: 20px; height: 20px; vertical-align: middle;">
        Proveedores
    </a>
    <a href="<?php echo e(route('reportes.ventas')); ?>">
        <img src="<?php echo e(asset('images/people-network-partner.png')); ?>" style="width: 20px; height: 20px; vertical-align: middle;">
        Reportes
    </a>
    <a href="<?php echo e(route('vendedores.index')); ?>">
        <img src="<?php echo e(asset('images/seller.png')); ?>" style="width: 20px; height: 20px; vertical-align: middle;">
        Vendedores
    </a>
    <a href="<?php echo e(route('ventas.index')); ?>">
        <img src="<?php echo e(asset('images/ticket.png')); ?>" style="width: 20px; height: 20px; vertical-align: middle;">
        Ventas
    </a>
            <div class="mt-3 space-y-1">
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>

                    <?php if (isset($component)) { $__componentOriginald69b52d99510f1e7cd3d80070b28ca18 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald69b52d99510f1e7cd3d80070b28ca18 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.responsive-nav-link','data' => ['href' => route('logout'),'onclick' => 'event.preventDefault();
                                        this.closest(\'form\').submit();']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('responsive-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('logout')),'onclick' => 'event.preventDefault();
                                        this.closest(\'form\').submit();']); ?>
                        <?php echo e(__('Log Out')); ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald69b52d99510f1e7cd3d80070b28ca18)): ?>
<?php $attributes = $__attributesOriginald69b52d99510f1e7cd3d80070b28ca18; ?>
<?php unset($__attributesOriginald69b52d99510f1e7cd3d80070b28ca18); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald69b52d99510f1e7cd3d80070b28ca18)): ?>
<?php $component = $__componentOriginald69b52d99510f1e7cd3d80070b28ca18; ?>
<?php unset($__componentOriginald69b52d99510f1e7cd3d80070b28ca18); ?>
<?php endif; ?>
                </form>
            </div>
        </nav>
        <div class="content">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>

</html><?php /**PATH C:\Users\jp23\Desktop\poso\resources\views/layouts/app.blade.php ENDPATH**/ ?>