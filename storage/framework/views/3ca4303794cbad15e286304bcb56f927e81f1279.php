<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">
        Parking Area Mangement
      </h1>
      <ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
        <li class="active">Parking Area Mangement</li>
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
          font-family: 'Times New Roman', Times, serif">List of parking areas</h3>
        </div>
        
     
      <div class="col-sm-4">
        <a type="button" href="<?php echo e(route('parking.area.create')); ?>" class="btn btn-info pull-right">
        <i class="fa fa-plus-circle"></i> Add Parking Area
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
        <table class="table table-hover" id="parking-areas">
            <thead>
                <tr>
                    <th></th>
                    <th>Client</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>OpensAt</th>
                    <th>ClosesAt</th>
                    <th>Lat</th>
                    <th>Long</th>
                    <th>Rating</th>
                    <th>Slots</th>
                    <th>Avail.</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
        <?php echo $__env->make('livewire.modals.parking-areas.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('livewire.modals.parking-areas.delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
    </div>
  </div>
</div>
</div>
</div>
  </div>

  <script>
    window.addEventListener('closeModal', event=>{
      $('#editParkingArea').modal('hide');
      $('#deleteParkingArea').modal('hide');
    });
  </script>

  <script>
    var $=jQuery.noConflict();

    const ajaxUrl =   <?php echo json_encode(route('parking.areas.ajax.fetch'), 15, 512) ?>;
    const cat = 'parking areas';
    const token = "<?php echo e(csrf_token()); ?>";

    jQuery(document).ready(function($){

        var table = $('#parking-areas');
        var title = "List of parking areas";
        var columns = [1,2,3];
        var dataColumns = [
        {data: 'checkbox', name:'checkbox'},
        // {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,  searchable: false },
        {data: 'client', name:'client'},
        {data: 'name', name:'name'},
        {data: 'address', name:'address'},
        {data: 'opens_at', name:'opens_at'},
        {data: 'closes_at', name:'closes_at'},
        {data: 'latitude', name:'latitude'},
        {data: 'longitude', name:'longitude'},
        {data: 'rating', name:'rating'},
        {data: 'total_space', name:'total_space'},
        {data: 'current_free_space', name:'current_free_space'},
        {data: 'action', name:'action'},
        ];
        makeDataTable(table, title, columns, dataColumns);
    });
</script>



<?php /**PATH C:\laragon\www\parkpro-dashboard\resources\views/livewire/parking/parking-areas.blade.php ENDPATH**/ ?>