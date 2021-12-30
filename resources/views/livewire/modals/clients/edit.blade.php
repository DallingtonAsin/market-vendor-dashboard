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
                            
                        <div class="row">
                        <div class="col-md-3">
                            <label for="client_name">Name</label>
                        </div>
                            <div class="col-md-9">
                                <input type="hidden" class="form-control" id="client_id" wire:model="client_id">
                                <input type="text" class="form-control" id="client_name" placeholder="Enter Name" wire:model="client_name">
                                @error('client_name') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <br/>


                        <div class="row">
                            <div class="col-md-3">
                                <label for="mobile_number">Telephone No.</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="mobile_number" wire:model="mobile_number" placeholder="Mobile number">
                                @error('mobile_number') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <br/>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="address">Address</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="address" wire:model="address" placeholder="Address">
                                @error('address') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <br/>


                        <div class="row">
                            <div class="col-md-3">
                                <label for="email">Email</label>
                            </div>
                            <div class="col-md-9">
                                <input type="email" class="form-control" id="email" wire:model="email" placeholder="Enter Email">
                                @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
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