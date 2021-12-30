 <div wire:ignore.self class="modal fade" id="editParkingArea" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit parking area</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true close-btn">×</span>
                           </button>
                       </div>
                        <form wire:submit.prevent="update()" method="POST">
                       <div class="modal-body">
                            
                        <div class="row">
                        <div class="col-md-3">
                            <label for="name">Name</label>
                        </div>
                            <div class="col-md-9">
                                <input type="hidden" class="form-control" id="id" wire:model="id">
                                <input type="text" class="form-control" id="name" placeholder="Enter Name"
                                 wire:model="name">
                                @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <br/>


                        <div class="row">
                            <div class="col-md-3">
                                <label for="address">Address</label>
                            </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="address" placeholder="Enter Address"
                                     wire:model="address">
                                    @error('address') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                        </div>
                        <br/>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="description">Description</label>
                            </div>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="description" 
                                    placeholder="Enter description"
                                     wire:model="description"></textarea>
                                    @error('description') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                        </div>
                        <br/>

                        <div class="row">
                                <div class="col-md-6">
                                    <label for="opens_at">Opening Time</label>
                                    <input type="time" class="form-control" id="opens_at"
                                    placeholder="Enter opening time" wire:model="opens_at">
                                    @error('opens_at') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>

                          
                                    <div class="col-md-6">
                                       <label for="closes_at">Closing Time</label>
                                        <input type="time" class="form-control" id="closes_at" placeholder="Enter opening time"
                                         wire:model="closes_at">
                                        @error('closes_at') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                        </div>
                        <br/>

                        
                        <div class="row">
                            <div class="col-md-3">
                                <label for="latitude">Latitude</label>
                            </div>
                            <div class="col-md-9">
                                <input type="number" class="form-control" id="latitude" wire:model="latitude" placeholder="Latitude">
                                @error('latitude') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <br/>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="latitude">Longitude</label>
                            </div>
                            <div class="col-md-9">
                                <input type="number" class="form-control" id="longitude" wire:model="longitude" placeholder="Longitude">
                                @error('longitude') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <br/>


                        
                        <div class="row">
                            <div class="col-md-3">
                                <label for="slots">Slots</label>
                            </div>
                            <div class="col-md-9">
                                <input type="number" class="form-control" id="slots" wire:model="slots" placeholder="Slots">
                                @error('slots') <span class="text-danger error">{{ $message }}</span>@enderror
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
        </div>