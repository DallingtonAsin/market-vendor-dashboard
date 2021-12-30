  <!-- Main Header -->
  <header class="main-header bg-white">

    <!-- Logo -->
    <span class="logo text-decoration-none">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>E</b>M<b>S</span>
      <!-- logo for regular state and mobile devices -->
            <label class="co_name">
            @if(isset($companyData)) {{ $companyData['name'] }} @else {{ env('APP_NAME') }}@endif

              </label> 
      </span>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="buton">
        <span class="sr-only">Toggle navigation</span>
        {{-- <i class="fa fa-bars"></i> --}}
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">


              <!-- The user image in the navbar-->
              
               @isset(Auth::user()->image)
                <img src="{{ Storage::disk('public-api')->url(Auth::user()->image) }}"
                 class="user-image" alt="User Image">
                @endisset

                 @empty(Auth::user()->image)
               <img src="{{ asset("/bower_components/AdminLTE/dist/img/user1.png") }}"
                class="user-image" alt="User Image">
                @endempty


              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{{ ucfirst(Auth::user()->username) }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                @isset(Auth::user()->image)
                <img src="{{ Storage::disk('public-api')->url(Auth::user()->image) }}"
                 class="img-circle" alt="User Image">
                @endisset

                 @empty(Auth::user()->image)
               <img src="{{ asset("/bower_components/AdminLTE/dist/img/user1.png") }}"
                class="img-circle" alt="User Image">
                @endempty

                <p>
                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}<br/>
                <small>{{ Auth::user()->phone_number }}</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
               @if (Auth::guest())
                  <div class="pull-left">
                    <a href="{{ route('login') }}" class="btn btn-default btn-flat">Login</a>
                  </div>
               @else
                 <div class="pull-left">
                    <a href="{{ url('profile') }}" class="btn btn-default btn-flat">Profile</a>
                  </div>
                 <div class="pull-right">
                    <a class="btn btn-default btn-flat" href="{{ route('signout') }}">
                    Logout
                    </a>
                 </div>
                @endif
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
   