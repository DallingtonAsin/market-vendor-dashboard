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
   
        
     
        
        
        
        
        <li class="treeview">
          <a href="#"><i class="fa fa-users fa-lg"></i> <span class="ml-2"> Market vendors</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('vendors.add') }}"><i class="fa fa-plus-circle"></i> Create</a></li>
            <li><a href="{{ route('vendors-list.index') }}"><i class="fa fa-list"></i> List of vendors</a></li>
          </ul>
        </li>



        
        <li class="treeview">
          <a href="#"><i class="fa fa-shopping-cart fa-lg"></i> <span class="ml-2"> Shopping</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('shopping.lists.index') }}"><i class="fa fa-list"></i> Submited Lists</a></li>

          </ul>
        </li>

      
        <li class="treeview">
          <a href="#"><i class="fa fa-line-chart fa-lg"></i> <span class="ml-2">Reports </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
   
          <ul class="treeview-menu">
            <li class="treeview">
              <a href="#"><i class="fa fa-balance-scale"></i> <span> Shopping Requests </span>
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
              <a href="#"><i class="fa fa-calendar"></i> <span> Shopping Revenue </span>
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
        
        
        <li class="treeview">
          <a href="#"><i class="fa fa-cog fa-lg"></i> <span class="ml-2"> Others </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('company.add-edit') }}"><i class="fa fa-user"></i> Settings</a></li>
            <li><a href="{{ route('password.edit') }}"><i class="fa fa-home"></i> Change Password</a></li>
            <li><a href="{{ route('logs.index') }}"><i class="fa fa-home"></i> Activity Logs</a></li>
      
          </ul>
        </li>
      
      </ul>
    </section>
  </aside>