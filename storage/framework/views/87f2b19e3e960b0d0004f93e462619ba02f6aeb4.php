<div class="file-action">

<?php if(request()->type || request()->extension): ?>
    <button type="button" class="btn btn-icon btn-default btn-border btn-xs select-media "
        data-id="<?php echo e($media->id); ?>"
        data-path="<?php echo e($media->path); ?>"
        data-filename="<?php echo e($media->filename); ?>"
        data-type="<?php echo e(strtok($media->mime, '/')); ?>"
        data-icon="<?php echo e($media->icon()); ?>"
        data-toggle="tooltip"
        data-placement="bottom"
        title="<?php echo e(clean(trans('media::medias.select_this_media'))); ?>"
    >
       <i class="fas fa-file-medical"></i>
    </button>
<?php else: ?>
    <?php if($media->extension=='pdf'): ?> 
        <a class="btn btn-icon btn-default btn-border btn-xs" href="<?php echo e($media->path); ?>" data-fancybox="gallery" data-caption="<?php echo e($media->filename); ?>" data-type="iframe"  ><i class="fas fa-eye"></i></a>
    <?php elseif($media->isImage()): ?> 
        <a class="btn btn-icon btn-default btn-border btn-xs" href="<?php echo e($media->path); ?>" class="fancybox" data-fancybox="gallery" data-caption="<?php echo e($media->xs); ?>" ><i class="fas fa-eye"></i></a>
    <?php elseif($media->isVideo()): ?> 
        <a class="btn btn-icon btn-default btn-border btn-xs" data-fancybox="gallery" href="<?php echo e($media->path); ?>" data-caption="<?php echo e($media->filename); ?>"   data-width="640" data-height="360" ><i class="fas fa-eye"></i></a>
    <?php else: ?>
        
    <?php endif; ?>
<?php endif; ?>
</div><?php /**PATH /var/www/sraservices/Modules/Media/Resources/views/admin/media/include/action.blade.php ENDPATH**/ ?>