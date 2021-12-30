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
    <?php echo $__env->make('components.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="box-header">
      <div class="row">
        <div class="col-sm-4">
          <h3 class="box-title" style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">List of roles</h3>
        </div>
        
     
      <div class="col-sm-4">
        <a type="button" href=<?php echo e(route('roles.add')); ?> class="btn btn-info pull-right">
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
          <tbody>
            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e(++$count); ?></td>
              <td><?php echo e($role->name); ?></td>
              <td><?php echo e($role->created_by); ?></td>
              <td><?php echo e($role->created_at); ?></td>
              <td>
                <button type="button" class="btn btn-primary btn-sm" wire:click.prevent="edit(<?php echo e($role->id); ?>)" data-toggle="modal" data-target="#editRole"><i class="fa fa-pencil"></i></button>
                <button type="button" class="btn btn-danger btn-sm" wire:click="comfirmDelModal(<?php echo e($role->id); ?>)" data-toggle="modal" data-target="#deleteRole"><i class="fa fa-trash"></i></button>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
        </table>
        <?php echo $__env->make('livewire.modals.roles.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('livewire.modals.roles.delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
    </div>
  </div>
</div>
</div>
</div>
  </div>

  <script>
    $('#roles-table').dataTable();
    window.addEventListener('closeModal', event=>{
      $('#editRole').modal('hide');
      $('#deleteRole').modal('hide');
    });

  </script><?php /**PATH C:\laragon\www\parkpro-dashboard\resources\views/livewire/users/roles/index.blade.php ENDPATH**/ ?>