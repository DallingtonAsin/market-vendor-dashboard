<div class="wrapper">
    <div class="main-panel">
        <div class="content">

            <div class="white_box">
                <div class="page_head">Add role</div>

                @include('components.message')
                
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
</div>

