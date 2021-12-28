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
        <table class="table table-bordered table-dark" id="roles-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Created By</th>
              <th>Created On</th>
              <th>Action</th>
          </tr>
          </thead>
          <tbody>
            @foreach($roles as $role)
            <tr>
              <td>{{ ++$count }}</td>
              <td>{{ $role->name }}</td>
              <td>{{ $role->created_by }}</td>
              <td>{{ $role->created_at }}</td>
              <td>
                <button type="button" class="btn btn-primary btn-sm" wire:click.prevent="edit({{ $role->id }})" data-toggle="modal" data-target="#editRole"><i class="fa fa-pencil"></i></button>
                <button type="button" class="btn btn-danger btn-sm" wire:click="comfirmDelModal({{ $role->id }})" data-toggle="modal" data-target="#deleteRole"><i class="fa fa-trash"></i></button>
            </td>
        </tr>
        @endforeach
    </tbody>
        </table>
        @include('livewire.modals.roles.edit')
        @include('livewire.modals.roles.delete')
      </div>
    </div>
  </div>
</div>
</div>
</div>
  </div>

  <script>
    window.addEventListener('closeModal', event=>{
      $('#editRole').modal('hide');
      $('#deleteRole').modal('hide');
    });

  </script>