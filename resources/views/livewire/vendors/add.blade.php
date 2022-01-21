<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">
        Add Market Vendor
      </h1>
      <ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
        <li class="active">Market Vendor Management</li>
      </ol>
    </section>


    <section class="content">
        <div class="box">
            @include('components.message')
          <div class="box-header">
  
     
        <div class="col-lg-12">
            <form wire:submit.prevent="store" method="POST"
            enctype="multipart/form-data">
             <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">First Name</label></div>
                <div class="col-12 col-md-9"><input type="text" id="first_name" wire:model="first_name" class="form-control" placeholder="First Name"/>
                    @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror

                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Last Name</label></div>
                <div class="col-12 col-md-9"><input type="text" id="last_name" wire:model="last_name" class="form-control" placeholder="Last Name" />
                    @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            

            
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
                <div class="col-12 col-md-9"><input type="email" id="email" wire:model="email" class="form-control" placeholder="Email Address" />
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            
         
           <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Mobile No.</label></div>
            <div class="col-12 col-md-9"><input type="text" id="mobile_no" wire:model="mobile_no" class="form-control" placeholder="Mobile Number"/>
                @error('mobile') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="row form-group">
            <div class="col col-md-3"><label for="select" class=" form-control-label">Role</label></div>
            <div class="col-12 col-md-9">
                <select id="user_role" wire:model="user_role" class="form-control">
                    <option value="">Select role</option>
                    @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                @error('user_role') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Address</label></div>
            <div class="col-12 col-md-9"><input type="text" id="address" wire:model="address" class="form-control" placeholder="Address"/>
                @error('address') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- <div class="row form-group">
            <div class="col col-md-3"><label for="photo" class=" form-control-label">Photo</label></div>
            <div class="col-12 col-md-7">
                <div class="custom-file">
                    <input type="file" id="photo" wire:model="photo" class="custom-file-input" />
                </div>
        </div> -->

     
       </div>


   <div class="form-group">
    <button type="submit" class="btn btn-primary" wire:model="submit" >Submit</button>
</div>


</form>
</div>
</div>

  </div>
</div>

