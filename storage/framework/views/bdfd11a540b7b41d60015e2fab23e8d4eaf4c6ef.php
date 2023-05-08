<div class="modal fade" id="fileuploadmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3> <?php echo e(clean(trans('files::files.upload_files'))); ?></h3>
                <button type="button" class="close float-left" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                    $size=auth()->user()->file_size;
                    if($size==''){
                        $size=setting('default_file_size'); 
                    }

                ?>
        
                <?php if ($currentUser->hasAccess('admin.files.create')) : ?>
                <div class="row" id="upload-file">
                    <div class="col-md-12">
                        <div class="card m-0">
                            <div class="card-body">    
                            <?php echo $__env->make('files::admin.files.include.upload',["size"=>$size], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(clean(trans('files::files.action.close'))); ?></button>
            </div>
        </div>
    </div>
</div>
<?php $__env->startPush('general'); ?>
    <script>
    (function () {
        "use strict";
        CI.maxFileSize = "<?php echo e($size); ?>"
        CI.AllowExtensions = ".<?php echo e($fileExtension->implode(', .')); ?>"
        CI.langs['files::files.success_message'] = '<?php echo e(clean(trans('files::files.success_message'))); ?>';
    })();  
    </script>
<?php $__env->stopPush(); ?><?php /**PATH F:\laragon\www\sraservices_working\Modules/Files/Resources/views/admin/files/upload-file-popup.blade.php ENDPATH**/ ?>