<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo e(config('app.name')); ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="csrf-token" content="<?= csrf_token() ?>">
  
  <link rel="shortcut icon" href="<?php echo e(asset('images/icons/office1.ico')); ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="<?php echo e(asset('vendors/fonts/montserrat/css.css')); ?>" rel="stylesheet">
  
  
  <?php echo \Livewire\Livewire::styles(); ?>

  
  
  <script src="<?php echo e(asset('js/jquery-3.6.0.min.js')); ?>"></script> 
  <script src="<?php echo e(asset('js/jquery-confirm.min.js')); ?>"></script> 
  
  <script src="<?php echo e(asset('vendors/datatables/dtables/js/jquery.dataTables.min.js')); ?>"></script>
  <script src="<?php echo e(asset('vendors/datatables/dataTables.buttons.min.js')); ?>"></script>
  <script src="<?php echo e(asset('vendors/datatables/buttons.print.min.js')); ?>"></script>
  <script src="<?php echo e(asset('vendors/datatables/buttons.flash.min.js')); ?>"></script>
  <script src="<?php echo e(asset('vendors/datatables/jszip.min.js')); ?>"></script>
  <script src="<?php echo e(asset('vendors/datatables/pdfmake.min.js')); ?>"></script>
  <script src="<?php echo e(asset('vendors/datatables/vfs_fonts.js')); ?>"></script>
  <script src="<?php echo e(asset('vendors/datatables/buttons.html5.min.js')); ?>"></script>
  <script src="<?php echo e(asset('vendors/datatables/dataTables.select.min.js')); ?>"></script>
  <script src="<?php echo e(asset('vendors/custom/js.js')); ?>"></script>
  <script src="<?php echo e(asset('vendors/notify/notify.js')); ?>"></script>
  <script src="<?php echo e(asset('vendors/js/bootstrap3-typeahead.min.js')); ?>"></script>
  
  <script src="<?php echo e(asset('vendors/js/jquery-ui.min.js')); ?>"></script>
  <script src="<?php echo e(asset('vendors/jquery-tabledit/jquery.tabledit.min.js')); ?>"></script>
  <script src="<?php echo e(asset ('bower_components/AdminLTE/bootstrap/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
  <script  src="<?php echo e(asset ('bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.js')); ?>" type="text/javascript" ></script>
  <script  src="<?php echo e(asset ('bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js')); ?>" type="text/javascript" ></script>
  <script  src="<?php echo e(asset ('bower_components/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js')); ?>" type="text/javascript" ></script>
  <script  src="<?php echo e(asset ('bower_components/AdminLTE/plugins/fastclick/fastclick.js')); ?>" type="text/javascript" ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
  <script  src="<?php echo e(asset ('bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.js')); ?>" type="text/javascript" ></script>
  <script  src="<?php echo e(asset ('bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.date.extensions.js')); ?>" type="text/javascript" ></script>
  <script  src="<?php echo e(asset ('bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.extensions.js')); ?>" type="text/javascript" ></script>
  <script  src="<?php echo e(asset ('bower_components/AdminLTE/plugins/daterangepicker/daterangepicker.js')); ?>" type="text/javascript" ></script>
  <script  src="<?php echo e(asset ('bower_components/AdminLTE/plugins/datepicker/bootstrap-datepicker.js')); ?>" type="text/javascript" ></script>
  <script src="<?php echo e(asset ('bower_components/AdminLTE/dist/js/app.min.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(asset ('bower_components/AdminLTE/dist/js/demo.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(asset('vendors/js/Chart.bundle.min.js')); ?>"></script>
  <script src="<?php echo e(asset('vendors/js/chart.flot.sampledata.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('js/bootstrap-multiselect.js')); ?>"></script>
  <script src="<?php echo e(asset('js/Chart.min.js')); ?>"></script>
  
  <link rel="stylesheet" href="<?php echo e(asset('vendors/font-awesome/css/font-awesome.min.css')); ?>">
  <link href="<?php echo e(asset('vendors/css/notification.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('vendors/datatables/dtables/css/dataTables.bootstrap.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('vendors/datatables/dtables/css/jquery.dataTables.min.css')); ?>" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap-multiselect.css')); ?>" type="text/css"/>
  <link href="<?php echo e(asset('vendors/jquery-confirm/jquery-confirm.min.css')); ?>" rel="stylesheet"/>
  <link href="<?php echo e(asset('vendors/js/dataTables.jqueryui.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('vendors/js/jquery-ui.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('vendors/bootstrap3/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(asset('vendors/ionicons/css/ionicons.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css')); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(asset('bower_components/AdminLTE/plugins/daterangepicker/daterangepicker.css')); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(asset('bower_components/AdminLTE/plugins/datepicker/datepicker3.css')); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(asset('bower_components/AdminLTE/dist/css/AdminLTE.min.css')); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(asset('bower_components/AdminLTE/dist/css/skins/_all-skins.css')); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(asset('css/app-template.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
  <style>
    body{
      overflow-x: hidden !important;
    }
    @media  only screen and (min-width: 768px){
      .table-responsive{
        overflow-x: hidden !important;
      }
    }
    
  </style>
  
  <?php echo \Livewire\Livewire::styles(); ?>

  
</head>


<!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|
-->


<body class="hold-transition skin-blue sidebar-boxed">
  <div class="wrapper">
    <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <div>
      <?php echo e($slot); ?>

    </div>
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <?php echo \Livewire\Livewire::scripts(); ?>

    
    <script>
      
      
      $(document).ready(function() {
        
        
        $('#assignee').multiselect();
        // $('#assigneee').multiselect();
        
        
        
        
        //Date picker
        $('#birthDate').datepicker({
          autoclose: true,
          format: 'yyyy/mm/dd'
        });
        $('#hiredDate').datepicker({
          autoclose: true,
          format: 'yyyy/mm/dd'
        });
        $('#from').datepicker({
          autoclose: true,
          format: 'yyyy/mm/dd'
        });
        $('#to').datepicker({
          autoclose: true,
          format: 'yyyy/mm/dd'
        });
      });
    </script>
    <script src="<?php echo e(asset('js/site.js')); ?>"></script>
  </body>
  </html><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/mkv-ms/resources/views/layouts/app.blade.php ENDPATH**/ ?>