<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">
        User Mangement
      </h1>
      <ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
        <li class="active">User Mangement</li>
      </ol>
    </section>


<!-- Main content -->
<section class="content">
  <div class="box">
    <?php echo $__env->make('components.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="box-header">
      <div class="row">
        <div class="col-sm-4">
          <h3 class="box-title" style="font-weight:bolder; text-transform:uppercase; 
          font-family: 'Times New Roman', Times, serif">List of system users</h3>
            <span class="pl-0 mt-4 response"></span>
        </div>
        
     
      <div class="col-sm-4">
        <a type="button" href=<?php echo e(route('users.add')); ?> class="btn btn-info pull-right">
        <i class="fa fa-plus-circle"></i> Add User
      </a>
    </div>
  </div>

</div>

<div class="box-body">

<br/>

<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
  <div class="row">
    <div class="col-sm-12">
      <div class="table-responsive">
        <table class="table" id="users-table">
            <thead>
               <tr>
                  <th></th>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Mobile No</th>
                  <th>Address</th>
                  <th>A/C status</th>
                  <th>Manage</th>
                  <th>Action</th>
              </tr>
          </thead>
      </table>
      <?php echo $__env->make('livewire.modals.users.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
    </div>
  </div>
</div>
</div>
</div>
  </div>

  <script src="<?php echo e(asset('vendors/notify/notify.js')); ?>"></script>
  <script>
    window.addEventListener('closeModal', event=>{
      $('#editUser').modal('hide');
      $('#deleteUser').modal('hide');
    });

  </script>


  <script>
    var $=jQuery.noConflict();

    const ajaxUrl =   <?php echo json_encode(route('users.ajax.fetch'), 15, 512) ?>;
    const cat = 'users';
    const token = "<?php echo e(csrf_token()); ?>";

    jQuery(document).ready(function($){

        $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      // populating users table
        var table = $('#users-table');
        var title = "List of users";
        var columns = [1,2,3,4,5];
        var dataColumns = [
        {data: 'checkbox', name:'checkbox'},
        {data: 'name', name:'name'},
        {data: 'username', name:'username'},
        {data: 'phone_number', name:'phone_number'},
        {data: 'address', name:'address'},
        {data: 'is_active', name:'is_active'},
        {data: 'account_action', name:'account_action'},
        {data: 'action', name:'action'},
        ];
        makeDataTable(table, title, columns, dataColumns);

      // method to populate user information on editing
     $('body').on('click', '#edit-user', function (event) {
        var id = $(this).data('id');
        event.preventDefault();
        var Url = "<?php echo e(route('user.show', ':id')); ?>";
        Url = Url.replace(':id', id);
        $.ajax({

          url: Url,
          type: "GET",
          dataType: 'json',
          success: function (data) {

            console.log("User data", data);
            $('#id').val(data.id);
            $('#first_name').val(data.first_name);
            $('#last_name').val(data.last_name);
            $('#phone_number').val(data.phone_number);
            $('#email').val(data.email);
            $('#address').val(data.address);
            $('#gender').val(data.gender);
            $('#editUser').modal('show');
          },
          error: function (data) {
            console.log('Error:', data.error);
          }
        });

      });

      // method to update user information
      $('body').on('click', '#update-btn', function (event) {
        event.preventDefault();
        let id =  $('#id').val();
        let updateUrl =  '<?php echo e(route("user.update")); ?>';
        $('#update-btn').html('Updating...');
        $.ajax({
          data: $('#usersForm').serialize(),
          url: updateUrl ,
          type: "PUT",
          dataType: 'json',
          success: function (data) {
            $('#usersForm').trigger("reset");
            $('#editUser').modal("hide");
            var resp = data.message;
            ShowResponse('.response', resp, 'success');
            ResetInfo();
            var tbl = $('#users-table').DataTable();
            tbl.ajax.reload();
            $('#update-btn').html('Update');


          },
          error: function (data) {
            console.log('Error:', data.fail);
            ShowResponse('.response', data.error, 'error');
            $('#update-btn').html('Update');
          }
        });

      });

      
    //this pops up confirm delete user
        $('body').on('click', '#delete-user', function (event) {
        let id = $(this).data("id");
        let name = $(this).data("name");
        event.preventDefault();
        if(confirm("Do you want to delete user "+name+"?")){
        let deleteUrl = '<?php echo e(route("user.destroy")); ?>';
        $.ajax({
          type: "DELETE",
          url: deleteUrl,
          data: {
            'id': id
          },
          success: function (data) {
            var resp = data.message;
            ShowResponse('.response', resp, 'success');
            ResetInfo(data);
            var tbl = $('#users-table').DataTable();
            tbl.ajax.reload();
          },
          error: function (data) {
            console.log('Error:', data);
            ShowResponse('.response', data.error, 'error');
          }
        });
        }else{
          console.log("Do nothing");
        }
      });

       //alert to change user account status
       $('body').on('click', '.changeAccountBtn', function (event) {
        let id = $(this).data("id");
        let status = $(this).data("status");
        let statusAction = status == 1 ? 'deactivate' : 'activate';
        event.preventDefault();
        if(confirm("Do you want to "+statusAction+" this account?")){
          console.log("user id "+id+" and status "+status);
          let postUrl = '<?php echo e(route("user.account.change")); ?>';
          $.ajax({
          type: "POST",
          url: postUrl,
          data: {
            'id': id,
            'status': status,
          },
          success: function (data) {
            console.log("Results", data);
            var resp = data.message;
            $('#deleteUser').modal("hide");
            ShowResponse('.response', resp, 'success');
            var tbl = $('#users-table').DataTable();
            tbl.ajax.reload();
          },
          error: function (data) {
            console.log('Error:', data);
            ShowResponse('.response', data.error, 'error');
          }
        });
        }else{
          console.log("Do nothing");
        }

       });


      // this resets form data
      function ResetInfo(response)
      {
            $('#id').val('');
            $('#first_name').val('');
            $('#last_name').val('');
            $('#phone_number').val('');
            $('#email').val('');
            $('#address').val('');
            $('#gender').val('');
      }

      // this displays notification after edit/delete action
      function ShowResponse(area, message, errorType)
      {
        $(area).notify(message,{
          className: errorType,
          autoHide: true,
          clickToHide:true,
          autoHideDelay:45000,
        });
      }


    });
</script>

<?php /**PATH C:\laragon\www\parkpro-dashboard\resources\views/livewire/users/index.blade.php ENDPATH**/ ?>