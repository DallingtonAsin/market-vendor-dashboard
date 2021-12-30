<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">
        Parking Fee Mangement
      </h1>
      <ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
        <li class="active">Parking Fee Mangement</li>
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
          font-family: 'Times New Roman', Times, serif">List of parking fees</h3>
        </div>
        
     
      <div class="col-sm-4">
        <a type="button" href="<?php echo e(route('parking.fees.create')); ?>" class="btn btn-info pull-right">
        <i class="fa fa-plus-circle"></i> Add Parking Fees
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
        <table class="table table-hover" id="parking-fees-table">
            <thead>
                <tr>
                    <th></th>
                    <th>No</th>
                    <th>Client</th>
                    <th>Parking area</th>
                    <th>Vehicle Categoty</th>
                    <th>Fee</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
        <?php echo $__env->make('livewire.modals.parking-fees.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('livewire.modals.parking-fees.delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
    </div>
  </div>
</div>
</div>
</div>
  </div>

  <script>
    window.addEventListener('closeModal', event=>{
      $('#editParkingFee').modal('hide');
      $('#deleteParkingFee').modal('hide');
    });
  </script>

  <script>
    var $=jQuery.noConflict();

    const ajaxUrl =   <?php echo json_encode(route('parking.fees.ajax.fetch'), 15, 512) ?>;
    const cat = 'parking-fees';
    const token = "<?php echo e(csrf_token()); ?>";

    jQuery(document).ready(function($){

        var table = $('#parking-fees-table');
        var title = "List of parking fees";
        var columns = [1,2,3,4,5];
        var dataColumns = [
        {data: 'checkbox', name:'checkbox'},
        {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,  searchable: false },
        {data: 'client_name', name:'client_name'},
        {data: 'parking_area', name:'parking_area'},
        {data: 'vehicle_category', name:'vehicle_category'},
        {data: 'fee_per_hour', name:'fee_per_hour'},
        {data: 'action', name:'action'},
        ];
        makeDataTable(table, title, columns, dataColumns);
    });
</script>
<?php /**PATH C:\laragon\www\parkpro-dashboard\resources\views/livewire/parking/parking-fees.blade.php ENDPATH**/ ?>