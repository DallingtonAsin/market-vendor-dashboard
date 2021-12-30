<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">
        Vehicle Category Mangement
      </h1>
      <ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
        <li class="active">Vehicle Category Mangement</li>
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
          font-family: 'Times New Roman', Times, serif">List of vehicle categories</h3>
        </div>
        
     
      <div class="col-sm-4">
        <a type="button" href=<?php echo e(route('users.add')); ?> class="btn btn-info pull-right">
        <i class="fa fa-plus-circle"></i> Add Vehicle Category
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
        <table class="table table-hover" id="vehicle-category-table">
            <thead>
                <tr>
                 <th></th>
                 <th>No</th>
                 <th>Name</th>
                 <th>Action</th>
             </tr>
         </thead>
     </table>
     <?php echo $__env->make('livewire.modals.vehicle-types.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php echo $__env->make('livewire.modals.vehicle-types.delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
    </div>
  </div>
</div>
</div>
</div>
  </div>

  <script>
    window.addEventListener('closeModal', event=>{
      $('#editVehicleType').modal('hide');
      $('#deleteVehicleType').modal('hide');
    });
  </script>

  <script>
    var $=jQuery.noConflict();

    const ajaxUrl =   <?php echo json_encode(route('vehicle.categories.ajax.fetch'), 15, 512) ?>;
    const cat = 'vehicle-categories';
    const token = "<?php echo e(csrf_token()); ?>";

    jQuery(document).ready(function($){

        var table = $('#vehicle-category-table');
        var title = "List of vehicle categories";
        var columns = [1, 2];
        var dataColumns = [
        {data: 'checkbox', name:'checkbox'},
        {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,  searchable: false },
        {data: 'name', name:'name'},
        {data: 'action', name:'action'},
        ];
        makeDataTable(table, title, columns, dataColumns);
    });
</script>


<?php /**PATH C:\laragon\www\parkpro-dashboard\resources\views/livewire/vehicle-category/index.blade.php ENDPATH**/ ?>