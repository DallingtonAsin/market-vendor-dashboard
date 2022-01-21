<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">
        Company Settings
      </h1>
      <ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
        <li class="active">Company</li>
      </ol>
    </section>


    <section class="content">
        <div class="box">
            <?php echo $__env->make('components.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <div class="box-header">
  
        <div>  
            <?php if(!empty($company->name)): ?>
            Edit company
         <?php else: ?>
            Add company
         <?php endif; ?>
        </div>

        
        <div class="col-lg-12">
            <form wire:submit.prevent="store" method="POST">
                <div class="row form-group">
                 <div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
                 <div class="col-12 col-md-9">
                     <input type="hidden" id="company_id" wire:model="company_id" class="form-control"/>
                     <input type="text" id="name" wire:model="name" class="form-control" placeholder="Company Name"/>
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
                 <div class="col col-md-3"><label for="text-input" class=" form-control-label">Abbreviation</label></div>
                 <div class="col-12 col-md-9"><input type="text" id="abbreviation" wire:model="abbreviation" class="form-control" placeholder="Company short form name" />
                     <?php $__errorArgs = ['abbreviation'];
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
             <div class="col-12 col-md-9"><input type="text" id="mobile_no" wire:model="mobile_no" class="form-control" placeholder="Mobile Number"/>
                 <?php $__errorArgs = ['mobile_no'];
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
                 <div class="col col-md-3"><label for="address" class=" form-control-label">Address</label></div>
                 <div class="col-12 col-md-9"><input type="text" id="address" wire:model="address" class="form-control" placeholder="Address" />
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
             <div class="col col-md-3"><label for="text-input" class=" form-control-label">Motto</label></div>
             <div class="col-12 col-md-9"><input type="text" id="motto" wire:model="motto" class="form-control" placeholder="motto"/>
                 <?php $__errorArgs = ['motto'];
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
             <div class="col col-md-3"><label for="text-input" class=" form-control-label">Logo</label></div>
             <div class="col-12 col-md-9">
                 <div class="custom-file">
                     <input type="file" id="logo" wire:model="logo" class="custom-file-input" />
                     <?php $__errorArgs = ['logo'];
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
         <p> <button type="submit" class="btn btn-primary" wire:model="submit" >Submit</button></p>
     </form>
</div>
</div>

  </div>
</div>


<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/mkv-ms/resources/views/livewire/settings/company.blade.php ENDPATH**/ ?>