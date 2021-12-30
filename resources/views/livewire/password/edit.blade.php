
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">
        Change Password
      </h1>
      <ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
        <li class="active">Passwords</li>
      </ol>
    </section>


    <section class="content">
        <div class="box">
            @include('components.message')
          <div class="box-header">
  
        <div class="col-lg-12">
            <form wire:submit.prevent="update" method="POST">
                <div class="row form-group">
                 <div class="col col-md-3"><label for="text-input" class=" form-control-label">Current Password</label></div>
                 <div class="col-12 col-md-9"><input type="password" id="current_password" wire:model="current_password" class="form-control" placeholder="Current Password"/>
                     @error('current_password') <span class="text-danger">{{ $message }}</span> @enderror

                 </div>
             </div>

             <div class="row form-group">
                 <div class="col col-md-3"><label for="text-input" class=" form-control-label">New Password</label></div>
                 <div class="col-12 col-md-9"><input type="password" id="new_password" wire:model="new_password" class="form-control" placeholder="New Password" />
                     @error('new_password') <span class="text-danger">{{ $message }}</span> @enderror
                 </div>
             </div>
             
             <div class="row form-group">
                 <div class="col col-md-3"><label for="text-input" class=" form-control-label">Confirm password</label></div>
                 <div class="col-12 col-md-9"><input type="password" id="confirm_password" wire:model="confirm_password" class="form-control" placeholder="Confirm Password"/>
                     @error('confirm_password') <span class="text-danger">{{ $message }}</span> @enderror
                     @if(session()->get('password_error'))
                     <span class="text-danger">{{ session()->get('password_error') }}</span>
                     @endif
                 </div>
             </div>



             <p> <button type="submit" class="btn btn-primary" wire:model="submit" >Submit</button></p>
         </form>
</div>
</div>

  </div>
</div>

