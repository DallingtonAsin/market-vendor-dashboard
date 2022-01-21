 <div class="modal fade" id="editvendor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit vendor details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true close-btn">×</span>
                           </button>
                       </div>
                        <form id="vendorsForm">
                       <div class="modal-body">
                            
                        <div class="row">
                        <div class="col-md-3">
                            <label for="first_name">First Name</label>
                        </div>
                            <div class="col-md-9">
                                <input type="hidden" class="form-control" name="id" id="id" required>
                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter FirstName">
                            </div>
                        </div>
                        <br/>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="last_name">Last Name</label>
                            </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control"  name="last_name" id="last_name" placeholder="Enter LastName" required>
                                </div>
                            </div>
                            <br/>


                        <div class="row">
                            <div class="col-md-3">
                                <label for="phone_number">Telephone No.</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control"  name="phone_number" id="phone_number" required placeholder="Mobile number">
                            </div>
                        </div>
                        <br/>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="email">Email Address</label>
                            </div>
                            <div class="col-md-9">
                                <input type="email" class="form-control"  name="email" id="email" required placeholder="Email address">
                            </div>
                        </div>
                        <br/>


                        <div class="row">
                            <div class="col-md-3">
                                <label for="address">Address</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control"  name="address" id="address" required placeholder="Enter address">
                            </div>
                       </div>
                       <br/>

                       <div class="row">
                        <div class="col-md-3">
                            <label for="gender">Gender</label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-control"  name="gender" id="gender" required>
                                <option value="">Select gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                   </div>
                   <br/>

                       </div>

                    <div class="modal-footer">
                         <button type="submit" wire:ignore class="btn btn-primary close-modal" id='update-btn'>Update</button>
                         <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                    </div>
                      </form>
                </div>
            </div>
        </div><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/mkv-ms/resources/views/livewire/modals/vendors/edit.blade.php ENDPATH**/ ?>