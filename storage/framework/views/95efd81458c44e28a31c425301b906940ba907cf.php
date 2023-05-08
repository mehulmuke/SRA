<?php $__env->startSection('title', clean(trans('user::auth.sign_in'))); ?>

<?php $__env->startSection('content'); ?>
    <div class="container container-login">
        <?php echo $__env->make('admin::include.notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <h3 class="text-center"><?php echo e(clean(trans('user::auth.sign_in'))); ?></h3>
        <div class="login-form">
            <form method="POST" action="<?php echo e(route('admin.login.post')); ?>">
                <?php echo e(csrf_field()); ?>

                
                <div class="form-group <?php echo e($errors->has('email') ? 'has-error': ''); ?>">
                    <label for="email"><?php echo e(clean(trans('user::auth.email'))); ?> <span class="required-label">*</span></label>

                    <input type="text" name="email" value="<?php echo e(old('email')); ?>" class="form-control" id="email" placeholder="<?php echo e(clean(trans('user::attributes.users.email'))); ?>" autofocus>
                    <?php if($errors->has('email')): ?>
                        <span class="help-block"><?php echo e(clean($errors->first('email'))); ?></span>
                    <?php endif; ?>
                    
                </div>
                
                <div class="form-group <?php echo e($errors->has('password') ? 'has-error': ''); ?>">
					<label for="password" class="placeholder"><?php echo e(clean(trans('user::auth.password'))); ?> <span class="required-label">*</span></label>
					<a href="<?php echo e(route('admin.reset')); ?>" class="link float-right">
                        <?php echo e(clean(trans('user::auth.forgot_password'))); ?>

                    </a>
					<div class="position-relative">
						<input type="password" class="form-control" name="password" placeholder="<?php echo e(clean(trans('user::attributes.users.password'))); ?>">
						<div class="show-password">
							<i class="icon-eye"></i>
						</div>
					</div>
                    
                    <?php if($errors->has('password')): ?>
                        <span class="help-block"><?php echo e(clean($errors->first('password'))); ?></span>
                    <?php endif; ?>
				</div>
                
                
                <div class="form-group form-action-d-flex mb-3">
					<div class="custom-control custom-checkbox">
						<input type="hidden" name="remember_me" value="0">
                        <input type="checkbox" name="remember_me"  value="1" id="remember_me" class="custom-control-input">
						<label class="custom-control-label m-0" for="remember_me"><?php echo e(clean(trans('user::attributes.auth.remember_me'))); ?></label>
					</div>
                    
                    <button type="submit" class="btn btn-primary col-md-5 float-right mt-3 mt-sm-0 fw-bold" data-loading><?php echo e(clean(trans('user::auth.sign_in'))); ?></button>
                    
				</div>
                <?php if(setting('allow_registrations')): ?>
				<div class="login-account">
					<span class="msg"><?php echo e(clean(trans('user::auth.dont_have_an_account_yet'))); ?></span>
					<a href="<?php echo e(route('admin.register')); ?>" id="show-signup" class="link"><?php echo e(clean(trans('user::auth.sign_up'))); ?></a>
				</div>
                <?php endif; ?>
                <div class="clearfix"></div> 
                    <div class="social-login-buttons text-center">
                        <?php if(count(app('enabled_social_login_providers')) !== 0): ?>
                            <div class="hline btn-primary">
                                <span class="hline-innertext btn-primary"><?php echo e(clean(trans('user::auth.or'))); ?></span>
                            </div>
                            
                        <?php endif; ?>

                        <?php if(setting('facebook_login_enabled')): ?>
                            <a href="<?php echo e(route('admin.login.redirect', ['provider' => 'facebook'])); ?>" class="btn btn-facebook">
                                <i class="fab fa-facebook-f"></i>
                                <?php echo e(clean(trans('user::auth.log_in_with_facebook'))); ?>

                            </a>
                        <?php endif; ?>

                        <?php if(setting('google_login_enabled')): ?>
                            <a href="<?php echo e(route('admin.login.redirect', ['provider' => 'google'])); ?>" class="btn btn-google">
                                <i class="fab fa-google"></i>
                                <?php echo e(clean(trans('user::auth.log_in_with_google'))); ?>

                            </a>
                        <?php endif; ?>
                    </div>
                
                
            </form>
        </div>
        
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user::admin.auth.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\sraservices\Modules/User/Resources/views/admin/auth/login.blade.php ENDPATH**/ ?>