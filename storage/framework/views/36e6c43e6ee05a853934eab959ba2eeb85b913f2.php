<div class="row">
    <div class="col-md-4">
        <h4 for="select_folder"><?php echo e(clean(trans('files::files.form.select_folder'))); ?>

            <?php if ($currentUser->hasAccess('admin.folders.create')) : ?>
            <a href="#" class="btn btn-primary btn-sm" id="btnNewFolder" data-toggle="tooltip" title="<?php echo e(clean(trans('files::files.action.new_folder'))); ?>">
                <i class="fas fa-plus"></i> <?php echo e(clean(trans('files::files.action.new_folder'))); ?>

            </a>
            <?php endif; ?>
        </h4> 
        <div class="file-folder-tree"></div>
    </div>
    <div class="col-md-8 fftub">
        
        <ul class=" breadcrumbs upload-breadcrumbs pull-left">
            <li class="nav-home">
                <a href="#">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <span id="update">
            </span>
            
        </ul>
        <?php if(setting('enable_file_download')): ?>
        <ul class="upload-breadcrumbs pull-right">
            <li class="nav-home"  data-toggle="tooltip" title="<?php echo e(clean(trans('files::files.download_folder'))); ?>">
                <a href="#" class=" btn btn-primary btn-xs downloadFolder">
                    <i class="fas fa-cloud-download-alt"></i>
                </a>
            </li>
         </ul>
        <?php endif; ?>
        <div class="clearfix"></div>
        <div><hr></div>
        
        <form method="POST" class="dropzone dz-clickable">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" id="ufto" name="ufto" value="0" >
            <input type="hidden" id="uftop" name="uftop" value="" >
            <div class="dz-message" data-dz-message>
                <div class="icon">
                    <i class="flaticon-file"></i>
                </div>
                <h4 class="message"><?php echo e(clean(trans('files::files.drop_drop_here'))); ?></h4>
                
            </div>
            
            
        </form>
        <div>
            
            <span class="pull-left"> <strong><?php echo e(clean(trans('files::files.allow_extensions'))); ?>:</strong> .<?php echo e($fileExtension->implode(', .')); ?></span>
            <span class="pull-right"><strong><?php echo e(clean(trans('files::files.max_file_size'))); ?>:</strong> <?php echo e($size); ?> MB</span>
        </div>

    </div>
    
</div>

                    
               <?php /**PATH C:\xampp\htdocs\sraservices_working\Modules/Files/Resources/views/admin/files/include/upload.blade.php ENDPATH**/ ?>