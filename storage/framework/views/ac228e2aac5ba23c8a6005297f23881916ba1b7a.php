<?php echo e(Form::checkbox('facebook_login_enabled', clean(trans('setting::attributes.facebook_login_enabled')), clean(trans('setting::settings.form.enable_facebook_login')), $errors, $settings)); ?>

<?php echo e(Form::text('facebook_login_app_id', clean(trans('setting::attributes.facebook_login_app_id')), $errors, $settings, ['required' => true])); ?>

<?php echo e(Form::password('facebook_login_app_secret', clean(trans('setting::attributes.facebook_login_app_secret')), $errors, $settings, ['required' => true])); ?>

        
    <?php /**PATH C:\xampp\htdocs\sraservices_working\Modules/Setting/Resources/views/admin/settings/tabs/facebook.blade.php ENDPATH**/ ?>