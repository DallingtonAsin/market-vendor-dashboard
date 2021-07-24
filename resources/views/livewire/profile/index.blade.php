<div class="wrapper">
    <div class="main-panel">
        <div class="content">

            <div class="white_box">
             <div class="page_head float-left">
                <span><i class="fa fa-user text-primary"></i> 
                Profile Information</span>
                <span class="float-right btn_refrs">
                    <a class="btn btn-info"  href="{{ route('profile.edit') }}" >Edit profile</a>
                </span>
                <img class="mx-auto d-block" style="border-radius: 50%; border: solid grey 1px; padding: 5px; vertical-align: middle; position: relative; margin:-15px"
                src="{{ Helper::GetProfilePic(Auth::user()->photo_path, Auth::user()->photo_name) }}" width="60" height="60" />
            </div>

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

            <tr>
                <td>NIN</td>
                <td>{{ $nin }}</td>
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

