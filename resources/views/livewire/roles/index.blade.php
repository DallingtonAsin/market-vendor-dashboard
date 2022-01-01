<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">
        Role Mangement
      </h1>
      <ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
        <li class="active">Role Mangement</li>
      </ol>
    </section>

<!-- Main content -->
<section class="content">
  <div class="box">
    @include('components.message')
    <div class="box-header">
      <div class="row">
        <div class="col-sm-4">
          <h3 class="box-title" style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">List of roles</h3>
          <span class="pl-0 mt-4 response"></span>
        </div>
        
     
      <div class="col-sm-4">
        <a type="button" href={{route('roles.add')}} class="btn btn-info pull-right">
        <i class="fa fa-plus-circle"></i> Add New Role
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
        <table class="table table-borderless table-dark" id="roles-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Created By</th>
              <th>Created On</th>
              <th>Action</th>
          </tr>
          </thead>
        </table>
        @include('livewire.modals.roles.edit')
      </div>
    </div>
  </div>
</div>
</div>
</div>
  </div>

 
<script src="{{ asset('vendors/notify/notify.js') }}"></script>

<script>
  var $=jQuery.noConflict();

  const ajaxUrl =   @json(route('roles.ajax.fetch'));
  const cat = 'roles';
  const token = "{{ csrf_token() }}";

  jQuery(document).ready(function($){

      $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    // populating roles table
      var table = $('#roles-table');
      var title = "List of roles";
      var columns = [1,2,3];
      var dataColumns = [
      {data: 'checkbox', name:'checkbox'},
      {data: 'name', name:'name'},
      {data: 'created_by', name:'created_by'},
      {data: 'created_at', name:'created_at'},
      {data: 'action', name:'action'},
      ];
      makeDataTable(table, title, columns, dataColumns);

    // method to populate role information on editing
   $('body').on('click', '#edit-role', function (event) {
      var id = $(this).data('id');
      event.preventDefault();
      var Url = "{{ route('role.show', ':id') }}";
      Url = Url.replace(':id', id);
      $.ajax({

        url: Url,
        type: "GET",
        dataType: 'json',
        success: function (data) {

          console.log("role data", data);
          $('#id').val(data.id);
          $('#name').val(data.name);
          $('#editRole').modal('show');
        },
        error: function (data) {
          console.log('Error:', data.error);
        }
      });

    });

    // method to update role information
    $('body').on('click', '#update-btn', function (event) {
      event.preventDefault();
      let id =  $('#id').val();
      let updateUrl =  '{{ route("role.update") }}';
      $('#update-btn').html('Updating...');
      $.ajax({
        data: $('#rolesForm').serialize(),
        url: updateUrl ,
        type: "PUT",
        dataType: 'json',
        success: function (data) {
          $('#rolesForm').trigger("reset");
          $('#editRole').modal("hide");
          var resp = data.message;
          ShowResponse('.response', resp, 'success');
          ResetInfo();
          var tbl = $('#roles-table').DataTable();
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

    
  //this pops up confirm delete role
      $('body').on('click', '#delete-role', function (event) {
      let id = $(this).data("id");
      let name = $(this).data("name");
      event.preventDefault();
      if(confirm("Do you want to delete role "+name+"?")){
      let deleteUrl = '{{ route("role.destroy") }}';
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
          var tbl = $('#roles-table').DataTable();
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

