 <div wire:ignore.self class="modal fade" id="deleteVehicleType" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete vehicle type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true close-btn">×</span>
             </button>
         </div>
         <form wire:submit.prevent="delete()" method="POST">
             <div class="modal-body">
                <div class="form-group">
                    <label class="text-danger">Are you sure you want to delete vehicle type 
                        <span class="text-black"></span>?</label>
                        <input type="hidden" class="form-control" id="id" wire:model="vehicle_type_id">
                    </div>
                    <div class="modal-footer">
                       <button type="submit" class="btn btn-primary close-modal">Delete</button>
                       <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                   </div>
               </form>
           </div>
       </div>
   </div>