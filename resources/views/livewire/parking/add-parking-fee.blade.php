<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-weight:bolder; text-transform:uppercase; 
	  font-family: 'Times New Roman', Times, serif">
        Add Parking Fee
      </h1>
      <ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
        <li class="active">Parking Fees</li>
      </ol>
    </section>

    <section class="content">
        <div class="box">
            @include('components.message')
          <div class="box-header">
  
     
        <div class="col-lg-12">
            <form wire:submit.prevent="store" method="POST">

                <div class="row form-group">
               <div class="col col-md-3"><label for="text-input" class=" form-control-label">Client</label></div>
               <div class="col-12 col-md-9">
                  <select wire:model="client" wire:click="changeClientEvent($event.target.value)" class="form-control" id="client">
                   <option value="">Select client</option>
                   @foreach($clients as $client)
                   <option value="{{$client->id}}">{{$client->name}}</option>
                   @endforeach
               </select>
               @error('client') <span class="text-danger">{{ $message }}</span> @enderror
           </div>
         </div>


          <div class="row form-group">
               <div class="col col-md-3"><label for="text-input" class=" form-control-label">Parking area</label></div>
               <div class="col-12 col-md-9">
                  <select id="parking_area" class="form-control parking_area" wire:model="parking_area" >
                   <option value="">Select parking area</option>
                    @foreach($parking_areas as $area)
                    <option value="{{$area->id}}">{{$area->name}}</option>
                    @endforeach
               </select>
               @error('parking_area') <span class="text-danger">{{ $message }}</span> @enderror
           </div>
         </div>



            <div class="row form-group">
               <div class="col col-md-3"><label for="text-input" class=" form-control-label">Vehicle Category</label></div>
               <div class="col-12 col-md-9">
                  <select wire:model="vehicle_category" class="form-control" id="vehicle_category">
                   <option value="">Select vehicle category</option>
                   @foreach($vehicle_categories as $cat)
                   <option value="{{$cat->id}}">{{$cat->name}}</option>
                   @endforeach
                  </select>
               @error('vehicle_category') <span class="text-danger">{{ $message }}</span> @enderror
           </div>
         </div>

       <div class="row form-group">
           <div class="col col-md-3"><label for="text-input" class=" form-control-label">Fee</label></div>
           <div class="col-12 col-md-9">
               <input type="text" id="fee" name="fee" wire:model="fee" class="form-control" placeholder="Fees" autocomplete="off">
               @error('fee') <span class="text-danger">{{ $message }}</span> @enderror
           </div>
       </div>

       <p style="text-align: center;"> <button type="submit" class="btn btn-primary btn-md" name="submit" wire:model="submit">Add</button></p>
   </form>
</div>
</div>

  </div>
</div>

<script type="text/javascript">
    Numberize('#fee');
</script>



