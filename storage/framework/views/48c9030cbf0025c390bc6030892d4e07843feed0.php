<?php $__env->startComponent('admin::include.page.header'); ?>
    <?php $__env->slot('title', clean(trans('files::files.files'))); ?>

    <li class="nav-item"><a href="<?php echo e(route('admin.files.index')); ?>"><?php echo e(clean(trans('files::files.files'))); ?></a></li>
    <li class="separator">
        <i class="flaticon-right-arrow"></i>
    </li>
    <li class="nav-item"><?php echo e(clean(trans('files::files.upload'))); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
             <div class="card">
                <div class="card-body">    
                <?php
                    $size=auth()->user()->file_size;
                    if($size==''){
                        $size=setting('default_file_size'); 
                    }
                ?>
                <?php echo $__env->make('files::admin.files.include.upload',["size"=>$size], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php $__env->startPush('more-actions'); ?>
                    <?php echo $__env->make('files::admin.files.include.more-actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php $__env->stopPush(); ?>                
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('general'); ?>
    <script>
    (function () {
        "use strict";
        CI.maxFileSize = "<?php echo e($size); ?>"
        CI.AllowExtensions = ".<?php echo e($fileExtension->implode(', .')); ?>"
        CI.langs['files::files.success_message'] = '<?php echo e(clean(trans('files::files.success_message'))); ?>';
    })();  
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\sraservices\Modules/Files/Resources/views/admin/files/create.blade.php ENDPATH**/ ?>