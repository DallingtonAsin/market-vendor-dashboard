

<?php $__env->startSection('content'); ?>
<div class="login-box">
      <div class="login-logo">
        <span>
        </span>
      </div>
      <div class="login-box-body">
            <div class="header nunito-fontjustify-content-center ">
                <div class="row justify-content-center">
                  <?php if(isset($companyData) && isset($companyData['logo'])): ?>
                  <img src="<?php echo e(asset('uploads/images/company/logo/'.$companyData['logo'].'')); ?>" class="co-icon-center" alt="">
                  <?php else: ?>
                 <img src="<?php echo e(asset('images/icons/default/brand.png')); ?>" class="co-icon-center"> 
                  <?php endif; ?>
                </div>
          
                <div class="row justify-content-center">
              <label class="col-form-label text-dark text-md-center font-weight-bold">
                <?php if(isset($companyData)): ?>
               <?php echo e($companyData['name']); ?>

               <?php else: ?>
               <?php echo e(env('APP_NAME')); ?>

               <?php endif; ?>
             
             </label>
                </div>
            </div>


        <p class="login-box-msg">Sign in to start your session</p>
        
        
        <form class="form-horizontal mx-4" role="form" method="POST" action="<?php echo e(route('authenticate')); ?>">
          <?php echo csrf_field(); ?>
          <div class="form-group has-feedback">
            <input type="text" name="username" class="form-control" placeholder="Enter your email or username">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Enter your password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          
          
          
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox"
              name="remember" id="remember" <?php echo e(old("remember") ? 'checked' : ''); ?>>
              <span class="form-check-label" for="remember">
                <?php echo e(__('Remember me')); ?>

              </span>
            </div>
          </div>
          
          
          <div class="row">
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
          </div>
          <br/>
          
          <div class="form-group px-0 py-0">
            <?php if($errors->any()): ?>
            <span class="login-error nunito-font">
              <span><?php echo e($errors->first()); ?></span>
            </span>
            <?php endif; ?>
            
            <?php if(session()->get('loginErr')): ?>
            <span class="login-error nunito-font">
              <?php echo e(session()->get('loginErr')); ?>

            </span>
            <?php endif; ?>
            
            <?php if(session()->get('sessionExpiredMessage')): ?>
            <span class="login-error nunito-font">
              <?php echo e(session()->get('sessionExpiredMessage')); ?>

            </span>
            <?php endif; ?>
            
          </div>
          
          <?php if(count($errors) > 0): ?>
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="alert alert-danger display-hiden pt-2">
            <button class="close" data-close="alert"></button>
            <span><?php echo e($message); ?></span>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </form>
        
      </div>
      <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\parkpro-dashboard\resources\views/auth/login.blade.php ENDPATH**/ ?>