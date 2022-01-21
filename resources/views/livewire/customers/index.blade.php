<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">
      Customer Mangement
      </h1>
      <ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
        <li class="active">Customer Mangement</li>
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
          font-family: 'Times New Roman', Times, serif">List of customers</h3>
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
        <table class="table" id="customers-table">
            <thead>
               <tr>
                  {{-- <th></th> --}}
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Mobile No</th>
                  <th>Email</th>
                  <th>A/C Balance</th>
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

  <script src="{{ asset('customers/notify/notify.js') }}"></script>
  <script>
    window.addEventListener('closeModal', event=>{
      $('#editcustomer').modal('hide');
      $('#deletecustomer').modal('hide');
    });

  </script>


  <script>
    var $=jQuery.noConflict();

    const ajaxUrl =   @json(route('customers.ajax.fetch'));
    const cat = 'customers';
    const token = "{{ csrf_token() }}";

    jQuery(document).ready(function($){

        $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      // populating customers table
        var table = $('#customers-table');
        var title = "List of customers";
        var columns = [1,2,3,4,5];
        var dataColumns = [
        // {data: 'checkbox', name:'checkbox'},
        {data: 'first_name', name:'first_name'},
        {data: 'last_name', name:'last_name'},
        {data: 'phone_number', name:'phone_number'},
        {data: 'email', name:'email'},
        {data: 'account_balance', name:'account_balance'},
        // {data: 'action', name:'action'},
        ];
        makeDataTable2(table, title, columns, dataColumns);

      // method to populate customer information on editing
     $('body').on('click', '#edit-customer', function (event) {
        var id = $(this).data('id');
        event.preventDefault();
        var Url = "";
        Url = Url.replace(':id', id);
        $.ajax({

          url: Url,
          type: "GET",
          dataType: 'json',
          success: function (data) {

            console.log("customer data", data);
            $('#id').val(data.id);
            $('#first_name').val(data.first_name);
            $('#last_name').val(data.last_name);
            $('#phone_number').val(data.phone_number);
            $('#email').val(data.email);
            $('#address').val(data.address);
            $('#gender').val(data.gender);
            $('#editcustomer').modal('show');
          },
          error: function (data) {
            console.log('Error:', data.error);
          }
        });

      });

      // method to update customer information
      $('body').on('click', '#update-btn', function (event) {
        event.preventDefault();
        let id =  $('#id').val();
        let updateUrl =  '';
        $('#update-btn').html('Updating...');
        $.ajax({
          data: $('#customersForm').serialize(),
          url: updateUrl ,
          type: "PUT",
          dataType: 'json',
          success: function (data) {
            $('#customersForm').trigger("reset");
            $('#editcustomer').modal("hide");
            var resp = data.message;
            ShowResponse('.response', resp, 'success');
            ResetInfo();
            var tbl = $('#customers-table').DataTable();
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

      
    //this pops up confirm delete customer
        $('body').on('click', '#delete-customer', function (event) {
        let id = $(this).data("id");
        let name = $(this).data("name");
        let is_deleted = $(this).data("deleted");
        let activity = is_deleted ? 'restore' : 'delete';

        event.preventDefault();
        if(confirm("Do you want to "+activity+" customer "+name+"?")){
        let deleteUrl = '';
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
            var tbl = $('#customers-table').DataTable();
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

       //alert to change customer account status
       $('body').on('click', '.changeAccountBtn', function (event) {
        let id = $(this).data("id");
        let status = $(this).data("status");
        let statusAction = status == 1 ? 'deactivate' : 'activate';
        event.preventDefault();
        if(confirm("Do you want to "+statusAction+" this account?")){
          console.log("customer id "+id+" and status "+status);
          let postUrl = '';
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
            $('#deletecustomer').modal("hide");
            ShowResponse('.response', resp, 'success');
            var tbl = $('#customers-table').DataTable();
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

