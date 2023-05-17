<?php $__env->startSection('title', clean(trans('user::auth.sign_in'))); ?>

<head>
  <!-- Favicons -->
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Dosis:300,400,500,,600,700,700i|Lato:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">
</head>
<header id="header">
    <div class="row"  style="padding:5px;background-color: #6610f2;margin-top: -19px;margin-bottom:10px;">
        <div class="col-md-12" style="text-align: right;">
          <?php $__currentLoopData = supported_locales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <a class="btn btn-xs btn-border btn-round" href="<?php echo e(localized_url($locale)); ?>" style="color: #fff;font-size:14px;"><?php echo e(clean($language['name'])); ?></a>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <!-- <a class="btn btn-xs btn-border btn-round" href="#" style="color: #fff;font-size:14px;">Marathi</a>
         <a class="btn btn-xs btn-border btn-round" href="#" style="color: #fff;font-size:14px;">English</a> -->
    </div>
    </div>
    <div class="container d-flex align-items-center justify-content-between">
    <div class="col-lg-1 col-4 text-left" >
      <a href="index.html" class="logo"><img src="/assets/img/logo_image.png" alt="" class="img-fluid" style="max-width:90%;"></a>
    </div>
    <div class="col-lg-9 col-12 text-left" style="border-left: 2px solid #a5a5a5;padding-left:10px;">
        

        <h2 style="color:#d70e2d"> Slum Rehabilitation Authority, Mumbai</h2>
        <!-- <h4 style="color:#d70e2d">Slum Rehabilitation Authority, Mumbai<h4/> -->
        <!-- <h5>Government of Maharashtra<h5/> -->
        <h6>Government of Maharashtra</h6>
    </div>
      <!-- Uncomment below if you prefer to use text as a logo -->
      <!-- <h1 class="logo"><a href="index.html">Butterfly</a></h1> -->
      <div class="col-lg-2 col-12 text-right">
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="https://www.maharashtra.gov.in/" target="_blank"><img src="/assets/img/mha_logo.png" class="mha_logs" onclick="return sitevisit();" alt="maharashtra.gov.in" title="maharashtra.gov.in"></a></li>
          <li><a href="https://www.india.gov.in/" target="_blank"><img src="/assets/img/embleem.png" class="emblem_logo" onclick="return sitevisit();" alt="Emblem" title="Emblem"></a></li>
          
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
  </div>
    </div>
  </header>
<?php $__env->startSection('content'); ?>
    <div class="container container-login">
        <?php echo $__env->make('admin::include.notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="text-center">
            <img src="/images/SRA-LOGO.jpg" alt="Logo">
        </div>
        <h3 class="text-center">Auto-Annexure - II</h3>

        <h3 class="text-center"><?php echo e(clean(trans('user::auth.sign_in'))); ?></h3>
        <div class="login-form">
            <form method="POST" action="<?php echo e(route('admin.login.post')); ?>">
                <?php echo e(csrf_field()); ?>

                
                <div class="form-group <?php echo e($errors->has('email') ? 'has-error': ''); ?>">
                    <!-- <label for="email"><?php echo e(clean(trans('user::auth.email'))); ?> <span class="required-label">*</span></label> -->
                    <label for="email"><?php echo e(clean(trans('user::auth.username'))); ?> <span class="required-label">*</span></label>
                    
                    <input type="text" name="email" value="<?php echo e(old('email')); ?>" class="form-control" id="email" placeholder="<?php echo e(clean(trans('user::attributes.users.username'))); ?>" autofocus>
                    <?php if($errors->has('email')): ?>
                        <span class="help-block"><?php echo e(clean($errors->first('email'))); ?></span>
                    <?php endif; ?>
                    
                </div>
                
                <div class="form-group <?php echo e($errors->has('password') ? 'has-error': ''); ?>">
					<label ><?php echo e(clean(trans('user::auth.password'))); ?> <span class="required-label">*</span></label>
					<a href="<?php echo e(route('admin.reset')); ?>" class="link float-right">
                        <?php echo e(clean(trans('user::auth.forgot_password'))); ?>

                    </a>
					<div class="position-relative">
						<input type="password" class="form-control" name="password" placeholder="<?php echo e(clean(trans('user::attributes.users.password'))); ?>">
						<div class="show-password">
							<i class="icon-eye"></i>
						</div>
					</div>
                    
                    <?php if($errors->has('password')): ?>
                        <span class="help-block"><?php echo e(clean($errors->first('password'))); ?></span>
                    <?php endif; ?>
				</div>
                
                
                <div class="form-group form-action-d-flex mb-3">
					<div class="custom-control custom-checkbox">
						<input type="hidden" name="remember_me" value="0">
                        <input type="checkbox" name="remember_me"  value="1" id="remember_me" class="custom-control-input">
						<label class="custom-control-label m-0" for="remember_me"><?php echo e(clean(trans('user::attributes.auth.remember_me'))); ?></label>
					</div>
                    
                    <button type="submit" class="btn btn-primary col-md-5 float-right mt-3 mt-sm-0 fw-bold" data-loading><?php echo e(clean(trans('user::auth.sign_in'))); ?></button>
                    
				</div>
                <?php if(setting('allow_registrations')): ?>
				<!-- <div class="login-account">
					<span class="msg"><?php echo e(clean(trans('user::auth.dont_have_an_account_yet'))); ?></span>
					<a href="<?php echo e(route('admin.register')); ?>" id="show-signup" class="link"><?php echo e(clean(trans('user::auth.sign_up'))); ?></a>
				</div> -->
                <?php endif; ?>
                <div class="clearfix"></div> 
                    <div class="social-login-buttons text-center">
                        <?php if(count(app('enabled_social_login_providers')) !== 0): ?>
                            <div class="hline btn-primary">
                                <span class="hline-innertext btn-primary"><?php echo e(clean(trans('user::auth.or'))); ?></span>
                            </div>
                            
                        <?php endif; ?>

                        <?php if(setting('facebook_login_enabled')): ?>
                            <a href="<?php echo e(route('admin.login.redirect', ['provider' => 'facebook'])); ?>" class="btn btn-facebook">
                                <i class="fab fa-facebook-f"></i>
                                <?php echo e(clean(trans('user::auth.log_in_with_facebook'))); ?>

                            </a>
                        <?php endif; ?>

                        <?php if(setting('google_login_enabled')): ?>
                            <a href="<?php echo e(route('admin.login.redirect', ['provider' => 'google'])); ?>" class="btn btn-google">
                                <i class="fab fa-google"></i>
                                <?php echo e(clean(trans('user::auth.log_in_with_google'))); ?>

                            </a>
                        <?php endif; ?>
                    </div>
                
                
            </form>
        </div>
        
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user::admin.auth.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/sra_annexure/Modules/User/Resources/views/admin/auth/login.blade.php ENDPATH**/ ?>