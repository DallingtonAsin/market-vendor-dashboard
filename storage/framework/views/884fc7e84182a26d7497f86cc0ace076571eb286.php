<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">
        Edit Profile
      </h1>
      <ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
        <li class="active">Profile</li>
      </ol>
    </section>


    <section class="content">
        <div class="box">
            <?php echo $__env->make('components.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <div class="box-header">
  

        
        <div class="col-lg-12">
            <form wire:submit.prevent="update()" method="POST">
                <div class="row form-group">
                   <div class="col col-md-3"><label for="firstName" class=" form-control-label">First Name</label></div>
                   <div class="col-12 col-md-9"><input type="text" id="first_name" wire:model="first_name" class="form-control" placeholder="First Name"/>
                       <?php $__errorArgs = ['first_name'];
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
                   <div class="col col-md-3"><label for="lastName" class=" form-control-label">Last Name</label></div>
                   <div class="col-12 col-md-9"><input type="text" id="last_name" wire:model="last_name" value="" class="form-control" placeholder="Last Name" />
                       <?php $__errorArgs = ['last_name'];
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
                   <div class="col col-md-3"><label for="username" class=" form-control-label">Username</label></div>
                   <div class="col-12 col-md-9"><input type="text" id="username" wire:model="username" value="" class="form-control" placeholder="Username" />
                       <?php $__errorArgs = ['username'];
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
                   <div class="col col-md-3"><label for="email" class=" form-control-label">Email</label></div>
                   <div class="col-12 col-md-9"><input type="email" id="email" wire:model="email" class="form-control" placeholder="Email Address" />
                       <?php $__errorArgs = ['email'];
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
                   <div class="col col-md-3"><label for="gender" class=" form-control-label">Gender</label></div>
                   <div class="col-12 col-md-9">
                       <select wire:model="gender" class="form-control" id="gender" selected="selected">
                          <option value="">Select gender</option>
                          <?php $__currentLoopData = $genderOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($gender); ?>"><?php echo e($gender); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                      <?php $__errorArgs = ['gender'];
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
               <div class="col col-md-3"><label for="mobile_no" class=" form-control-label">Mobile No.</label></div>
               <div class="col-12 col-md-9"><input type="text" id="mobile_no" wire:model="mobile_no" class="form-control" placeholder="Mobile Number"/>
                   <?php $__errorArgs = ['mobile'];
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
               <div class="col col-md-3"><label for="mobile_no" class=" form-control-label">Role</label></div>
               <div class="col-12 col-md-9"><input type="text" id="user_role" wire:model="user_role" class="form-control bg-white" 
                   placeholder="User role"/ disabled>
                   <?php $__errorArgs = ['user_role'];
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
               <div class="col col-md-3"><label for="address" class=" form-control-label">Address</label></div>
               <div class="col-12 col-md-9"><input type="text" id="address" wire:model="address" class="form-control" placeholder="Address"/>
                   <?php $__errorArgs = ['address'];
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
               <div class="col col-md-3"><label for="photo" class=" form-control-label">Photo</label></div>
               <div class="col-12 col-md-7">
                   <div class="custom-file">
                       <input type="file" id="photo" wire:model="photo" class="form-control custom-file-input" />
                   </div>
               </div>
           </div>

           <div class="col-md-2">
            <?php if($photo): ?>
            <img src="<?php echo e($photo->temporaryUrl()); ?>" width="80" height="80">
            <?php endif; ?>
        </div>
    </div>

    <div class="form-group">
       <button type="submit" class="btn btn-primary" wire:model="submit" >Submit</button>
   </div>




</form>
</div>
</div>

</div>



<?php /**PATH C:\laragon\www\psd\resources\views/livewire/profile/edit.blade.php ENDPATH**/ ?>