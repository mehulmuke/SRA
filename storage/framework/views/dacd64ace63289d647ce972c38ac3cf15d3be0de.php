<?php $__env->startSection('title', clean(trans('files::files.files_manager'))); ?>
<?php $__env->startSection('page-header'); ?>
    <div>
        <h2 class="text-white pb-2 fw-bold"><?php echo e(clean(trans('files::files.files_manager'))); ?></h2>
        <?php /* <h5 class="text-white op-7 mb-2">{{ clean(trans('files::files.upload_new_file')) }}</h5> */?>
    </div>
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('content'); ?>
    <?php
        $size=auth()->user()->file_size;
        if($size==''){
            $size=setting('default_file_size'); 
        }
    ?>
    
    
    <div class="row">
        <div class="col-md-12">
             <div class="card m-0">
                <div class="card-body">    
                    <div class="row">
                        <div class="col-md-3">
                            <div class="file-folder-tree-table"></div>
                        </div>
                        <div class="col-md-9 fft-table">
                            <ul class="breadcrumbs  upload-breadcrumbs pull-left">
                                <li class="nav-home">
                                    <a href="#">
                                        <i class="flaticon-home"></i>
                                    </a>
                                </li>
                                <span id="update">
                                </span>
                            </ul>
                            <ul class="fft-table upload-breadcrumbs pull-right">
                                <li class="nav-home"  data-toggle="tooltip" title="<?php echo e(clean(trans('files::files.download_folder'))); ?>">
                                    <a href="#" class="btn btn-primary btn-xs downloadFolder">
                                        <i class="fas fa-cloud-download-alt"></i>
                                    </a>
                                </li>
                             </ul>
                             
                             <div class="clearfix"></div>
                            <div><hr></div>
                             <?php if ($currentUser->hasAccess('admin.files.index')) : ?>
                             <div id="files-table">
                                <div class="table-responsive">
                                    <table class="display table table-striped table-hover" >
                                        <thead>
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
                                        </thead>
        
                                        <tbody></tbody>
                                     </table>
                                 
                                        <?php $__env->startPush('more-actions'); ?>
                                            <?php echo $__env->make('files::admin.files.include.more-actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php $__env->stopPush(); ?> 
                                  </div>
                             </div>
                                <?php endif; ?>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if ($currentUser->hasAccess('admin.files.create')) : ?>
        <?php echo $__env->make('files::admin.files.upload-file-popup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php if(setting('enable_ad1')): ?>
        <?php echo $__env->make('setting::admin.settings.advertisement',['ad'=>setting('ad_block_1')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?> 
    
    <?php if(setting('enable_ad2')): ?>
        <?php echo $__env->make('setting::admin.settings.advertisement',['ad'=>setting('ad_block_2')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    
<?php $__env->stopSection(); ?>



<?php $__env->startPush('general'); ?>
    <script>
    (function () {
        "use strict";
        
        CI.maxFileSize = "<?php echo e($size); ?>"
        CI.AllowExtensions = ".<?php echo e($fileExtension->implode(', .')); ?>"
        CI.langs['files::files.success_message'] = '<?php echo e(clean(trans('files::files.success_message'))); ?>';
        <?php if(!auth()->user()->isAdmin() && !setting('delete_assign_folder_files')): ?>
            CI.langs['admin::admin.delete.confirmation_message'] = '<?php echo e(clean(trans('admin::admin.delete.confirmation_message'))); ?>'+'\n<?php echo e(clean(trans('files::files.delete_note_for_user'))); ?>';
        <?php endif; ?>
    })();  
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
    
    (function () {
        "use strict";
        $(document).on('click','#upload-files2',function(){
              $("#btnNewFolder").hide();           
        });
        $('.file-folder-tree-table').on('changed.jstree', function (e, data) {
            var id=data.selected[0];
            
            var table = $("#files-table table").DataTable();
           
            var url="<?php echo route('admin.files.index');?>";

            if(id!=''){
               table.ajax.url(url+'?table=true&category='+id).load();
            }else{
            table.ajax.url(url+'?table=true').load();
            }
        });
        DataTable.setRoutes('#files-table .table', {
            index: '<?php echo e("admin.files.index"); ?>',
            
            <?php if ($currentUser->hasAccess("admin.files.edit")) : ?>
                
                edit: '<?php echo e("admin.files.edit"); ?>',
                
            <?php endif; ?>
            <?php if ($currentUser->hasAccess("admin.files.destroy")) : ?> 
                destroy: '<?php echo e("admin.files.destroy"); ?>',
            <?php endif; ?>
        });
        
        var btnHTML = '';
        var btnUploadfile = '';

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
            
        
             btnHTML='<div class="dropdown d-inline-block"><button class="btn btn-primary mr-2 btn-md dropdown-toggle" type="button" id="btn-moreAction" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" disabled="disabled"><?php echo e(clean(trans("files::files.table.action"))); ?></button><div class="dropdown-menu" aria-labelledby="btn-moreAction">'+btnShare+btnMoveFiles+btnDownloadZip+'</div></div>';
            
        <?php endif; ?>
        <?php if ($currentUser->hasAccess('admin.files.create')) : ?>

         btnUploadfile='<button type="button" id="upload-files2" data-toggle="modal" data-target="#fileuploadmodel" class="btn btn-primary file-upload-popup "><i class="fas fa-cloud-upload-alt"></i></button>';

        <?php endif; ?>

        DataTable.customBtn(btnHTML+btnUploadfile);
       
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

<?php echo $__env->make('admin::fullwidth-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sraservices_working\Modules/Files/Resources/views/admin/files/manager.blade.php ENDPATH**/ ?>