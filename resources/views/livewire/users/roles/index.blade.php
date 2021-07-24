
<div class="wrapper">
    <div class="main-panel">
        <div class="content">
            <div class="white_box">
                @include('components.message')
             <div class="page_head float-left">
                <span>User roles</span> 
                <span class="float-right btn_refrs">
                    <a class="btn btn-info"  href="{{ route('roles.add') }}" >Add</a>
                </span>
            </div>
            <table class="table" id="roles-table">
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

<script>
  window.addEventListener('closeModal', event=>{
    $('#editRole').modal('hide');
    $('#deleteRole').modal('hide');
  });
</script>
