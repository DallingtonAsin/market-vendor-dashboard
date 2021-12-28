  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel justify-content-center bg-white">
        <div class="pull-left image ">
          
          @isset(Auth::user()->image)
          <img src="{{ Storage::disk('public-api')->url(Auth::user()->image) }}"
          class="img-circle" alt="User Image">
          @endisset
          
          @empty(Auth::user()->image)
          <img src="{{ asset("/bower_components/AdminLTE/dist/img/user1.png") }}"
          class="img-circle" alt="User Image">
          @endempty
          
        </div>
        <div class="pull-left info">
          <p class="text-white"><small>{{ Auth::user()->username}}</small></p>
          <!-- Status -->
          <small><a href="#"><i class="fa fa-circle text-success"></i> Online</a></small>
        </div>
      </div>
      
      
      {{-- <div>
        <span>MENU</span><br/>
        <hr class="divider"/>
      </div> --}}
      <div class="menu-divider">
        <p class="menu-text">MENU</p>
        <span class="horizontal_dotted_line"></span>
      </div>
      
      {{-- <div class="horizontal_dotted_line">Lorem</div> --}}
      
      <!-- search form (Optional) -->
      {{-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </form> --}}
      <!-- /.search form -->
      
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <!-- Optionally, you can add icons to the links -->
        <li><a href="{{ route('home') }}"><i class="fa fa-home fa-lg">
        </i> <span class="ml-2">Home</span></a></li>
        
        {{-- @cannot('isStaff')
        <li class="treeview">
          <a href="#"><i class="fa fa-tasks fa-lg active"></i> <span> Roles</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('roles.index') }}">Roles</a></li>
          </ul>
        </li>
        @endcannot --}}
        
        <li class="treeview">
          <a href="#"><i class="fa fa-users fa-lg"></i> <span class="ml-2"> Roles</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('roles.add') }}"><i class="fa fa-plus-circle"></i> Create</a></li>
            <li><a href="{{ route('roles.index') }}"><i class="fa fa-calendar"></i> List of roles</a></li>
          </ul>
        </li>
        
        
        
        
        <li class="treeview">
          <a href="#"><i class="fa fa-users fa-lg"></i> <span class="ml-2"> Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('users.add') }}"><i class="fa fa-list"></i> Create</a></li>
            <li><a href="{{ route('users.index') }}"><i class="fa fa-clock-o"></i> List of users</a></li>
          </ul>
        </li>



        
        <li class="treeview">
          <a href="#"><i class="fa fa-user fa-lg"></i> <span class="ml-2"> Clients</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('clients.add') }}"><i class="fa fa-list"></i> Create</a></li>
            <li><a href="{{ route('clients.index') }}"><i class="fa fa-list"></i> List of clients</a></li>

          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-bus fa-lg"></i> <span class="ml-2"> Vehicle types</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('vehicle.category.add') }}"><i class="fa fa-list"></i> Add category</a></li>
            <li><a href="{{ route('vehicle.category.index') }}"><i class="fa fa-list"></i> List of vehicle types</a></li>

          </ul>
        </li>


        <li class="treeview">
          <a href="#"><i class="fa fa-map-marker fa-lg"></i> <span class="ml-2"> Parking Areas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('parking.area.create') }}"><i class="fa fa-list"></i> Add parking</a></li>
            <li><a href="{{ route('parking.areas.index') }}"><i class="fa fa-list"></i> Manage parking</a></li>

          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-dollar fa-lg"></i> <span class="ml-2"> Parking Fees</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('parking.fees.create') }}"><i class="fa fa-list"></i> Add fee</a></li>
            <li><a href="{{ route('parking.fees.index') }}"><i class="fa fa-list"></i> Manage fees</a></li>

          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-shopping-cart fa-lg"></i> <span class="ml-2"> Requests</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('requests.pending.index') }}"><i class="fa fa-list"></i>Pending</a></li>
            <li><a href="{{ route('requests.rejected.index') }}"><i class="fa fa-list"></i> Rejected</a></li>
            <li><a href="{{ route('requests.approved.index') }}"><i class="fa fa-list"></i> Approved</a></li>

          </ul>
        </li>
        
     
        
        @cannot('isStaff')
        <li class="treeview">
          <a href="#"><i class="fa fa-line-chart fa-lg"></i> <span> Reports </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
   
          <ul class="treeview-menu">
            <li class="treeview">
              <a href="#"><i class="fa fa-balance-scale"></i> <span> Requests </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('requests.charts') }}"><i class="fa fa-bar-chart"></i> Charts</a></li>
                <li><a href="{{ route('requests.monthly.review') }}"><i class="fa fa-table"></i> Monthly Stats</a></li>
              </ul>
            </li>
          </ul>
          
          <ul class="treeview-menu">
            <li class="treeview">
              <a href="#"><i class="fa fa-calendar"></i> <span> Income </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('incomes.charts') }}"><i class="fa fa-bar-chart"></i> Charts</a></li>
                <li><a href="{{ route('income.monthly.review') }}"><i class="fa fa-table"></i> Monthly Stats</a></li>
              </ul>
            </li>
          </ul>
          
          
          
          
          
        </li>
        @endcannot
        
        
        <li class="treeview">
          <a href="#"><i class="fa fa-cog fa-lg"></i> <span> Others </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('company.add-edit') }}"><i class="fa fa-user"></i> Settings</a></li>
            <li><a href="{{ route('logs.index') }}"><i class="fa fa-home"></i> Activity Logs</a></li>
            
            <a href="{{ route('profile.index') }}"><i class="fa fa-user"></i> My Profile</a>
            <a href="{{ route('profile.edit') }}"><i class="fa fa-cog"></i> Account Settings</a>
            <a href="{{ route('password.edit') }}"> <i class="fa fa-expeditedssl"></i> Change Password</a>
            <a href="{{ route('signout') }}"><i class="fa fa-power-off"></i> Logout</a>
        
          </ul>
        </li>
      
      </ul>
    </section>
  </aside>