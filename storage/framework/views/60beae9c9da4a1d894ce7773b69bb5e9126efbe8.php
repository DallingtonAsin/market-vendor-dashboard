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
      </div>
    </div>
  </div>
</div>
</div>
</div>
  </div>


  <script>
    var $=jQuery.noConflict();

    const ajaxUrl =   <?php echo json_encode(route('users.ajax.fetch'), 15, 512) ?>;
    const cat = 'users';
    const token = "<?php echo e(csrf_token()); ?>";

    jQuery(document).ready(function($){

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
    });
</script>

<?php /**PATH C:\laragon\www\parkpro-dashboard\resources\views/livewire/users/index.blade.php ENDPATH**/ ?>