 <div class="modal fade" id="editParkingArea" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit parking area</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true close-btn">×</span>
                           </button>
                       </div>
                        <form id="parkingAreasForm">
                       <div class="modal-body">
                            
                        <div class="row">
                        <div class="col-md-3">
                            <label for="name">Name</label>
                        </div>
                            <div class="col-md-9">
                                <input type="hidden" class="form-control" id="id" name="id">
                                <input type="text" class="form-control" id="name" 
                                placeholder="Enter Name"
                                 name="name">
                            </div>
                        </div>
                        <br/>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="phone_number">Phone Number</label>
                            </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="phone_number" 
                                    placeholder="Enter phone number"
                                     name="phone_number">
                                </div>
                            </div>
                            <br/>


                        <div class="row">
                            <div class="col-md-3">
                                <label for="address">Address</label>
                            </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="address" placeholder="Enter Address"
                                     name="address">
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
                                     name="description"></textarea>
                                </div>
                        </div>
                        <br/>

                        <div class="row">
                                <div class="col-md-6">
                                    <label for="opens_at">Opening Time</label>
                                    <input type="time" class="form-control" id="opens_at"
                                    placeholder="Enter opening time" name="opens_at">
                                </div>

                          
                                    <div class="col-md-6">
                                       <label for="closes_at">Closing Time</label>
                                        <input type="time" class="form-control" id="closes_at" placeholder="Enter opening time"
                                         name="closes_at">
                                    </div>
                        </div>
                        <br/>

                        
                        <div class="row">
                            <div class="col-md-3">
                                <label for="latitude">Latitude</label>
                            </div>
                            <div class="col-md-9">
                                <input type="number" class="form-control" id="latitude" name="latitude" placeholder="Latitude">
                            </div>
                        </div>
                        <br/>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="latitude">Longitude</label>
                            </div>
                            <div class="col-md-9">
                                <input type="number" class="form-control" id="longitude" name="longitude" placeholder="Longitude">
                            </div>
                        </div>
                        <br/>


                        
                        <div class="row">
                            <div class="col-md-3">
                                <label for="slots">Slots</label>
                            </div>
                            <div class="col-md-9">
                                <input type="number" class="form-control" id="slots" name="slots" placeholder="Slots">
                            </div>
                        </div>
                        <br/>


                       </div>

                    <div class="modal-footer">
                         <button type="submit" class="btn btn-primary close-modal" id="update-btn">Update</button>
                         <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                    </div>
                      </form>
                </div>
            </div>
        </div>