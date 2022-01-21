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
            <span class="pl-0 mt-4 response"></span>
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
                 <th>Is Deleted</th>
                 <th>Action</th>
             </tr>
         </thead>
     </table>
     <?php echo $__env->make('livewire.modals.vehicle-types.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
    });
  </script>

  <script>
    var $=jQuery.noConflict();

    const ajaxUrl =   <?php echo json_encode(route('vehicle.categories.ajax.fetch'), 15, 512) ?>;
    const cat = 'vehicle-categories';
    const token = "<?php echo e(csrf_token()); ?>";

    jQuery(document).ready(function($){

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

        var table = $('#vehicle-category-table');
        var title = "List of vehicle categories";
        var columns = [1, 2];
        var dataColumns = [
        {data: 'checkbox', name:'checkbox'},
        {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,  searchable: false },
        {data: 'name', name:'name'},
        {data: 'is_deleted', name:'is_deleted'},
        {data: 'action', name:'action'},
        ];
        makeDataTable(table, title, columns, dataColumns);


  // method to populate vehicle type information on editing
     $('body').on('click', '#edit-vehicle-type', function (event) {
        var id = $(this).data('id');
        event.preventDefault();
        var Url = "<?php echo e(route('vehicle-type.show', ':id')); ?>";
        Url = Url.replace(':id', id);
        $.ajax({

          url: Url,
          type: "GET",
          dataType: 'json',
          success: function (data) {

            console.log("vehicle type data", data);
            $('#id').val(data.id);
            $('#name').val(data.name);
            $('#editVehicleType').modal('show');
          },
          error: function (data) {
            console.log('Error:', data.error);
          }
        });

      });

      // method to update vehicle type information
      $('body').on('click', '#update-btn', function (event) {
        event.preventDefault();
        let id =  $('#id').val();
        let updateUrl =  '<?php echo e(route("vehicle-type.update")); ?>';
        $('#update-btn').html('Updating...');
        $.ajax({
          data: $('#vehicleTypesForm').serialize(),
          url: updateUrl ,
          type: "PUT",
          dataType: 'json',
          success: function (data) {
            $('#vehicleTypesForm').trigger("reset");
            $('#editVehicleType').modal("hide");
            var resp = data.message;
            ShowResponse('.response', resp, 'success');
            ResetInfo();
            var tbl = $('#vehicle-category-table').DataTable();
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

      
 //this pops up confirm delete vehicle type
 $('body').on('click', '#delete-vehicle-type', function (event) {
        let id = $(this).data("id");
        let name = $(this).data("name");
        let is_deleted = $(this).data("deleted");
        let activity = is_deleted ? 'restore' : 'delete';

        event.preventDefault();
        if(confirm("Do you want to "+activity+" vehicle type "+name+"?")){
        let deleteUrl = '<?php echo e(route("vehicle-type.destroy")); ?>';
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
            var tbl = $('#vehicle-category-table').DataTable();
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
            $('#name').val('');
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


<?php /**PATH C:\laragon\www\parkpro-dashboard\resources\views/livewire/vehicle-category/index.blade.php ENDPATH**/ ?>