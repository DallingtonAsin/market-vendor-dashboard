  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel justify-content-center bg-white">
        <div class="pull-left image ">
          
          <?php if(isset(Auth::user()->image)): ?>
          <img src="<?php echo e(Storage::disk('public')->url(Auth::user()->image)); ?>"
          class="img-circle" alt="User Image">
          <?php endif; ?>
          
          <?php if(empty(Auth::user()->image)): ?>
          <img src="<?php echo e(asset("/bower_components/AdminLTE/dist/img/user1.png")); ?>"
          class="img-circle" alt="User Image">
          <?php endif; ?>
          
        </div>
        <div class="pull-left info">
          <p class="text-white"><small><?php echo e(Auth::user()->username); ?></small></p>
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
        
        
        
        <li class="treeview">
          <a href="#"><i class="fa fa-users fa-lg"></i> <span class="ml-2"> Staff</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo e(route('staff.index')); ?>"><i class="fa fa-users"></i> Staff</a></li>
            <li><a href="<?php echo e(route('attendance.index')); ?>"><i class="fa fa-calendar"></i> Staff Attendance</a></li>
          </ul>
        </li>
        
        
        
        
        <li class="treeview">
          <a href="#"><i class="fa fa-list fa-lg"></i> <span class="ml-2"> Tasks</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo e(route('tasks.index')); ?>"><i class="fa fa-list"></i> All</a></li>
            <li><a href="<?php echo e(route('tasks.pending.index')); ?>"><i class="fa fa-clock-o"></i> Pending</a></li>
            <li><a href="<?php echo e(route('tasks.completed.index')); ?>"><i class="fa fa-hourglass"></i> Waiting approval</a></li>
            <li><a href="<?php echo e(route('tasks.approved.index')); ?>"><i class="fa fa-check-circle"></i> Completed & Approved</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#"><i class="fa fa-tasks fa-lg"></i> <span class="ml-2"> Projects</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo e(route('projects.index')); ?>"><i class="fa fa-list"></i> All</a></li>
          </ul>
        </li>
        
        
        
        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('isStaff')): ?>
        <li class="treeview">
          <a href="#"><i class="fa fa-university fa-lg"></i> <span class="ml-2"> Organisation </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo e(route('roles.index')); ?>">
              <i class="fa fa-tasks"></i>
              <span class="ml-2">Roles</span>
            </a></li>
            <li><a href="<?php echo e(route('user-management.index')); ?>">
              <i class="fa fa-user"></i>
              <span class="ml-2">Users</span>
            </a></li>
            <li><a href="<?php echo e(route('departments.index')); ?>"><i class="fa fa-building-o"></i>
              <span class="ml-2">Department</span>
            </a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-balance-scale"></i> <span class="ml-2">  Expenses</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo e(route('expense-categories.index')); ?>"><i class="fa fa-list-alt"></i> Category</a></li>
                <li><a href="<?php echo e(route('expenses.index')); ?>"><i class="fa fa-money"></i> Expenses</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <?php endif; ?>
        
        
        
        <li class="treeview">
          <a href="#"><i class="fa fa-desktop fa-lg"></i> <span class="ml-2"> My Drive</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo e(route('files.index')); ?>"> <i class="fa fa-home"></i> All files</a></li>
            <li><a href="<?php echo e(route('recent-files.index')); ?>"><i class="fa fa-history"></i> Recent</a></li>
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isAdmin')): ?>
            <li><a href="<?php echo e(route('important-files.index')); ?>"><i class="fa fa-star"></i> Important</a></li>
            <?php endif; ?>
            
            <li><a href="<?php echo e(route('deleted-files.index')); ?>"><i class="fa fa-trash"></i> Deleted Files</a></li>
            
          </ul>
        </li>
        
        
        
        
        
        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('isStaff')): ?>
        <li class="treeview">
          <a href="#"><i class="fa fa-line-chart fa-lg"></i> <span> Reports </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
          
          <ul class="treeview-menu">
            <li class="treeview">
              <a href="#"><i class="fa fa-balance-scale"></i> <span> Expenses </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo e(route('expenses.charts')); ?>"><i class="fa fa-bar-chart"></i> Charts</a></li>
                <li><a href="<?php echo e(route('expenses.review.index')); ?>"><i class="fa fa-table"></i> Monthly Stats</a></li>
              </ul>
            </li>
          </ul>
          
          <ul class="treeview-menu">
            <li class="treeview">
              <a href="#"><i class="fa fa-calendar"></i> <span> Attendance </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo e(route('attendance.charts')); ?>"><i class="fa fa-bar-chart"></i> Charts</a></li>
                <li><a href="<?php echo e(route('attendances.review.index')); ?>"><i class="fa fa-table"></i> Monthly Stats</a></li>
              </ul>
            </li>
          </ul>
          
          
          
          
          
        </li>
        <?php endif; ?>
        
        
        <li class="treeview">
          <a href="#"><i class="fa fa-cog fa-lg"></i> <span> Settings </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
            <li><a href="<?php echo e(route('profile.edit')); ?>"><i class="fa fa-user"></i> Profile</a></li>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('isStaff')): ?>
            <li><a href="<?php echo e(route('organization.create')); ?>"><i class="fa fa-home"></i> Company</a></li>
            <?php endif; ?>
            
            
            
          </ul>
        </li>
        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('isStaff')): ?>
        <li class="treeview">
          <a href="#"><i class="fa fa-history fa-lg"></i> <span> System Audit</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo e(route('activity_logs.index')); ?>"><i class="fa fa-history"></i>Activity logs</a></li>
          </ul>
        </li>
        <?php endif; ?>
        
        
        
        
        
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside><?php /**PATH C:\laragon\www\office-all-in-one\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>