<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-weight:bolder; text-transform:uppercase; 
	  font-family: 'Times New Roman', Times, serif">
        Add Parking Area
      </h1>
      <ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
        <li class="active">Parking Areas</li>
      </ol>
    </section>

    <section class="content">
        <div class="box">
            <?php echo $__env->make('components.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <div class="box-header">
  
     
        <div class="col-lg-12">
            <form wire:submit.prevent="store" method="POST">
                <div class="row form-group">
                 <div class="col col-md-3"><label for="text-input" class=" form-control-label">Client's Name</label></div>
                 <div class="col-12 col-md-9">
                     <select wire:model="client_id" wire:click="changeParkingAreaEvent($event.target.value)" class="form-control" id="client_name">
                     <option value="">Select client</option>
                     <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <option value="<?php echo e($client->id); ?>"><?php echo e($client->name); ?></option>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </select>
                 <?php $__errorArgs = ['client_id'];
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
             <div class="col col-md-3"><label for="text-input" class=" form-control-label">Parking Area</label></div>
             <div class="col-12 col-md-9">
                 <input type="text" id="parking_area" wire:model="name" class="form-control" placeholder="Parking area">
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
             <div class="col col-md-3"><label for="text-input" class=" form-control-label">Address</label></div>
             <div class="col-12 col-md-9">
                 <input type="text" id="address" wire:model="address" class="form-control bg-white" placeholder="Address">
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
             <div class="col col-md-3"><label for="text-input" class=" form-control-label">Description</label></div>
             <div class="col-12 col-md-9"> 
                 <textarea wire:model="description" placeholder="Enter description about parking area"
                  class="form-control bg-white"></textarea>
                 <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($description); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
             </div>
         </div>

         <div class="row form-group">
             <div class="col col-md-3"><label for="text-input" class=" form-control-label">Opens At</label></div>
             <div class="col-12 col-md-9">
                 <input type="time" id="opens_at" wire:model="opens_at" 
                 class="form-control" placeholder="Opening time">
                 <?php $__errorArgs = ['opens_at'];
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
             <div class="col col-md-3"><label for="text-input" class=" form-control-label">Closes At</label></div>
             <div class="col-12 col-md-9">
                 <input type="time" id="closes_at" wire:model="closes_at" 
                 class="form-control" placeholder="Closing time">
                 <?php $__errorArgs = ['closes_at'];
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
             <div class="col col-md-3"><label for="text-input" class=" form-control-label">Latitude</label></div>
             <div class="col-12 col-md-9">
                 <input type="number" step="any" id="latitude" wire:model="latitude" 
                 class="form-control" placeholder="Latitude">
                 <?php $__errorArgs = ['latitude'];
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
             <div class="col col-md-3"><label for="text-input" class=" form-control-label">Longitude</label></div>
             <div class="col-12 col-md-9">
                 <input type="number" step="any" id="latitude" wire:model="longitude" 
                 class="form-control" placeholder="Longitude">
                 <?php $__errorArgs = ['longitude'];
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
             <div class="col col-md-3"><label for="text-input" class=" form-control-label">Total space</label></div>
             <div class="col-12 col-md-9">
                 <input type="number" id="total_space" wire:model="total_space" 
                 class="form-control" placeholder="Total no. of cars that can be accomodated">
                 <?php $__errorArgs = ['total_space'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
             </div>
         </div>

         <p style="text-align: center;"> <button type="submit" class="btn btn-primary btn-md" name="submit" wire:model="submit" >Add</button></p>
     </form>
</div>
</div>

  </div>
</div>


<?php /**PATH C:\laragon\www\parkpro-dashboard\resources\views/livewire/parking/add-parking-area.blade.php ENDPATH**/ ?>