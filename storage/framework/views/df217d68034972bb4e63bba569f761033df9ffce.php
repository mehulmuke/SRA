<div class="row">
    <div class="col-md-12">
         <div class="card">
            <div class="card-body">    
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" class="dropzone dz-clickable">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" id="ufto" name="ufto" value="0" >
                            <div class="dz-message" data-dz-message>
                                <div class="icon">
                                    <i class="flaticon-file"></i>
                                </div>
                                <h4 class="message"><?php echo e(clean(trans('media::medias.drop_drop_here'))); ?></h4>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $__env->startPush('general'); ?>
    <script>
    (function () {
        "use strict";
        CI.maxFileSize = "<?php echo e((int) ini_get('upload_max_filesize')); ?>"
        CI.acceptedFiles = ".jpeg,.jpg,.png"
        CI.langs['media::medias.success_message'] = '<?php echo e(clean(trans('media::medias.success_message'))); ?>';
    })();  
    </script>
<?php $__env->stopPush(); ?><?php /**PATH F:\laragon\www\sraservices\Modules/Media/Resources/views/admin/media/include/uploader.blade.php ENDPATH**/ ?>