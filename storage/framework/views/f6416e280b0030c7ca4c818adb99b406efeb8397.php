
<?php $__env->startSection('action-content'); ?>
<!-- Main content -->
<section class="content">
 <?php echo $__env->make('dashboard-content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard-base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\office-all-in-one\resources\views/dashboard.blade.php ENDPATH**/ ?>