<!DOCTYPE html>
<html lang="<?php echo e(locale()); ?>">
<head>
    <base href="<?php echo e(url('/')); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
    
	

	<!-- Fonts and icons -->
	<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900&display=swap" rel="stylesheet">
    
    <?php $__currentLoopData = $assets->allCss(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $css): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <link media="all" type="text/css" rel="stylesheet" href="<?php echo e(v($css)); ?>">
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	<?php echo $__env->make('admin::include.general', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <style>
      .logo-img {
  height: 40px; /* set the height */
  width: auto; /* set the width to auto for responsiveness */
  max-width: 100%; /* set the maximum width */
}
.bg-light {
    background-color: #0c77e3!important;
}
.navbar[class*=bg-] .btn-toggle {
    background: hsla(0,0%,7%,.25)!important;
    color: #f8f9fa!important;
}
/* media (min-width: 768px) */
.ml-md-auto, .mx-md-auto {
    margin-left: 80%!important;
}
    </style>
</head>
<body data-background-color="<?php echo e(setting('theme_background_color','bg1')); ?>">
	<div class="wrapper sidebar_minimize">
        <!-- Main Header -->
        <header class="main-header">
       
            <div class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a href="<?php echo e(url('/')); ?>" class="navbar-brand d-flex align-items-center">
                        <img src="/images/SRA-LOGO.jpg" alt="<?php echo e(setting('site_name')); ?>" class="logo-img">
                        
                    </a>
                    <!-- <a href="<?php echo e(route('admin.dashboard.index')); ?>" class="logo">
                        <?php if(is_null(get_site_logo())): ?>
                            <h2 class="navbar-brand title">Slum Rehabilitation Authority , Auto-Annexure - II</h2>
                        <?php else: ?>
                            <img src="<?php echo e(get_site_logo()); ?>" alt="<?php echo e(setting('site_name')); ?>" class="navbar-brand">
                        <?php endif; ?>
                    </a>  -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarContent">
                        <!-- Navigation Menu -->
                        <?php echo $__env->make('admin::include.header',['fullwidth'=>false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <!-- End Navigation Menu -->
            
     
                    </div>
                </div>
            </div>
        </header>
        
		    <!-- End Main Header -->

            <!-- Sidebar -->
             <?php echo $__env->make('admin::include.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
             <!-- End Sidebar -->
		
    
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                    <div class="page-header">
                        <?php echo $__env->yieldContent('page-header'); ?>
                    </div>
                    <div class="row">
                        <?php echo $__env->make('admin::include.notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    
                     <?php echo $__env->yieldContent('content'); ?>
                    
                </div>
			</div>
             
			<footer class="footer">
				<div class="container-fluid">
                    <?php echo $__env->make('admin::include.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>	
				</div>
			</footer>
		</div>
		<?php echo $__env->yieldPushContent('more-actions'); ?>
	</div>
	
    <?php $__currentLoopData = $assets->allJs(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $js): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <script src="<?php echo e(v($js)); ?>"></script>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    <?php if(setting('custom_js',null,0)!=''): ?>
    <script>
        <?php echo setting('custom_js',null,0); ?>

    </script>
    <?php endif; ?>
    
    <?php echo $__env->yieldPushContent('scripts'); ?>
    
</body>
</html>
<?php /**PATH /var/www/sra_annexure/Modules/Admin/Resources/views/layout.blade.php ENDPATH**/ ?>