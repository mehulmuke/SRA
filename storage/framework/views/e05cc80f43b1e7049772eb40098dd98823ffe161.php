<?php $__env->startComponent('admin::include.page.header'); ?>
    <?php $__env->slot('title', clean(trans('user::users.users'))); ?>

    <li class="nav-item"><?php echo e(clean(trans('user::users.users'))); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('admin::include.page.table'); ?>
    <?php $__env->slot('title', clean(trans('user::users.users'))); ?>
    <?php $__env->slot('buttons', ['create']); ?>
    <?php $__env->slot('resource', 'users'); ?>
    <?php $__env->slot('name', clean(trans('user::users.user'))); ?>

    <?php $__env->slot('thead'); ?>
        <tr>
            <?php echo $__env->make('admin::include.table.select-all',["name"=>trans('user::users.user')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <th><?php echo e(clean(trans('user::users.table.profile_image'))); ?></th>
            <th><?php echo e(clean(trans('user::users.table.first_name'))); ?></th>
            <th><?php echo e(clean(trans('user::users.table.last_name'))); ?></th>
            <th><?php echo e(clean(trans('user::users.table.email'))); ?></th>
            <th><?php echo e(clean(trans('user::users.table.last_login'))); ?></th>
            <th><?php echo e(clean(trans('admin::admin.table.status'))); ?></th>
            <th data-sort><?php echo e(clean(trans('admin::admin.table.created'))); ?></th>
        </tr>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
    (function () {
        "use strict";
        new DataTable('#users-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'profile_image', orderable: false, searchable: false, width: '10%' },
                { data: 'first_name', name: 'first_name' },
                { data: 'last_name', name: 'last_name' },
                { data: 'email', name: 'email' },
                { data: 'last_login', name: 'last_login', searchable: false },
                { data: 'status', name: 'status',orderable: false, searchable: false },
                { data: 'created', name: 'created_at' },
            ]
        });
    })();
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/sraservices/Modules/User/Resources/views/admin/users/index.blade.php ENDPATH**/ ?>