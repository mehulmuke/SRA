<?php $__env->startComponent('admin::include.page.header'); ?>
    <?php $__env->slot('title', clean(trans('user::roles.roles'))); ?>

    <li class="nav-item"><?php echo e(clean(trans('user::roles.roles'))); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('admin::include.page.table'); ?>
    <?php $__env->slot('title', clean(trans('user::roles.roles'))); ?>
    <?php $__env->slot('buttons', ['create']); ?>
    <?php $__env->slot('resource', 'roles'); ?>
    <?php $__env->slot('name', clean(trans('user::roles.role'))); ?>

    <?php $__env->slot('thead'); ?>
        <tr>
             <?php echo $__env->make('admin::include.table.select-all',["name"=>trans('user::users.user')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <th><?php echo e(clean(trans('user::roles.table.name'))); ?></th>
            <th><?php echo e(clean(trans('user::roles.table.slug'))); ?></th>
            <th data-sort><?php echo e(clean(trans('admin::admin.table.created'))); ?></th>
        </tr>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
    (function () {
        "use strict";
        new DataTable('#roles-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'name', name: 'name' },
                { data: 'slug', name: 'slug' },
                { data: 'created', name: 'created_at' },
            ]
        });
    })();
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\sraservices\Modules/User/Resources/views/admin/roles/index.blade.php ENDPATH**/ ?>