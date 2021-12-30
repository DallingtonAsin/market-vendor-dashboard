 <div wire:ignore.self class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit user details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true close-btn">×</span>
                           </button>
                       </div>
                        <form wire:submit.prevent="update()" method="POST">
                       <div class="modal-body">
                            
                        <div class="row">
                        <div class="col-md-3">
                            <label for="first_name">First Name</label>
                        </div>
                            <div class="col-md-9">
                                <input type="hidden" class="form-control" id="client_id" wire:model="client_id">
                                <input type="text" class="form-control" id="first_name" placeholder="Enter FirstName" wire:model="first_name">
                                <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <br/>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="last_name">Last Name</label>
                            </div>
                                <div class="col-md-9">
                                    <input type="hidden" class="form-control" id="client_id" wire:model="client_id">
                                    <input type="text" class="form-control" id="last_name" placeholder="Enter LastName" wire:model="last_name">
                                    <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <br/>


                        <div class="row">
                            <div class="col-md-3">
                                <label for="mobile_number">Telephone No.</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="mobile_number" wire:model="mobile_number" placeholder="Mobile number">
                                <?php $__errorArgs = ['mobile_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <br/>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="email">Email Address</label>
                            </div>
                            <div class="col-md-9">
                                <input type="email" class="form-control" id="email" wire:model="email" placeholder="Email address">
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <br/>


                        <div class="row">
                            <div class="col-md-3">
                                <label for="address">Address</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="address" wire:model="address" placeholder="Enter address">
                                <?php $__errorArgs = ['text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                       </div>
                       <br/>

                       <div class="row">
                        <div class="col-md-3">
                            <label for="gender">Gender</label>
                        </div>
                        <div class="col-md-9">
                            <select wire:model="gender" class="form-control" id="gender">
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
                   <br/>

                       </div>

                    <div class="modal-footer">
                         <button type="submit" class="btn btn-primary close-modal">Update</button>
                         <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                    </div>
                      </form>
                </div>
            </div>
        </div><?php /**PATH C:\laragon\www\parkpro-dashboard\resources\views/livewire/modals/users/edit.blade.php ENDPATH**/ ?>