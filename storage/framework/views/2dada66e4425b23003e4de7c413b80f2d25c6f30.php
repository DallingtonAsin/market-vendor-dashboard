<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">
      Market Vendor Mangement
      </h1>
      <ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
        <li class="active">Market Vendor Mangement</li>
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
          font-family: 'Times New Roman', Times, serif">List of market vendors</h3>
            <span class="pl-0 mt-4 response"></span>
        </div>
        
     
      <div class="col-sm-4">
        <a type="button" href=<?php echo e(route('vendors.add')); ?> class="btn btn-info pull-right">
        <i class="fa fa-plus-circle"></i> Add Vendor
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
        <table class="table" id="vendors-table">
            <thead>
               <tr>
                  <th></th>
                  <th>Name</th>
                  <th>vendorname</th>
                  <th>Mobile No</th>
                  <th>A/C status</th>
                  <th>Is Deleted</th>
                  <th>Manage</th>
                  <th>Action</th>
              </tr>
          </thead>
      </table>
      <?php echo $__env->make('livewire.modals.vendors.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

    const ajaxUrl =   <?php echo json_encode(route('vendors.ajax.fetch'), 15, 512) ?>;
    const cat = 'vendors';
    const token = "<?php echo e(csrf_token()); ?>";

    jQuery(document).ready(function($){

        $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      // populating vendors table
        var table = $('#vendors-table');
        var title = "List of vendors";
        var columns = [1,2,3,4,5];
        var dataColumns = [
        {data: 'checkbox', name:'checkbox'},
        {data: 'name', name:'name'},
        {data: 'username', name:'username'},
        {data: 'phone_number', name:'phone_number'},
        {data: 'is_active', name:'is_active'},
        {data: 'is_deleted', name:'is_deleted'},
        {data: 'account_action', name:'account_action'},
        {data: 'action', name:'action'},
        ];
        makeDataTable(table, title, columns, dataColumns);

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
            var tbl = $('#vendors-table').DataTable();
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
            var tbl = $('#vendors-table').DataTable();
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
            var tbl = $('#vendors-table').DataTable();
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

<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/mkv-ms/resources/views/livewire/vendors/index.blade.php ENDPATH**/ ?>