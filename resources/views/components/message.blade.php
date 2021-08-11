<div class="col-lg-12 text-center">
 @if(session()->get('success'))
 <div class='alert alert-success alert-dismissible' role='alert'>
   <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span></button>
      <strong>Yello!</strong> {{ session()->get('success') }} 
      <i class="fa fa-check-circle"></i>
   </div>
   @endif

   @if(session()->get('error'))
   <div class='alert alert-danger alert-dismissible' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
         <span aria-hidden='true'>&times;</span></button>
         <strong>Error!</strong> {{ session()->get('error') }}
         <i class="fa fa-times-circle"></i>
      </div>
      @endif
   </div>