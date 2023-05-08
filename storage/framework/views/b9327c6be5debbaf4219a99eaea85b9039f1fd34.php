<?php $__env->startComponent('admin::include.page.header'); ?>
    <?php $__env->slot('title', clean(trans('admin::sra.sralogs'))); ?>
    <li class="nav-item">
        <a href="#">
            <?php echo e(clean(trans('admin::sra.sralogs'))); ?>

        </a>
    </li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title"><?php echo e(clean(trans('admin::sra.sralogs'))); ?></h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive" id="sra-table">
                        <table class="display table table-striped table-hover translations-table">
                            <thead>
                                <tr>
                                    <th data-sort><?php echo e(clean(trans('admin::sra.table.id'))); ?></th>
                                    <th><?php echo e(clean(trans('admin::sra.table.user'))); ?></th>
                                    <th><?php echo e(clean(trans('admin::sra.table.activity'))); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        DataTable.setRoutes('#sra-table .table', {
                index: '<?php echo e("admin.sra.index"); ?>',
        });
        
        new DataTable('#sra-table .table', {
            columns: [
                { data: 'id', name: 'id' },
                { data: 'description', name: 'description' ,orderable: false},
                { data: 'created_at', name: 'created_at' },
            ],
            searching: false
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\sraservices\Modules/Admin/Resources/views/sra/index.blade.php ENDPATH**/ ?>