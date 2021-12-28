
  <!-- Modal -->
  <div class="modal fade" id="addStaffAttendance" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background:#605ca8;color:white">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color:#fff">&times;</span>
              </button>
          <h5 class="modal-title" id="exampleModalLongTitle" 
          style="font-weight:bolder; text-transform:uppercase; 
          font-family: 'Times New Roman', Times, serif">Staff Attendance</h5>
        </div>
        <div class="modal-body">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="modal-title" id="exampleModalLongTitle" 
                    style="font-weight:bolder; text-transform:uppercase; 
                    font-family: 'Times New Roman', Times, serif; color:red">
                     Staff Attendance Portal</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST"
                     action="<?php echo e(route('attendance.store')); ?>">
                        <?php echo e(csrf_field()); ?>

                            <div class="col-md-6">
                                <input id="id" type="hidden" class="form-control" name="id"
                                 value="<?php echo e(Auth::user()->id); ?>" readonly placeholder="Staff Id">
                                 <span>FirstName</span><br>
                                <input id="firstname" type="text" class="form-control" 
                                name="firstname" value="<?php echo e(Auth::user()->firstname); ?>"
                                 readonly placeholder="First Name" readonly>

                                <?php if($errors->has('firstname')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('firstname')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <span>LastName</span><br>
                                <input id="lastname" type="text" class="form-control"
                                 name="lastname" value="<?php echo e(Auth::user()->lastname); ?>" readonly placeholder="Last Name">

                                <?php if($errors->has('lastname')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('lastname')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <br><br>
                            <div class="col-md-6">
                                <span>UserName</span><br>
                                <input id="username" type="text" class="form-control" name="username" value="<?php echo e(Auth::user()->username); ?>" readonly autofocus placeholder="User Name">

                                <?php if($errors->has('username')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('username')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="col-md-6">
                                <span>Email</span><br>
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(Auth::user()->email); ?>" readonly placeholder="E-Mail Address">

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>


                            <br><br>
                            <div class="col-md-6">
                                <span>Phone Number</span><br>
                              <input id="phone_no" type="text" class="form-control" name="phone_number" 
                              value="<?php echo e(Auth::user()->phone_number); ?>" readonly placeholder="Phone Number">
                                <?php if($errors->has('phone_number')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('phone_number')); ?></strong>
                                    </span>
                                <?php endif; ?>
                           </div>

                           <div class="col-md-6">
                               <span>Attendance Date</span><br>
                              <input id="date" type="date" class="form-control" name="date" 
                              value="<?php echo e(date('Y-m-d')); ?>" placeholder="date">
                                <?php if($errors->has('date')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('date')); ?></strong>
                                    </span>
                                <?php endif; ?>
                           </div>

                            <br><br>
                            <div class="col-md-6">
                                <span>Time In</span><br>
                                <input id="time_in" type="time" class="form-control" 
                                name="time_in" value="<?php echo e(date('H:i A')); ?>"  placeholder="Time in">

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('time_in')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <span>Time out</span><br>
                                <input id="time_out" type="time" class="form-control"
                                 name="time_out" placeholder="Time out">
                                  <?php if($errors->has('time_out')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('time_out')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
        <div class="modal-footer">
          <button type="sumbit" class="btn btn-primary">Submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
    </form>
      </div>
    </div>
  </div><?php /**PATH C:\laragon\www\office-all-in-one\resources\views/employees-mgmt/attendance/create.blade.php ENDPATH**/ ?>