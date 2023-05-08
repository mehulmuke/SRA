<!DOCTYPE html>
<html lang="<?php echo e(locale()); ?>">
<head>
    <meta charset="UTF-8">

    <title><?php echo e(clean(trans('media::medias.media_manager'))); ?></title>

    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    
    <!-- Fonts and icons -->
	<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900&display=swap" rel="stylesheet">

    <?php $__currentLoopData = $assets->allCss(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $css): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <link media="all" type="text/css" rel="stylesheet" href="<?php echo e(v($css)); ?>">
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php echo $__env->make('admin::include.general', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body data-background-color="bg3">
    <div class="wrapper overlay-sidebar">
        <div class="main-panel">
			<div class="">
                <div class="page-inner">
                    <?php echo $__env->make('media::admin.media.include.uploader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('media::admin.media.include.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>
    <script>
    (function () {
        "use strict";
        CI.maxFileSize = "<?php echo e((int) ini_get('upload_max_filesize')); ?>"
        CI.acceptedFiles = ".jpeg,.jpg,.png"
        CI.langs['media::medias.success_message'] = '<?php echo e(clean(trans('media::medias.success_message'))); ?>';
    })();  
    </script>
    <?php $__currentLoopData = $assets->allJs(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $js): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <script src="<?php echo e(v($js)); ?>"></script>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    <script>
        
        (function () {
            "use strict";
            DataTable.setRoutes('#media-table .table', {
                index: {
                    name: 'admin.media.index',
                    params: { type: '<?php echo e($type); ?>',extension: '<?php echo e($extension); ?>' }
                },
                
                <?php if ($currentUser->hasAccess("admin.media.edit")) : ?>
                    
                    edit: '<?php echo e("admin.media.edit"); ?>',
                    
                <?php endif; ?>
                <?php if ($currentUser->hasAccess("admin.media.destroy")) : ?> 
                    destroy: '<?php echo e("admin.media.destroy"); ?>',
                <?php endif; ?>
            });
            new DataTable('#media-table .table', {
                columns: [
                    { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                    { data: 'thumbnail', orderable: false, searchable: false, width: '10%' },
                    { data: 'filename', name: 'filename' },
                    <?php if(auth()->user()->isAdmin()): ?>
                    { data: 'uploader', name: 'uploader.first_name' },
                    <?php endif; ?>
                    { data: 'size', name: 'size', orderable: false,searchable: false,},
                    { data: 'extension', name: 'extension' },
                    { data: 'created', name: 'created_at' },
                    { data: 'action', name: 'action',orderable: false, searchable: false,className:"noclickable" },
                ],
            });
            
        })();   
        
    </script>
    
</body>
</html><?php /**PATH C:\xampp\htdocs\sraservices_working\Modules/Media/Resources/views/admin/media/manager.blade.php ENDPATH**/ ?>