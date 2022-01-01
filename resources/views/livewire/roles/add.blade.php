<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">
        User Roles
      </h1>
      <ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
        <li class="active">Roles</li>
      </ol>
    </section>


    <section class="content">
        <div class="box">
            @include('components.message')
          <div class="box-header">
  
        <div>Add role</div>

        
        <div class="col-lg-12">
            <form wire:submit.prevent="store" method="POST">
             <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
                <div class="col-12 col-md-9"><input type="text" id="name" wire:model="name" class="form-control" placeholder="Role Name"/>
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror

                </div>
            </div>
        <p> <button type="submit" class="btn btn-primary" wire:model="submit" >Submit</button></p>
    </form>
</div>
</div>

  </div>
</div>

