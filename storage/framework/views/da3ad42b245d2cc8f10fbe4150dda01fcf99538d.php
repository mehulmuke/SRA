<?php $__env->startComponent('admin::include.page.header'); ?>
    <?php $__env->slot('title', clean(trans('media::medias.medias'))); ?>

    <li class="nav-item"><?php echo e(clean(trans('media::medias.medias'))); ?></li>
<?php echo $__env->renderComponent(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('media::admin.media.include.uploader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('media::admin.media.include.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    
    (function () {
        "use strict";
        DataTable.setRoutes('#media-table .table', {
            index: '<?php echo e("admin.media.index"); ?>',
            
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\sraservices\Modules/Media/Resources/views/admin/media/index.blade.php ENDPATH**/ ?>