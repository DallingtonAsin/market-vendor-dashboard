

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
    <?php echo $__env->make('components.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="box-header">
      <div class="row">
        <div class="col-sm-4">
          <h3 class="box-title" style="font-weight:bolder; 
          text-transform:uppercase; font-family: 'Times New Roman', Times, serif">List of clients</h3>
        </div>
        
     
      <div class="col-sm-4">
        <a type="button" href="<?php echo e(url('clients/add')); ?>" class="btn btn-info pull-right">
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
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
    </table>
    <?php echo $__env->make('livewire.modals.clients.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('livewire.modals.clients.delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
  
      const ajaxUrl =   <?php echo json_encode(route('clients.ajax.fetch'), 15, 512) ?>;
      const cat = 'clients';
      const token = "<?php echo e(csrf_token()); ?>";
  
      jQuery(document).ready(function($){
  
          var table = $('#clients-table');
          var title = "List of clients";
          var columns = [1,2,3,4];
          var dataColumns = [
          {data: 'checkbox', name:'checkbox'},
          {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,  searchable: false },
          {data: 'name', name:'name'},
          {data: 'mobile_number', name:'mobile_number'},
          {data: 'email', name:'email'},
          {data: 'action', name:'action'},
          ];
          makeDataTable(table, title, columns, dataColumns);
      });
  </script>



<?php /**PATH C:\laragon\www\parkpro-dashboard\resources\views/livewire/clients/index.blade.php ENDPATH**/ ?>