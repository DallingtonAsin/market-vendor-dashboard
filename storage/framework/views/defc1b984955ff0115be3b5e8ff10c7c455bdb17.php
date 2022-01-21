<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">
        User Roles
      </h1>
      <ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
        <li class="active">Roles</li>
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
                <div class="col-12 col-md-9"><input type="text" id="name" wire:model="name" class="form-control" placeholder="Role Name"/>
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
        <p> <button type="submit" class="btn btn-primary" wire:model="submit" >Submit</button></p>
    </form>
</div>
</div>

  </div>
</div>

<?php /**PATH C:\laragon\www\mkv-ms\resources\views/livewire/roles/add.blade.php ENDPATH**/ ?>