<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">
        Company Settings
      </h1>
      <ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
        <li class="active">Company</li>
      </ol>
    </section>


    <section class="content">
        <div class="box">
            @include('components.message')
          <div class="box-header">
  
        <div>  
            @if(!empty($company->name))
            Edit company
         @else
            Add company
         @endif
        </div>

        
        <div class="col-lg-12">
            <form wire:submit.prevent="store" method="POST">
                <div class="row form-group">
                 <div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
                 <div class="col-12 col-md-9">
                     <input type="hidden" id="company_id" wire:model="company_id" class="form-control"/>
                     <input type="text" id="name" wire:model="name" class="form-control" placeholder="Company Name"/>
                     @error('name') <span class="text-danger">{{ $message }}</span> @enderror

                 </div>
             </div>

             <div class="row form-group">
                 <div class="col col-md-3"><label for="text-input" class=" form-control-label">Abbreviation</label></div>
                 <div class="col-12 col-md-9"><input type="text" id="abbreviation" wire:model="abbreviation" class="form-control" placeholder="Company short form name" />
                     @error('abbreviation') <span class="text-danger">{{ $message }}</span> @enderror
                 </div>
             </div>

              <div class="row form-group">
             <div class="col col-md-3"><label for="text-input" class=" form-control-label">Telephone No.</label></div>
             <div class="col-12 col-md-9"><input type="text" id="mobile_no" wire:model="mobile_no" class="form-control" placeholder="Mobile Number"/>
                 @error('mobile_no') <span class="text-danger">{{ $message }}</span> @enderror
             </div>
         </div>
             
             <div class="row form-group">
                 <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
                 <div class="col-12 col-md-9"><input type="email" id="email" wire:model="email" class="form-control" placeholder="Email Address" />
                     @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                 </div>
             </div>
             
            <div class="row form-group">
                 <div class="col col-md-3"><label for="address" class=" form-control-label">Address</label></div>
                 <div class="col-12 col-md-9"><input type="text" id="address" wire:model="address" class="form-control" placeholder="Address" />
                     @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                 </div>
             </div>

         <div class="row form-group">
             <div class="col col-md-3"><label for="text-input" class=" form-control-label">Motto</label></div>
             <div class="col-12 col-md-9"><input type="text" id="motto" wire:model="motto" class="form-control" placeholder="motto"/>
                 @error('motto') <span class="text-danger">{{ $message }}</span> @enderror
             </div>
         </div>

         <div class="row form-group">
             <div class="col col-md-3"><label for="text-input" class=" form-control-label">Logo</label></div>
             <div class="col-12 col-md-9">
                 <div class="custom-file">
                     <input type="file" id="logo" wire:model="logo" class="custom-file-input" />
                     @error('logo') <span class="text-danger">{{ $message }}</span> @enderror
                 </div>
             </div>
         </div>
         <p> <button type="submit" class="btn btn-primary" wire:model="submit" >Submit</button></p>
     </form>
</div>
</div>

  </div>
</div>


