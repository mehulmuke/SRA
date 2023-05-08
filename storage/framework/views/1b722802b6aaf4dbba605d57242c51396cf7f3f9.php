<?php $__env->startComponent('admin::include.page.header'); ?>
    <?php $__env->slot('title', clean(trans('setting::settings.settings'))); ?>
    
    <li class="nav-item"> <?php echo e(clean(trans('setting::settings.settings'))); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <form method="POST" action="<?php echo e(route('admin.settings.update')); ?>" class="form-horizontal" id="settings-edit-form" novalidate>
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('put')); ?>


            <?php echo $tabs->render(compact('settings')); ?>

        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sraservices_working\Modules/Setting/Resources/views/admin/settings/edit.blade.php ENDPATH**/ ?>