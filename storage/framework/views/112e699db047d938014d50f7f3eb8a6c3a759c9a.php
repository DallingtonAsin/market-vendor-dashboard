
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">
        Change Password
      </h1>
      <ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
        <li class="active">Passwords</li>
      </ol>
    </section>


    <section class="content">
        <div class="box">
            <?php echo $__env->make('components.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <div class="box-header">
  
        <div class="col-lg-12">
            <form wire:submit.prevent="update" method="POST">
                <div class="row form-group">
                 <div class="col col-md-3"><label for="text-input" class=" form-control-label">Current Password</label></div>
                 <div class="col-12 col-md-9"><input type="password" id="current_password" wire:model="current_password" class="form-control" placeholder="Current Password"/>
                     <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                 </div>
             </div>

             <div class="row form-group">
                 <div class="col col-md-3"><label for="text-input" class=" form-control-label">New Password</label></div>
                 <div class="col-12 col-md-9"><input type="password" id="new_password" wire:model="new_password" class="form-control" placeholder="New Password" />
                     <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                 </div>
             </div>
             
             <div class="row form-group">
                 <div class="col col-md-3"><label for="text-input" class=" form-control-label">Confirm password</label></div>
                 <div class="col-12 col-md-9"><input type="password" id="confirm_password" wire:model="confirm_password" class="form-control" placeholder="Confirm Password"/>
                     <?php $__errorArgs = ['confirm_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                     <?php if(session()->get('password_error')): ?>
                     <span class="text-danger"><?php echo e(session()->get('password_error')); ?></span>
                     <?php endif; ?>
                 </div>
             </div>



             <p> <button type="submit" class="btn btn-primary" wire:model="submit" >Submit</button></p>
         </form>
</div>
</div>

  </div>
</div>

<?php /**PATH C:\laragon\www\mkv-ms\resources\views/livewire/password/edit.blade.php ENDPATH**/ ?>