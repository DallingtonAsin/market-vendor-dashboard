<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-weight:bolder; text-transform:uppercase; 
	  font-family: 'Times New Roman', Times, serif">
        Add Parking Area
      </h1>
      <ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
        <li class="active">Parking Areas</li>
      </ol>
    </section>

    <section class="content">
        <div class="box">
            @include('components.message')
          <div class="box-header">
  
     
        <div class="col-lg-12">
            <form wire:submit.prevent="store" method="POST">
                <div class="row form-group">
                 <div class="col col-md-3"><label for="text-input" class=" form-control-label">Client's Name</label></div>
                 <div class="col-12 col-md-9">
                     <select wire:model="client_id" wire:click="changeParkingAreaEvent($event.target.value)" class="form-control" id="client_name">
                     <option value="">Select client</option>
                     @foreach($clients as $client)
                     <option value="{{$client->id}}">{{$client->name}}</option>
                     @endforeach
                 </select>
                 @error('client_id') <span class="text-danger">{{ $message }}</span> @enderror
             </div>
         </div>

         <div class="row form-group">
             <div class="col col-md-3"><label for="text-input" class=" form-control-label">Parking Area</label></div>
             <div class="col-12 col-md-9">
                 <input type="text" id="parking_area" wire:model="name" class="form-control" placeholder="Parking area">
                 @error('name') <span class="text-danger">{{ $message }}</span> @enderror
             </div>
         </div>

         <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Phone Number</label></div>
            <div class="col-12 col-md-9">
                <input type="text" id="phone_number" wire:model="phone_number" class="form-control" placeholder="Phone Number">
                @error('phone_number') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

         <div class="row form-group">
             <div class="col col-md-3"><label for="text-input" class=" form-control-label">Address</label></div>
             <div class="col-12 col-md-9">
                 <input type="text" id="address" wire:model="address" class="form-control bg-white" placeholder="Address">
                 @error('address') <span class="text-danger">{{ $message }}</span> @enderror
             </div>
         </div>

         <div class="row form-group">
             <div class="col col-md-3"><label for="text-input" class=" form-control-label">Description</label></div>
             <div class="col-12 col-md-9"> 
                 <textarea wire:model="description" placeholder="Enter description about parking area"
                  class="form-control bg-white"></textarea>
                 @error('description') <span class="text-danger">{{ $description }}</span> @enderror
             </div>
         </div>

         <div class="row form-group">
             <div class="col col-md-3"><label for="text-input" class=" form-control-label">Opens At</label></div>
             <div class="col-12 col-md-9">
                 <input type="time" id="opens_at" wire:model="opens_at" 
                 class="form-control" placeholder="Opening time">
                 @error('opens_at') <span class="text-danger">{{ $message }}</span> @enderror
             </div>
         </div>

         
         <div class="row form-group">
             <div class="col col-md-3"><label for="text-input" class=" form-control-label">Closes At</label></div>
             <div class="col-12 col-md-9">
                 <input type="time" id="closes_at" wire:model="closes_at" 
                 class="form-control" placeholder="Closing time">
                 @error('closes_at') <span class="text-danger">{{ $message }}</span> @enderror
             </div>
         </div>

         <div class="row form-group">
             <div class="col col-md-3"><label for="text-input" class=" form-control-label">Latitude</label></div>
             <div class="col-12 col-md-9">
                 <input type="number" step="any" id="latitude" wire:model="latitude" 
                 class="form-control" placeholder="Latitude">
                 @error('latitude') <span class="text-danger">{{ $message }}</span> @enderror
             </div>
         </div>

         <div class="row form-group">
             <div class="col col-md-3"><label for="text-input" class=" form-control-label">Longitude</label></div>
             <div class="col-12 col-md-9">
                 <input type="number" step="any" id="latitude" wire:model="longitude" 
                 class="form-control" placeholder="Longitude">
                 @error('longitude') <span class="text-danger">{{ $message }}</span> @enderror
             </div>
         </div>


         <div class="row form-group">
             <div class="col col-md-3"><label for="text-input" class=" form-control-label">Total space</label></div>
             <div class="col-12 col-md-9">
                 <input type="number" id="total_space" wire:model="total_space" 
                 class="form-control" placeholder="Total no. of cars that can be accomodated">
                 @error('total_space') <span class="text-danger">{{ $message }}</span> @enderror
             </div>
         </div>

         <div class="row form-group">
            <div class="col col-md-3"><label for="photo" class=" form-control-label">Photo</label></div>
            <div class="col-12 col-md-7">
                <div class="custom-file">
                    <input type="file" id="photo" wire:model="photo" class="custom-file-input" />
                    @error('photo') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
        </div>

        <div class="col-md-2">
           @if($photo)
           <img src="{{ $photo->temporaryUrl() }}" width="80" height="80">
           @endif
       </div>
       </div>

         <p style="text-align: center;"> <button type="submit" class="btn btn-primary btn-md" name="submit" wire:model="submit" >Add</button></p>
     </form>
</div>
</div>

  </div>
</div>


