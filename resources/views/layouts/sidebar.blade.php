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
          <p class="text-white"><small>{{ ucfirst(Auth::user()->username) }}</small></p>
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
   

     @cannot('isVendor')
       
  
        <li class="treeview">
          <a href="#"><i class="fa fa-tasks fa-lg"></i> <span class="ml-2"> Roles</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('roles.add') }}"><i class="fa fa-plus-circle"></i> Add role</a></li>
            <li><a href="{{ route('roles.index') }}"><i class="fa fa-list"></i> List of roles</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#"><i class="fa fa-users fa-lg"></i> <span class="ml-2"> Vendors</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('vendors.add') }}"><i class="fa fa-plus-circle"></i> Add vendor</a></li>
            <li><a href="{{ route('vendors-list.index') }}"><i class="fa fa-list"></i> List of vendors</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-users fa-lg"></i> <span class="ml-2"> Customers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('customers.index') }}"><i class="fa fa-list"></i> List of customers</a></li>
          </ul>
        </li>

        @endcannot


        
        <li class="treeview">
          <a href="#"><i class="fa fa-shopping-cart fa-lg"></i> <span class="ml-2"> Shopping</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('shopping.orders.index') }}"><i class="fa fa-list"></i> List of all orders</a></li>
            <li><a href="{{ route('shopping.orders.pending') }}"><i class="fa fa-clock-o"></i> Pending orders</a></li>
            <li><a href="{{ route('shopping.orders.processed') }}"><i class="fa fa-check-circle"></i> Processed orders</a></li>

          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-list fa-lg"></i> <span class="ml-2"> Goods</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('goods.index') }}"><i class="fa fa-list"></i> List of all goods</a></li>
          </ul>
        </li>

    
        @cannot('isVendor')
        <li class="treeview">
          <a href="#"><i class="fa fa-download fa-lg"></i> <span class="ml-2"> System audit</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="{{ route('logs.index') }}"><i class="fa fa-home"></i> Activity Logs</a></li>

          </ul>
        </li>

        
        <li class="treeview">
          <a href="#"><i class="fa fa-cog fa-lg"></i> <span class="ml-2"> Settings </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('company.add-edit') }}"><i class="fa fa-user"></i> Company</a></li>
            <li><a href="{{ route('password.edit') }}"><i class="fa fa-home"></i> Change Password</a></li>
    
          </ul>
        </li>

        @endcannot
      
      </ul>
    </section>
  </aside>