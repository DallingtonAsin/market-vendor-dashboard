  <!-- Main Header -->
  <header class="main-header bg-white">

    <!-- Logo -->
    <span class="logo text-decoration-none">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>E</b>M<b>S</span>
      <!-- logo for regular state and mobile devices -->
            <label class="co_name">
            <?php if(isset($companyData)): ?> <?php echo e($companyData['name']); ?> <?php else: ?> <?php echo e(env('APP_NAME')); ?><?php endif; ?>

              </label> 
      </span>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="buton">
        <span class="sr-only">Toggle navigation</span>
        
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">


              <!-- The user image in the navbar-->
              
               <?php if(isset(Auth::user()->image)): ?>
                <img src="<?php echo e(Storage::disk('public-api')->url(Auth::user()->image)); ?>"
                 class="user-image" alt="User Image">
                <?php endif; ?>

                 <?php if(empty(Auth::user()->image)): ?>
               <img src="<?php echo e(asset("/bower_components/AdminLTE/dist/img/user1.png")); ?>"
                class="user-image" alt="User Image">
                <?php endif; ?>


              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo e(ucfirst(Auth::user()->username)); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <?php if(isset(Auth::user()->image)): ?>
                <img src="<?php echo e(Storage::disk('public-api')->url(Auth::user()->image)); ?>"
                 class="img-circle" alt="User Image">
                <?php endif; ?>

                 <?php if(empty(Auth::user()->image)): ?>
               <img src="<?php echo e(asset("/bower_components/AdminLTE/dist/img/user1.png")); ?>"
                class="img-circle" alt="User Image">
                <?php endif; ?>

                <p>
                <?php echo e(Auth::user()->first_name); ?> <?php echo e(Auth::user()->last_name); ?><br/>
                <small><?php echo e(Auth::user()->phone_number); ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
               <?php if(Auth::guest()): ?>
                  <div class="pull-left">
                    <a href="<?php echo e(route('login')); ?>" class="btn btn-default btn-flat">Login</a>
                  </div>
               <?php else: ?>
                 <div class="pull-left">
                    <a href="<?php echo e(url('profile')); ?>" class="btn btn-default btn-flat">Profile</a>
                  </div>
                 <div class="pull-right">
                    <a class="btn btn-default btn-flat" href="<?php echo e(route('signout')); ?>">
                    Logout
                    </a>
                 </div>
                <?php endif; ?>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
   <?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/mkv-ms/resources/views/layouts/header.blade.php ENDPATH**/ ?>