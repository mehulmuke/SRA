<div class="avatar-holder">
    <?php if($file->isImage()): ?>
        <img src="<?php echo e($file->path); ?>">
    <?php else: ?>
        <i class="file-icon fa <?php echo e($file->icon()); ?>"></i>
    <?php endif; ?>
</div><?php /**PATH /var/www/sraservices/Modules/Admin/Resources/views/include/table/thumbnail.blade.php ENDPATH**/ ?>