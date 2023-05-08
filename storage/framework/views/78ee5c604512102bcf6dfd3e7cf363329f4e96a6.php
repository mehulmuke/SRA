<?php $__env->startComponent('admin::include.page.header'); ?>
    <?php $__env->slot('title', clean(trans('admin::resource.edit', ['resource' => trans('user::users.user')]))); ?>
    <?php $__env->slot('subtitle', $user->full_name); ?>
    <li class="nav-item"><a href="<?php echo e(route('admin.users.index')); ?>"><?php echo e(clean(trans('user::users.users'))); ?></a></li>
    <li class="separator"><i class="flaticon-right-arrow"></i></li>
    <li class="nav-item"><?php echo e(clean(trans('admin::resource.edit', ['resource' => trans('user::users.user')]))); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <form method="POST" action="<?php echo e(route('admin.users.update', $user)); ?>" class="form-horizontal" id="user-edit-form" novalidate>
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('put')); ?>


            <?php echo $tabs->render(compact('user')); ?>

        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\sraservices_working\Modules/User/Resources/views/admin/users/edit.blade.php ENDPATH**/ ?>