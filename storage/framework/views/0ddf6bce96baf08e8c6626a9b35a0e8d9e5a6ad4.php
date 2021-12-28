 <div wire:ignore.self class="modal fade" id="deleteRole" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true close-btn">×</span>
             </button>
         </div>
         <form wire:submit.prevent="delete(<?php echo e($role_id); ?>)" method="POST">
             <div class="modal-body">
                <div class="form-group">
                    <label class="text-danger">Are you sure you want to delete role 
                        <span class="text-black"><?php echo e($name); ?></span>?</label>
                        <input type="hidden" class="form-control" id="role_id" wire:model="role_id">
                    </div>
                    <div class="modal-footer">
                       <button type="submit" class="btn btn-primary close-modal">Delete</button>
                       <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                   </div>
               </form>
           </div>
       </div>
   </div><?php /**PATH C:\laragon\www\parkpro-dashboard\resources\views/livewire/modals/roles/delete.blade.php ENDPATH**/ ?>