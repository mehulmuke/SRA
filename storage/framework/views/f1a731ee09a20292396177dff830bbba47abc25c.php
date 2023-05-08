<?php $__env->startComponent('admin::include.page.header'); ?>
    <?php $__env->slot('title', clean(trans('admin::resource.create', ['resource' => trans('user::users.user')]))); ?>
    
    <li class="nav-item"><a href="<?php echo e(route('admin.users.index')); ?>"><?php echo e(clean(trans('user::users.users'))); ?></a></li>
    <li class="separator"><i class="flaticon-right-arrow"></i></li>
    <li class="nav-item"><?php echo e(clean(trans('admin::resource.create', ['resource' => trans('user::users.user')]))); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">    
        <form method="POST" action="<?php echo e(route('admin.users.store')); ?>" class="form-horizontal" id="user-create-form" novalidate>
            <?php echo e(csrf_field()); ?>


            <?php echo $tabs->render(compact('user')); ?>

        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\sraservices\Modules/User/Resources/views/admin/users/create.blade.php ENDPATH**/ ?>