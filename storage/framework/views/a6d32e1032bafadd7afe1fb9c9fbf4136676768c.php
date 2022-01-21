<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">
        Profile Information
      </h1>
      <ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
        <li class="active">Profile</li>
      </ol>
    </section>


    <section class="content">
        <div class="box">
            <?php echo $__env->make('components.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <div class="box-header">
  
        <div></div>


            <div class="row">
            <div class="col-md-4">
                <span><i class="fa fa-user text-primary"></i> 
                    Profile Information</span>
            </div>
            <div class="col-md-4">
                <?php if(isset($image)): ?>
                <img class="mx-auto d-block" style="border-radius: 40px; padding: 15px; vertical-align: middle; position: relative; margin:-15px"
                src="<?php echo e($image); ?>" width="80" height="80" />
                <?php endif; ?>

                <?php if(empty($image)): ?>
                <img class="mx-auto d-block" style="border-radius: 50%; border: solid grey 1px; padding: 5px; vertical-align: middle; position: relative; margin:-15px"
                src="<?php echo e(asset('images/default/user.png')); ?>" width="60" height="60" />
                <?php endif; ?>
            </div>
            <div class="col-md-4">
                <span class="float-right btn_refrs">
                    <a class="btn btn-info"  href="<?php echo e(route('profile.edit')); ?>" >Edit profile</a>
                </span>
            </div>
           </div>

           <div class="row mt-2">
            <div class="col-md-12">
            <table class="table">
                <tr>
                 <td>First Name</td>
                 <td><?php echo e($first_name); ?></td>
             </tr>

             <tr>
                <td>Last Name</td>
                <td><?php echo e($last_name); ?></td>
            </tr>

            <tr>
                <td>Username</td>
                <td><?php echo e($username); ?></td>
            </tr>


            <tr>
                <td>Email Address</td>
                <td><?php echo e($email); ?></td>
            </tr>

            <tr>
                <td>Gender</td>
                <td><?php echo e($gender); ?></td>
            </tr>

            <tr>
                <td>Mobile No.</td>
                <td><?php echo e($mobile_no); ?></td>
            </tr>


            <tr>
                <td>Role</td>
                <td><?php echo e($user_role); ?></td>
            </tr>

            <tr>
                <td>Address</td>
                <td><?php echo e($address); ?></td>
            </tr>

            <?php if(isset($updated_at)): ?>
            <?php if($updated_at): ?>
            <tr>
                <td>Account last update</td>
                <td><?php echo e($updated_at); ?></td>
            </tr>

            <?php endif; ?>
            <?php endif; ?>

            <tr>
                <td>Date of Account creation</td>
                <td><?php echo e($created_at); ?></td>
            </tr>
        </table>
            </div>

</div>
</div>
  </div>
    </section>
</div>


<?php /**PATH C:\laragon\www\psd\resources\views/livewire/profile/index.blade.php ENDPATH**/ ?>