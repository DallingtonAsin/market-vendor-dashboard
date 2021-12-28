<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">
       Request Monthly Review
      </h1>
      <ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
        <li class="active">Request Monthly Review</li>
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
          font-family: 'Times New Roman', Times, serif">Request Monthly Review</h3>
        </div>
  </div>
</div>

<div class="box-body">

<br/>

<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
  <div class="row">
    <div class="col-sm-12">
      <div class="table-responsive">
        <table class="table" id="monthly-requests-table">
            <thead>
               <tr>
                  <th>No.</th>
                  <th>Period</th>
                  <th>Month</th>
                  <th>Number of Requests</th>
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

    const ajaxUrl =   <?php echo json_encode(route('requests.monthly.ajax.fetch'), 15, 512) ?>;
    const cat = 'monthly requests';
    const token = "<?php echo e(csrf_token()); ?>";

    jQuery(document).ready(function($){

        var table = $('#monthly-requests-table');
        var title = "Monthly Request Review";
        var columns = [0, 1, 2, 3];
        var dataColumns = [
         {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,  searchable: false },
        {data: 'period', name:'period'},
        {data: 'month', name:'month'},
        {data: 'total_requests', name:'total_requests'}
        ];
        makeDataTable(table, title, columns, dataColumns);
    });
</script><?php /**PATH C:\laragon\www\parkpro-dashboard\resources\views/livewire/reports/request-monthly-review.blade.php ENDPATH**/ ?>