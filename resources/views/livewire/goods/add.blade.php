<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">
        Add Market Good
      </h1>
      <ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
        <li class="active">Market Good Management</li>
      </ol>
    </section>


    <section class="content">
        <div class="box">
            @include('components.message')
          <div class="box-header">
  
     
        <div class="col-lg-12">
            <form wire:submit.prevent="store" method="POST"
            enctype="multipart/form-data">

            @can('isAdmin')
            <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Vendors</label></div>
                <div class="col-12 col-md-9">
                    <select id="vendor_id" wire:model="vendor_id" class="form-control">
                        <option value="">Select vendor</option>
                        @foreach($vendors as $vendor)
                        <option value="{{ $vendor->id }}">{{ $vendor->first_name }} {{ $vendor->last_name }} </option>
                        @endforeach
                    </select>
                    @error('vendor_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            @endcan


       @can('isVendor')
            <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Vendors</label></div>
                <div class="col-12 col-md-9">
                    <select id="vendor_id" wire:model="vendor_id" class="form-control">
                        @foreach($vendors as $vendor)
                        <option value="{{ $vendor->id }}" selected>{{ $vendor->first_name }} {{ $vendor->last_name }} </option>
                        @endforeach
                    </select>
                    @error('vendor_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            @endcan

             <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
                <div class="col-12 col-md-9"><input type="text" id="first_name" wire:model="name" class="form-control" placeholder="Name of the good e.g maize"/>
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror

                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Qty Available</label></div>
                <div class="col-12 col-md-9"><input type="number" id="qty_available" wire:model="qty_available" class="form-control" placeholder="Quantity available in stock" />
                    @error('qty_available') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            

            
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Unit price</label></div>
                <div class="col-12 col-md-9"><input type="number" id="unit_price" wire:model="unit_price" class="form-control" placeholder="Unit Price" />
                    @error('unit_price') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>


             <div class="row form-group">
               <div class="col col-md-3"><label for="photo" class=" form-control-label">Photo</label></div>
               <div class="col-12 col-md-7">
                   <div class="custom-file">
                       <input type="file" id="photo" wire:model="photo" class="form-control custom-file-input" />
                       @error('photo') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
               </div>
           </div>

           <div class="col-md-2">
            @if($photo)
            <img src="{{ $photo->temporaryUrl() }}" width="80" height="80">
            @endif
           </div>
         


   <div class="form-group">
    <button type="submit" class="btn btn-primary" wire:model="submit" >Submit</button>
</div>


</form>
</div>
</div>

  </div>
</div>

