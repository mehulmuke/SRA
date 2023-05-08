<div class="form-group row ">
    <label for="about" class="col-md-4 text-left">
        <?php echo e($title); ?>

    </label>
    <div class="single-image-wrapper col-md-8 p-0">
        
        
        <div class="single-image image-holder-wrapper  pull-left  ">
            <?php if(! $media->exists): ?>
                <div class="image-holder placeholder">
                    <i class="fas fa-camera-retro"></i>
                </div>
            <?php else: ?>
                <div class="image-holder">
                    <img src="<?php echo e($media->path); ?>">
                    <button type="button" class="btn remove-image" data-input-name="<?php echo e($inputName); ?>"></button>
                    <input type="hidden" name="<?php echo e($inputName); ?>" value="<?php echo e($media->id); ?>">
                </div>
            <?php endif; ?>
        </div>
        <button type="button" class="image-picker btn btn-default btn-border pull-left clearfix" data-input-name="<?php echo e($inputName); ?>">
            <i class="fas fa-folder-open mr-2"></i> <?php echo e(clean(trans('media::medias.browse'))); ?>

        </button>
        <div class="clearfix"></div>
        <span class="help">
        <?php echo e($help ?? ''); ?>

    </span>
    </div>
    
</div><?php /**PATH C:\xampp\htdocs\sraservices_working\Modules/Media/Resources/views/admin/image_picker/single.blade.php ENDPATH**/ ?>