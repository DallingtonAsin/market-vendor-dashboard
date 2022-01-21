
<?php $__env->startSection('action-content'); ?>
<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header">
      <?php echo $__env->make('flash_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title" style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">
          Staff Members
        </h3>
        </div>

        <div class="col-sm-4 mb-2">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('isStaff')): ?>
          <button type="button" class="btn btn-info pull-right"
          data-toggle="modal" data-target="#addEmployeeModal">
          <i class="fa fa-plus-circle"></i> Add New Staff
        </button>
       <?php endif; ?>
      </div>



      <?php echo $__env->make('employees-mgmt.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    
    
    <br/>
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap mt-2">
      <div class="row">
        <div class="col-sm-12">
        <div class="table-responsive">
          <table class="table table-bordered table-dark" id="staff-table">
            <thead>
              <tr>
                 <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isAdmin')): ?>
                <th></th>
                 <?php endif; ?>
                <th>No</th>
                <th>First Name</th>
                <th>Last Name</th>
                
                <th>Role</th>
                <th>Dept</th>
                <th>Email</th>
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isAdmin')): ?>
                <th>Action</th>
                <?php endif; ?>
              </tr>
            </thead>
            <tbody>
              <?php echo $__env->make('employees-mgmt.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </tbody>
            <?php echo $__env->make('employees-mgmt.view', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          </table>
        </div>
          <?php echo $__env->make('employees-mgmt.delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          
        </div>
      </div>
      
    </div>
  </div>
  <!-- /.box-body -->
</div>
</section>
<script>
  const ajaxUrl = <?php echo json_encode(route('get-staff'), 15, 512) ?>;
  const deletedSeletectedUrl = <?php echo json_encode(route('employees.selected.remove'), 15, 512) ?>; 
  const cat = 'staff';
  const token = "<?php echo e(csrf_token()); ?>";
</script>


<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isStaff')): ?>
<script type="text/javascript">

$(document).ready(function(){
    var table = $('#staff-table');
    var title = "List of staff members in the system";
    var columns = [0, 1, 2, 3, 4, 5];
    var dataColumns = [
    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,  searchable: false },
    {data: 'firstname', name:'firstname'},
    {data: 'lastname', name:'lastname'},
    //  {data: 'username', name:'username'},
    {data: 'role', name:'role'},
    {data: 'department', name:'department'},
    {data: 'email', name:'email'},
    ];
    
    makeDataTable2(table, title, columns, dataColumns);
    });
</script>

<?php endif; ?>


<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isAdmin')): ?>
<script type="text/javascript">
$(document).ready(function(){
    var table = $('#staff-table');
    var title = "List of staff members in the system";
    var columns = [1, 2, 3, 4, 5, 6, 7];
    var dataColumns = [
    {data: 'checkbox', name:'checkbox'},
    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,  searchable: false },
    {data: 'firstname', name:'firstname'},
    {data: 'lastname', name:'lastname'},
    //  {data: 'username', name:'username'},
    {data: 'role', name:'role'},
    {data: 'department', name:'department'},
    {data: 'email', name:'email'},
    // {data: 'created_at', name:'created_at'},
    {data: 'action', name: 'action',orderable: false,searchable: false},
    ];
    
    makeDataTable(table, title, columns, dataColumns);
    });
   </script> 
 <?php endif; ?>
 
 
<script type="text/javascript">

$(document).ready(function(){
    // editing user
    $(document).on('click', '.edit-staff', function () {
      var id =  $(this).data('id');
      $('#edit-id').val(id);
      $.get('user-management/' + id + '/edit', function (data) {
        $('#edit-firstname').val(data.firstname);
        $('#edit-lastname').val(data.lastname);
        $('#edit-username').val(data.username);
        $('#edit-email').val(data.email);
        $('#edit-department').val(data.department);
        $('#edit-phone-no').val(data.phone_number);
        $('#edit-address').val(data.address);
        $('#edit-role').val(data.role);
      });
    });
    
    
    // viewing user
    $(document).on('click', '.view-staff', function () {
      var id =  $(this).data('id');
      $.get('user-management/' + id + '/edit', function (data) {
        $('#view-firstname').val(data.firstname);
        $('#view-lastname').val(data.lastname);
        $('#view-username').val(data.username);
        $('#view-email').val(data.email);
        $('#view-department').val(data.department);
        $('#view-phone-no').val(data.phone_number);
        $('#view-address').val(data.address);
        $('#view-role').val(data.role);
      });
    });
    
    // deleting user
    $(document).on('click', '.delete-staff', function () {
      var id =  $(this).data('id');
      $('#del-id').val(id);
      $.get('user-management/' + id + '/edit', function (data) {
        const name = data.firstname+" "+data.lastname;
        $('#del-title').html("Are you sure you want to delete staff "+name.toLowerCase()+" ?");
      });
    });
    
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('employees-mgmt.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\office-all-in-one\resources\views/employees-mgmt/index.blade.php ENDPATH**/ ?>