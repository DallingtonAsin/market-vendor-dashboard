<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">
      Shopping Orders Mangement
      </h1>
      <ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
        <li class="active">Shopping Orders Mangement</li>
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
          font-family: 'Times New Roman', Times, serif">List of customer orders</h3>
            <span class="pl-0 mt-4 response"></span>
        </div>
  </div>

</div>

<div class="box-body">

<br/>

<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
  <div class="row">
    <div class="col-sm-12">
      <div class="table-responsive">
        <table class="table" id="shopping-list-table">
            <thead>
               <tr>
                  
                  <th>Order No</th>
                  <th>Vendor</th>
                  <th>Customer Name</th>
                  <th>Phone No</th>
                  <th>Items</th>
                  <th>Address</th>
                  <th>Status</th>
                  <th>Order State Action</th>
                  <!-- <th>Action</th> -->
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

  <script src="<?php echo e(asset('vendors/notify/notify.js')); ?>"></script>
  <script>
    window.addEventListener('closeModal', event=>{
      $('#editvendor').modal('hide');
      $('#deletevendor').modal('hide');
    });

  </script>


  <script>
    var $=jQuery.noConflict();

    const ajaxUrl =   <?php echo json_encode(route('shopping.orders.fetch'), 15, 512) ?>;
    const cat = 'shopping-lists';
    const token = "<?php echo e(csrf_token()); ?>";

    jQuery(document).ready(function($){

        $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      // populating vendors table
        var table = $('#shopping-list-table');
        var title = "List of shopping lists";
        var columns = [1,2,3,4,5];
        var dataColumns = [
        // {data: 'checkbox', name:'checkbox'},
        {data: 'order_no', name:'order_no'},
        {data: 'vendor', name:'vendor'},
        {data: 'customer_name', name:'customer_name'},
        {data: 'phone_number', name:'phone_number'},
        {data: 'items', name:'items'},
        {data: 'address', name:'address'},
        {data: 'status', name:'status'},
        {data: 'action_status', name:'action_status'},
        // {data: 'action', name:'action'},
        ];
        makeDataTable2(table, title, columns, dataColumns);

      // method to populate vendor information on editing
     $('body').on('click', '#edit-vendor', function (event) {
        var id = $(this).data('id');
        event.preventDefault();
        var Url = "<?php echo e(route('vendor.show', ':id')); ?>";
        Url = Url.replace(':id', id);
        $.ajax({

          url: Url,
          type: "GET",
          dataType: 'json',
          success: function (data) {

            console.log("vendor data", data);
            $('#id').val(data.id);
            $('#first_name').val(data.first_name);
            $('#last_name').val(data.last_name);
            $('#phone_number').val(data.phone_number);
            $('#email').val(data.email);
            $('#address').val(data.address);
            $('#gender').val(data.gender);
            $('#editvendor').modal('show');
          },
          error: function (data) {
            console.log('Error:', data.error);
          }
        });

      });

      // method to update vendor information
      $('body').on('click', '#update-btn', function (event) {
        event.preventDefault();
        let id =  $('#id').val();
        let updateUrl =  '<?php echo e(route("vendor.update")); ?>';
        $('#update-btn').html('Updating...');
        $.ajax({
          data: $('#vendorsForm').serialize(),
          url: updateUrl ,
          type: "PUT",
          dataType: 'json',
          success: function (data) {
            $('#vendorsForm').trigger("reset");
            $('#editvendor').modal("hide");
            var resp = data.message;
            ShowResponse('.response', resp, 'success');
            ResetInfo();
            var tbl = $('#shopping-list-table').DataTable();
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

      
    //this pops up confirm delete vendor
        $('body').on('click', '#delete-vendor', function (event) {
        let id = $(this).data("id");
        let name = $(this).data("name");
        let is_deleted = $(this).data("deleted");
        let activity = is_deleted ? 'restore' : 'delete';

        event.preventDefault();
        if(confirm("Do you want to "+activity+" vendor "+name+"?")){
        let deleteUrl = '<?php echo e(route("vendor.destroy")); ?>';
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
            var tbl = $('#shopping-list-table').DataTable();
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

       //alert to change vendor account status
       $('body').on('click', '.changeAccountBtn', function (event) {
        let id = $(this).data("id");
        let status = $(this).data("status");
        let statusAction = status == 1 ? 'deactivate' : 'activate';
        event.preventDefault();
        if(confirm("Do you want to "+statusAction+" this account?")){
          console.log("vendor id "+id+" and status "+status);
          let postUrl = '<?php echo e(route("vendor.account.change")); ?>';
          $.ajax({
          type: "POST",
          url: postUrl,
          data: {
            'id': id,
            'status': status,
          },
          success: function (data) {
            console.log("Results", data);
            var resp = data.message;
            $('#deletevendor').modal("hide");
            ShowResponse('.response', resp, 'success');
            var tbl = $('#shopping-list-table').DataTable();
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


 //alert to change vendor account status
 $('body').on('click', '#change-order-status', function (event) {
        let id = $(this).data("id");
        let status = $(this).data("status");
        let statusAction = status == 'Pending' ? 'processed' : 'pending';
        event.preventDefault();
        if(confirm("Are you sure you want to mark this order "+statusAction+"?")){
          console.log("vendor id "+id+" and status "+status);
          let postUrl = '<?php echo e(route("order.status.change")); ?>';
          $.ajax({
          type: "POST",
          url: postUrl,
          data: {
            'id': id,
            'status': status,
          },
          success: function (data) {
            console.log("Results", data);
            var resp = data.message;
            $('#deletevendor').modal("hide");
            ShowResponse('.response', resp, 'success');
            var tbl = $('#shopping-list-table').DataTable();
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
            $('#first_name').val('');
            $('#last_name').val('');
            $('#phone_number').val('');
            $('#email').val('');
            $('#address').val('');
            $('#gender').val('');
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

<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/mkv-ms/resources/views/livewire/shopping-orders/index.blade.php ENDPATH**/ ?>