<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">
        Parking Areas Mangement
      </h1>
      <ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
        <li class="active">Parking Areas Mangement</li>
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
            <span class="pl-0 mt-4 response"></span>
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


      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

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


        
   // method to populate parking area information on editing
     $('body').on('click', '#edit-parking-area', function (event) {
        var id = $(this).data('id');
        event.preventDefault();
        var Url = "<?php echo e(route('parking-area.show', ':id')); ?>";
        Url = Url.replace(':id', id);
        $.ajax({

          url: Url,
          type: "GET",
          dataType: 'json',
          success: function (data) {

            console.log("parking-area data", data);
            $('#id').val(data.id);
            $('#name').val(data.name);
            $('#address').val(data.address);
            $('#description').val(data.description);
            $('#opens_at').val(data.opens_at);
            $('#closes_at').val(data.closes_at);
            $('#latitude').val(data.latitude);
            $('#longitude').val(data.longitude);
            $('#slots').val(data.total_space);
            $('#editParkingArea').modal('show');
          },
          error: function (data) {
            console.log('Error:', data.error);
          }
        });

      });

      // method to update  parking area information
      $('body').on('click', '#update-btn', function (event) {
        event.preventDefault();
        let id =  $('#id').val();
        let updateUrl =  '<?php echo e(route("parking-area.update")); ?>';
        $('#update-btn').html('Updating...');
        $.ajax({
          data: $('#parkingAreasForm').serialize(),
          url: updateUrl ,
          type: "PUT",
          dataType: 'json',
          success: function (data) {
            $('#parkingAreasForm').trigger("reset");
            $('#editParkingArea').modal("hide");
            var resp = data.message;
            ShowResponse('.response', resp, 'success');
            ResetInfo();
            var tbl = $('#parking-areas').DataTable();
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

      
 //this pops up confirm delete parking area
 $('body').on('click', '#delete-parking-area', function (event) {
        let id = $(this).data("id");
        let name = $(this).data("name");
        event.preventDefault();
        if(confirm("Do you want to delete parking area "+name+"?")){
        let deleteUrl = '<?php echo e(route("parking-area.destroy")); ?>';
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
            var tbl = $('#parking-areas').DataTable();
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
            $('#address').val('');
            $('#description').val('');
            $('#opens_at').val('');
            $('#closes_at').val('');
            $('#latitude').val('');
            $('#longitude').val('');
            $('#slots').val('');

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



<?php /**PATH C:\laragon\www\parkpro-dashboard\resources\views/livewire/parking/parking-areas.blade.php ENDPATH**/ ?>