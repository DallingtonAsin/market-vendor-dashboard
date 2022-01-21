
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo e(config('app.name')); ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <link rel="shortcut icon" href="<?php echo e(asset('images/icons/office1.ico')); ?>">
    <link href="<?php echo e(asset('vendors/fonts/montserrat/css.css')); ?>" rel="stylesheet">
    
    <link href="<?php echo e(asset('bower_components/AdminLTE/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link href="<?php echo e(asset('bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('bower_components/AdminLTE/plugins/daterangepicker/daterangepicker.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('/bower_components/AdminLTE/plugins/datepicker/datepicker3.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('bower_components/AdminLTE/dist/css/AdminLTE.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('bower_components/AdminLTE/dist/css/skins/_all-skins.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('css/app-template.css')); ?>" rel="stylesheet">
    
    <link href="<?php echo e(asset('css/css.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/login.css')); ?>" rel="stylesheet">
    
</head>
<body class="hold-transition login-page">
    
    <?php echo $__env->yieldContent('content'); ?>
    
</body>
</html>
<?php /**PATH C:\laragon\www\office-all-in-one\resources\views/layouts/auth.blade.php ENDPATH**/ ?>