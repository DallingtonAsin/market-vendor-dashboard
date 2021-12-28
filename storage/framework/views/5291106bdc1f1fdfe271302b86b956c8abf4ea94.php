
  <!-- Modal -->
  <div class="modal fade" id="editEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background:#605ca8;color:white">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color:#fff">&times;</span>
              </button>
          <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight:bolder;
           text-transform:uppercase; font-family: 'Times New Roman', Times, serif">Edit staff details</h5>
        </div>
        <div class="modal-body">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="modal-title" id="exampleModalLongTitle" style="font-weight:bolder;
                     text-transform:uppercase; font-family: 'Times New Roman', Times, serif; color:red"> Edit staff details Portal</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" 
                    action="<?php echo e(route('user-management.update')); ?>">
                       <?php echo csrf_field(); ?>
                       <?php echo method_field('put'); ?>

                            <div class="col-md-6">
                                <input id="edit-id" type="hidden" class="form-control" name="id"/>
                                <input id="edit-firstname" type="text" class="form-control" name="firstname" value="<?php echo e(old('firstname')); ?>" required placeholder="First Name">

                                <?php if($errors->has('firstname')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('firstname')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <input id="edit-lastname" type="text" class="form-control" name="lastname" value="<?php echo e(old('lastname')); ?>" required placeholder="Last Name">

                                <?php if($errors->has('lastname')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('lastname')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <br><br>
                            <div class="col-md-6">
                                <input id="edit-username" type="text" class="form-control" name="username" value="<?php echo e(old('username')); ?>" required autofocus placeholder="User Name">

                                <?php if($errors->has('username')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('username')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="col-md-6">
                                <input id="edit-email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required placeholder="E-Mail Address">

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <br><br>
                            <div class="col-md-6">
                                <select class="form-control" id="edit-role" name="role" value="<?php echo e(old('role')); ?>"
                                 required>
                                 <option value="">Select user role</option>
                                  <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                <?php if($errors->has('role')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('role')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>

                            
                             <div class="col-md-6">
                                <select class="form-control" id="edit-department" name="department" value="<?php echo e(old('department')); ?>"
                                 required>
                                 <option value="">Select department</option>
                                  <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <option value="<?php echo e($department->id); ?>"><?php echo e($department->name); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                <?php if($errors->has('department')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('department')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>

                             <br><br>
                            <div class="col-md-6">
                              <input id="edit-phone-no" type="text" class="form-control" name="phone_number" 
                              value="<?php echo e(old('phone_number')); ?>" required placeholder="Phone Number">
                                <?php if($errors->has('phone_number')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('phone_number')); ?></strong>
                                    </span>
                                <?php endif; ?>
                           </div>

                            <div class="col-md-6">
                              <input id="edit-address" type="text" class="form-control" name="address" 
                              value="<?php echo e(old('address')); ?>" required placeholder="Address">
                                <?php if($errors->has('address')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('address')); ?></strong>
                                    </span>
                                <?php endif; ?>
                           </div>
                            <br>

                        </div>
        <div class="modal-footer">
          <button type="sumbit" class="btn btn-primary">Update Staff</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
    </form>
      </div>
    </div>
  </div><?php /**PATH C:\laragon\www\office-all-in-one\resources\views/employees-mgmt/edit.blade.php ENDPATH**/ ?>