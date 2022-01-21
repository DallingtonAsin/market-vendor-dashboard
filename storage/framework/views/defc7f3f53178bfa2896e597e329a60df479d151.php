<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <?php echo $__env->make('dashboard-content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </div>

<?php /**PATH C:\laragon\www\mkv-ms\resources\views/livewire/home.blade.php ENDPATH**/ ?>