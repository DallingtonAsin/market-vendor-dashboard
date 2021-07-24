<div class="wrapper">
    <div class="main-panel">
        <div class="content">
            <div class="white_box">
                <div class="page_head">Change Password</div>

                @include('components.message')
                
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
</div>

