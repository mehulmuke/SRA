<?php $__env->startComponent('admin::include.page.header'); ?>
    <?php $__env->slot('title', clean(trans('admin::resource.edit', ['resource' => trans('user::users.profile')]))); ?>
    <?php $__env->slot('subtitle', clean($currentUser->full_name)); ?>
    <li class="nav-item"><?php echo e(clean(trans('admin::resource.edit', ['resource' => trans('user::users.profile')]))); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <form method="POST" action="<?php echo e(route('admin.profile.update')); ?>" class="form-horizontal" id="profile-form" novalidate>
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('put')); ?>


            <?php echo $tabs->render(); ?>

        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\sraservices\Modules/User/Resources/views/admin/profile/edit.blade.php ENDPATH**/ ?>