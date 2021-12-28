<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">
        System Audit
      </h1>
      <ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
        <li class="active">Activity Logs</li>
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
          font-family: 'Times New Roman', Times, serif">List of activity logs</h3>
        </div>
  </div>
</div>

<div class="box-body">

<br/>

<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
  <div class="row">
    <div class="col-sm-12">
      <div class="table-responsive">
        <table class="table" id="activity-logs-table">
            <thead>
               <tr>
                  <th>Name</th>
                  <th>Role</th>
                  <th>Description</th>
                  <th>IP Address</th>
                  <th>Date</th>
                  <th>Time</th>
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
    const ajaxUrl =   <?php echo json_encode(route('logs.ajax.fetch'), 15, 512) ?>;
    const cat = 'logs';
    const token = "<?php echo e(csrf_token()); ?>";

    jQuery(document).ready(function($){

        var table = $('#activity-logs-table');
        var title = "List of activity logs";
        var columns = [0,1,2,3,4];
        var dataColumns = [
        {data: 'name', name:'name'},
        {data: 'role', name:'role'},
        {data: 'description', name:'description'},
        {data: 'ip_address', name:'ip_address'},
        {data: 'date', name:'date'},
        {data: 'time', name:'time'},
        ];
        makeDataTable(table, title, columns, dataColumns);
    });
</script>



<?php /**PATH C:\laragon\www\parkpro-dashboard\resources\views/livewire/reports/activity-logs.blade.php ENDPATH**/ ?>