<div class="wrapper">
	<div class="main-panel">
		<div class="content">

			<div class="white_box">

				 @include('components.message')

				<div class="page_head">Add vehicle category</div>
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
		</div>

