<?php $__env->startComponent('admin::include.page.header'); ?>
    <?php $__env->slot('title', clean(trans('files::files.files_extension'))); ?>
    
    <li class="nav-item"><a href="<?php echo e(route('admin.files.index')); ?>"><?php echo e(clean(trans('files::files.files'))); ?></a></li>
    <li class="separator">
        <i class="flaticon-right-arrow"></i>
    </li>
    <li class="nav-item"><?php echo e(clean(trans('files::files.files_extension'))); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startSection('content'); ?>
    
    <div class="row">
        <?php if ($currentUser->hasAccess('admin.files-extension.create')) : ?>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title"><?php echo e(clean(trans('files::files.add_files_extension'))); ?></h4>
                    </div>
                </div>
                <form method="POST" action="<?php echo e(route('admin.files-extension.store')); ?>" class="form-horizontal" id="files-extension-create-form">
                <?php echo e(csrf_field()); ?>

                    <div class="card-body">
                        <?php echo e(Form::text('name', clean(trans('files::files.table.name')), $errors, '', ['required' => true])); ?>

                        <?php echo e(Form::checkbox('assign_toall', clean(trans('files::files.form.assign_toall')), clean(trans('files::files.form.assign_toall_message_for_extension')), $errors,['assign_toall'=>1])); ?>

                        
                    </div>
                    <div class="card-action text-right">
                        <button type="submit" class="btn btn-primary" data-loading>
                        <?php echo e(clean(trans('admin::admin.buttons.save'))); ?>

                        </button>
                    </div>
                </form>
            </div>
        </div>
        <?php endif; ?>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title"><?php echo e(clean(trans('files::files.files_extension'))); ?></h4>
                        
                    </div>
                </div>
                <div class="card-body" id="files-extension-table">
                    <div class="table-responsive">
                        <table class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <?php echo $__env->make('admin::include.table.select-all',["name"=>clean(trans('files::files.files_extension'))], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <th><?php echo e(clean(trans('files::files.table.name'))); ?></th>
                                    <th><?php echo e(clean(trans('files::files.table.assign_toall'))); ?></th>
                                    <th data-sort><?php echo e(clean(trans('admin::admin.table.created'))); ?></th>
                                </tr>
                            </thead>
                        </table>
                       
                    </div>
                </div>
            </div>
        
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
    (function () {
        "use strict";
        DataTable.setRoutes('#files-extension-table .table', {
            index: '<?php echo e("admin.files-extension.index"); ?>',
            <?php if ($currentUser->hasAccess("admin.files-extension.destroy")) : ?>
                destroy: '<?php echo e("admin.files-extension.destroy"); ?>',
            <?php endif; ?>
        });
        new DataTable('#files-extension-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'name', name: 'name' },
                { data: 'assign_toall', name: 'assign_toall' },
                { data: 'created', name: 'created_at' },
            ],
        });
    })();  
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\sraservices\Modules/Files/Resources/views/admin/files_extension/index.blade.php ENDPATH**/ ?>