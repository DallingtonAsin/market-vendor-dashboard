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
            @include('components.message')
          <div class="box-header">
  
        <div></div>


            <div class="row">
            <div class="col-md-4">
                <span><i class="fa fa-user text-primary"></i> 
                    Profile Information</span>
            </div>
            <div class="col-md-4">
                @isset($image)
                <img class="mx-auto d-block" style="border-radius: 50%; 
                border: solid grey 1px; padding: 15px; vertical-align: middle; position: relative; margin:-15px"
                src="{{ $image }}" width="50" height="90" />
                @endisset

                @empty($image)
                <img class="mx-auto d-block" style="border-radius: 50%; border: solid grey 1px; 
                padding: 15px; vertical-align: middle; position: relative; margin:-15px"
                src="{{ asset('images/default/user.png') }}" width="60" height="60" />
                @endempty
            </div>
            <div class="col-md-4">
                <span class="float-right btn_refrs">
                    <a class="btn btn-info"  href="{{ route('profile.edit') }}" >Edit profile</a>
                </span>
            </div>
           </div>

           <div class="row mt-2">
            <div class="col-md-12">
            <table class="table">
                <tr>
                 <td>First Name</td>
                 <td>{{ $first_name }}</td>
             </tr>

             <tr>
                <td>Last Name</td>
                <td>{{ $last_name }}</td>
            </tr>

            <tr>
                <td>Username</td>
                <td>{{ $username }}</td>
            </tr>


            <tr>
                <td>Email Address</td>
                <td>{{ $email }}</td>
            </tr>

            <tr>
                <td>Gender</td>
                <td>{{ $gender }}</td>
            </tr>

            <tr>
                <td>Mobile No.</td>
                <td>{{ $mobile_no }}</td>
            </tr>


            <tr>
                <td>Role</td>
                <td>{{ $user_role }}</td>
            </tr>

            <tr>
                <td>Address</td>
                <td>{{ $address }}</td>
            </tr>

            @isset($updated_at)
            @if($updated_at)
            <tr>
                <td>Account last update</td>
                <td>{{ $updated_at }}</td>
            </tr>

            @endif
            @endisset

            <tr>
                <td>Date of Account creation</td>
                <td>{{ $created_at }}</td>
            </tr>
        </table>
            </div>

</div>
</div>
  </div>
    </section>
</div>


