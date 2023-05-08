<?php $__env->startComponent('admin::include.page.header'); ?>
    <?php $__env->slot('title', clean(trans('admin::resource.edit', ['resource' => trans('user::roles.role')]))); ?>
    <?php $__env->slot('subtitle', $role->name); ?>
    
    <li class="nav-item"><a href="<?php echo e(route('admin.roles.index')); ?>"><?php echo e(clean(trans('user::roles.roles'))); ?></a></li>
    <li class="separator"><i class="flaticon-right-arrow"></i></li>
    <li class="nav-item"><?php echo e(clean(trans('admin::resource.edit', ['resource' => trans('user::roles.role')]))); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12"> 
        <form method="POST" action="<?php echo e(route('admin.roles.update', $role)); ?>" class="form-horizontal" id="role-edit-form" novalidate>
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('put')); ?>


            <?php echo $tabs->render(compact('role')); ?>

        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\sraservices\Modules/User/Resources/views/admin/roles/edit.blade.php ENDPATH**/ ?>