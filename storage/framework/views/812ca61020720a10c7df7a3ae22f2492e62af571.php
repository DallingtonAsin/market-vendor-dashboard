
  <!-- Modal -->
  <div class="modal fade" id="deleteEmployeeModal" tabindex="-1" role="dialog"
   aria-labelledby="editModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background:#605ca8;color:white">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color:#fff">&times;</span>
              </button>
          <h5 class="modal-title" id="editModalLongTitle"
           style="font-weight:bolder; text-transform:uppercase;
           font-family: 'Times New Roman', Times, serif">Delete staff</h5>
        </div>
        <div class="modal-body">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="modal-title" id="editModalLongTitle"
                     style="font-weight:bolder; text-transform:uppercase; 
                     font-family: 'Times New Roman', Times, serif; color:red"> Delete staff Portal</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST"
                     action="<?php echo e(route('user-management.destroy')); ?>">
                       <?php echo csrf_field(); ?>
                       <?php echo method_field('delete'); ?>

                            <div class="col-md-6">
                                <p id="del-title">Are you sure you want to delete this staff ?</p>
                                <input id="del-id" type="hidden" class="form-control" 
                                name="id"  required 
                                placeholder="user id">

                                <?php if($errors->has('id')): ?>
                                    <span class="help-block">
                                        <strong class="text-danger"><?php echo e($errors->first('id')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>

                        </div>
        <div class="modal-footer">
          <button type="sumbit" class="btn btn-primary">Yes</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        </div>
    </form>
      </div>
    </div>
  </div><?php /**PATH C:\laragon\www\office-all-in-one\resources\views/employees-mgmt/delete.blade.php ENDPATH**/ ?>