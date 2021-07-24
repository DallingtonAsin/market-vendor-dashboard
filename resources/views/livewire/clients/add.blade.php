<div class="wrapper">
    <div class="main-panel">
        <div class="content">
            <div class="white_box">
              <!-- <button type="button" onclick="Livewire.emit('openModal', 'modals.clients.delete')" class="btn btn-primary btn-md" name="modalBtn" >Open Modal</button> -->

              @include('components.message')

              <div class="page_head">Add clients</div>
              <div class="col-lg-12">
                <form wire:submit.prevent="store" method="POST">
                   <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="client_name" name="client_name" wire:model="client_name" class="form-control" placeholder="Client Name" >
                        @error('client_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Telephone No.</label></div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="mobile_number" name="mobile_number" wire:model="mobile_number" class="form-control" placeholder="Mobile Number" >
                        @error('mobile_number') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
                    <div class="col-12 col-md-9">
                        <input type="email" id="email" name="email" wire:model="email" class="form-control" placeholder="Email Address" >
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <p style="text-align: center;"> <button type="submit" class="btn btn-primary btn-md" name="submit" >Add</button></p>
            </form>
        </div>
    </div>
</div>
</div>
</div>

