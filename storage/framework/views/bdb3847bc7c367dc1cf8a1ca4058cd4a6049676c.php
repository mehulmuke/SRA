<?php $__env->startSection('title', clean(trans('admin::dashboard.dashboard'))); ?>

<?php $__env->startSection('page-header'); ?>
    <h4 class="page-title"><?php echo e(clean(trans('admin::dashboard.dashboard'))); ?></h4>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <?php if ($currentUser->hasAccess('admin.files.index')) : ?>
        <?php echo $__env->make('admin::dashboard.include.files', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php if ($currentUser->hasAccess('admin.users.index')) : ?>
        <?php echo $__env->make('admin::dashboard.include.users', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php if ($currentUser->hasAccess('admin.files.index')) : ?>
        <?php echo $__env->make('admin::dashboard.include.most-download', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sraservices_working\Modules/Admin/Resources/views/dashboard/index.blade.php ENDPATH**/ ?>