 <div wire:ignore.self class="modal fade" id="editClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit client</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true close-btn">×</span>
                           </button>
                       </div>
                        <form wire:submit.prevent="update()" method="POST">
                       <div class="modal-body">
                            <div class="form-group">
                                <label for="client_name">Name</label>
                                <input type="hidden" class="form-control" id="client_id" wire:model="client_id">
                                <input type="text" class="form-control" id="client_name" placeholder="Enter Name" wire:model="client_name">
                                @error('client_name') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label for="mobile_number">Telephone No.</label>
                                <input type="text" class="form-control" id="mobile_number" wire:model="mobile_number" placeholder="Mobile number">
                                @error('mobile_number') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" wire:model="email" placeholder="Enter Email">
                                @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
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