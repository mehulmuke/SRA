<?php $__env->startComponent('admin::include.page.header'); ?>
    <?php $__env->slot('title', clean(trans('admin::activity.activitylogs'))); ?>
    <li class="nav-item">
        <a href="#">
            <?php echo e(clean(trans('admin::activity.activitylogs'))); ?>

        </a>
    </li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title"><?php echo e(clean(trans('admin::activity.activitylogs'))); ?></h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive" id="activity-table">
                        <table class="display table table-striped table-hover translations-table">
                            <thead>
                                <tr>
                                    <th data-sort><?php echo e(clean(trans('admin::activity.table.id'))); ?></th>
                                    <th><?php echo e(clean(trans('admin::activity.table.user'))); ?></th>
                                    <th><?php echo e(clean(trans('admin::activity.table.activity'))); ?></th>
                                    <th ><?php echo e(clean(trans('admin::activity.table.log_time'))); ?></th>
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
        DataTable.setRoutes('#activity-table .table', {
                index: '<?php echo e("admin.activity.index"); ?>',
        });
        
        new DataTable('#activity-table .table', {
            columns: [
                { data: 'id', name: 'id' },
                { data: 'user', name: 'user' ,orderable: false,searchable: false},
                { data: 'description', name: 'description' ,orderable: false},
                { data: 'created_at', name: 'created_at' },
            ],
            searching: false
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\sraservices\Modules/Admin/Resources/views/activity/index.blade.php ENDPATH**/ ?>