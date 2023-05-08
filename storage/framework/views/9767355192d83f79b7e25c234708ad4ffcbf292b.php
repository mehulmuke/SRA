<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body" id="media-table">
                <div class="table-responsive">
                   
                        <table class="display table table-striped table-hover" >
                            <thead>
                                 <tr>
                                    <?php echo $__env->make('admin::include.table.select-all',["name"=>clean(trans('media::medias.medias'))], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <th><?php echo e(clean(trans('media::medias.table.media'))); ?></th>
                                    <th><?php echo e(clean(trans('media::medias.table.name'))); ?></th>
                                    <?php if(auth()->user()->isAdmin()): ?>
                                    <th><?php echo e(clean(trans('files::files.table.user'))); ?></th>
                                    <?php endif; ?>
                                    <th><?php echo e(clean(trans('media::medias.table.size'))); ?></th>
                                    <th><?php echo e(clean(trans('media::medias.table.extension'))); ?></th>
                                    <th data-sort><?php echo e(clean(trans('admin::admin.table.created'))); ?></th>
                                    <th><?php echo e(clean(trans('media::medias.table.action'))); ?></th>
                                </tr>
                            </thead>

                            <tbody></tbody>
                        </table>
                </div>
            </div>
        </div>
    
    </div>
</div><?php /**PATH /var/www/sraservices/Modules/Media/Resources/views/admin/media/include/table.blade.php ENDPATH**/ ?>