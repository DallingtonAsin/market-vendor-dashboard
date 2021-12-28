
<?php $__env->startSection('action-content'); ?>
<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header">
      <?php echo $__env->make('flash_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title" style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">
          Staff Attendance
        </h3>
        </div>

      
        <div class="col-sm-2">
          <form method="POST" action="<?php echo e(route('attendance.checkin')); ?>" id="checkin-form">
            <?php echo csrf_field(); ?>
        <button type="submit" class="btn btn-success" onclick="return confirmCheckin();">
          <img src="<?php echo e(asset('images/checkin.png')); ?>" width="20px" height="20px"/>
           Check in
        </button>
      </form>
        </div>

        <div class="col-sm-2">
          <form method="POST" action="<?php echo e(route('attendance.checkout')); ?>" id="checkout-form">
            <?php echo csrf_field(); ?>
          <button type="submit" class="btn btn-primary" onclick="return confirmCheckout();">
          <img src="<?php echo e(asset('images/bye.png')); ?>" width="20px" height="20px"/>
           Check out
        </button>
          </form>
        </div>


       


        <!-- <div class="col-sm-4">
          <button type="button" class="btn btn-info pull-right"
          data-toggle="modal" data-target="#addStaffAttendance">
          <i class="fa fa-plus-circle"></i> Record Attendance
        </button>
      </div> -->



      <?php echo $__env->make('employees-mgmt.attendance.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    
    

    <br/>
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap mt-2">
      <div class="row">
        <div class="col-sm-12">
        <div class="table-responsive">
          <table class="table table-bordered table-dark" id="staff-attendance-table">
            <thead>
              <tr>
                 <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isAdmin')): ?>
                <th></th>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isStaff')): ?>
                <th>No</th>
                <?php endif; ?>
                <th>Name</th>
                <th>Date</th>
                <th>Time In</th>
                <th>Time Out</th>
                <th>Total Hours</th>
                 
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
          
        </div>
      </div>
      
    </div>
  </div>
  <!-- /.box-body -->
</div>
</section>
<script>
  const ajaxUrl = <?php echo json_encode(route('get-staff-attendance'), 15, 512) ?>;
  const deletedSeletectedUrl = <?php echo json_encode(route('employees.selected.remove'), 15, 512) ?>; 
  const cat = 'staff';
  const token = "<?php echo e(csrf_token()); ?>";

let user = <?php echo json_encode(Auth::user()->firstname); ?>;

  function confirmCheckin(){

    if(confirm('Hey '+user+', are you sure to check in?')){
        document.getElementById('checkin-form').submit();
    }else{
        return false;
    }   
}

function confirmCheckout(){
    if(confirm('Hey '+user+', are you sure to check out?')){
        document.getElementById('checkout-form').submit();
    }else{
        return false;
    }   
}




</script>


<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isStaff')): ?>
<script type="text/javascript">
$(document).ready(function(){
    var table = $('#staff-attendance-table');
    var title = "Records of staff attendance in the system";
    var columns = [0, 1, 2, 3, 4, 5];
    var dataColumns = [
    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,  searchable: false },
    {data: 'name', name:'name'},
    {data: 'date', name:'date'},
    {data: 'time_in', name:'time_in'},
    {data: 'time_out', name:'time_out'},
    {data: 'total_hours', name:'total_hours'},
    
    ];
    
    makeDataTable2(table, title, columns, dataColumns);
    });
</script>
<?php endif; ?>


<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isAdmin')): ?>
<script type="text/javascript">
$(document).ready(function(){
    var table = $('#staff-attendance-table');
    var title = "Records of staff attendance in the system";
    var columns = [1, 2, 3, 4, 5, 6, 7];
    var dataColumns = [
    {data: 'checkbox', name:'checkbox'},
    {data: 'name', name:'name'},
    {data: 'date', name:'date'},
    {data: 'time_in', name:'time_in'},
    {data: 'time_out', name:'time_out'},
    {data: 'total_hours', name:'total_hours'},
    // {data: 'action', name: 'action',orderable: false,searchable: false},
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
<?php echo $__env->make('employees-mgmt.attendance.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\office-all-in-one\resources\views/employees-mgmt/attendance/index.blade.php ENDPATH**/ ?>