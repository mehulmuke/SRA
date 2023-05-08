<?php $__env->startComponent('admin::include.page.header'); ?>
    <?php $__env->slot('title', clean(trans('files::files.files'))); ?>

    <li class="nav-item"><?php echo e(clean(trans('files::files.files'))); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('admin::include.page.table'); ?>
    <?php $__env->slot('title', clean(trans('files::files.files_management'))); ?>
    <?php $__env->slot('resource', 'files'); ?>
    <?php $__env->slot('name', clean(trans('files::files.files'))); ?>

    <?php $__env->slot('thead'); ?>
        <tr>
            <?php echo $__env->make('admin::include.table.select-all',["name"=>clean(trans('files::files.files'))], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <th><?php echo e(clean(trans('files::files.table.file'))); ?></th>
            <th><?php echo e(clean(trans('files::files.table.name'))); ?></th>
            <th><?php echo e(clean(trans('files::files.table.size'))); ?></th>
            <th><?php echo e(clean(trans('files::files.table.folder'))); ?></th>
            <th><?php echo e(clean(trans('files::files.table.user'))); ?></th>
            <th data-sort><?php echo e(clean(trans('admin::admin.table.created'))); ?></th>
            <th><?php echo e(clean(trans('files::files.table.action'))); ?></th>
        </tr>
    <?php $__env->endSlot(); ?>
    <?php $__env->startPush('more-actions'); ?>
        <?php if ($currentUser->hasAccess('admin.files.create')) : ?>
            <?php echo $__env->make('files::admin.files.upload-file-popup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php echo $__env->make('files::admin.files.include.more-actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopPush(); ?>
    
<?php echo $__env->renderComponent(); ?>




<?php $__env->startPush('scripts'); ?>
    <script>
    (function () {
        "use strict";
        
        <?php if(!auth()->user()->isAdmin() && !setting('delete_assign_folder_files')): ?>
            CI.langs['admin::admin.delete.confirmation_message'] = '<?php echo e(clean(trans('admin::admin.delete.confirmation_message'))); ?>'+'\n<?php echo e(clean(trans('files::files.delete_note_for_user'))); ?>';
        <?php endif; ?>
        var btnUploadfile = '';
        var btnHTML = '';
        <?php if(setting('enable_file_download') || setting('enable_file_move') || setting('enable_file_share')): ?>
            var btnShare='';
            var btnDownloadZip='';
            var btnMoveFiles='';

            <?php if(setting('enable_file_download')): ?>
                var btnDownloadZip='<a class="dropdown-item btn-moreaction" href="#" id="btnDownloadZip"><i class="fas fa-download"></i> <?php echo e(clean(trans("files::files.action.download_zip"))); ?></a>';
            <?php endif; ?>
            <?php if(setting('enable_file_move')): ?>
                var btnMoveFiles='<a class="dropdown-item btn-moreaction" href="#" id="btnMove"><i class="fas fa-cut"></i> <?php echo e(clean(trans("files::files.action.move_files"))); ?></a>';
            <?php endif; ?>
            <?php if(setting('enable_file_share')): ?>
                var btnShare='<a class="dropdown-item" href="#" id="btnShare"><i class="fas fa-share-square"></i> <?php echo e(clean(trans("files::files.action.share"))); ?></a>';
            <?php endif; ?>
            
        
            btnHTML='<div class="dropdown d-inline-block"><button class="btn btn-primary dropdown-toggle" type="button" id="btn-moreAction" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" disabled="disabled"><?php echo e(clean(trans("files::files.table.action"))); ?></button><div class="dropdown-menu" aria-labelledby="btn-moreAction">'+btnShare+btnMoveFiles+btnDownloadZip+'</div></div>';
            
        <?php endif; ?>

        <?php if ($currentUser->hasAccess('admin.files.create')) : ?>

        btnUploadfile='<button type="button" id="upload-files" data-toggle="modal" data-target="#fileuploadmodel" class="btn btn-primary m-2"><i class="fas fa-cloud-upload-alt"></i></button>';
    
        <?php endif; ?>

        DataTable.customBtn(btnHTML+btnUploadfile);
        
        $(document).on('click','#upload-files',function(){
              $("#btnNewFolder").hide();           
        });
        new DataTable('#files-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'thumbnail', orderable: false, searchable: false, width: '10%' },
                { data: 'filename', name: 'filename' },
                { data: 'size', name: 'size', orderable: false,searchable: false,},
                { data: 'folder_name', name: 'path' },
                { data: 'uploader', name: 'uploader.first_name' },
                { data: 'created', name: 'created_at' },
                { data: 'action', name: 'action',orderable: false, searchable: false,className:"noclickable" },
            ],
        });
    })();  
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\sraservices\Modules/Files/Resources/views/admin/files/index.blade.php ENDPATH**/ ?>