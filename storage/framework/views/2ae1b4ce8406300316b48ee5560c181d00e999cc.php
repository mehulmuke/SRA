<?php $__env->startComponent('admin::include.page.header'); ?>
    <?php $__env->slot('title', clean(trans('admin::resource.create', ['resource' => trans('user::roles.roles')]))); ?>
    
    <li class="nav-item"><a href="<?php echo e(route('admin.roles.index')); ?>"><?php echo e(clean(trans('user::roles.roles'))); ?></a></li>
    <li class="separator"><i class="flaticon-right-arrow"></i></li>
    <li class="nav-item"><?php echo e(clean(trans('admin::resource.create', ['resource' => trans('user::roles.role')]))); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12"> 
        <form method="POST" action="<?php echo e(route('admin.roles.store')); ?>" class="form-horizontal" id="role-create-form" novalidate>
            <?php echo e(csrf_field()); ?>


            <?php echo $tabs->render(compact('role')); ?>

        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\sraservices_working\Modules/User/Resources/views/admin/roles/create.blade.php ENDPATH**/ ?>