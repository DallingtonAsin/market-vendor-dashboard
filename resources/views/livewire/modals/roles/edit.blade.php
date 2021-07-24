 <div wire:ignore.self class="modal fade" id="editRole" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit role</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true close-btn">×</span>
                           </button>
                       </div>
                        <form wire:submit.prevent="update()" method="POST">
                       <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="hidden" class="form-control" id="role_id" wire:model="role_id">
                                <input type="text" class="form-control" id="name" placeholder="Enter Name" wire:model="name">
                                @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>

                    </div>
                    <div class="modal-footer">
                         <button type="submit" class="btn btn-primary close-modal">Update</button>
                         <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                    </div>
                      </form>
                </div>
            </div>
        </div>