<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">
        Parking Fees Mangement
      </h1>
      <ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
        <li class="active">Parking Fees Mangement</li>
      </ol>
    </section>


<!-- Main content -->
<section class="content">
  <div class="box">
    @include('components.message')
    <div class="box-header">
      <div class="row">
        <div class="col-sm-4">
          <h3 class="box-title" style="font-weight:bolder; text-transform:uppercase; 
          font-family: 'Times New Roman', Times, serif">List of parking fees</h3>
            <span class="pl-0 mt-4 response"></span>
        </div>
        
     
      <div class="col-sm-4">
        <a type="button" href="{{route('parking.fees.create')}}" class="btn btn-info pull-right">
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
        @include('livewire.modals.parking-fees.edit')
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

    const ajaxUrl =   @json(route('parking.fees.ajax.fetch'));
    const cat = 'parking-fees';
    const token = "{{ csrf_token() }}";

    jQuery(document).ready(function($){

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

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

           
   // method to populate parking fee information on editing
     $('body').on('click', '#edit-parking-fee', function (event) {
        var id = $(this).data('id');
        event.preventDefault();
        var Url = "{{ route('parking-fee.show', ':id') }}";
        Url = Url.replace(':id', id);
        $.ajax({

          url: Url,
          type: "GET",
          dataType: 'json',
          success: function (data) {

            console.log("parking fee data", data);
            $('#id').val(data.id);
            $('#fee_per_hour').val(data.fee_per_hour);
            $('#editParkingFee').modal('show');
          },
          error: function (data) {
            console.log('Error:', data.error);
          }
        });

      });

      // method to update  parking fee information
      $('body').on('click', '#update-btn', function (event) {
        event.preventDefault();
        let id =  $('#id').val();
        let updateUrl =  '{{ route("parking-fee.update") }}';
        $('#update-btn').html('Updating...');
        $.ajax({
          data: $('#parkingFeesForm').serialize(),
          url: updateUrl ,
          type: "PUT",
          dataType: 'json',
          success: function (data) {
            $('#parkingFeesForm').trigger("reset");
            $('#editParkingFee').modal("hide");
            var resp = data.message;
            ShowResponse('.response', resp, 'success');
            ResetInfo();
            var tbl = $('#parking-fees-table').DataTable();
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

      
 //this pops up confirm delete parking fee
 $('body').on('click', '#delete-parking-fee', function (event) {
        let id = $(this).data("id");
        let name = $(this).data("name");
        let vehicleType =  $(this).data("vehicletype");
        event.preventDefault();
        if(confirm("Do you want to delete parking fee for parking area "+name+" for vehicle type "+vehicleType+"?")){
        let deleteUrl = '{{ route("parking-fee.destroy") }}';
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
            var tbl = $('#parking-fees-table').DataTable();
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
            $('#fee_per_hour').val('');

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
