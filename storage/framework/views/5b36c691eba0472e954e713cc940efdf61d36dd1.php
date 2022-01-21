<div class="col-lg-12 text-center">
 <?php if(session()->get('success')): ?>
 <div class='alert alert-success alert-dismissible' role='alert'>
   <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span></button>
      <strong>Yello!</strong> <?php echo e(session()->get('success')); ?> 
      <i class="fa fa-check-circle"></i>
   </div>
   <?php endif; ?>

   <?php if(session()->get('error')): ?>
   <div class='alert alert-danger alert-dismissible' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
         <span aria-hidden='true'>&times;</span></button>
         <strong>Error!</strong> <?php echo e(session()->get('error')); ?>

         <i class="fa fa-times-circle"></i>
      </div>
      <?php endif; ?>
   </div><?php /**PATH C:\laragon\www\ppd\resources\views/components/message.blade.php ENDPATH**/ ?>