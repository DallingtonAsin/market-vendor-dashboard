
<?php if(isset($company)): ?>
<?php echo e($company->name); ?>

<?php endif; ?>

<?php if(empty($company)): ?>
<?php echo e(config('app.name')); ?>

<?php endif; ?>
<?php /**PATH C:\laragon\www\ppd\resources\views/components/company-name.blade.php ENDPATH**/ ?>