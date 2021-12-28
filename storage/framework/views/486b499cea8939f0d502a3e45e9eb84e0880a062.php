 <!-- Main content -->
 <section class="content">
    <!-- Info boxes -->
    <div class="row">
       <!-- /.col -->
       <a class="col-md-3 col-sm-6 col-xs-12 homelink" href="<?php echo e(route('staff.index')); ?>">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Staff</span>
            <span class="info-box-number"><?php echo e($employeeCount); ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
</a>
      <!-- /.col -->
     
        <a class="col-md-3 col-sm-6 col-xs-12 homelink" href="<?php echo e(route('departments.index')); ?>">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
          <div class="info-box-content">
            <span class="info-box-text text-dark">Departments</span>
            <span class="info-box-number text-dark"><?php echo e($departments); ?></span>
          </div>
        </div>
      </a>

     


      <!-- /.col -->
      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('isStaff')): ?>
      <a class="col-md-3 col-sm-6 col-xs-12 homelink" href="<?php echo e(route('expenses.index')); ?>">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-balance-scale"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Expenses</span>
            <span class="info-box-number"><?php echo e($expenses); ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
</a>
      <?php endif; ?>
      <!-- /.col -->

  <!-- /.col -->
      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isStaff')): ?>
      <a class="col-md-3 col-sm-6 col-xs-12 homelink" href="<?php echo e(route('files.index')); ?>">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-file-archive-o"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Uploaded files</span>
            <span class="info-box-number"><?php echo e($fileCount); ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
       </a>
      <?php endif; ?>
      <!-- /.col -->




      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>

      <a class="col-md-3 col-sm-6 col-xs-12 homelink" href="<?php echo e(route('roles.index')); ?> ">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="fa fa-user"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Roles</span>
            <span class="info-box-number"><?php echo e($roles); ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
</a>
    <!-- /.row -->

    <?php if(count($recentFiles) > 0): ?>
    <div class="row">
     <h5 class="ml-2"><small>RECENTLY UPLOADED FILES</small></h5>

    <?php $__currentLoopData = $recentFiles->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <div class="col-md-3">
    <div class="panel panel-default home-panel">
      <div class="panel-body">
      <div class="center-content">

        <?php if(in_array($file->extension, ['doc', 'docx'])): ?>
        <p><img src="<?php echo e(asset('images/icons/word.png')); ?>" width="40px" height="40px" alt/></p>
        <?php elseif(in_array($file->extension, ['pdf'])): ?>
        <p><img src="<?php echo e(asset('images/icons/pdf.png')); ?>" width="40px" height="40px" alt/></p>
        <?php elseif(in_array($file->extension, ['xls', 'xlsx'])): ?>
        <p><img src="<?php echo e(asset('images/icons/excel.png')); ?>" width="40px" height="40px" alt/></p>
        <?php elseif(in_array($file->extension, ['png', 'jpg', 'jpeg'])): ?>
        <p><img src="<?php echo e(asset('images/icons/image.png')); ?>" width="42px" height="42px" alt/></p>
        <?php endif; ?>
        <p class="text-center"><a href=<?php echo e(Storage::disk('public')->url($file->path)); ?>><small>
          <?php if(strlen($file->original_name) > 24): ?>
          <?php echo e(substr($file->original_name, 0, 24)); ?>...<?php echo e($file->extension); ?>

          <?php else: ?>
           <?php echo e($file->original_name); ?>

          <?php endif; ?>
        </small></a><br>
        <small><?php echo e(Helper::formatBytes($file->size)); ?></small></p>
      </div>
      </div>
      <div class="panel-footer">
      <small>Last accessed: 20 minutes ago</small>
      </div>
    </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php endif; ?>





     <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('isStaff')): ?>
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Monthly Expenses Report</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <div class="btn-group">
                <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-wrench"></i></button>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </div>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-8">
                <p class="text-center">
                  <strong>Expenses: 1 Jan, 2014 - 30 Jul, 2014</strong>
                </p>

                <div class="chart">
                  <!-- Sales Chart Canvas -->
                  <canvas id="salesChart" style="height: 140px;"></canvas>
                </div>
                <!-- /.chart-responsive -->
              </div>
              <!-- /.col -->
              <div class="col-md-4">
                <p class="text-center">
                  <strong>Role Completion</strong>
                </p>

                <div class="progress-group">
                  <span class="progress-text">Project Completion</span>
                  <span class="progress-number"><b>160</b>/200</span>

                  <div class="progress sm">
                    <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                  </div>
                </div>
                <!-- /.progress-group -->
                <div class="progress-group">
                  <span class="progress-text">Expenditure rate</span>
                  <span class="progress-number"><b>310</b>/400</span>

                  <div class="progress sm">
                    <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                  </div>
                </div>
                <!-- /.progress-group -->
                <div class="progress-group">
                  <span class="progress-text">Work Rate</span>
                  <span class="progress-number"><b>480</b>/800</span>

                  <div class="progress sm">
                    <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                  </div>
                </div>
                <!-- /.progress-group -->
                <div class="progress-group">
                  <span class="progress-text">Feedback Rate</span>
                  <span class="progress-number"><b>250</b>/500</span>

                  <div class="progress sm">
                    <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                  </div>
                </div>
                <!-- /.progress-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- ./box-body -->


          



          <div class="box-footer">
            <div class="row">
              <div class="col-sm-3 col-xs-6">
                <div class="description-block border-right">
                  
                  <h5 class="description-header"><?php echo e($expenses); ?></h5>
                  <span class="description-text">TOTAL Expenses</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-3 col-xs-6">
                <div class="description-block border-right">
                  
                  <h5 class="description-header"><?php echo e($employeeCount); ?></h5>
                  <span class="description-text">TOTAL staff</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-3 col-xs-6">
                <div class="description-block border-right">
                  
                  <h5 class="description-header"><?php echo e($departments); ?></h5>
                  <span class="description-text">TOTAL Departments</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->



              <div class="col-sm-3 col-xs-6">
                <div class="description-block">
                  <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
                  
                  <span class="description-text">Attendance Rate</span>
                </div>
              </div>


            </div>
            <!-- /.row -->
          </div>
          <!-- /.box-footer -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <?php endif; ?>

  </section>
  <!-- /.content --><?php /**PATH C:\laragon\www\office-all-in-one\resources\views/dashboard-content.blade.php ENDPATH**/ ?>