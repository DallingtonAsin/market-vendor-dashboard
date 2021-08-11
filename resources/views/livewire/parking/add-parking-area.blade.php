<div class="wrapper">
    <div class="main-panel">
        <div class="content">

            <div class="white_box">
                
                 @include('components.message')

                <div class="page_head">Add parking area</div>
                <div class="col-lg-12">
                    <form wire:submit.prevent="store" method="POST">
                       <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Client's Name</label></div>
                        <div class="col-12 col-md-9">
                            <select wire:model="client_name" wire:click="changeParkingAreaEvent($event.target.value)" class="form-control" id="client_name">
                            <option value="">Select client</option>
                            @foreach($clients as $client)
                            <option value="{{$client->id}}">{{$client->name}}</option>
                            @endforeach
                        </select>
                        @error('client_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Parking Area</label></div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="parking_area" wire:model="parking_area" class="form-control" placeholder="Parking area">
                        @error('parking_area') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Address</label></div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="address" wire:model="address" class="form-control bg-white" readonly="readonly" placeholder="Address">
                        @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Total space</label></div>
                    <div class="col-12 col-md-9">
                        <input type="number" id="total_space" wire:model="total_space" class="form-control" placeholder="Total no. of cars that can be accomodated">
                        @error('total_space') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <p style="text-align: center;"> <button type="submit" class="btn btn-primary btn-md" name="submit" wire:model="submit" >Add</button></p>
            </form>
        </div>

    </div>

</div>




</div>


</div>

