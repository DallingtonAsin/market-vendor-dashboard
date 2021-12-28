<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-weight:bolder; text-transform:uppercase; 
	  font-family: 'Times New Roman', Times, serif">
        Add Vehicle Category
      </h1>
      <ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
        <li class="active">Vehicle Categories</li>
      </ol>
    </section>

    <section class="content">
        <div class="box">
            @include('components.message')
          <div class="box-header">
  
     
        <div class="col-lg-12">
			<form wire:submit.prevent="store" method="POST">
				<div class="row form-group">
					<div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
					<div class="col-12 col-md-9">
						<input type="text" id="name" name="name" wire:model="name" class="form-control" placeholder="Vehicle category"/>
						@error('name') <span class="text-danger">{{ $message }}</span> @enderror
					</div>
				</div>
				<p style="text-align: center;"> <button type="submit" class="btn btn-primary btn-md" name="submit" wire:model="submit" >Add</button></p>
			</form>
</div>
</div>

  </div>
</div>



