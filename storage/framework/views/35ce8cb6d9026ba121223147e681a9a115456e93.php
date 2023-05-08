<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Cynoinfotech | Welcome to Installation and Setup Wizard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
    <!-- Font-->
    
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
    
    <link rel="stylesheet" href="<?php echo e(asset('installer/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('installer/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('installer/css/styles.css')); ?>">
    
    
</head>
<body>
    <div class="image-container set-full-height">
        <!--   Big container   -->
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-8 col-sm-offset-2">
		            <!-- Wizard container -->
		            <div class="wizard-container">
		                <div class="card wizard-card" data-color="red" id="wizard">
		                    <form method="POST" action="<?php echo e(request()->is('installer/configuration') ? url('installer/configuration') : '#'); ?>" >
                            <?php echo e(csrf_field()); ?>

		                    	<div class="wizard-header">
		                        	<h3 class="wizard-title">
		                        		CynoInfotech Installer
		                        	</h3>
									
		                    	</div>
						
                                <div class="wizard-navigation">
									<ul class="nav nav-pills">
			                            <li class="active">
                                            <a href="#"><i class="fa fa-home"></i> Welcome</a>
                                            <?php if(request()->is('installer/index')): ?>
                                                <div class="moving-tab"><i class="fa fa-home"></i> Welcome</div>
                                            <?php endif; ?>
                                        </li>
			                            <li>
                                            <a href="#"><i class="fa fa-server"></i> Requirements</a>
                                            <?php if(request()->is('installer/requirements')): ?>
                                                <div class="moving-tab"><i class="fa fa-server"></i>Requirements</div>
                                            <?php endif; ?>
                                        </li>
			                            <li>
                                            <a href="#"><i class="fa fa-cogs"></i> Configuration</a>
                                            <?php if(request()->is('installer/configuration')): ?>
                                                <div class="moving-tab"><i class="fa fa-cogs"></i> Configuration</div>
                                            <?php endif; ?>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-check-square-o"></i> Complete</a>
                                            <?php if(request()->is('installer/complete')): ?> 
                                            <div class="moving-tab"><i class="fa fa-check-square-o"></i> Complete</div>
                                            <?php endif; ?>
                                        </li>
			                        </ul>
								</div>
                                <?php echo $__env->yieldContent('content'); ?>
                            </form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
	    	</div> <!-- row -->
		</div> <!--  big container -->

	</div>
    
	
    <script src="<?php echo e(asset('installer/js/jquery-3.3.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('installer/js/bootstrap.min.js')); ?>"></script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH F:\laragon\www\sraservices\resources\views/installer/layout.blade.php ENDPATH**/ ?>