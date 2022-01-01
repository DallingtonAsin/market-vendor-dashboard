

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">
        Client Mangement
      </h1>
      <ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
        <li class="active">Client Mangement</li>
      </ol>
    </section>


<!-- Main content -->
<section class="content">
  <div class="box">
    @include('components.message')
    <div class="box-header">
      <div class="row">
        <div class="col-sm-4">
          <h3 class="box-title" style="font-weight:bolder; 
          text-transform:uppercase; font-family: 'Times New Roman', Times, serif">List of clients</h3>
            <span class="pl-0 mt-4 response"></span>
      </div>
        
     
      <div class="col-sm-4">
        <a type="button" href="{{ url('clients/add') }}" class="btn btn-info pull-right">
        <i class="fa fa-plus-circle"></i> Add Client
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
        <table class="table table-hover" id="clients-table">
            <thead>
                <tr>
                    <th></th>
                    <th>No</th>
                    <th>Name</th>
                    <th>Telephone No</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
    </table>
    @include('livewire.modals.clients.edit')
      </div>
    </div>
  </div>
</div>
</div>
</div>
  </div>


 
<script>
    window.addEventListener('closeModal', event=>{
      $('#editClient').modal('hide');
      $('#deleteClient').modal('hide');
    });
  </script>
  
  <script>
      var $=jQuery.noConflict();
  
      const ajaxUrl =   @json(route('clients.ajax.fetch'));
      const cat = 'clients';
      const token = "{{ csrf_token() }}";
  
      jQuery(document).ready(function($){

        $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
  
          var table = $('#clients-table');
          var title = "List of clients";
          var columns = [1,2,3,4];
          var dataColumns = [
          {data: 'checkbox', name:'checkbox'},
          {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,  searchable: false },
          {data: 'name', name:'name'},
          {data: 'mobile_number', name:'mobile_number'},
          {data: 'address', name:'address'},
          {data: 'email', name:'email'},
          {data: 'action', name:'action'},
          ];
          makeDataTable(table, title, columns, dataColumns);


   // method to populate user information on editing
     $('body').on('click', '#edit-client', function (event) {
        var id = $(this).data('id');
        event.preventDefault();
        var Url = "{{ route('client.show', ':id') }}";
        Url = Url.replace(':id', id);
        $.ajax({

          url: Url,
          type: "GET",
          dataType: 'json',
          success: function (data) {

            console.log("client data", data);
            $('#id').val(data.id);
            $('#name').val(data.name);
            $('#address').val(data.address);
            $('#mobile_number').val(data.mobile_number);
            $('#email').val(data.email);
            $('#editClient').modal('show');
          },
          error: function (data) {
            console.log('Error:', data.error);
          }
        });

      });

      // method to update client information
      $('body').on('click', '#update-btn', function (event) {
        event.preventDefault();
        let id =  $('#id').val();
        let updateUrl =  '{{ route("client.update") }}';
        $('#update-btn').html('Updating...');
        $.ajax({
          data: $('#clientsForm').serialize(),
          url: updateUrl ,
          type: "PUT",
          dataType: 'json',
          success: function (data) {
            $('#clientsForm').trigger("reset");
            $('#editClient').modal("hide");
            var resp = data.message;
            ShowResponse('.response', resp, 'success');
            ResetInfo();
            var tbl = $('#clients-table').DataTable();
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

      
 //this pops up confirm delete client
 $('body').on('click', '#delete-client', function (event) {
        let id = $(this).data("id");
        let name = $(this).data("name");
        event.preventDefault();
        if(confirm("Do you want to delete client "+name+"?")){
        let deleteUrl = '{{ route("client.destroy") }}';
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
            var tbl = $('#clients-table').DataTable();
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
            $('#mobile_number').val('');
            $('#email').val('');
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



