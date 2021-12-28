<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">
        Add Client
      </h1>
      <ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
        <li class="active">Clients</li>
      </ol>
    </section>


    <section class="content">
        <div class="box">
            <?php echo $__env->make('components.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <div class="box-header">
  
     
        <div class="col-lg-12">
            <form wire:submit.prevent="store" method="POST">
                <div class="row form-group">
                 <div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
                 <div class="col-12 col-md-9">
                     <input type="text" id="client_name" name="client_name" wire:model="client_name" class="form-control" placeholder="Client Name" >
                     <?php $__errorArgs = ['client_name'];
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
                 <div class="col col-md-3"><label for="text-input" class=" form-control-label">Address</label></div>
                 <div class="col-12 col-md-9">
                     <input type="text" id="address" name="address" wire:model="address" class="form-control" placeholder="Client address" >
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
                 <div class="col col-md-3"><label for="text-input" class=" form-control-label">Telephone No.</label></div>
                 <div class="col-12 col-md-9">
                     <input type="text" id="mobile_number" name="mobile_number" wire:model="mobile_number" class="form-control" placeholder="Mobile Number" >
                     <?php $__errorArgs = ['mobile_number'];
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
                 <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
                 <div class="col-12 col-md-9">
                     <input type="email" id="email" name="email" wire:model="email" class="form-control" placeholder="Email Address" >
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
             <p style="text-align: center;"> <button type="submit" class="btn btn-primary btn-md" name="submit" >Add</button></p>
         </form>
</div>
</div>

  </div>
</div>



<?php /**PATH C:\laragon\www\parkpro-dashboard\resources\views/livewire/clients/add.blade.php ENDPATH**/ ?>