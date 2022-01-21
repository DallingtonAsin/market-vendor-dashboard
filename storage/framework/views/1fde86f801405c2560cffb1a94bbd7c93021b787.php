<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">
        Add Market Good
      </h1>
      <ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
        <li class="active">Market Good Management</li>
      </ol>
    </section>


    <section class="content">
        <div class="box">
            <?php echo $__env->make('components.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <div class="box-header">
  
     
        <div class="col-lg-12">
            <form wire:submit.prevent="store" method="POST"
            enctype="multipart/form-data">

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isAdmin')): ?>
            <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Vendors</label></div>
                <div class="col-12 col-md-9">
                    <select id="vendor_id" wire:model="vendor_id" class="form-control">
                        <option value="">Select vendor</option>
                        <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($vendor->id); ?>"><?php echo e($vendor->first_name); ?> <?php echo e($vendor->last_name); ?> </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['vendor_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
            <?php endif; ?>


       <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isVendor')): ?>
            <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Vendors</label></div>
                <div class="col-12 col-md-9">
                    <select id="vendor_id" wire:model="vendor_id" class="form-control">
                        <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($vendor->id); ?>" selected><?php echo e($vendor->first_name); ?> <?php echo e($vendor->last_name); ?> </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['vendor_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
            <?php endif; ?>

             <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
                <div class="col-12 col-md-9"><input type="text" id="first_name" wire:model="name" class="form-control" placeholder="Name of the good e.g maize"/>
                    <?php $__errorArgs = ['name'];
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
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Qty Available</label></div>
                <div class="col-12 col-md-9"><input type="number" id="qty_available" wire:model="qty_available" class="form-control" placeholder="Quantity available in stock" />
                    <?php $__errorArgs = ['qty_available'];
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
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Unit price</label></div>
                <div class="col-12 col-md-9"><input type="number" id="unit_price" wire:model="unit_price" class="form-control" placeholder="Unit Price" />
                    <?php $__errorArgs = ['unit_price'];
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
                       <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
               </div>
           </div>

           <div class="col-md-2">
            <?php if($photo): ?>
            <img src="<?php echo e($photo->temporaryUrl()); ?>" width="80" height="80">
            <?php endif; ?>
           </div>
         


   <div class="form-group">
    <button type="submit" class="btn btn-primary" wire:model="submit" >Submit</button>
</div>


</form>
</div>
</div>

  </div>
</div>

<?php /**PATH C:\laragon\www\mkv-ms\resources\views/livewire/goods/add.blade.php ENDPATH**/ ?>