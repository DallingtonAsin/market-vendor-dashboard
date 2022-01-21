
  <!-- Modal -->
  <div class="modal fade" id="viewEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background:#605ca8;color:white">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color:#fff">&times;</span>
              </button>
          <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight:bolder; 
          text-transform:uppercase; font-family: 'Times New Roman', Times, serif">View staff details</h5>
        </div>
        <div class="modal-body">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="modal-title" id="exampleModalLongTitle" style="font-weight:bolder;
                     text-transform:uppercase; font-family: 'Times New Roman', Times, serif; color:red"> View staff details Portal</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('user-management.store')); ?>">
                        <?php echo e(csrf_field()); ?>


                            <div class="col-md-6">
                                <input id="view-firstname" type="text" class="form-control" 
                                name="firstname"  placeholder="First Name">
                            </div>
                            <div class="col-md-6">
                                <input id="view-lastname" type="text" class="form-control" 
                                name="lastname" placeholder="Last Name">
                            </div>
                            <br><br>
                            <div class="col-md-6">
                                <input id="view-username" type="text" class="form-control"
                                 name="username"  autofocus placeholder="User Name">
                            </div>

                            <div class="col-md-6">
                                <input id="view-email" type="email" class="form-control" name="email"
                                   placeholder="E-Mail Address">
                            </div>

                            <br><br>
                            <div class="col-md-6">
                                <select class="form-control" id="view-role" name="role"
                                 >
                                 <option value="">Select user role</option>
                                  <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <select class="form-control" id="view-department" name="department" value="<?php echo e(old('department')); ?>"
                                 disabled>
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
                              <input id="view-phone-no" type="text" class="form-control" name="phone_number" 
                              value="<?php echo e(old('phone_number')); ?>"  placeholder="Phone Number" disabled> 
                           </div>

                            <div class="col-md-6">
                              <input id="view-address" type="text" class="form-control" name="address" placeholder="Address">
                           </div>
                            <br>

                        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
    </form>
      </div>
    </div>
  </div><?php /**PATH C:\laragon\www\office-all-in-one\resources\views/employees-mgmt/view.blade.php ENDPATH**/ ?>