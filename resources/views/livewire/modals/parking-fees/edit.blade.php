 <div class="modal fade" id="editParkingFee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit parking fee</h5>
                            <button type="button" class="close" 
                            data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true close-btn">×</span>
                           </button>
                       </div>
                        <form id="parkingFeesForm">
                       <div class="modal-body">
                            
                        <div class="row">
                        <div class="col-md-3">
                            <label for="fee">Fee</label>
                        </div>
                            <div class="col-md-9">
                                <input type="hidden" class="form-control" id="id"
                                 name="id">
                                <input type="text" class="form-control" id="fee_per_hour"
                                 placeholder="Enter Fee per hour" name="fee_per_hour">
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