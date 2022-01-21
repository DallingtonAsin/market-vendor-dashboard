<!doctype html>
    <html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title> 
            <?php if(isset($companyData)): ?>
            <?php echo e($companyData['company_name']); ?>

            <?php else: ?>
            <?php echo e(env('APP_NAME')); ?>

            <?php endif; ?>
        </title>
        <link href="<?php echo e(asset('css/css.css')); ?>" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo e(asset('css/font-awesome.min.css')); ?>">
        <link href="<?php echo e(asset('css/nunito.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
        <?php echo \Livewire\Livewire::styles(); ?>

    </head>
    <body class="body">
        <div id="app">
            <main>
                <?php echo $__env->yieldContent('content'); ?>
            </main>
        </div>
        <?php echo \Livewire\Livewire::scripts(); ?>

    </body>
    </html>
<?php /**PATH C:\laragon\www\ppd\resources\views/auth/template.blade.php ENDPATH**/ ?>