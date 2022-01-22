  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel justify-content-center bg-white">
        <div class="pull-left image ">
          
          <?php if(isset(Auth::user()->image)): ?>
          <img src="<?php echo e(Storage::disk('public-api')->url(Auth::user()->image)); ?>"
          class="img-circle" alt="User Image">
          <?php endif; ?>
          
          <?php if(empty(Auth::user()->image)): ?>
          <img src="<?php echo e(asset("/bower_components/AdminLTE/dist/img/user1.png")); ?>"
          class="img-circle" alt="User Image">
          <?php endif; ?>
          
        </div>
        <div class="pull-left info">
          <p class="text-white"><small><?php echo e(ucfirst(Auth::user()->username)); ?></small></p>
          <!-- Status -->
          <small><a href="#"><i class="fa fa-circle text-success"></i> Online</a></small>
        </div>
      </div>
      
      
      
      <div class="menu-divider">
        <p class="menu-text">MENU</p>
        <span class="horizontal_dotted_line"></span>
      </div>
      
      
      
      <!-- search form (Optional) -->
      
      <!-- /.search form -->
      
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <!-- Optionally, you can add icons to the links -->
        <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-home fa-lg">
        </i> <span class="ml-2">Home</span></a></li>
   

     <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('isVendor')): ?>
       
  
        <li class="treeview">
          <a href="#"><i class="fa fa-tasks fa-lg"></i> <span class="ml-2"> Roles</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo e(route('roles.add')); ?>"><i class="fa fa-plus-circle"></i> Add role</a></li>
            <li><a href="<?php echo e(route('roles.index')); ?>"><i class="fa fa-list"></i> List of roles</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#"><i class="fa fa-users fa-lg"></i> <span class="ml-2"> Vendors</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo e(route('vendors.add')); ?>"><i class="fa fa-plus-circle"></i> Add vendor</a></li>
            <li><a href="<?php echo e(route('vendors-list.index')); ?>"><i class="fa fa-list"></i> List of vendors</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-users fa-lg"></i> <span class="ml-2"> Customers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo e(route('customers.index')); ?>"><i class="fa fa-list"></i> List of customers</a></li>
          </ul>
        </li>

        <?php endif; ?>


        
        <li class="treeview">
          <a href="#"><i class="fa fa-shopping-cart fa-lg"></i> <span class="ml-2"> Shopping</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo e(route('shopping.orders.index')); ?>"><i class="fa fa-list"></i> List of all orders</a></li>
            <li><a href="<?php echo e(route('shopping.orders.pending')); ?>"><i class="fa fa-clock-o"></i> Pending orders</a></li>
            <li><a href="<?php echo e(route('shopping.orders.processed')); ?>"><i class="fa fa-check-circle"></i> Processed orders</a></li>

          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-list fa-lg"></i> <span class="ml-2"> Goods</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo e(route('goods.index')); ?>"><i class="fa fa-list"></i> List of all goods</a></li>
          </ul>
        </li>

    
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('isVendor')): ?>
        <li class="treeview">
          <a href="#"><i class="fa fa-download fa-lg"></i> <span class="ml-2"> System audit</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="<?php echo e(route('logs.index')); ?>"><i class="fa fa-home"></i> Activity Logs</a></li>

          </ul>
        </li>

        
        <li class="treeview">
          <a href="#"><i class="fa fa-cog fa-lg"></i> <span class="ml-2"> Settings </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo e(route('company.add-edit')); ?>"><i class="fa fa-user"></i> Company</a></li>
            <li><a href="<?php echo e(route('password.edit')); ?>"><i class="fa fa-home"></i> Change Password</a></li>
    
          </ul>
        </li>

        <?php endif; ?>
      
      </ul>
    </section>
  </aside><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/mkv-ms/resources/views/layouts/sidebar.blade.php ENDPATH**/ ?>