<div class="wrapper">
    <div class="main-panel">
        <div class="content">

            <div class="white_box">
                <div class="page_head">Add user</div>

                @include('components.message')

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
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Gender</label></div>
                        <div class="col-12 col-md-9">
                            <select wire:model="gender" class="form-control" id="gender">
                               <option value="">Select gender</option>
                               @foreach($genderOptions as $gender)
                               <option value="{{ $gender }}">{{ $gender }}</option>
                               @endforeach
                           </select>
                           @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
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

                <div class="row form-group">
                    <div class="col col-md-3"><label for="photo" class=" form-control-label">Photo</label></div>
                    <div class="col-12 col-md-7">
                        <div
                        x-data="{ isUploading: false, progress:0 }"
                        x-on:livewire-upload-start="isUploading = true"
                        x-on:livewire-upload-finish="isUploading = false"
                        x-on:livewire-upload-error="isUploading = false"
                        x-on:livewire-upload-progress="progress= $event.detail.progress"
                        >
                        <div class="custom-file">
                            <input type="file" id="photo" wire:model="photo" class="custom-file-input" />
                            <label class="custom-file-label" for="photo">Choose file</label>
                        </div>
                        <div x-show="isUploading">
                            <progress max="100" x-bind:value="progress"></progress>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                   @if($photo)
                   <img src="{{ $photo->temporaryUrl() }}" width="80" height="80">
                   @endif
               </div>
           </div>


           <div class="form-group">
            <button type="submit" class="btn btn-primary" wire:model="submit" >Submit</button>
        </div>

        
    </form>
</div>

</div>

</div>




</div>


</div>

