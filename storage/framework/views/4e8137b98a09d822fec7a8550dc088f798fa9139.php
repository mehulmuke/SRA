<?php $__env->startSection('title', clean(trans('user::auth.reset_password'))); ?>

<?php $__env->startSection('content'); ?>
    <div class="container container-login">
        <?php echo $__env->make('admin::include.notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <h3 class="text-center"><?php echo e(clean(trans('user::auth.reset_password'))); ?></h3>
        <p class="text-center"><?php echo e(clean(trans('user::auth.enter_email'))); ?></p>
        
        <form method="POST" action="<?php echo e(route('admin.reset.post')); ?>">
            <?php echo e(csrf_field()); ?>

            <div class="form-group <?php echo e($errors->has('email') ? 'has-error': ''); ?>">
                
                <input type="text" name="email" value="<?php echo e(old('email')); ?>" class="form-control" placeholder="<?php echo e(clean(trans('user::attributes.users.email'))); ?>" autofocus>
                <?php if($errors->has('email')): ?>
                    <span class="help-block error"><?php echo e(clean($errors->first('email'))); ?></span>
                <?php endif; ?>
            </div>
            
            <div class="row form-action">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary col-md-12 fw-bold" data-loading><?php echo e(clean(trans('user::auth.reset_password'))); ?></button>
                </div>
            </div>
            <div class="login-account">
                <span class="msg"><?php echo e(clean(trans('user::auth.i_remembered_my_password'))); ?></span>
                <a href="<?php echo e(route('admin.login')); ?>" id="show-signup" class="link"><?php echo e(clean(trans('user::auth.sign_in'))); ?></a>
            </div>
        </form>
    </div>    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user::admin.auth.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sraservices_working\Modules/User/Resources/views/admin/auth/reset/index.blade.php ENDPATH**/ ?>