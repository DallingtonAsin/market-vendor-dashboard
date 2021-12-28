<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-weight:bolder; text-transform:uppercase; 
	  font-family: 'Times New Roman', Times, serif">
        Add Parking Fee
      </h1>
      <ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
        <li class="active">Parking Fees</li>
      </ol>
    </section>

    <section class="content">
        <div class="box">
            <?php echo $__env->make('components.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <div class="box-header">
  
     
        <div class="col-lg-12">
            <form wire:submit.prevent="store" method="POST">

                <div class="row form-group">
               <div class="col col-md-3"><label for="text-input" class=" form-control-label">Client</label></div>
               <div class="col-12 col-md-9">
                  <select wire:model="client" wire:click="changeClientEvent($event.target.value)" class="form-control" id="client">
                   <option value="">Select client</option>
                   <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <option value="<?php echo e($client->id); ?>"><?php echo e($client->name); ?></option>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </select>
               <?php $__errorArgs = ['client'];
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
               <div class="col col-md-3"><label for="text-input" class=" form-control-label">Parking area</label></div>
               <div class="col-12 col-md-9">
                  <select id="parking_area" class="form-control parking_area" wire:model="parking_area" >
                   <option value="">Select parking area</option>
                    <?php $__currentLoopData = $parking_areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($area->id); ?>"><?php echo e($area->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </select>
               <?php $__errorArgs = ['parking_area'];
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
               <div class="col col-md-3"><label for="text-input" class=" form-control-label">Vehicle Category</label></div>
               <div class="col-12 col-md-9">
                  <select wire:model="vehicle_category" class="form-control" id="vehicle_category">
                   <option value="">Select vehicle category</option>
                   <?php $__currentLoopData = $vehicle_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
               <?php $__errorArgs = ['vehicle_category'];
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
           <div class="col col-md-3"><label for="text-input" class=" form-control-label">Fee</label></div>
           <div class="col-12 col-md-9">
               <input type="text" id="fee" name="fee" wire:model="fee" class="form-control" placeholder="Fees" autocomplete="off">
               <?php $__errorArgs = ['fee'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
           </div>
       </div>

       <p style="text-align: center;"> <button type="submit" class="btn btn-primary btn-md" name="submit" wire:model="submit">Add</button></p>
   </form>
</div>
</div>

  </div>
</div>

<script type="text/javascript">
    Numberize('#fee');
</script>



<?php /**PATH C:\laragon\www\parkpro-dashboard\resources\views/livewire/parking/add-parking-fee.blade.php ENDPATH**/ ?>